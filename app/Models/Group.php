<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'name'];

    public function users(){
        return $this->belongsToMany(User::class, 'user_groups', 'group_id', 'user_id');
    }

    public static function list()
    {
        return self::all();
    }

    public static function store($request, $id = null)
    {
        $data = $request->only('name');
        $group = self::updateOrCreate(['id' => $id], $data);
        return $group;
    }
}
