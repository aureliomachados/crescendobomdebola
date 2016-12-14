<?php

namespace App\Http\Controllers;

use App\Repositories\AtletaRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use JasperPHP\Facades\JasperPHP;
use niklasravnsborg\LaravelPdf\Facades\Pdf;

class ReportController extends Controller
{
    protected $atletaRepo;
    public function __construct(AtletaRepository $repository)
    {
        $this->atletaRepo = $repository;
    }
    public function reportAtleta($id, Request $request){

        $atleta = $this->atletaRepo->find($id);

        $data = $atleta->toArray();
        $data['idade'] = $atleta->datanascimento->age;

        $pdf = Pdf::loadView('pdf.document', $data);

        return $pdf->stream('document.pdf');
    }
}
