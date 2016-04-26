<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateContatoAPIRequest;
use App\Http\Requests\API\UpdateContatoAPIRequest;
use App\Models\Contato;
use App\Repositories\ContatoRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use InfyOm\Generator\Utils\ResponseUtil;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class ContatoController
 * @package App\Http\Controllers\API
 */

class ContatoAPIController extends AppBaseController
{
    /** @var  ContatoRepository */
    private $contatoRepository;

    public function __construct(ContatoRepository $contatoRepo)
    {
        $this->contatoRepository = $contatoRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/contatos",
     *      summary="Get a listing of the Contatos.",
     *      tags={"Contato"},
     *      description="Get all Contatos",
     *      produces={"application/json"},
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="array",
     *                  @SWG\Items(ref="#/definitions/Contato")
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function index(Request $request)
    {
        $this->contatoRepository->pushCriteria(new RequestCriteria($request));
        $this->contatoRepository->pushCriteria(new LimitOffsetCriteria($request));
        $contatos = $this->contatoRepository->all();

        return $this->sendResponse($contatos->toArray(), 'Contatos retrieved successfully');
    }

    /**
     * @param CreateContatoAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/contatos",
     *      summary="Store a newly created Contato in storage",
     *      tags={"Contato"},
     *      description="Store Contato",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Contato that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Contato")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Contato"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateContatoAPIRequest $request)
    {
        $input = $request->all();

        $contatos = $this->contatoRepository->create($input);

        return $this->sendResponse($contatos->toArray(), 'Contato saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/contatos/{id}",
     *      summary="Display the specified Contato",
     *      tags={"Contato"},
     *      description="Get Contato",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Contato",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Contato"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function show($id)
    {
        /** @var Contato $contato */
        $contato = $this->contatoRepository->find($id);

        if (empty($contato)) {
            return Response::json(ResponseUtil::makeError('Contato not found'), 400);
        }

        return $this->sendResponse($contato->toArray(), 'Contato retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateContatoAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/contatos/{id}",
     *      summary="Update the specified Contato in storage",
     *      tags={"Contato"},
     *      description="Update Contato",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Contato",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Contato that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Contato")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Contato"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateContatoAPIRequest $request)
    {
        $input = $request->all();

        /** @var Contato $contato */
        $contato = $this->contatoRepository->find($id);

        if (empty($contato)) {
            return Response::json(ResponseUtil::makeError('Contato not found'), 400);
        }

        $contato = $this->contatoRepository->update($input, $id);

        return $this->sendResponse($contato->toArray(), 'Contato updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/contatos/{id}",
     *      summary="Remove the specified Contato from storage",
     *      tags={"Contato"},
     *      description="Delete Contato",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Contato",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="string"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function destroy($id)
    {
        /** @var Contato $contato */
        $contato = $this->contatoRepository->find($id);

        if (empty($contato)) {
            return Response::json(ResponseUtil::makeError('Contato not found'), 400);
        }

        $contato->delete();

        return $this->sendResponse($id, 'Contato deleted successfully');
    }
}
