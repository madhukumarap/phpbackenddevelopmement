<?php

declare(strict_types = 1);

// phpinfo();
require __DIR__ . '/../vendor/autoload.php';

$id = new \Ramsey\Uuid\UuidFactory();
echo $id->uuid4();
