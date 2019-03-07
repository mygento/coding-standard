<?php

namespace Mygento\CS\Config;

class Module extends Base
{
    public function getRules()
    {
        $rules = parent::getRules();
        $moduleRules = [
            'phpdoc_var_without_name' => true,
            'single_line_comment_style' => true,
        ];
        return array_merge($rules, $moduleRules);
    }
}
