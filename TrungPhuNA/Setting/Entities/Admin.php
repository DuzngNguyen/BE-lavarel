<?php

namespace TrungPhuNA\Setting\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class Admin extends Authenticatable
{
    use HasFactory, HasRoles;

    protected $fillable = [];
    protected $table = 'admins';
    protected $guarded = [''];

    protected static function newFactory()
    {
        return \TrungPhuNA\Setting\Database\factories\AdminFactory::new();
    }
}
