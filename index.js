'use strict';
module.exports = {
  extends: 'eslint:recommended',
  env: {
    'node': true,
    'browser': true,
    'jquery': true,
    'amd': true,
    'prototypejs': true
  },
  rules: {
    'array-bracket-spacing': ['error', 'always', { 'singleValue': false }],
    indent: ['error', 2],
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
