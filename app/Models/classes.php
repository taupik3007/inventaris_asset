<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class classes extends Model
{
    use HasFactory;

    protected $table = 'classes';
    protected $primarKey = 'cls_id';
    const CREATED_AT = 'cls_created_at';
    const UPDATED_AT = 'cls_updated_at';

}
