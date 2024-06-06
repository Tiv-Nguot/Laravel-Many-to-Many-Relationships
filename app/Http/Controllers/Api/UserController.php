<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::list();
        $users = UserResource::collection($users);
        return response()->json(
            [
                'success' => true,
                'data' => $users

            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = User::store($request);
        if(!$user){
            return response()->json(
                [
                    'success' => false,
                    'message' => "User not created"
                ]
            );
        }
        return response()->json(
            [
                'success' => true,
                'message' => "User created successfully"
            ]
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);
        if(!$user){
            return response()->json(
                [
                    'success' => false,
                    'message' => "User not found ID ". $id
                ] 
            );
        }
        return response()->json(
            [
                'success' => true,
                'data' => $user
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        if(!$user){
            return response()->json(
                [
                    'success' => false,
                    'message' => "User not updated ID ".$id
                ]
            );
        }
        $user = User::store($request, $id);
        return response()->json(
            [
                'success' => true,
                'message' => "User updated successfully ID ".$id
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        if(!$user){
            return response()->json(
                [
                    'success' => false,
                    'message' => "User not deleted ID ".$id
                ]
            );
        }
        $user->delete();
        return response()->json(
            [
                'success' => true,
                'message' => "User deleted successfully ID ".$id
            ]
        );
    }
}
