<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\GroupResource;
use App\Models\group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $groups = Group::list();
        $groups = GroupResource::collection($groups);
        return response()->json(
            [
                'success' => true,
                'data' => $groups

            ]
            );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $group = Group::store($request);
        if(!$group){
            return response()->json(
                [
                    'success' => false,
                    'message' => "group not created"
                ]
            );
        }
        return response()->json(
            [
                'success' => true,
                'message' => "group created successfully"
            ]
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $group = Group::find($id);
        if(!$group){
            return response()->json(
                [
                    'success' => false,
                    'message' => "group not found ID ". $id
                ] 
            );
        }
        return response()->json(
            [
                'success' => true,
                'data' => $group
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $group = Group::find($id);
        if(!$group){
            return response()->json(
                [
                    'success' => false,
                    'message' => "group not updated ID ".$id
                ]
            );
        }
        $group = group::store($request, $id);
        return response()->json(
            [
                'success' => true,
                'message' => "group updated successfully ID ".$id
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $group = Group::find($id);
        if(!$group){
            return response()->json(
                [
                    'success' => false,
                    'message' => "group not deleted ID ".$id
                ]
            );
        }
        $group->delete();
        return response()->json(
            [
                'success' => true,
                'message' => "group deleted successfully ID ".$id
            ]
        );
    }
}
