<?php 

namespace App\Models;

class User extends Model {

    protected $table = 'users';

    public function getByEmail(string $email): User
    {
        $user = $this->query("SELECT * FROM {$this->table} WHERE email = ?", [$email], true);
        if($user) {
            return $user;
        }else{
            $_SESSION['errors']['user'] = ['Email inconnu, veuillez créer un compte.'];
            header('Location: ' .URL.'/login');
            exit;
        }
    }

    public function getFullName()
    {
        return $this->firstname.' '.$this->lastname;
    }
}

?>