# Linter Setup for WordPress Block Theme

This document provides instructions for setting up linting tools for the WordPress Block Theme project.

## Installation Commands

### 1. Install Node.js Dependencies

```bash
# Install all Node.js dependencies defined in package.json
npm install
```

### 2. Install PHP Dependencies

```bash
# Install all PHP dependencies defined in composer.json
composer install
```

## Configuration Files

The following configuration files have been created for this project:

### 1. `.eslintrc.json`

This file configures ESLint for JavaScript linting with WordPress-specific rules. It enforces modern JavaScript practices including:
- ES6+ features (const, let, arrow functions)
- No use of var
- Proper arrow function body style
- Warning for console statements

### 2. `.stylelintrc.json`

This file configures Stylelint for CSS linting with rules optimized for modern CSS practices:
- Support for CSS nesting, container queries, and logical properties
- Modern selectors like :is() and :has()
- Maximum nesting depth of 3
- 2-space indentation
- Short hex color codes

### 3. `.phpcs.xml`

This file configures PHP CodeSniffer with WordPress coding standards:
- WordPress-Core, WordPress-Extra, and WordPress-Docs rulesets
- PSR-12 formatting
- Enforces short array syntax
- PHP compatibility checking
- Theme-specific text domain and prefix rules

### 4. `.prettierrc.json`

This file configures Prettier for consistent code formatting across JavaScript, JSON, and CSS files:
- Single quotes
- Trailing commas in ES5
- Semicolons at the end of statements

## Usage

The following npm scripts are available for linting and formatting:

```bash
# Lint JavaScript
npm run lint:js

# Lint CSS
npm run lint:css

# Lint PHP
npm run lint:php

# Lint all (JavaScript, CSS, and PHP)
npm run lint

# Format JavaScript
npm run format:js

# Format CSS
npm run format:css

# Format PHP
npm run format:php

# Format all (JavaScript, CSS, and PHP)
npm run format:all
```

## Compatibility

This linting setup is compatible with:
- Modern JavaScript (ES6+) development practices
- Modern CSS features including nesting, container queries, and logical properties
- WordPress PHP coding standards with PSR-12 formatting
- BEM methodology for CSS class naming

The configuration is designed to enforce best practices while avoiding excessive restrictions that might slow down development. 