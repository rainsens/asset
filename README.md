# About Asset

Rainsens Asset is a convenient website asset package working on Laravel.

# Installation

```
composer require rainsens/asset
```

# Usage
### Configuration
```php
php artisan vendor:publish --provider="Rainsens\Asset\AssetServiceProvider" --tag="config"
```

### Loading single css file
```php
_asset_css()
```

### Loading multiple css files
```php
_asset_css_all()
```

### Loading single js file
```php
_asset_js()
```

### Loading multiple js files
```php
_asset_js_all()
```

### Loading IE compatible js files
```php
_asset_ie()
```

### Loading required css files
```php
_asset_required_css()
```

### Loading required js files
```php
_asset_required_js()
```

### Layouts
```php
@extends('asset::layouts.app')
```
