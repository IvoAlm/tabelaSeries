<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
//Poderiamos add o atributo protected $table = 'series';
//mas o Laravel, como padrão, já considera o nome da nossa tabela
//de acordo com o nome da nossa classe.
// nome da classe em minúsculos e no plural

//Para n ter que add as colunas padrão do laravel "update_at" e "create_at"
//iremos atribuir timestamp = false

    public $timestamps = false;

}
