<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService
{
    /**
     * Update User
     * @param array<int,mixed> $data
     */
    public function update(array $data, User $user): User
    {
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->role = $data['role'];
        if ($data['password']) {
            $user->password = Hash::make($data['password']);
        }

        $user->save();

        return $user;
    }
}
