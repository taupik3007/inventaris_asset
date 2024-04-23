<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Origin extends Model
{
    use HasFactory,SoftDeletes;

    
    protected $primaryKey = 'ori_id';
    protected $guarded = [];

    public function assets(): HasMany
    {
        return $this->hasMany(Asset::class,'ass_origin_id');
    }
}
