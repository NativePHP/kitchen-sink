<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;
use Native\Laravel\Facades\ChildProcess as NativeChildProcess;
use Native\Laravel\Events\ChildProcess\ErrorReceived;
use Native\Laravel\Events\ChildProcess\MessageReceived;
use Native\Laravel\Events\ChildProcess\ProcessSpawned;
use Native\Laravel\Events\ChildProcess\ProcessExited;

class ChildProcess extends Component
{
    public $alias;

    public $message = '';

    public $persistent = false;

    public $log = [];

    public function clearLog()
    {
        $this->log = [];
    }

    public function getProcess()
    {
        $process = NativeChildProcess::get($this->alias);

        $process = json_encode($process, JSON_PRETTY_PRINT);

        $this->log[] = "Process details: {$process}";
    }

    public function getAll()
    {
        $processes = NativeChildProcess::all();

        $processes = json_encode($processes, JSON_PRETTY_PRINT);

        $this->log[] = "All processes: {$processes}";
    }

    public function start()
    {
        if (empty($this->alias)) {
            $alias = uniqid();
        }

        $this->log[] = "Starting [{$this->alias}]...";

        NativeChildProcess::start(
            $alias ?? $this->alias,
            [PHP_BINARY, 'artisan', 'app:child-process'],
            persistent: $this->persistent
        );
    }

    public function stop()
    {
        $this->log[] = "Stopping [{$this->alias}]...";

        NativeChildProcess::stop($this->alias);
    }

    public function restart()
    {
        $this->log[] = "Restarting [{$this->alias}]...";

        NativeChildProcess::restart($this->alias);
    }

    public function sendMessage()
    {
        $this->log[] = "Sending message ({$this->message}) to [{$this->alias}]...";

        NativeChildProcess::get($this->alias)?->message($this->message);
    }

    #[On('native:'.ProcessSpawned::class)]
    public function started(string $alias = null, string $pid = null) {
        $this->log[] = "Process [{$alias}] started with PID [{$pid}]!";
    }

    #[On('native:'.ProcessExited::class)]
    public function stopped(string $alias = null, int $code = null) {
        $this->log[] = "Process [{$alias}] exited with status [{$code}].";
    }

    #[On('native:'.MessageReceived::class)]
    public function messageReceived(string $alias = null, string $data = null) {
        $data = json_encode($data, JSON_PRETTY_PRINT);
        $this->log[] = "Message received from [{$alias}]: {$data}";
    }

    #[On('native:'.ErrorReceived::class)]
    public function errorReceived(string $alias = null, string $data = null) {
        $data = json_encode($data, JSON_PRETTY_PRINT);
        $this->log[] = "Error received from [{$alias}]: {$data}";
    }

    public function render()
    {
        return view('livewire.child-process');
    }
}
