'use strict';
module.exports = {
  'extends': 'stylelint-config-standard',
  'rules': {
    'at-rule-no-unknown': null,
    'scss/at-rule-no-unknown': true,
    'at-rule-empty-line-before': null,
    'declaration-empty-line-before': null,
    'block-closing-brace-newline-after': null,
    'scss/at-else-closing-brace-newline-after': 'always-last-in-chain',
    'color-named': 'never',
    // 'declaration-use-variable': ''
    'declaration-no-important': true,
    'max-nesting-depth': [2, {ignore: 'pseudo-classes'}],
    'string-quotes': 'single'
    // unit-allowed-list
  },
  'plugins': [
    'stylelint-scss'
  ]
};
