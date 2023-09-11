<?php

declare(strict_types=1);

namespace Yakamara\PhpCsFixerConfig;

use PhpCsFixer\ConfigInterface;
use PhpCsFixerCustomFixers\Fixer\ConstructorEmptyBracesFixer;
use PhpCsFixerCustomFixers\Fixer\MultilinePromotedPropertiesFixer;
use PhpCsFixerCustomFixers\Fixer\PhpdocSingleLineVarFixer;
use PhpCsFixerCustomFixers\Fixers;

class Config extends \PhpCsFixer\Config
{
    private function __construct(string $name)
    {
        parent::__construct($name);

        $this->setUsingCache(true);
        $this->setRiskyAllowed(true);
        $this->registerCustomFixers(new Fixers());
        $this->setRules([]);
    }

    public static function php81(): self
    {
        return new self('Yakamara (PHP 8.1)');
    }

    public function setRules(array $rules): ConfigInterface
    {
        $default = [
            '@Symfony' => true,
            '@Symfony:risky' => true,
            '@PHP81Migration' => true,
            '@PHP80Migration:risky' => true,

            'align_multiline_comment' => true,
            'array_indentation' => true,
            'compact_nullable_typehint' => true,
            'curly_braces_position' => [
                'allow_single_line_anonymous_functions' => false,
                'allow_single_line_empty_anonymous_classes' => true,
            ],
            'declare_strict_types' => true,
            'empty_loop_body' => ['style' => 'semicolon'],
            'escape_implicit_backslashes' => true,
            'final_class' => false, // https://github.com/FriendsOfPHP/PHP-CS-Fixer/issues/5782
            'global_namespace_import' => [
                'import_constants' => true,
                'import_functions' => true,
                'import_classes' => false,
            ],
            'heredoc_to_nowdoc' => true,
            'list_syntax' => ['syntax' => 'short'],
            'method_argument_space' => ['on_multiline' => 'ignore'],
            'multiline_comment_opening_closing' => true,
            'no_superfluous_elseif' => true,
            'no_superfluous_phpdoc_tags' => [
                'allow_mixed' => true,
                'remove_inheritdoc' => true,
            ],
            'no_unset_on_property' => true,
            'no_useless_else' => true,
            'no_useless_return' => true,
            'nullable_type_declaration_for_default_null_value' => true,
            'operator_linebreak' => false,
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
            'phpdoc_align' => false,
            'phpdoc_order' => true,
            'phpdoc_separation' => false,
            'phpdoc_to_comment' => false,
            'phpdoc_types_order' => false,
            'single_line_throw' => false,
            'strict_comparison' => true,
            'strict_param' => true,
            'trailing_comma_in_multiline' => [
                'after_heredoc' => true,
                'elements' => ['arrays', 'parameters', 'match', 'arguments'],
            ],
            'use_arrow_functions' => false,
            'void_return' => false,

            ConstructorEmptyBracesFixer::name() => true,
            MultilinePromotedPropertiesFixer::name() => true,
            PhpdocSingleLineVarFixer::name() => true,
        ];

        return parent::setRules(array_merge($default, $rules));
    }
}
