<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateContatoRequest;
use App\Http\Requests\UpdateContatoRequest;
use App\Repositories\ContatoRepository;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ContatoController extends AppBaseController
{
    /** @var  ContatoRepository */
    private $contatoRepository;

    public function __construct(ContatoRepository $contatoRepo)
    {
        $this->middleware('auth');
        $this->contatoRepository = $contatoRepo;
    }

    /**
     * Display a listing of the Contato.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->contatoRepository->pushCriteria(new RequestCriteria($request));
        $contatos = $this->contatoRepository->all();

        return view('contatos.index')
            ->with('contatos', $contatos);
    }

    /**
     * Show the form for creating a new Contato.
     *
     * @return Response
     */
    public function create()
    {
        return view('contatos.create');
    }

    /**
     * Store a newly created Contato in storage.
     *
     * @param CreateContatoRequest $request
     *
     * @return Response
     */
    public function store(CreateContatoRequest $request)
    {
        $input = $request->all();

        $contato = $this->contatoRepository->create($input);

        Flash::success('Contato saved successfully.');

        return redirect(route('contatos.index'));
    }

    /**
     * Display the specified Contato.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $contato = $this->contatoRepository->findWithoutFail($id);

        if (empty($contato)) {
            Flash::error('Contato not found');

            return redirect(route('contatos.index'));
        }

        return view('contatos.show')->with('contato', $contato);
    }

    /**
     * Show the form for editing the specified Contato.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $contato = $this->contatoRepository->findWithoutFail($id);

        if (empty($contato)) {
            Flash::error('Contato not found');

            return redirect(route('contatos.index'));
        }

        return view('contatos.edit')->with('contato', $contato);
    }

    /**
     * Update the specified Contato in storage.
     *
     * @param  int              $id
     * @param UpdateContatoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateContatoRequest $request)
    {
        $contato = $this->contatoRepository->findWithoutFail($id);

        if (empty($contato)) {
            Flash::error('Contato not found');

            return redirect(route('contatos.index'));
        }

        $contato = $this->contatoRepository->update($request->all(), $id);

        Flash::success('Contato updated successfully.');

        return redirect(route('contatos.index'));
    }

    /**
     * Remove the specified Contato from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $contato = $this->contatoRepository->findWithoutFail($id);

        if (empty($contato)) {
            Flash::error('Contato not found');

            return redirect(route('contatos.index'));
        }

        $this->contatoRepository->delete($id);

        Flash::success('Contato deleted successfully.');

        return redirect(route('contatos.index'));
    }
}
