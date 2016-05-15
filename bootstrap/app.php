<?php

namespace App;

use App\Factory;

class App
{
    private $configManager;
    private $routeManager;
    private $authManager;

    public function run()
    {
        $this->loadConfig();
        $this->checkAuthentication();
        $this->route();
    }

    private function loadConfig()
    {
        $this->configManager = Factory::getConfigManager();
        $this->configManager->load(__DIR__.'/../config');

        $this->routeManager = Factory::getRouteManager();

        $this->authManager = Factory::getAuthManager();
    }

    private function checkAuthentication()
    {
        if( !$this->authManager->isUserLoggedIn() ){
            $this->routeManager->routeToError(403);
        }
    }

    private function route()
    {
        $config = $this->routeManager->get('routes');
        $route = $this->routeManager->route($config);
    }
}

?>
