<?php

declare(strict_types=1);

namespace SimpleOnlineHealthcare\CodingStandards;

use PhpCsFixer\Config;
use PhpCsFixer\ConfigInterface;
use PhpCsFixer\Finder;

class CodingStandards
{
    public static function enable(?array $paths = null): ConfigInterface
    {
        $finder = Finder::create()
            ->in(
                $paths ?? [
                __DIR__ . '/app',
                __DIR__ . '/config',
                __DIR__ . '/database',
                __DIR__ . '/resources',
                __DIR__ . '/routes',
                __DIR__ . '/tests',
                __DIR__ . '/lang',
            ]
            )
            ->name('*.php')
            ->ignoreDotFiles(true)
            ->ignoreVCS(true)
        ;

        return (new Config('SOH PHP Coding Standards'))
            ->setRiskyAllowed(true)
            ->setUsingCache(false)
            ->setRules([
                '@Symfony' => true,
                '@Symfony:risky' => true,

                // SOH custom ruleset
                'class_attributes_separation' => [],
                'concat_space' => [
                    'spacing' => 'one',
                ],
                'global_namespace_import' => [
                    'import_classes' => true,
                    'import_constants' => true,
                    'import_functions' => true,
                ],
                'no_alternative_syntax' => [
                    'fix_non_monolithic_code' => false,
                ],
                'php_unit_method_casing' => [
                    'case' => 'camel_case',
                ],
                'protected_to_private' => false,
                'yoda_style' => false,

                'multiline_whitespace_before_semicolons' => [
                    'strategy' => 'new_line_for_chained_calls',
                ],
                'whitespace_after_comma_in_array' => [
                    'ensure_single_space' => true,
                ],
                'phpdoc_to_comment' => false,

                // Risky rules
                'declare_strict_types' => true,
            ])
            ->setFinder($finder)
        ;
    }
}
