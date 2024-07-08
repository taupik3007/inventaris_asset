<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class major extends Model
{
    use HasFactory;
    protected $primaryKey = 'mjr_id';
    protected $guarded = [];

    const CREATED_AT = 'mjr_created_at';
    const UPDATED_AT = 'mjr_updated_at';
}
