<?php
// IMPORTANT NOTE
// The php.ini setting phar.readonly must be set to 0

if ($argc !== 2) {
    echo 'specify output phar path';
    exit(1);
}

$pharFile = $argv[1];
$pharFileGzipped = $pharFile . '.gz';

if (file_exists($pharFile)) {
    unlink($pharFile);
}

if (file_exists($pharFileGzipped)) {
    unlink($pharFileGzipped);
}

$p = new Phar($pharFile);

$p->buildFromDirectory(__DIR__);
$p->setDefaultStub('index.php', '/index.php');
$p->delete(basename(__FILE__));

$p->compress(Phar::GZ);

echo 'Phar Compiled' . PHP_EOL;
echo sprintf(
    'Phar Size: %dkb, Gzipped Phar Size %dkb',
    filesize($pharFile) / 1024,
    filesize($pharFileGzipped) / 1024
);
