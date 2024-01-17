<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JobCategory extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'job_category';
    protected $fillable = ['job_category'];
    protected $hidden = ['deleted_at', 'updated_at', 'created_at'];
    protected $softdelete;
}
