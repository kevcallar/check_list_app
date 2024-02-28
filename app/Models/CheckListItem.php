<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CheckListItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion',
        'fecha'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($item) {
            $item->fecha = Carbon::now()->toDateString();
        });
    }
}
