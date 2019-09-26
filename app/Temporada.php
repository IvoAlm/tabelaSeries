<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Temporada extends Model
{
    public function serie()
    {
        return $this->hasOne(Serie::class);
    }
    public function episodios()
    {
        return $this->hasMany(Episodio::class);
    }
}
