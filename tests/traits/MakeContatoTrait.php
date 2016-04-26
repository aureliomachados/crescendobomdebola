<?php

use Faker\Factory as Faker;
use App\Models\Contato;
use App\Repositories\ContatoRepository;

trait MakeContatoTrait
{
    /**
     * Create fake instance of Contato and save it in database
     *
     * @param array $contatoFields
     * @return Contato
     */
    public function makeContato($contatoFields = [])
    {
        /** @var ContatoRepository $contatoRepo */
        $contatoRepo = App::make(ContatoRepository::class);
        $theme = $this->fakeContatoData($contatoFields);
        return $contatoRepo->create($theme);
    }

    /**
     * Get fake instance of Contato
     *
     * @param array $contatoFields
     * @return Contato
     */
    public function fakeContato($contatoFields = [])
    {
        return new Contato($this->fakeContatoData($contatoFields));
    }

    /**
     * Get fake data of Contato
     *
     * @param array $postFields
     * @return array
     */
    public function fakeContatoData($contatoFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nome' => $fake->word,
            'email' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $contatoFields);
    }
}
