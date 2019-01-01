<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /**
         * O Laravel 5.4 fez uma mudança no conjunto de caracteres padrão do banco de dados, 
         * e agora é o utf8mb4 que inclui suporte para armazenamento de emojis. 
         * Isso afeta apenas novos aplicativos e, 
         * enquanto você estiver executando o MySQL v5.7.7 e superior, 
         * você não precisa fazer nada.
         * Para aqueles que executam o MariaDB ou versões mais antigas do MySQL, 
         * você pode encontrar este erro ao tentar executar migrações:
         * Fonte: https://laravel-news.com/laravel-5-4-key-too-long-error
         */
        Schema::defaultStringLength(191); 
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
