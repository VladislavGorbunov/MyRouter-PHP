// Роутер на регулярных выражениях.

// Добавление роутов в файл config/routes.php

// Обращение к /contacts вызывает метод index класса ContactsController
Router::get('/contacts', 'ContactsController::index'); 
Router::get('/posts/([0-9]+)/([0-9]+)/([0-9]+)', 'PostsController::index');
