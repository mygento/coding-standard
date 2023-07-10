'use strict';
module.exports = {
  extends: 'eslint:recommended',
  env: {
    'node': true,
    'es6': true,
    'browser': true,
    'jquery': true,
    'amd': true,
    'prototypejs': true
  },
  rules: {
    'array-bracket-spacing': ['error', 'never'],
    indent: ['error', 2, { 'SwitchCase': 1 }],
    'no-trailing-spaces': 'error',
    'object-curly-spacing': ['error', 'always'],
    'keyword-spacing': [
      'error',
      {
        before: true,
        after: true,
      },
    ],
    'linebreak-style': [
      'error',
      'unix',
    ],
    'no-multiple-empty-lines': 'error',
    'no-unneeded-ternary':  'error',
    'no-unused-vars': ['error', { args: 'all', argsIgnorePattern: '^_.+' }],
    'prefer-const': 'error',
    quotes: [
      'error',
      'single',
    ],
    semi: [
      'error',
      'always',
    ],
    'space-before-blocks': [
      'error',
      'always',
    ],
  },
};
