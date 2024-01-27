<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    use HasFactory;

    protected $fillable = ["long_url", "short_url", "description", "user_id"];
    // protected $dateFormat = 'Ymd H:i:s';
}
