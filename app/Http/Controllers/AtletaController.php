<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateAtletaRequest;
use App\Http\Requests\UpdateAtletaRequest;
use App\Repositories\AtletaRepository;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class AtletaController extends AppBaseController
{
    /** @var  AtletaRepository */
    private $atletaRepository;

    public function __construct(AtletaRepository $atletaRepo)
    {
        $this->middleware('auth');
        $this->atletaRepository = $atletaRepo;
    }

    /**
     * Display a listing of the Atleta.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->atletaRepository->pushCriteria(new RequestCriteria($request));
        $atletas = $this->atletaRepository->all();

        return view('atletas.index')
            ->with('atletas', $atletas);
    }

    /**
     * Show the form for creating a new Atleta.
     *
     * @return Response
     */
    public function create()
    {
        return view('atletas.create');
    }

    /**
     * Store a newly created Atleta in storage.
     *
     * @param CreateAtletaRequest $request
     *
     * @return Response
     */
    public function store(CreateAtletaRequest $request)
    {
        $input = $request->all();

        $atleta = $this->atletaRepository->create($input);

        Flash::success('Atleta saved successfully.');

        return redirect(route('atletas.index'));
    }

    /**
     * Display the specified Atleta.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $atleta = $this->atletaRepository->findWithoutFail($id);

        if (empty($atleta)) {
            Flash::error('Atleta not found');

            return redirect(route('atletas.index'));
        }

        return view('atletas.show')->with('atleta', $atleta);
    }

    /**
     * Show the form for editing the specified Atleta.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $atleta = $this->atletaRepository->findWithoutFail($id);

        if (empty($atleta)) {
            Flash::error('Atleta not found');

            return redirect(route('atletas.index'));
        }

        return view('atletas.edit')->with('atleta', $atleta);
    }

    /**
     * Update the specified Atleta in storage.
     *
     * @param  int              $id
     * @param UpdateAtletaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAtletaRequest $request)
    {
        $atleta = $this->atletaRepository->findWithoutFail($id);

        if (empty($atleta)) {
            Flash::error('Atleta not found');

            return redirect(route('atletas.index'));
        }

        $atleta = $this->atletaRepository->update($request->all(), $id);

        Flash::success('Atleta updated successfully.');

        return redirect(route('atletas.index'));
    }

    /**
     * Remove the specified Atleta from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $atleta = $this->atletaRepository->findWithoutFail($id);

        if (empty($atleta)) {
            Flash::error('Atleta not found');

            return redirect(route('atletas.index'));
        }

        $this->atletaRepository->delete($id);

        Flash::success('Atleta deleted successfully.');

        return redirect(route('atletas.index'));
    }
}
