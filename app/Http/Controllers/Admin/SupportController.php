<?php

namespace App\Http\Controllers\Admin;

use App\Models\Support;
use Illuminate\Http\Request;
use App\Services\SupportService;
use App\Http\Controllers\Controller;

class SupportController extends Controller
{

    protected $service;

    public function __construct(SupportService $service)
    {
        $this->service = $service;
    }


    public function index(Request $request)
    {
        $supports = $this->service->getSupports($request->get('status','P'));

        $statusOptions = ['P'=>'Pendente','A' =>'Aguardando Aluno', 'C'=>'Finalizado'];



       $statusOptions = (object) $statusOptions;
        //$statusOptions = json_encode($statusOptions);

        //dd($statusOptions);

        return view('admin.supports.index', compact('supports','statusOptions') );


    }


    public function show($id)
    {

        if(!$support = $this->service->getSupport($id)){
            return back();
        }



        return view('admin.supports.reply-support', compact('support'));
    }
}
