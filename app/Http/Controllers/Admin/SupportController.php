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
        $supports = $this->service->getSupports($request->get('status','P'),$request->get('page',1));

        //dd($supports->items());
        $statusOptions = ['P'=>'Pendente','A' =>'Aguardando Aluno', 'C'=>'Finalizado'];


       //  $statusOptions =  convertItemsOfArrayToObject($statusOptions);

        // dd($status);
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
