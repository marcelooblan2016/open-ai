# OpenAI API Integration
This package enables seamless integration with the OpenAI API in your PHP applications.
## Installation
Install the package via Composer:
```bash
composer require marxolity/open-ai
```
## Configuration
Publish the package configuration:
```bash
php artisan vendor:publish --provider="Marxolity\OpenAi\Providers\OpenAIServiceProvider" --tag="config"
```
Set up your environment variables:
```bash
MRX_OPEN_AI_API_KEY="<<YOUR_API_KEY>>"
```
Update config/app.php:
```php
    'providers' => [
        // ...
        Marxolity\OpenAi\Providers\OpenAIServiceProvider::class,
    ],
    'aliases' => Facade::defaultAliases()->merge([
        // ...
        'OpenAi' => \Marxolity\OpenAi\Facades\OpenAi::class,
    ])->toArray(),
```
## Usage
### Retrieve Response Message
```php
   $responseMessage = \OpenAi::query("What is Laravel?")->send()->responseMessage;
```
Response Message:
```php
   Laravel is a free, open-source PHP web framework used for developing web applications. It fol...
```
### Format Output
Retrieve as Array
```php
   $responseArray = \OpenAi::query("What is Laravel?")->send()->toArray();
```
Retrieve as JSON
```php
   $responseJson = \OpenAi::query("What is Laravel?")->send()->toJson();
```
Retrieve as XML
```php
   $responseXml = \OpenAi::query("What is Laravel?")->send()->toXml();
```
