<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
  public function boot()
  {
    // // Using class based composers...
    // View::composer(
    //   ['layouts.includes._navbar', 'home'],
    //   'App\Http\ViewComposers\UserComposer'
    // );
  }

  /**
   * Register the service provider.
   *
   * @return void
   */
  public function register()
  {
    //
  }
}
