<?php

    namespace App\Http\Controllers;

    use App\lesson_plan;
    use App\LessonPlan;
    use Illuminate\Http\Request;

    class LessonPlanController extends Controller {

        public function index()
        {
            $lessons = LessonPlan::all();
            $data =[
                'lessons'=>$lessons,
            ];
            return view('pages.academics.lesson_planner_all',$data);
        }


        public function create()
        {
            return view('pages.academics.lesson_planner');
        }


        public function store(Request $request)
        {
            $lesson_plan = [
                "date"                             => $request->input('date'),
                "level"                            => $request->input('level'),
                "batch_time"                       => $request->input('batch_time'),
                "duration"                         => $request->input('duration'),
                "lesson_code"                      => $request->input('lesson_code'),
                "week_no"                          => $request->input('week_no'),
                "module"                           => $request->input('module'),
                "book"                             => $request->input('book'),
                "page"                             => $request->input('page'),
                "topic"                            => $request->input('topic'),
                "aids"                             => $request->input('aids'),
                "objectives"                       => $request->input('objectives'),
                "reading"                          => $request->input('reading'),
                "writing"                          => $request->input('writing'),
                "listening"                        => $request->input('listening'),
                "speaking"                         => $request->input('speaking'),
                "activity_presentation_discussion" => $request->input('activity_presentation_discussion'),
                "wrap_up"                          => $request->input('wrap_up'),
                "home_task"                        => $request->input('home_task'),
                "additional_content"               => $request->input('additional_content'),
            ];
            $lesson      = LessonPlan::create($lesson_plan);
            echo "Created Successfully";
        }


        public function show($id)
        {
            $lesson = LessonPlan::findOrFail($id);
            $data=[
                'lesson'=>$lesson
            ];
            return view('pages.academics.lesson_planner_show',$data);

        }


        public function edit(lesson_plan $lesson_plan)
        {
            //
        }


        public function update(Request $request, lesson_plan $lesson_plan)
        {
            //
        }

        public function destroy(lesson_plan $lesson_plan)
        {
            //
        }
    }
