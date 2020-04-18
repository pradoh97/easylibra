<?php

abstract class Config{
  static function getConfig():array{
    $config = false;
    $configPath = './config/app.json';

    if(file_exists($configPath) && is_readable($configPath)){
      $config = file_get_contents($configPath);
    }

    return json_decode($config, true);
  }

  static function getCoversPath(){
     return self::getConfig()['images']['path'];
  }

  static function getPlaceholderURI(){
    return '"' . self::getConfig()['images']['path'] . self::getConfig()['images']['placeholder']. '"';
  }
}
?>
