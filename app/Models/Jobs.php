<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Jobs extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'jobs';
    protected $fillable = ['job_category_id', 'job_divisi_id', 'posisi', 'jenis', 'tingkat_pengalaman', 'detail'];
    protected $hidden = ['deleted_at', 'updated_at', 'created_at'];
    protected $softdelete;
}
