<?php

use Faker\Factory as Faker;
use App\Models\Atleta;
use App\Repositories\AtletaRepository;

trait MakeAtletaTrait
{
    /**
     * Create fake instance of Atleta and save it in database
     *
     * @param array $atletaFields
     * @return Atleta
     */
    public function makeAtleta($atletaFields = [])
    {
        /** @var AtletaRepository $atletaRepo */
        $atletaRepo = App::make(AtletaRepository::class);
        $theme = $this->fakeAtletaData($atletaFields);
        return $atletaRepo->create($theme);
    }

    /**
     * Get fake instance of Atleta
     *
     * @param array $atletaFields
     * @return Atleta
     */
    public function fakeAtleta($atletaFields = [])
    {
        return new Atleta($this->fakeAtletaData($atletaFields));
    }

    /**
     * Get fake data of Atleta
     *
     * @param array $postFields
     * @return array
     */
    public function fakeAtletaData($atletaFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nome' => $fake->word,
            'datanascimento' => $fake->word,
            'idade' => $fake->word,
            'colegio' => $fake->word,
            'turno' => $fake->word,
            'serie' => $fake->word,
            'apto' => $fake->word,
            'nomeresponsavel' => $fake->word,
            'dataregistro' => $fake->word,
            'bairro' => $fake->word,
            'endereco' => $fake->word,
            'numero' => $fake->word,
            'telefone' => $fake->word,
            'celular' => $fake->word,
            'identidade' => $fake->word,
            'orgaoexpedidor' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $atletaFields);
    }
}
