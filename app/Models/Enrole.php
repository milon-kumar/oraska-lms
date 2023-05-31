<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrole extends Model
{
    use HasFactory;
    protected $table ='enroles';
    protected $guarded =['id'];

    public function user()
    {
        return $this->belongsTo(User::class,'users_id');
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class,'payments_id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class,'courses_id');
    }
}
