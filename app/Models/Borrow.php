<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;




class Borrow extends Model
{
    use HasFactory, SoftDeletes;

    protected $primaryKey = 'brw_id';
    protected $guarded = [];

    public function brw_user(): BelongsTo
    {
        return $this->belongsTo(User::class,'brw_user_id');
    }

    public function brw_bas(): HasMany
    {
        return $this->hasMany(BorrowAsset::class,'bas_borrow_id');
    }
}
