<?php
function getConfig(){
  $config;
  $configPath = './config/app.json';

  if(file_exists($configPath) && is_readable($configPath)){
    $config = file_get_contents($configPath);
  } else {
    $config = false;
  }
  return json_decode($config, true);
}

function getCoversPath(){
   return getConfig()['images']['path'];
}
?>
