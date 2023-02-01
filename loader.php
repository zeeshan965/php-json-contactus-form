<?php

spl_autoload_register('autoloadClasses');

/**
 * @param string $className
 * @return void
 */
function autoloadClasses(string $className)
{
    $path = __DIR__ . '/';
    $extension = '.php';
    $fullPath = $path . $className . $extension;
    include_once($fullPath);
}