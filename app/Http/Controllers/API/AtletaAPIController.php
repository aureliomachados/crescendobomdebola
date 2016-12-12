
<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateAtletaAPIRequest;
use App\Http\Requests\API\UpdateAtletaAPIRequest;
use App\Models\Atleta;
use App\Repositories\AtletaRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use InfyOm\Generator\Utils\ResponseUtil;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class AtletaController
 * @package App\Http\Controllers\API
 */

class AtletaAPIController extends AppBaseController
{
    /** @var  AtletaRepository */
    private $atletaRepository;

    public function __construct(AtletaRepository $atletaRepo)
    {
        $this->atletaRepository = $atletaRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/atletas",
     *      summary="Get a listing of the Atletas.",
     *      tags={"Atleta"},
     *      description="Get all Atletas",
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
     *                  @SWG\Items(ref="#/definitions/Atleta")
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
        $this->atletaRepository->pushCriteria(new RequestCriteria($request));
        $this->atletaRepository->pushCriteria(new LimitOffsetCriteria($request));
        $atletas = $this->atletaRepository->all();

        return $this->sendResponse($atletas->toArray(), 'Atletas retrieved successfully');
    }

    /**
     * @param CreateAtletaAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/atletas",
     *      summary="Store a newly created Atleta in storage",
     *      tags={"Atleta"},
     *      description="Store Atleta",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Atleta that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Atleta")
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
     *                  ref="#/definitions/Atleta"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateAtletaAPIRequest $request)
    {
        $input = $request->all();

        $atletas = $this->atletaRepository->create($input);

        return $this->sendResponse($atletas->toArray(), 'Atleta saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/atletas/{id}",
     *      summary="Display the specified Atleta",
     *      tags={"Atleta"},
     *      description="Get Atleta",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Atleta",
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
     *                  ref="#/definitions/Atleta"
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
        /** @var Atleta $atleta */
        $atleta = $this->atletaRepository->find($id);

        if (empty($atleta)) {
            return Response::json(ResponseUtil::makeError('Atleta not found'), 400);
        }

        return $this->sendResponse($atleta->toArray(), 'Atleta retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateAtletaAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/atletas/{id}",
     *      summary="Update the specified Atleta in storage",
     *      tags={"Atleta"},
     *      description="Update Atleta",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Atleta",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Atleta that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Atleta")
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
     *                  ref="#/definitions/Atleta"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateAtletaAPIRequest $request)
    {
        $input = $request->all();

        /** @var Atleta $atleta */
        $atleta = $this->atletaRepository->find($id);

        if (empty($atleta)) {
            return Response::json(ResponseUtil::makeError('Atleta not found'), 400);
        }

        $atleta = $this->atletaRepository->update($input, $id);

        return $this->sendResponse($atleta->toArray(), 'Atleta updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/atletas/{id}",
     *      summary="Remove the specified Atleta from storage",
     *      tags={"Atleta"},
     *      description="Delete Atleta",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Atleta",
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
        /** @var Atleta $atleta */
        $atleta = $this->atletaRepository->find($id);

        if (empty($atleta)) {
            return Response::json(ResponseUtil::makeError('Atleta not found'), 400);
        }

        $atleta->delete();

        return $this->sendResponse($id, 'Atleta deleted successfully');
    }
}
