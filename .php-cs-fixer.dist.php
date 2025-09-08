<?php

declare(strict_types=1);

use PhpCsFixer\Finder;
use Yakamara\PhpCsFixerConfig\Config;

return Config::php81()
    ->setFinder((new Finder())
        ->in(__DIR__)
        ->append([__FILE__]),
    )
;
