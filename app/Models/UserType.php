<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserType extends Model {
    use HasFactory;
    use SoftDeletes;

    const BASIC = 1;
    const ADMIN = 2;

    protected $fillable = [
        'id_name',
        'name'
    ];
}
