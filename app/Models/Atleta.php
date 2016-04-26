<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Atleta",
 *      required={nome, datanascimento, idade, colegio, turno, serie, apto, nomeresponsavel, dataregistro, bairro, endereco, numero, identidade, orgaoexpedidor},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="nome",
 *          description="nome",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="datanascimento",
 *          description="datanascimento",
 *          type="string",
 *          format="date"
 *      ),
 *      @SWG\Property(
 *          property="colegio",
 *          description="colegio",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="turno",
 *          description="turno",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="serie",
 *          description="serie",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="apto",
 *          description="apto",
 *          type="boolean"
 *      ),
 *      @SWG\Property(
 *          property="nomeresponsavel",
 *          description="nomeresponsavel",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="dataregistro",
 *          description="dataregistro",
 *          type="string",
 *          format="date"
 *      ),
 *      @SWG\Property(
 *          property="bairro",
 *          description="bairro",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="endereco",
 *          description="endereco",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="numero",
 *          description="numero",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="telefone",
 *          description="telefone",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="celular",
 *          description="celular",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="identidade",
 *          description="identidade",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="orgaoexpedidor",
 *          description="orgaoexpedidor",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="created_at",
 *          description="created_at",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="updated_at",
 *          description="updated_at",
 *          type="string",
 *          format="date-time"
 *      )
 * )
 */
class Atleta extends Model
{
    use SoftDeletes;

    public $table = 'atletas';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nome',
        'datanascimento',
        'idade',
        'colegio',
        'turno',
        'serie',
        'apto',
        'nomeresponsavel',
        'dataregistro',
        'bairro',
        'endereco',
        'numero',
        'telefone',
        'celular',
        'identidade',
        'orgaoexpedidor'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nome' => 'string',
        'datanascimento' => 'date',
        'colegio' => 'string',
        'turno' => 'string',
        'serie' => 'string',
        'apto' => 'boolean',
        'nomeresponsavel' => 'string',
        'dataregistro' => 'date',
        'bairro' => 'string',
        'endereco' => 'string',
        'numero' => 'string',
        'telefone' => 'string',
        'celular' => 'string',
        'identidade' => 'string',
        'orgaoexpedidor' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nome' => 'required|min:3|max:128',
        'datanascimento' => 'required',
        'idade' => 'required|numeric|max:100',
        'colegio' => 'required',
        'turno' => 'required',
        'serie' => 'required',
        'apto' => 'required',
        'nomeresponsavel' => 'required|min:3',
        'dataregistro' => 'required',
        'bairro' => 'required|min:3|max:256',
        'endereco' => 'required|min:3|max:256',
        'numero' => 'required',
        'identidade' => 'required',
        'orgaoexpedidor' => 'required'
    ];
}
