<?php


namespace App\Services;

use App\{Serie, Temporada, Episodio};
use Illuminate\Support\Facades\DB;


class RemovedorDeSerie
{
    public function removeSerie(Serie $serie)
    {
        DB::beginTransaction();
            $serieNome = $serie->nome;
            $this->removeTemporada($serie);
            $serie->delete();
        DB::commit();
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


