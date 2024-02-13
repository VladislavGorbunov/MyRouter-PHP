<h1>Easy PHP Router</h1>
// Роутер на регулярных выражениях.

// Добавление роутов в файл config/routes.php

// Обращение к /contacts вызывает метод index класса ContactsController <br>
Router::get('/contacts', 'ContactsController::index'); <br>
Router::get('/posts/([0-9]+)/([0-9]+)/([0-9]+)', 'PostsController::index');
