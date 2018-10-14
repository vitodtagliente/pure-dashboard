<?php

namespace App\Models;
use Pure\Model;

class User extends Model
{
    public static function define($schema)
    {
        $schema->id();
        $schema->char('email')->unique();
        $schema->char('password');
        $schema->boolean('active')->default(true);
        $schema->integer('role')->default(1);
    }

    public static function seed(){
        $user = new User;
        $user->email = 'admin@mail.it';
        $user->password = 'admin';
        $user->role = 100;
        $user->save();
    }
}

?>
