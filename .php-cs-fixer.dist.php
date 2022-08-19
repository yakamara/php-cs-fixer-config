<?php

declare(strict_types=1);

$finder = (new PhpCsFixer\Finder())
    ->in(__DIR__)
;

return Yakamara\PhpCsFixerConfig\Config::php81()
    ->setFinder($finder)
;
