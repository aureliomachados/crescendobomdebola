<?php

namespace App\Repositories;

use App\Models\Atleta;
use InfyOm\Generator\Common\BaseRepository;

class AtletaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nome',
        'idade',
        'nomeresponsavel'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Atleta::class;
    }
}
