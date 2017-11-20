<?php

namespace App;

require "vendor/autoload.php";

use MaxBusiness\Config;
use MaxBusiness\Functions\Helpers;
use MaxBusiness\Functions\Router;

$define = new Config();
$helpers = new Helpers();
$router = new Router($helpers);
