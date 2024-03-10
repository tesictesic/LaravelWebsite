<?php

namespace App\Providers;

use App\View\Components\AdminComponent;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;

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
        Paginator::useBootstrapFour();
        $ne_tabele=["failed_jobs","migrations","password_reset_tokens","password_access_tokens","personal_access_tokens","orders","comments_users_likes","services",'user_ratings','servicing_items','logs','logs_type','user_archived_searches'];
        $tmp_niz=[];
        $tabele = DB::select('SHOW TABLES');
         foreach ($tabele as $tabela){
             $vrednost=reset($tabela);
             if(!in_array($vrednost,$ne_tabele)){
              array_push($tmp_niz,$vrednost);
             }
         }
         $tabela_model="models";
         array_push($tmp_niz,$tabela_model);
         sort($tmp_niz);
        View::share('tables',$tmp_niz);
        Blade::component('admin-component',AdminComponent::class);
    }
}
