<?php

namespace App\Services;

use App\Models\User;
use App\Dtos\UserDto;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Database\Eloquent\Builder;

class UserService
{
    public function createUser(UserDto $userDto) : Builder | Model
    {
      return  User::query()->create([
            'firstname' => $userDto->getFirstname(),
            'lastname' => $userDto->getLastname(),
            'email' => $userDto->getEmail(),
            'phone' => $userDto->getPhone(),
            'password' => $userDto->getPassword(),
            'address' => $userDto->getAddress(),
            'city' => $userDto->getCity(),
            'dob' => $userDto->getDob(),
        ]);
    }   
}