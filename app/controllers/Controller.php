<?php 

namespace App\Controllers;

use Database\Connection;

abstract class Controller {

    protected $db;

    public function __construct(Connection $db) 
    {
        if(session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $this->db = $db;
    }

    // function to return a specific view file
    protected function view(string $path, array $params = null) 
    {
        ob_start();
        $path = str_replace('.', DIRECTORY_SEPARATOR, $path);
        require VIEWS . $path . '.php';

        $content = ob_get_clean();

        require VIEWS . 'layout.php';
    }

    // function to get the connection with the database
    protected function getDB()
    {
        return $this->db;
    }

    // function return true if a user is admin
    protected function isAdmin()
    {
        if(isset($_SESSION['auth']) && $_SESSION['auth'] == 1) {
            return true;
        }else{
            header('Location: ' .URL.'/login');
        }
    }

    // function return true if a user is simple user
    protected function isUser()
    {
        if(isset($_SESSION['auth']) && $_SESSION['auth'] == 0) {
            return true;
        }else{
            header('Location: ' .URL.'/login');
        }
    }
}