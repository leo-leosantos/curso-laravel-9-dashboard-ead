<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateModule;
use App\Repositories\CourseRepositoryInterface;
use App\Repositories\ModuleRepositoryInterface;

class ModuleController extends Controller
{

    protected $repository;
    protected $repositoryCourse;


    public function __construct(
        CourseRepositoryInterface $repositoryCourse,
        ModuleRepositoryInterface $repository


    ) {
        $this->repository = $repository;
        $this->repositoryCourse = $repositoryCourse;
    }

    public function index(Request $request, $CourseId)
    {

        if (!$course = $this->repositoryCourse->findById($CourseId)) {
            return back();
        }

        $data = $this->repository->getAllByCourseId($CourseId, $request->filter ?? '');

        $modules =  convertItemsOfArrayToObject($data);

        return view('admin.courses.modules.index-modules', compact('course', 'modules'));
    }


    public function create($CourseId)
    {
        if (!$course = $this->repositoryCourse->findById($CourseId)) {
            return back();
        }

        return  view('admin.courses.modules.create-modules ', compact('course'));
    }


    public function store(StoreUpdateModule $request,  $CourseId)
    {


        if (!$this->repositoryCourse->findById($CourseId)) {
            return back();
        }

           $data =  $this->repository->createByCourse($CourseId, $request->only(['name']));


            //$course->modules()->create($request->only(['name']));

            return redirect()->route('modules.index', $CourseId);

    }


    public function show( $CourseId,$id)
    {
        if (!$course = $this->repositoryCourse->findById($CourseId)) {
            return back();
        }

        if (!$module = $this->repository->findById($id)) {
            return back();
        }
        return  view('admin.courses.modules.show-modules ', compact('course','module'));

    }


    public function edit($CourseId, $id)
    {
        if (!$course = $this->repositoryCourse->findById($CourseId)) {
            return back();
        }

        if (!$module = $this->repository->findById($id)) {
            return back();
        }
       // dd($module);

        return  view('admin.courses.modules.edit-modules ', compact('course','module'));
    }


    public function update($CourseId, $id, StoreUpdateModule $request)
    {
        if (!$this->repositoryCourse->findById($CourseId)) {
            return back();
        }

        if(!$this->repository->update($id, $request->only(['name']))){
            return back();

        }
        return redirect()->route('modules.index', $CourseId);


       // dd($module);

    }


    public function destroy($CourseId,$id)
    {

        if(!$this->repository->delete($id)){
            return back();
        }
        return redirect()->route('modules.index', $CourseId);

    }
}
