<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BorrowAsset extends Model
{
    use HasFactory;


    public function assets(): BelongsTo
    {
        return $this->BelongsTo(Asset::class,'bas_asset_id');
    }
    public function borrow(): BelongsTo
    {
        return $this->belongsTo(Borrow::class,'ass_Borrow_id');
    }
}
