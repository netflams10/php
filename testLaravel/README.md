    - Using Dusk for testing auth
        - Migrate to App\Providers\AppServiceProvider :- For Production purpose...
            - import it use Laravel\Dusk\DuskServiceProvider;
            - Condition to only change and use Dusk for Local
              if ($this->app->environment('local', 'testing')) {
                $this->app->register(DuskServiceProvider::class);
              }
            
        - DUSK Authentication Laravel

            - php artisan dusk:install
            - php artisan dusk:fails
            - if fails change
                - .env APP_URL=http://localhost:8000
                - php artisan dusk:chrome-driver --detect
                - php artisan serve
            - php artisan dusk:make <TestName>
        