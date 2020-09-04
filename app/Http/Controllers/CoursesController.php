<?php

namespace App\Http\Controllers;

use App\Course_Query;
use App\Courses;
use App\Forms\Builders\CoursesForm;
use App\Http\Resources\CoursesResource;
use DB;
use Illuminate\Http\Request;
use LaravelEnso\Select\app\Traits\OptionsBuilder;

class CoursesController extends Controller
{
    use OptionsBuilder;
    protected $queryAttributes = ['c_title'];
    protected $model = Courses::class;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Courses::all();
        return view('pages.academics.courses')->with('courses',$courses);
    }
    public function store(Request $request)
    {
        $courses = $request->isMethod('put') ? Courses::findOrFail($request->id) : new Courses;
        $courses->id = $request->input('id');
        $courses->c_title = $request->input('course_name');
        $courses->c_duration = $request->input('course_duration');
        $courses->c_fee = $request->input('course_fee');
        $courses->c_description = $request->input('course_comments');

        if($courses->save()){
            return new CoursesResource($courses);
        }
    }

    public function show(Courses $courses)
    {

        $course = Courses::findOrFail($courses->id);
        return new CoursesResource($course);
    }

    public function destroy(Courses $courses)
    {
        $course = Courses::findOrFail($courses->id);
        if ($course->delete()){
            return new CoursesResource($course);
        }
    }

    public function edit(Courses $courses,CoursesForm $form ){
        return ['form' => $form->edit($courses)];
    }

    public function create(CoursesForm $form)
    {
        return ['form' => $form->create()];
    }

    public function update(Courses $courses){

    }

    public function studentCourses(Request $request){
        $student = $request->id;
        $studentCourses = DB::select('select * from course_query where query_id = :id', ['id' => $student]);
        $courseId = [];
        foreach ($studentCourses as $course){
            $courseId[] = $course->course_id;
        }
        $courses = Courses::whereIn('id', $courseId)
                            ->get();

        return json_encode($courses);

    }
}
