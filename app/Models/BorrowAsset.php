<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;


class BorrowAsset extends Model
{
    use HasFactory, SoftDeletes;

    protected $primaryKey = 'bas_id';
    protected $guarded = [];
    protected $table = 'borrow_assets';

    public function bas_asset(): BelongsTo
    {
        return $this->BelongsTo(Asset::class,'bas_asset_id');
    }
    public function bas_borrow(): BelongsTo
    {
        return $this->belongsTo(Borrow::class,'ass_Borrow_id');
    }
}
