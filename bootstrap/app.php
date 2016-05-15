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
    }

    private function checkAuthentication()
    {
        $this->authManager = Factory::getAuthManager();
        if( !$this->authManager->isUserLoggedIn() ){
            $this->routeManager->routeToError(403);
        }
    }

    private function route()
    {
        $this->routeManager = Factory::getRouteManager();
        $config = $this->routeManager->get('routes');
        $route = $this->routeManager->route($config);
    }
}

?>
