<?php 

namespace Nur\Providers;

use Nur\Kernel\ServiceProvider;

class Load extends ServiceProvider
{
  /**
   * Register the service provider.
   *
   * @return void
   */
  public function register()
  {
    $this->app->set('load', \Nur\Load\Load::class);
  }
}