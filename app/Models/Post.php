<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    // use softDeletes;
    protected $fillable = ['title','slug','body','user_id','image'];

    public function user(){
        return $this->belongsTo(User::class);

    }

    protected $casts = [
        'published_at' => 'datetime',
    ];
}
