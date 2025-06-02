<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Workspace extends Model
{
   protected $fillable = ['name', 'user_id'];


public function boards()
{
    return $this->hasMany(Board::class);
}




}
