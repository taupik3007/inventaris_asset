<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Category extends Model
{
    use HasFactory, SoftDeletes;
    protected $primaryKey = 'ctg_id';
    protected $table = 'categories';
    protected $guarded = [];



    public function asset(): HasMany
    {
        return $this->hasMany(Asset::class,'ass_category_id');
    }

}
