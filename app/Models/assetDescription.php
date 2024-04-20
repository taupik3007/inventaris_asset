<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class assetDescription extends Model
{
    use HasFactory;
    protected $primaryKey = 'asd_id';
    protected $table = 'asset_descriptions';
    protected $guarded = [];
}
