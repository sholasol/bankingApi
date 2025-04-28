<?php

namespace App\Http\Controllers;

use App\Dtos\UserDto;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterUserRequest;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
    public function __construct(private readonly UserService $userService)
    {
        
    }
    

    public function register(RegisterUserRequest $request) : JsonResponse
    {
        $userDto = UserDto::fromAPIFormRequest($request);
        $user = $this->userService->createUser($userDto);

        return response()->json([
            'user' => $user, 
            'success' => true,
            'message' => 'User registered successfully'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
