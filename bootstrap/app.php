<?php

namespace App;

use Factory;

class App
{
    private $configManager;
    private $routeManager;
    private $authManager;

    public function __construct()
    {
        $this->configManager = Factory::getConfigManager();
        $this->routeManager = Factory::getRouteManager();
        $this->authManager = Factory::getAuthManager();
    }

    public static function run()
    {
        $this->loadConfig();
        $this->checkAuthentication();
        $this->route();
    }

    private function loadConfig()
    {
        $this->configManager->load(__DIR__.'/config');
    }

    private function checkAuthentication()
    {
        if( !$this->authManager->isUserAuthenticated() ){
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
