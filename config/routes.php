<?php

use Vlad\Router\Router;

Router::get('/', '');
//Router::get('/', 'BaseController::index');
Router::get('/about', 'AboutController::index');
Router::get('/contacts', 'ContactsController::index');
Router::get('/posts/([0-9]+)/([0-9]+)/([0-9]+)', 'PostsController::index');