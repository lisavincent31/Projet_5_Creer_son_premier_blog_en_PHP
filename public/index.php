<?php 

use Router\Router;
use App\Exceptions\NotFoundException;

require '../vendor/autoload.php';

define('VIEWS', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR);
define('SCRIPTS', dirname($_SERVER['SCRIPT_NAME']) . DIRECTORY_SEPARATOR);

// constantes for the connection
define('DB_NAME', 'myblog');
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PWD', '');

$router = new Router($_GET['url']);

// Route for the HomePage
$router->get('/', 'App\Controllers\HomeController@home');
// Routes for the BlogPage
$router->get('/posts', 'App\Controllers\BlogController@index');
$router->get('/posts/:id', 'App\Controllers\BlogController@show');
$router->get('/tags/:id', 'App\Controllers\BlogController@tag');
// // Routes for the Login and SignUp Page
// $router->get('/login', 'App\Controllers\AuthController@login');
// $router->get('/signup', 'App\Controllers\AuthController@signup');
// // Routes for the Backend AdminPage
// $router->get('/admin', 'App\Controllers\AuthController@admin');
// // Routes for manage the blog posts
// $router->get('/admin/posts/create', 'App\Controllers\AuthController@create');
// $router->get('/admin/posts/:id/update', 'App\Controllers\AuthController@update');
// $router->get('/admin/posts/:id/delete', 'App\Controllers\AuthController@delete');

try {
    $router->run();
} catch(NotFoundException $e) {
    return $e->error404();
}
