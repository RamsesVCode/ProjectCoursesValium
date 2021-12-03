<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Http\Requests\ResourceRequest;
use App\Models\Lesson;
use App\Models\Resource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LessonResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function index(Lesson $lesson)
    {
        return view('teachers.resources.index',compact('lesson'));
    }

    public function create(Lesson $lesson){
        $types = [
            'Pdf' => 'Pdf',
            'Zip' => 'Zip',
            'Image' => 'Image',
        ];
        return view('teachers.resources.create',compact('lesson','types'));
    }

    public function store(ResourceRequest $request, Lesson $lesson){
        
        $url = Storage::put('resources',$request->file('file'));
        $resource = Resource::create([
            'name' => $request->name,
            'url' => $url,
            'description' => $request->description,
            'type' => $request->type,
            'lesson_id' => $lesson->id,
        ]);
        return redirect()->route('teacher.lessons.resources.index',compact('lesson'))
            ->with('success','El recurso fue agregado con exito');
        
    }

    public function show(Lesson $lesson, Resource $resource)
    {
        //
    }
    public function edit(Lesson $lesson, Resource $resource){
        $types = [
            'Pdf' => 'Pdf',
            'Zip' => 'Zip',
            'Image' => 'Image',
        ];
        return view('teachers.resources.edit',compact('lesson','resource','types'));
    }
    public function update(ResourceRequest $request, Lesson $lesson, Resource $resource)
    {
        $resource->update(
            $request->all(),
        );
        if($request->file('file')){
            Storage::delete($resource->url);
            $url = Storage::put('resources',$request->file('file'));
            $resource->update([
                'url' => $url,
            ]);
        }
        return redirect()->route('teacher.lessons.resources.index',compact('lesson'))
            ->with('success','El recurso se actualizó con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lesson  $lesson
     * @param  \App\Models\Resource  $resource
     * @return \Illuminate\Http\Response
     */
    // public function destroy(Lesson $lesson, Resource $resource)
    // {
        //
    // }
}
