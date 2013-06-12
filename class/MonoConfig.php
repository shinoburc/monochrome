<?php
/**
 * MonoConfig
 * @package Mono
 * @subpackage Mono
 * @author MIYAZATO Shinobu <shinobu@users.sourceforge.jp>
 * @version $Id: MonoConfig.php 70 2006-01-24 11:07:19Z shinobu $
 */

require_once 'class/Config.php';

class MonoConfig{
    private static $configs = array();
    
    public static function getConfig($config_file){
        if(!isset(self::$configs[$config_file])){
            self::$configs[$config_file] = new Config($config_file);
        }
        return self::$configs[$config_file];
    }
}
?>
