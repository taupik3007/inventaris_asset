<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;



class Category extends Model
{
    use HasFactory, SoftDeletes;
    protected $primaryKey = 'ctg_id';
    protected $table = 'categories';
    protected $guarded = [];
    const CREATED_AT = 'ctg_created_at';
    const UPDATED_AT = 'ctg_updated_at';



    public function asset(): HasMany
    {
        return $this->hasMany(Asset::class,'ass_category_id');
    }

    public function parent(): HasOne
    {
        return $this->hasOne(Category::class,'ctg_id','ctg_parent_id');
    }

}
