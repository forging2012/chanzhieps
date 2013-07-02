<?php
$webRoot   = $this->app->getWebRoot();
$jsRoot    = $webRoot . "js/";
$themeRoot = $webRoot . "theme/";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
  <?php
  if(!isset($title))    $title    = $lang->xirangEPS;
  if(!isset($keywords)) $keywords = $app->site->keywords;
  if(!isset($desc))     $desc     = $app->site->desc;

  echo html::title($title . '-' . $app->site->name);
  echo html::meta('keywords',    $keywords);
  echo html::meta('description', $desc);

  js::exportConfigVars();
  if($config->debug)
  {
      js::import($jsRoot . 'jquery/min.js');
      js::import($jsRoot . 'bootstrap/min.js');
      js::import($jsRoot . 'my.js');
      css::import($themeRoot . 'bootstrap/css/core.min.css');
      css::import($themeRoot . 'default/style.css');
  }
  else
  {
      css::import($themeRoot . 'all.css', $config->version);
      js::import($jsRoot     . 'all.js',  $config->version);
  }

  if(isset($pageCSS)) css::internal($pageCSS);
  if(RUN_MODE == 'admin') css::import($themeRoot . 'default/admin.css', $config->version);

  echo html::icon($webRoot . 'favicon.ico');
  echo html::rss($config->webRoot .'rss.xml', $app->site->name);
?>
</head>
<body>
