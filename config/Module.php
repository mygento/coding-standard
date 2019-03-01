<?php

namespace Mygento\CS\Config;

class Module extends \PhpCsFixer\Config
{
    /**
     * @var string
     */
    private $header;

    /**
     * @param string $header
     */
    public function __construct($header = null)
    {
        parent::__construct('Mygento (Module)');
        $this->header = $header;
    }

    /**
     * {@inheritdoc}
     */
    public function setFinder($finder)
    {
        $finder->exclude('dev/tests/functional/generated')
          ->exclude('dev/tests/functional/var')
          ->exclude('dev/tests/functional/vendor')
          ->exclude('dev/tests/integration/tmp')
          ->exclude('dev/tests/integration/var')
          ->exclude('lib/internal/Cm')
          ->exclude('lib/internal/Credis')
          ->exclude('lib/internal/Less')
          ->exclude('lib/internal/LinLibertineFont')
          ->exclude('pub/media')
          ->exclude('pub/static')
          ->exclude('setup/vendor')
          ->exclude('var');
        parent::setFinder($finder);
    }

    public function getRules()
    {
        $rules = [
            '@PSR2' => true,
            '@PhpCsFixer' => true,
            'array_syntax' => ['syntax' => 'short'],
            'concat_space' => ['spacing' => 'one'],
            'include' => true,
            'new_with_braces' => true,
            'no_empty_statement' => true,
            'no_extra_consecutive_blank_lines' => true,
            'no_leading_import_slash' => true,
            'no_leading_namespace_whitespace' => true,
            'no_multiline_whitespace_around_double_arrow' => true,
            'no_multiline_whitespace_before_semicolons' => true,
            'no_singleline_whitespace_before_semicolons' => true,
            'no_trailing_comma_in_singleline_array' => true,
            'no_unused_imports' => true,
            'no_whitespace_in_blank_line' => true,
            'object_operator_without_whitespace' => true,
            'ordered_imports' => true,
            'standardize_not_equals' => true,
            'ternary_operator_spaces' => true,
            // mygento
            'phpdoc_order' => true,
            'phpdoc_no_package' => false,
            'phpdoc_no_empty_return' => false,
            'phpdoc_types' => true,
            'phpdoc_add_missing_param_annotation' => true,
            'phpdoc_align' => ['align' => 'left'],
            'single_quote' => true,
            'standardize_not_equals' => true,
            'ternary_to_null_coalescing' => true,
            'ternary_operator_spaces' => true,
            'lowercase_cast' => true,
            'no_empty_comment' => true,
            'no_empty_phpdoc' => true,
            'return_type_declaration' => true,
            'cast_spaces' => true,
            'no_useless_else' => true,
            'ordered_class_elements' => true,
            'yoda_style' => true,
            'align_multiline_comment' => true,
            'phpdoc_summary' => false,
            'fully_qualified_strict_types' => false,
            'phpdoc_separation' => false,
            'no_short_echo_tag' => false,
            'phpdoc_types_order' => [
                'null_adjustment' => 'always_last'
            ],
            'no_alternative_syntax' => false,
            'semicolon_after_instruction' => false,
            'single_line_comment_style' => false,
            'phpdoc_var_without_name' => false,
            'increment_style' => ['style' => 'post'],
        ];

        if (null !== $this->header) {
          $rules['header_comment'] = [
              'header' => $this->header,
              'commentType' => 'PHPDoc',
          ];
        }

        return $rules;
    }
}
