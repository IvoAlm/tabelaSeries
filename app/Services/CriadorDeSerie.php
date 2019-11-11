<?php


namespace App\Services;


use App\{Serie, Temporada, Episodio};
use Illuminate\Support\Facades\DB;

class CriadorDeSerie
{
    public function criarSerie(string $nomeSerie, int $qntTemporadas, int $ep_por_temporada): object
    {

        DB::beginTransaction();
        $serie = Serie::create(['nome' => $nomeSerie]);
        $this->criarTemporada($qntTemporadas, $ep_por_temporada, $serie);
        DB::commit();
        return $serie;
    }

    public function criarTemporada(int $qntTemporadas, int $ep_por_temporada, $serie): void
    {
        for ($i = 1; $i <= $qntTemporadas; $i++) {
            $temporada = $serie->temporadas()->create(['numero' => $i]);
            $this->criarEpisodio($ep_por_temporada, $temporada);

        }
    }

    public function criarEpisodio($ep_por_temporada, Temporada $temporada)
    {
        for ($j = 1; $j <= $ep_por_temporada; $j++) {
            $temporada->episodios()->create(['numero' => $j]);
        }
    }


}
