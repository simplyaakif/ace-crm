@extends('layout.layout')

@section('head')
    <title>
        Lesson Planner - CRM
    </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    {{--    <link rel="stylesheet" href="{{asset('/css/tw.css')}}">--}}
@endsection
@section('page')
    <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
        <h4 class="tx-gray-800 mg-b-5">Daily Lesson Planner</h4>
        <p class="mg-b-0">for Individual Courses</p>
    </div>

    <div id="app" class="br-pagebody">
        <div class="br-section-wrapper">
            <form id="lessonForm" class="container">
                <div class="row mb-4">
                    <div class="col-md-3">
                        <label for="" class="form-control-label"> Date
                        </label>
                        <?php $today = new DateTime(); ?>
                        <input type="date" id="date" placeholder="Date"  class="form-control"
                               value="<?php echo $today->format('Y-m-d'); ?>">
                    </div>
                    <div class="col-md-3">
                        <label for="" class="form-control-label"> Level
                        </label>
                        <input type="text" id="level" placeholder="Level" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label for="" class="form-control-label"> Batch Time
                        </label>
                        <input type="text" id="batch_time" placeholder="Batch Time" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label for="" class="form-control-label"> Duration
                        </label>
                        <input type="text" id="duration" placeholder="Duration" class="form-control">
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-4">
                        <label for="" class="form-control-label"> Lesson Code
                        </label>
                        <input type="text" id="lesson_code" placeholder="Lesson Code" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label for="" class="form-control-label"> Week No
                        </label>
                        <input type="text" id="week_no" placeholder="Week No" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label for="" class="form-control-label"> Module
                        </label>
                        <input type="text" id="module" placeholder="Module" class="form-control">
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-3">
                        <label for="" class="form-control-label"> Book
                        </label>
                        <input type="text" id="book" placeholder="Book" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label for="" class="form-control-label"> Page
                        </label>
                        <input type="text" id="page" placeholder="Page" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label for="" class="form-control-label"> Topic
                        </label>
                        <input type="text" id="topic" placeholder="Topic" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label for="" class="form-control-label"> Aids
                        </label>
                        <input type="text" id="aids" placeholder="Aids" class="form-control">
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-12">
                        <label for="" class="form-control-label"> Objectives
                        </label>
                        <input type="text" id="objectives" placeholder="Objectives" class="form-control">
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-6">
                        <label for="" class="form-control-label"> <strong
                            >Reading</strong>
                        </label>
                        <textarea name="" id="reading" cols="30" rows="10" placeholder="Learning Outcome"
                                  class="form-control"></textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="" class="form-control-label"> <strong
                            >Writing</strong>
                        </label>
                        <textarea name="" id="writing" cols="30" rows="10" placeholder="Learning Outcome"
                                  class="form-control"></textarea>

                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-6">
                        <label for="" class="form-control-label"> <strong
                            >Listening</strong>
                        </label>
                        <textarea name="" id="listening" cols="30" rows="10" placeholder="Learning Outcome"
                                  class="form-control"></textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="" class="form-control-label"> <strong
                            >Speaking</strong>
                        </label>
                        <textarea name="" id="speaking" cols="30" rows="10" placeholder="Learning Outcome"
                                  class="form-control"></textarea>

                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-12">
                        <label for="" class="form-control-label"> Activity / Presentation / Discussion
                        </label>
                        <input type="text" id="activity_presentation_discussion"
                               placeholder="Activity / Presentation / Discussion" class="form-control">
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-12">
                        <label for="" class="form-control-label"> Wrap Up
                        </label>
                        <input type="text" id="wrap_up" placeholder="Wrap Up" class="form-control">
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-12">
                        <label for="" class="form-control-label"> Home Task Or Assignment
                        </label>
                        <input type="text" id="home_task" placeholder="Home Task Or Assignment" class="form-control">
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-12">
                        <label for="" class="form-control-label"> Additional Content
                        </label>
                        <input type="text" id="additional_content" placeholder="Additional Content"
                               class="form-control">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 ">
                        <button onclick="submit_data()" type="button" class="btn btn-primary">Submit</button>
                        <a href="{{route('lesson_planner_all')}}"  class="btn btn-dark">Go Back</a>
                    </div>

                </div>

            </form>
        </div>
    </div>



@endsection


@section('bottom')
    <style>
        .toast-success {
            background-color: #51A351!important;
        }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script>
        function submit_data() {
            // $("#lessonForm").validate({
            //     rules: {
            //         // no quoting necessary
            //         name: "required",
            //
            //     }
            // });
            let lesson_planner_data = {
                date: document.getElementById('date').value,
                level: document.getElementById('level').value,
                batch_time: document.getElementById('batch_time').value,
                duration: document.getElementById('duration').value,
                lesson_code: document.getElementById('lesson_code').value,
                week_no: document.getElementById('week_no').value,
                module: document.getElementById('module').value,
                book: document.getElementById('book').value,
                page: document.getElementById('page').value,
                topic: document.getElementById('topic').value,
                aids: document.getElementById('aids').value,
                objectives: document.getElementById('objectives').value,
                reading: document.getElementById('reading').value,
                writing: document.getElementById('writing').value,
                listening: document.getElementById('listening').value,
                speaking: document.getElementById('speaking').value,
                activity_presentation_discussion: document.getElementById('activity_presentation_discussion').value,
                wrap_up: document.getElementById('wrap_up').value,
                home_task: document.getElementById('home_task').value,
                additional_content: document.getElementById('additional_content').value,
            }
            console.log(lesson_planner_data);

            $.ajax({
                url: '{{url('/academics/lesson')}}',
                data: lesson_planner_data,
                type: 'post',
                success: function () {
                    toastr.success('Lesson Plan Added Successfully')
                },
                error: function () {

                },
            });
        }
    </script>
@endsection
