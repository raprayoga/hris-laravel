<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JobDivisi extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'job_divisi';
    protected $fillable = ['job_divisi'];
    protected $hidden = ['deleted_at', 'updated_at', 'created_at'];
    protected $softdelete;
}
