<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Services\UploadFile;
use Illuminate\Http\Request;
use App\Http\Requests\StoreImage;
use App\Http\Controllers\Controller;
use App\Services\Admin\CourseService;
use App\Http\Requests\Course\StoreUpdateCourse;
use Illuminate\Support\Facades\Redis;

class CourseController extends Controller
{
    protected $service;

    public function __construct(CourseService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $courses = $this->service->getAll(
            $request->filter ?? ""
        );


        return view('admin.courses.index', compact('courses'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.courses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateCourse $request, UploadFile $uploadFile)
    {


        $data = $request->only(['name',  'description']);
        $data['available'] = isset($request->available);

        $pastaNomeCurso = Str::slug($data['name'], '-');

        if ($request->image) {
            $data['image']  =  $uploadFile->store($request->image, 'courses', $pastaNomeCurso);
        }

        $this->service->create($data);

        return redirect()->route('courses.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!$course = $this->service->findById($id)) {
            return  redirect()->back();
        }


        return view('admin.courses.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        if (!$course = $this->service->findById($id)) {
            return  redirect()->back();
        }


        return view('admin.courses.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateCourse $request, $id, UploadFile $uploadFile)
    {


        $data = $request->only(['name',  'description']);
        $data['available'] = isset($request->available);

        $pastaNomeCurso = Str::slug($data['name'], '-');

        if ($request->image) {
            //remover imagem antiga
            $course = $this->service->findById($id);
            if ($course && $course->image) {
                $uploadFile->removeFile($course->image);
            }

            //upload da nova Imagem
            $data['image']  =  $uploadFile->store($request->image, 'courses', $pastaNomeCurso);
        }



        $this->service->update($id, $data);

        return redirect()->route('courses.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {


        if (!$this->service->delete($id)) {
            return back();
        }


        return redirect()->route('courses.index');
    }
}
