<?php 

use Router\Router;
use App\Exceptions\NotFoundException;

require '../vendor/autoload.php';

define('VIEWS', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR);
define('SCRIPTS', dirname($_SERVER['SCRIPT_NAME']) . DIRECTORY_SEPARATOR);
define('URL', '/Projet_5_Creer_son_premier_blog_en_PHP');

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

// Routes for the Login and SignUp Page
$router->get('/login', 'App\Controllers\UserController@login');
$router->post('/login', 'App\Controllers\UserController@loginPost');
$router->get('/logout', 'App\Controllers\UserController@logout');
$router->get('/signup', 'App\Controllers\UserController@signup');
$router->post('/signup', 'App\Controllers\UserController@signupPost');

// Route for create a comment for a specific post
$router->post('/posts/:id/comment/create', 'App\Controllers\Admin\CommentController@commentPost');

// Routes for the Backend AdminPage
$router->get('/admin/dashboard/', 'App\Controllers\Admin\AuthController@admin');

// Routes for the Backend AdminPage
$router->get('/user/dashboard/', 'App\Controllers\Admin\AuthController@user');

// Routes for manage the blog posts
$router->get('/admin/posts/', 'App\Controllers\Admin\PostController@index');
$router->get('/admin/posts/create', 'App\Controllers\Admin\PostController@create');
$router->post('/admin/posts/create', 'App\Controllers\Admin\PostController@createPost');
$router->post('/admin/posts/delete/:id', 'App\Controllers\Admin\PostController@delete');
$router->get('/admin/posts/edit/:id', 'App\Controllers\Admin\PostController@edit');
$router->post('/admin/posts/edit/:id', 'App\Controllers\Admin\PostController@update');


// Routes for manage the blog comments
$router->get('/admin/comments/', 'App\Controllers\Admin\CommentController@index');
$router->get('/admin/comments/:id', 'App\Controllers\Admin\CommentController@accept');
$router->get('/admin/comments/delete/:id', 'App\Controllers\Admin\CommentController@delete');

// Routes for manage the blog users
$router->get('/admin/users/', 'App\Controllers\Admin\UserController@index');
$router->get('/user/:id', 'App\Controllers\Admin\UserController@account');
$router->get('/admin/users/create', 'App\Controllers\Admin\UserController@create');
$router->post('/admin/users/create', 'App\Controllers\Admin\UserController@createUser');
$router->get('/admin/users/:id', 'App\Controllers\Admin\UserController@show');
$router->post('/admin/users/delete/:id', 'App\Controllers\Admin\UserController@delete');
$router->get('/admin/users/edit/:id', 'App\Controllers\Admin\UserController@edit');
$router->post('/admin/users/edit/:id', 'App\Controllers\Admin\UserController@update');

try {
    $router->run();
} catch(NotFoundException $e) {
    return $e->error404();
}
