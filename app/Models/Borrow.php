<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;



class Borrow extends Model
{
    use HasFactory;



    public function asset(): BelongsTo
    {
        return $this->belongsTo(Asset::class,'brw_user_id');
    }

    public function basAsset(): HasMany
    {
        return $this->belongsTo(BorrowAsset::class,'bas_borrow_id');
    }
}
