<?php

namespace Marxolity\OpenAi\Providers;

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

        $this->mergeConfigFrom(__DIR__.'/../config/ai.php', 'ai');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            // php artisan vendor:publish --provider="Marxolity\OpenAi\Providers\OpenAIServiceProvider" --tag="config"
            $this->publishes([
              __DIR__.'/../config/ai.php' => config_path('ai.php'),
            ], 'config');
        
          }
    }
}