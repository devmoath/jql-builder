<?php

use PhpCsFixer\Config;
use Symfony\Component\Finder\Finder;

$finder = Finder::create()
    ->in([
        __DIR__.'/src',
        __DIR__.'/tests',
    ])
    ->name('*.php')
    ->ignoreDotFiles(true)
    ->ignoreVCS(true);

return (new Config())->setRules([
    '@PSR2' => true,
    'function_declaration' => ['closure_function_spacing' => 'none'],
])->setFinder($finder);
