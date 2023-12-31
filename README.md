# OpenAI API Integration - Laravel
![uptime](https://img.shields.io/badge/uptime-100%25-brightgreen) [![License](http://poser.pugx.org/marxolity/open-ai/license)](https://packagist.org/packages/marxolity/open-ai) [![Total Downloads](http://poser.pugx.org/marxolity/open-ai/downloads)](https://packagist.org/packages/marxolity/open-ai/)
***
A Laravel Package that facilitates effortless integration of the OpenAI API into PHP applications, ensuring seamless connectivity and interaction with OpenAI's services within the Laravel Framework.

---
## Installation
Install the package via Composer [Reference](https://packagist.org/packages/marxolity/open-ai):
```bash
composer require marxolity/open-ai
```
---
## Configuration
Publish the package configuration: (config/open-ai.php)
```bash
php artisan vendor:publish --provider="Marxolity\OpenAi\OpenAIServiceProvider" --tag="config"
```
Set up your environment variables:
```bash
OPENAI_API_KEY="<<YOUR_API_KEY>>"
```
---
## Usage
```php
   use \Marxolity\OpenAi\Facades\OpenAi;
```
Changing Model then Retrieve responseMessage (Ex: Change model to `gpt-4`)
```php
   $responseMessage = OpenAi::query("What is Laravel?")
        ->setModel('gpt-4')
        ->send()->responseMessage;
```

Retrieve Response Message
```php
   $responseMessage = OpenAi::query("What is Laravel?")->send()->responseMessage;
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
   $responseXml = OpenAi::query("What is Laravel?")->send()->toXml();
```
### Tested Models (Limited to `GPT Models`)
| Model | Note | Date|
| ------------- | ------------- |-----:|
|`gpt-3.5-turbo-1106`|| Nov 22, 2023|
|`gpt-3.5-turbo-16k`|| Nov 22, 2023|
|`gpt-3.5-turbo`|**`default`**| Nov 20, 2023|
|`gpt-3.5-turbo-1106`| | Nov 20, 2023|
|`gpt-4` | The account must reach at minimum **Tier 1** status. |  Nov 20, 2023|
|`gpt-4-vision-preview` | The account must reach at minimum **Tier 1** status. |  Nov 20, 2023|
|`gpt-4-0613` | The account must reach at minimum **Tier 1** status. |  Nov 22, 2023|
|`gpt-4-1106-preview` | The account must reach at minimum **Tier 1** status. |  Nov 22, 2023|
> Note: Please be advised that other GPT models may be utilized at your discretion, acknowledging associated risks.
