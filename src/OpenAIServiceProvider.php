<?php

namespace Marxolity\OpenAi;

use Illuminate\Support\ServiceProvider;
use Marxolity\OpenAi\Services\Ai\OpenAi;
use Marxolity\OpenAi\Services\Ai\AiInterface;

class OpenAIServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(AiInterface::class, OpenAi::class);

        $this->mergeConfigFrom(__DIR__.'/../config/open-ai.php', 'open-ai');
    }
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            // php artisan vendor:publish --provider="Marxolity\OpenAi\OpenAIServiceProvider" --tag="config"
            $this->publishes([
              __DIR__.'/../config/open-ai.php' => config_path('open-ai.php'),
            ], 'config');
          }
    }
}