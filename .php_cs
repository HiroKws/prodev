<?php

$finder = Symfony\CS\Finder\DefaultFinder::create()
    ->exclude('vendor')
    ->exclude('public')
    ->exclude('resources')
    ->exclude('storage')
    ->exclude('bootstrap')
    ->in(__DIR__)
;

// php-cs-fixer fix file-directory-path --level=symfony --fixers=-psr0,align_double_arrow,align_equals,logical_not_operators_with_successor_space,ordered_use
// ordered_useの副作用で、未使用のエイリアスを定義しているuse文は削除される
// psr0を抑制しないと、ディレクトリ名のappにより、名前空間の先頭がappへ置き換えられてしまう
return Symfony\CS\Config\Config::create()
        ->level(Symfony\CS\FixerInterface::SYMFONY_LEVEL)
        ->fixers([
            '-psr0',
            'align_double_arrow',
            'align_equals',
            'logical_not_operators_with_successor_space',
            'ordered_use',
        ])
        ->finder($finder)
;
