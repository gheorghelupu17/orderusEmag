<?php

require_once 'vendor/autoload.php';

//import models
importFiles('Models/');
importFiles('Skills/');
importFiles('Utils/');

function importFiles($dir)
{
    $parentFileList = glob($dir . '_*.php');
    $fileList = glob($dir . '*.php');
    $fileList = array_diff($fileList, $parentFileList);
    $fileList = array_merge($parentFileList, $fileList);
    foreach ($fileList as $filename) {
        if (is_file($filename)) {
            require_once $filename;
        }
    }
}