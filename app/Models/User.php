<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'name'];

    function groups(){
        return $this->belongsToMany(Group::class, 'user_groups', 'user_id', 'group_id');
    }

    public static function list()
    {
        return self::all();
    }

    public static function store($request, $id = null)
    {
        $data = $request->only('name');
        $user = self::updateOrCreate(['id' => $id], $data);
        return $user;
    }
}
