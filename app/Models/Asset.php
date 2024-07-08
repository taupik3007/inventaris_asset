<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Asset extends Model
{
    use HasFactory, SoftDeletes;
    protected $primaryKey = 'ass_id';
    // protected $table = 'categories';
    protected $guarded = [];
    const CREATED_AT = 'ass_created_at';
    const UPDATED_AT = 'ass_updated_at';

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class,'ass_category_id','ctg_id');
    }
    public function origin(): BelongsTo
    {
        return $this->belongsTo(Origin::class,'ass_origin_id','ori_id');
    }
    public function asd():hasMany
    {
        return $this->HasMany(assetDescription::class,'asd_asset_id');
    }
    public function usr_brw_asset():hasMany
    {
        return $this->HasMany(BorrowAsset::class,'bas_asset_id');
    }
}
