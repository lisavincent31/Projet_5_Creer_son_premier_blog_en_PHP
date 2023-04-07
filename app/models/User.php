<?php 

namespace App\Models;

class User extends Model {

    protected $table = 'users';

    public function getFullName()
    {
        return $this->firstname.' '.$this->lastname;
    }
}

?>