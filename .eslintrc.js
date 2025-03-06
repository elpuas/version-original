module.exports = {
  root: true,
  extends: [
    'plugin:@wordpress/eslint-plugin/recommended',
    'prettier'
  ],
  parserOptions: {
    requireConfigFile: false,
    ecmaVersion: 2021,
    sourceType: 'module',
    ecmaFeatures: {
      jsx: true
    }
  },
  env: {
    browser: true,
    es6: true,
    node: true
  },
  rules: {
    // Custom rules or overrides
    'no-console': ['warn', { allow: ['warn', 'error'] }],
    'prefer-const': 'warn',
    'jsdoc/require-param': 'off',
    'jsdoc/require-returns': 'off',
    'import/no-unresolved': 'off'
  },
  settings: {
    jsdoc: {
      mode: 'typescript'
    }
  }
}; 