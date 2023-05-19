<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use App\Models\Ticket;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();

        $ticket = Schema::hasTable('ticket');
        if($ticket){
            $numeroTicketsAtivos = Ticket::where('estado', true)->count();
            View::share('numeroTicketsAtivos', $numeroTicketsAtivos);
        }
    }
}
