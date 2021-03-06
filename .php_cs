<?php

$directories = [
    'storage',
    'assets',
    'docs',
    'vendor',
    'node_modules',
    'modules',
    '.phpintel',
    '.idea',
    '.github'
];

$files = [
    '*.cache',
    '*.blade.php',
    '*.vc.php',
    '*.sqlite',
    '*.log',
    '*.htaccess',
    '.htaccess',
    '*.md',
    '*.yml',
    '*.conf',
    '*.ini',
    '.editorconfig',
    '.gitignore',
    '_ide_helper.php',
];

$finder = PhpCsFixer\Finder::create()
    ->in(__DIR__)
    ->exclude($directories);

foreach ($files as $file) {
    $finder->notName($file);
}

return PhpCsFixer\Config::create()
    ->setRiskyAllowed(true)
    ->setRules(['@PSR2' => true])
    ->setFinder($finder);