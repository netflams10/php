<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // protected $fillable = ['title', 'body'];

    // Telling Laravel we dont want any protected props
    protected $guarded = [];


    public function createdAt ()
    {
        return $this->created_at->toFormattedDateString();
    }
}
