<?php


namespace App;

use App\{Serie, Temporada, Episodio};
use Illuminate\Support\Facades\DB;


class RemovedorDeSerie
{
    public function removeSerie(Serie $serie)
    {
        $serieNome="";
        DB::transaction( function () use ($serieNome,$serie){
        $serieNome = $serie->nome;
        $this->removeTemporada($serie);
        $serie->delete();
        });
        return $serieNome;
    }

    private function removeTemporada(Serie $serie): void
    {
        $serie->temporadas->each(function (Temporada $temporada) {

            $this->removeEpisodio($temporada);
            $temporada->delete();
        });
    }

    private function removeEpisodio(Temporada $temporada): void
    {
        $temporada->episodios()->each(function (Episodio $episodio) {
            $episodio->delete();
        });
    }
}


