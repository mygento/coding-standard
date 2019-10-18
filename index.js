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
    indent: ['error', 2],
    'no-trailing-spaces': 'error',
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
    'no-unused-vars': ['error', { args: 'all', argsIgnorePattern: '^_.+' }],
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
