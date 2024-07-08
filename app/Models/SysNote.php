<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SysNote extends Model
{
    use HasFactory;
    protected $table = 'sys_note';
    protected $primaryKey = 'note_id';
    protected $guarded = [];
    const CREATED_AT = 'sys_created_at';
    const UPDATED_AT = 'sys_updated_at';
}
