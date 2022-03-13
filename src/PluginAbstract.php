<?php

namespace VekaServer\Abstract;

use VekaServer\Interfaces\PluginInterface;

abstract class PluginAbstract implements PluginInterface
{

    protected abstract static function getAllRequiredPlugin():array ;
    protected abstract static function getCSS():array ;
    protected abstract static function getJS():array ;
    protected abstract static function getVIEW():array ;

    public static function getPathView():array {
        $r = static::getVIEW();
        foreach (static::getAllRequiredPlugin() as $plugin){
            $r = array_merge($plugin::getPathView(), $r);
        }
        return $r;
    }

    public static function getPathJS():array {
        $r = static::getJS();
        foreach (static::getAllRequiredPlugin() as $plugin){
            $r = array_merge($plugin::getPathJS(), $r);
        }
        return $r;
    }

    public static function getPathCSS():array {
        $r = static::getCSS();
        foreach (static::getAllRequiredPlugin() as $plugin){
            $r = array_merge($plugin::getPathCSS(), $r);
        }
        return $r;
    }

}
