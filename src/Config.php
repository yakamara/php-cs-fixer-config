<?php

declare(strict_types=1);

namespace Yakamara\PhpCsFixerConfig;

use PhpCsFixer\ConfigInterface;
use PhpCsFixer\Runner\Parallel\ParallelConfigFactory;
use PhpCsFixerCustomFixers\Fixer\MultilinePromotedPropertiesFixer;
use PhpCsFixerCustomFixers\Fixer\PhpdocSingleLineVarFixer;
use PhpCsFixerCustomFixers\Fixers;

final class Config extends \PhpCsFixer\Config
{
    private function __construct(string $name)
    {
        parent::__construct($name);

        $this->setUsingCache(true);
        $this->setParallelConfig(ParallelConfigFactory::detect());
        $this->setRiskyAllowed(true);
        $this->registerCustomFixers(new Fixers());
        $this->setRules([]);
    }

    public static function php81(): self
    {
        return new self('Yakamara (PHP >= 8.1)');
    }

    public function setRules(array $rules): ConfigInterface
    {
        $default = [
            '@PER-CS2.0' => true,
            '@PER-CS2.0:risky' => true,
            '@Symfony' => true,
            '@Symfony:risky' => true,
            '@PHP81Migration' => true,
            '@PHP80Migration:risky' => true,

            'array_indentation' => true,
            'concat_space' => ['spacing' => 'one'],
            'declare_strict_types' => true,
            'empty_loop_body' => ['style' => 'semicolon'],
            'final_class' => true,
            'fully_qualified_strict_types' => ['import_symbols' => true],
            'global_namespace_import' => [
                'import_constants' => true,
                'import_functions' => true,
                'import_classes' => true,
            ],
            'heredoc_to_nowdoc' => true,
            'method_argument_space' => ['on_multiline' => 'ignore'],
            'multiline_comment_opening_closing' => true,
            'no_superfluous_elseif' => true,
            'no_superfluous_phpdoc_tags' => [
                'allow_mixed' => true,
                'remove_inheritdoc' => true,
            ],
            'no_useless_else' => true,
            'no_useless_return' => true,
            'ordered_class_elements' => ['order' => [
                'use_trait',
                'case',
                'constant_public',
                'constant_protected',
                'constant_private',
                'property_public_static',
                'property_protected_static',
                'property_private_static',
                'property_public',
                'property_protected',
                'property_private',
                'construct',
                'destruct',
                'phpunit',
                'method_public',
                'method_protected',
                'method_private',
            ]],
            'ordered_imports' => ['imports_order' => [
                'class',
                'function',
                'const',
            ]],
            'phpdoc_align' => ['align' => 'left'],
            'phpdoc_array_type' => true,
            'phpdoc_order' => true,
            'phpdoc_separation' => false,
            'phpdoc_to_comment' => false,
            'single_line_empty_body' => true,
            'single_line_throw' => false,
            'strict_comparison' => true,
            'strict_param' => true,
            'string_implicit_backslashes' => ['single_quoted' => 'ignore'],
            'trailing_comma_in_multiline' => [
                'after_heredoc' => true,
                'elements' => ['arrays', 'parameters', 'match', 'arguments'],
            ],
            'use_arrow_functions' => false,
            'void_return' => false,

            MultilinePromotedPropertiesFixer::name() => true,
            PhpdocSingleLineVarFixer::name() => true,
        ];

        return parent::setRules(array_merge($default, $rules));
    }
}
