<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class userProfile extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'user_profile';
    protected $guarded = [];
    protected $primaryKey = 'usp_id';
    const CREATED_AT = 'usp_created_at';
    const UPDATED_AT = 'usp_updated_at';
    const DELETED_AT = 'usp_deleted_at';
}
