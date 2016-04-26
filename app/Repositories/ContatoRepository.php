<?php

namespace App\Repositories;

use App\Models\Contato;
use InfyOm\Generator\Common\BaseRepository;

class ContatoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nome',
        'email'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Contato::class;
    }
}
