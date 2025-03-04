<?php

namespace Tests;

use Facebook\WebDriver\Chrome\ChromeOptions;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Illuminate\Support\Collection;
use Laravel\Dusk\TestCase as BaseTestCase;
use Symfony\Component\Process\Process;

abstract class DuskTestCase extends BaseTestCase
{
    use CreatesApplication;

    public static function startChromeDriver(array $arguments = [])
    {
        static::$chromeProcess = static::buildChromeProcess($arguments);

        static::$chromeProcess->start();

        static::afterClass(function () {
            static::stopChromeDriver();
        });
    }

    protected static function buildChromeProcess(array $arguments = [])
    {
        return new Process(
            array_merge(['node', __DIR__.'/../vendor/nativephp/electron/resources/js/node_modules/.bin/chromedriver'], $arguments), null, []
        );
    }

    /**
     * Prepare for Dusk test execution.
     *
     * @beforeClass
     */
    public static function prepare(): void
    {
        if (! static::runningInSail()) {
            static::startChromeDriver();
        }
    }

    /**
     * Create the RemoteWebDriver instance.
     */
    protected function driver(): RemoteWebDriver
    {
        $options = (new ChromeOptions)->addArguments(collect([
            $this->shouldStartMaximized() ? '--start-maximized' : '--window-size=1920,1080',
        ])->unless($this->hasHeadlessDisabled(), function (Collection $items) {
            return $items->merge([
                '--disable-gpu',
                '--headless=new',
            ]);
        })->all());

        return RemoteWebDriver::create(
            $_ENV['DUSK_DRIVER_URL'] ?? 'http://localhost:9515',
            DesiredCapabilities::chrome()
                ->setCapability(
                    ChromeOptions::CAPABILITY, $options
                )
                ->setCapability(
                    ChromeOptions::CAPABILITY_W3C, [
                        'binary' => __DIR__.'/../vendor/nativephp/electron/resources/js/node_modules/electron/dist/Electron.app/Contents/MacOS/Electron',
                        'args' => [
                            'app='.realpath(__DIR__.'/../vendor/nativephp/electron/resources/js'),
                            'env.TESTING=1',
                            'env.APP_PATH='.realpath(__DIR__.'/../'),
                        ],
                    ]
                )
        );
    }

    /**
     * Determine whether the Dusk command has disabled headless mode.
     */
    protected function hasHeadlessDisabled(): bool
    {
        return true;

        return isset($_SERVER['DUSK_HEADLESS_DISABLED']) ||
               isset($_ENV['DUSK_HEADLESS_DISABLED']);
    }

    /**
     * Determine if the browser window should start maximized.
     */
    protected function shouldStartMaximized(): bool
    {
        return isset($_SERVER['DUSK_START_MAXIMIZED']) ||
               isset($_ENV['DUSK_START_MAXIMIZED']);
    }
}
