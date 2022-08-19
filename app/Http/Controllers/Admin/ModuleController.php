<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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

    public function index($CourseId)
    {

        if (!$course = $this->repositoryCourse->findById($CourseId)) {
            return back();
        }

        $data = $this->repository->getAllByCourseId($CourseId);

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


    public function store(Request $request,  $CourseId)
    {


        if (!$this->repositoryCourse->findById($CourseId)) {
            return back();
        }

           $data =  $this->repository->createByCourse($CourseId, $request->only(['name']));


            //$course->modules()->create($request->only(['name']));

            return redirect()->route('modules.index', $CourseId);

    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
