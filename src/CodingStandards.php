<?php

declare(strict_types=1);

namespace SimpleOnlineHealthcare\CodingStandards;

use PhpCsFixer\Config;
use PhpCsFixer\Finder;

class CodingStandards
{
    public static function enableWithCustomPaths(array $paths): Config
    {
        $self = new self();

        $finder = $self->buildFinder($paths);

        return $self->buildConfig($finder);
    }

    public static function enable(string $basePath): Config
    {
        $self = new self();

        $finder = $self->buildFinder([
            $basePath.'/app',
            $basePath.'/bootstrap',
            $basePath.'/config',
            $basePath.'/database',
            $basePath.'/routes',
            $basePath.'/tests',
        ], ['cache']);

        return $self->buildConfig($finder);
    }

    protected function buildFinder(array $in, array $exclude = []): Finder
    {
        return Finder::create()
            ->in($in)
            ->exclude($exclude)
            ->name('*.php')
            ->ignoreDotFiles(true)
            ->ignoreVCS(true);
    }

    protected function buildConfig(Finder $finder): Config
    {
        return (new Config('SOH PHP Coding Standards'))
            ->setRiskyAllowed(true)
            ->setUsingCache(false)
            ->setRules([
                '@Symfony' => true,
                '@Symfony:risky' => true,

                // SOH custom ruleset
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
            ->setFinder($finder);
    }
}
