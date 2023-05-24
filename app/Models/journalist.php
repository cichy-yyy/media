<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class journalist extends Model
{
    use HasFactory;
    protected $table = 'journalist';
    protected $fillable = [
        'imie',
        'nazwisko',
        'stanowisko',
        'region',
        'telefon1',
        'telefon2',
        'email1',
        'email2',
        'email3',
        'medium',
        'info',
        'opiekun'
    ];

    /**
     * The roles that belong to the journalist
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function media()
    {
       // return $this->belongsToMany(media::class, 'media_journalist', 'media_id', 'journalist_id');
        return $this->belongsToMany(media::class, 'media_journalist');
    }
}
