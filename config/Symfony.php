<?php

namespace Mygento\CS\Config;

class Symfony extends Base
{
    public function getRules(): array
    {
        $rules = parent::getRules();
        $symfonyRules = [
            '@Symfony' => true,
        ];
        return array_merge($symfonyRules, $rules);
    }
}
