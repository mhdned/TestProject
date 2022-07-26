<?php

$base_url = "http://localhost/testproject/";
$base_dir = "/testproject/";

$tmp = explode('?', $_SERVER['REQUEST_URI']);
$current_route = str_replace($base_dir,'',$tmp[0]);
unset($tmp);

$dbHost = 'localhost';
$dbName = 'testproject';
$dbUsername = 'root';
$dbPassword = '';
