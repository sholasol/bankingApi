<?php

namespace App\Dtos;

use App\Http\Requests\RegisterUserRequest;
use App\Interfaces\DtoInterface;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;

class UserDto implements DtoInterface
{
    private ?int $id;
    private string $email;
    private ?string $phone;
    private string $password;
    private string $firstname;
    private string $lastname;
    private ?string $address;
    private ?string $city;
    private ?string $avatar;
    private ?string $dob;
    private ?string $pin;
    private ?Carbon $created_at;
    private ?Carbon $updated_at;

    public function getId() : int
    {
        return $this->id;
    }

    public function setId(?int $id) : void
    {
        $this->id = $id;
    }

    public function getEmail() : string
    {
        return $this->email;
    }


    public function setEmail(string $email) : void
    {
        $this->email = $email;
    }

    public function getPhone() : string
    {
        return $this->phone;
    }


    public function setPhone(?string $phone) : void
    {
        $this->phone = $phone;
    }


    public function getPassword() : string
    {
        return $this->password;
    }


    public function setPassword(?string $password) : void
    {
        $this->password = $password;
    }


    public function getFirstname() : string
    {
        return $this->firstname;
    }


    public function setFirstname(?string $firstname) : void
    {
        $this->firstname = $firstname;
    }


    public function getLastname() : string
    {
        return $this->lastname;
    }


    public function setLastname(?string $lastname) : void
    {
        $this->lastname = $lastname;
    }

    public function getAddress() : string
    {
        return $this->address;
    }


    public function setAddress(?string $address) : void
    {
        $this->address = $address;
    }

    public function getCity() : string
    {
        return $this->city;
    }


    public function setCity(?string $city) : void
    {
        $this->city = $city;
    }

    public function getAvatar() : string
    {
        return $this->avatar;
    }


    public function setAvatar(?string $avatar) : void
    {
        $this->avatar = $avatar;
    }

     public function getPin() : string
    {
        return $this->pin;
    }


    public function setPin(?string $pin) : void
    {
        $this->pin = $pin;
    }

    public function getDob() : string
    {
        return $this->dob;
    }


    public function setDob(?string $dob) : void
    {
        $this->dob = $dob;
    }

    public function getCreatedAt() 
    {
        return $this->created_at;
    }

    public function setCreatedAt(?Carbon $created_at) : void
    {
        $this->created_at = $created_at;
    }


    public function getUpdateAt() 
    {
        return $this->updated_at;
    }

    public function setUpdateAt(?Carbon $updated_at) : void
    {
        $this->updated_at = $updated_at;
    }

    //implementing the interface

    public static function fromAPIFormRequest(FormRequest $request): self
    {
        $userDto = new UserDto();

        $userDto->setFirstname($request->input('firstname'));
        $userDto->setLastname($request->input('firstname'));
        $userDto->setEmail($request->input('email'));
        $userDto->setPassword($request->input('password'));
        $userDto->setPhone($request->input('phone'));
        $userDto->setAddress($request->input('address'));
        $userDto->setCity($request->input('city'));
        $userDto->setDob($request->input('dob'));
        $userDto->setAvatar($request->input('avatar'));

        return $userDto;
    }

    public static function fromModel(User| Model $model): self
    {
        $userDto = new UserDto();

        $userDto->setId($model->id);
        $userDto->setFirstname($model->firstname);
        $userDto->setLastname($model->lastname);
        $userDto->setEmail($model->email);
        $userDto->setPhone($model->phone);
        $userDto->setAddress($model->address);
        $userDto->setCity($model->city);
        $userDto->setDob($model->dob);
        $userDto->setAvatar($model->avatar);
        $userDto->setCreatedAt($model->created_at);
        $userDto->setUpdateAt($model->updated_at);

        return $userDto;
    }

    public static function toArray(Model | User $model): array
    {
       return [
        'id' => $model->id,
        'firstname' => $model->firstname,
        'lastname' => $model->lastname,
        'email' => $model->email,
        'phone' => $model->phone,
        'address' => $model->address,
        'city' => $model->city,
        'dob' => $model->dob,
        'avatar' => $model->avatar,
        'created_at' => $model->created_at,
        'updated_at' => $model->updated_at,
       ];
    }
}