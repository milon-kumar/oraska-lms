<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table='users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
//    protected $fillable = [
//        'name',
//        'email',
//        'password',
//    ];

    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function chourseChapters()
    {
        return $this->hasMany(CourseChapter::class,'users_id');
    }

    public function videos()
    {
        return $this->hasMany(Video::class,'users_id');
    }

    public function examTypes()
    {
        return $this->hasMany(ExamType::class,'users_id');
    }

    public function exams()
    {
        return $this->hasMany(ChapterExam::class,'users_id');
    }

    public function enroles()
    {
        return $this->belongsTo(Enrole::class,'users_id');
    }

    public function payments()
    {
        return $this->belongsTo(Payment::class,'users_id');
    }

    public function allEnroles()
    {
        return $this->hasMany(Enrole::class,'users_id');
    }
}
