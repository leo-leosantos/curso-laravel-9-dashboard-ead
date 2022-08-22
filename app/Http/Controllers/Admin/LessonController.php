<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateLesson;
use App\Repositories\LessonRepositoryInterface;
use App\Repositories\ModuleRepositoryInterface;

class LessonController extends Controller
{
    protected $repository;
    protected $repositoryModule;


    public function __construct(
        ModuleRepositoryInterface $repositoryModule,
        LessonRepositoryInterface $repository


    ) {
        $this->repositoryModule = $repositoryModule;
        $this->repository = $repository;
    }
    public function index(Request $request, $moduleId)
    {
        if (!$module = $this->repositoryModule->findById($moduleId)) {
            return back();
        }

        $data = $this->repository->getAllByModuleId($moduleId, $request->filter ?? '');

        $lessons =  convertItemsOfArrayToObject($data);

        return view('admin.courses.modules.lessons.index-lessons', compact('module', 'lessons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($moduleId)
    {
        if (!$module = $this->repositoryModule->findById($moduleId)) {
            return back();
        }

        return  view('admin.courses.modules.lessons.create-lessons ', compact('module'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateLesson $request, $moduleId)
    {
        if (!$this->repositoryModule->findById($moduleId)) {
            return back();
        }
        $data = $request->only(['name', 'description', 'video']);

             $this->repository->createByModule($moduleId, $data);


            //$course->modules()->create($request->only(['name']));

            return redirect()->route('lessons.index', $moduleId);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($moduleId,$id)
    {
        if (!$module = $this->repositoryModule->findById($moduleId)) {
            return back();
        }

        if (!$lesson = $this->repository->findById($id)) {
            return back();
        }
        return  view('admin.courses.modules.lessons.show-lessons', compact('module','lesson'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($moduleId, $id)
    {
        if (!$module = $this->repositoryModule->findById($moduleId)) {
            return back();
        }

        if (!$lesson = $this->repository->findById($id)) {
            return back();
        }
       // dd($module);

        return  view('admin.courses.modules.lessons.edit-lessons', compact('lesson','module'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($moduleId, $id, StoreUpdateLesson $request)
    {
        if (!$this->repositoryModule->findById($moduleId)) {
            return back();
        }

       // $data = $request->only(['name', 'description', 'video']);

        if(!$this->repository->update($id, $request->validated())){
            return back();

        }
        return redirect()->route('lessons.index', $moduleId);


       // dd($module);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($moduleId,$id)
    {
        if(!$this->repository->delete($id)){
            return back();
        }
        return redirect()->route('lessons.index', $moduleId);
    }
}
