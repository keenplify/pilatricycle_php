<?php
define('ROOT_URI', __DIR__);

spl_autoload_register(function ($class) {
  $file = ROOT_URI . '/' . str_replace('\\', '/', $class) .'.php';
  if (file_exists($file)) {
      require $file;
  }
});