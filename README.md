# Open Ai API
OpenAI API
# Installation
```bash
composer require marxolity/open-ai
```
## Config
```bash
php artisan vendor:publish --provider="Marxolity\OpenAi\Providers\OpenAIServiceProvider" --tag="config"
```
## Setup -> Env
```bash
MRX_OPEN_AI_API_KEY="<<API_KEY>>"
```
## config/app.php
```php
    'providers' => [
        ...
        Marxolity\OpenAi\Providers\OpenAIServiceProvider::class,
    ],
    'aliases' => Facade::defaultAliases()->merge([
        ...
        'OpenAi' => \Marxolity\OpenAi\Facades\OpenAi::class,
    ])->toArray(),
```
## Usage
### Usage - get response message
```php
   # Request: ResponseMessage
    \OpenAi::query("What is Laravel?")
        ->send()->responseMessage
   # Response: String
   Laravel is a free, open-source PHP web framework used for developing web applications. It fol...
```
### Usage - format Array
```php
   # Request: toArray
    \OpenAi::query("What is Laravel?")
        ->send()->toArray()
   # Response Array
        "id" => "chatcmpl-8MaaUeOf5caMryoXfjpxKo3F0Q2kO"
        "object" => "chat.completion"
        "created" => 1700394550
        "model" => "gpt-3.5-turbo-0613"
        "choices" => array:1 [▶]
        "usage" => array:3 [▶]
```

### Usage - format JSON
```php
   # Request: toArray
    \OpenAi::query("What is Laravel?")
        ->send()->toJson()
   # Response String
    {"id":"chatcmpl-8MacLVh8MyGsPuATmdeDlm0GUQnkp","object":"chat.completion","created":1700394665,"model":"gpt-3.5-turbo-0613","choices":[{"index":0,"message":{"ro ...
```
### Usage - format XML
```php
   # Request: XML
   \OpenAi::query("What is Laravel?")
        ->send()->toXml()
   # Response String
    <?xml version="1.0"?><root><id>chatcmpl-8Maf9dDoLGOQDzxc7ZfcSyK7nqxm3</id><object>chat.completion</object><created>1700394839</created><model>gpt-3.5-turbo-0613</model><choices><...
```

