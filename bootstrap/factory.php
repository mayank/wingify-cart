<?php

namespace App;

use Router\RouteManager;
use Configurator\ConfigManager;
use Authenticator\Authenticate;
use Session\SessionManager;
use DBC\DatabaseFactory;

class Factory
{
    public static function getConfigManager()
    {
        return ConfigManager::getInstance();
    }

    public static function getRouteManager()
    {
        return RouteManager::getInstance();
    }

    public static function getAuthManager()
    {
        return new Authenticate();
    }

    public static function getSessionManager()
    {
        return SessionManager::getInstance();
    }

    public static function getDatabaseFactory()
    {
        return DatabaseFactory::getInstance();
    }

}



 ?>
