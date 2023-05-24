<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class media extends Model
{
    use HasFactory;
    protected $fillable = [
        'nazwa',
        'region',
        'miasto',
        'ulica',
        'kod',
        'strona',
        'telefon1',
        'telefon2',
        'telefon3',
        'info',
        'email',
        'email2',
        'email3',
        'email4',
        'opiekun',
        'id'
    ];

    public function scopeOneMedia($query, $id)
    {
        return $query->where('id', $id)->get()->first();
    }


    public function journalist()
    {
        //return $this->belongsToMany(journalist::class, 'media_journalist', 'media_id', 'journalist_id');
        return $this->belongsToMany(journalist::class, 'media_journalist');
    }

}
