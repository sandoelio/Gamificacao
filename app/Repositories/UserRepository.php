<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    public function findByEmail($email)
    {
        return User::where('email', $email)->first();
    }

    public function createUser($email, $name)
    {
        return User::create([
            'email' => $email,
            'name' => $name
        ]);
    }

    public function findById($id)
    {
        return User::find($id);
    }
}
