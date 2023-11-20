# OpenAI API Integration - Laravel
***
A Laravel Package that facilitates effortless integration of the OpenAI API into PHP applications, ensuring seamless connectivity and interaction with OpenAI's services within the Laravel Framework.

| Supported Models| Date|
| ------------- |-----:|
| `gpt-3.5-turbo` | Nov 20, 2023|

---
## Installation
Install the package via Composer [Reference](https://packagist.org/packages/marxolity/open-ai):
```bash
composer require marxolity/open-ai
```
---
## Configuration
Publish the package configuration: (config/ai.php)
```bash
php artisan vendor:publish --provider="Marxolity\OpenAi\Providers\OpenAIServiceProvider" --tag="config"
```
Set up your environment variables:
```bash
MRX_OPEN_AI_API_KEY="<<YOUR_API_KEY>>"
```
---
## Usage
```php
   use \Marxolity\OpenAi\Facades\OpenAi;
```
Retrieve Response Message

```php
   $responseMessage = OpenAi\Facades\OpenAi::query("What is Laravel?")->send()->responseMessage;
```
Response Message:
```php
   Laravel is a free, open-source PHP web framework used for developing web applications. It fol...
```
### Format Output
Retrieve as Array
```php
   $responseArray = OpenAi::query("What is Laravel?")->send()->toArray();
```
Retrieve as JSON
```php
   $responseJson = OpenAi::query("What is Laravel?")->send()->toJson();
```
Retrieve as XML
```php
   $responseXml = OpenAi\Facades\OpenAi::query("What is Laravel?")->send()->toXml();
```