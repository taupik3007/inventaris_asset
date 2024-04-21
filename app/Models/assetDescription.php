<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class assetDescription extends Model
{
    use HasFactory, SoftDeletes;
    protected $primaryKey = 'asd_id';
    protected $table = 'asset_descriptions';
    protected $guarded = [];
}
