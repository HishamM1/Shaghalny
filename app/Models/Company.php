<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\Hash;

class Company extends Authenticatable
{
    protected $table = 'companies';
    protected $guarded = [];
    public $timestamps = false;
    use HasFactory;
    public function password(): Attribute
    {
        return Attribute::make(
            set: fn (string $value) => Hash::make($value),
        );
    }

    public function image(): Attribute
    {
        return Attribute::make(
            get: function ($value) {
                if (!$value) {
                    return "https://random.imagecdn.app/100/100";
                }
                return $value;
            },
        );
    }

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }


}
