<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function columns()
    {
        return $this->hasMany(Column::class);
    }

    public function cards()
    {
        return $this->hasManyThrough(Card::class, Column::class);
    }
    // App\Models\Board.php

public function workspace()
{
    return $this->belongsTo(Workspace::class);
}

}
