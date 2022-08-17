<?php

namespace App\Http\Controllers\Admin;

use App\Services\UploadFile;
use Illuminate\Http\Request;
use App\Services\Admin\AdminService;
use App\Http\Requests\StoreImage;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreAdmin;
use App\Http\Requests\Admin\UpdateAdmin;

class AdminController extends Controller
{

    protected $service;

    public function __construct(AdminService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $admins = $this->service->getAll(
            $request->filter ?? ""
        );

        //dd($admins);

        return view('admin.admins.index', compact('admins'));
    }


    public function create()
    {
        return view('admin.admins.create');
    }


    public function store(StoreAdmin $request)
    {


        $data = $request->validated();

        $data['password'] = bcrypt($data['password']);

        $this->service->create($data);
        return redirect()->route('admins.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!$admin = $this->service->findById($id)) {
            return back();
        }

        return view('admin.admins.show', compact('admin'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!$admin = $this->service->findById($id)) {
            return redirect()->back();
        }

        return view('admin.admins.edit', compact('admin'));
    }


    public function update(UpdateAdmin $request, $id)
    {


        $data = $request->only(['name', 'email']);


        if ($request->password)
            $data['password'] = bcrypt($request->password);

        if (!$this->service->update($id, $data)) {
            return back();
        }

        return redirect()->route('admins.index');
    }


    public function destroy($id)
    {
        $this->service->delete($id);
        return redirect()->route('admins.index');
    }


    public function changeImage(Request $request, $id)
    {
        if (!$admin = $this->service->findById($id)) {
            return back();
        }
        return view('admin.admins.change-image', compact('admin'));
    }
    public function uploadFile(StoreImage $request, $id, UploadFile $uploadFile)
    {

        $path =    $uploadFile->store($request->image, 'admins', $id);

        if (!$this->service->update($id, ['image' => $path])) {
            return back();
        }
        return redirect()->route('admins.index');
    }
}
