<?php 

namespace App\Models;

class User extends Model {

    protected $table = 'users';

    public function create(array $data, ?array $relations = null)
    {
        $data['isAdmin'] = 0;
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        $user = $this->query("SELECT * FROM {$this->table} WHERE email = ?", [$data['email']], true);

        if($user) {
            $_SESSION['errors']['email'] = ['Un compte existe déjà avec cet email. Vous pouvez vous connecter avec cet email.'];
            header('Location: ' .URL.'/login');
            exit;
        }else{
            parent::create($data);

            return true;
        }
    }

    public function getByEmail(string $email): User
    {
        $user = $this->query("SELECT * FROM {$this->table} WHERE email = ?", [$email], true);
        if($user) {
            return $user;
        }else{
            $_SESSION['errors']['user'] = ['Email inconnu, veuillez créer un compte.'];
            header('Location: ' .URL.'/signup');
            exit;
        }
    }

    public function getFullName()
    {
        return $this->firstname.' '.$this->lastname;
    }
}

?>