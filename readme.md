# Backend Additions

This bundle adds backend UI improvements and a formatted number validation rule
for Contao 5.7.

## Features

- Adds sticky backend action bars and additional backend widget widths.
- Adds the article ID to the backend article list label.
- Adds the form validation rule `formatted_number`.

The `formatted_number` rule accepts values such as `123`, `1234`, `1.234` and
`1.234,56`.

## Installation

This package is intended to be installed as:

```bash
composer require dvc/contao-backend-additions:5.7.0
```
