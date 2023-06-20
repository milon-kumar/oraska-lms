<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complain extends Model
{
    use HasFactory;

    protected $table ="complains";
    protected $guarded =['id'];


    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

}
