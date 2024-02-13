<?php

namespace Vlad\Router;

use Vlad\Router\Router;
use Vlad\Controllers;

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/config/routes.php';

Router::run();

