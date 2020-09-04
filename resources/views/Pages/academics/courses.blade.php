@extends('layout.layout')

@section('head')
    <title>
        Courses</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.css">
@endsection
@section('page')
    <div id="app" class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
        <h4 class="tx-gray-800 mg-b-5">Courses</h4>
        <p class="mg-b-0">Active Available Courses</p>
    </div>

    <div id="queryPage" class="br-pagebody">
        <div class="br-section-wrapper">
            <div >
                <div class="d-flex align-items-center justify-content-between mg-b-20">
                    <h2 class="tx-gray-800 text-center" @click="enable">
                        Courses
                    </h2>

                    <div class=""  v-show="!editMode">
                        <button class="btn btn-teal mg-b-8"
                                @click="newCourse()">
                            New
                            Course
                            <i class="fa fa-pencil ml-2" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>


                {{--Courses Details--}}
                <div v-show="!editMode">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <table class="table table-stripped">
                                    <tr>
                                        <th>
                                            Sr.
                                            No.
                                        </th>
                                        <th>
                                            Course
                                            Name
                                        </th>
                                        <th>
                                            Duration
                                        </th>
                                        <th>
                                            Course
                                            Fee
                                        </th>
                                        <th>
                                            Date Created
                                        </th>
                                        <th>
                                            Modify
                                        </th>
                                    </tr>
                                    @foreach($courses as $course)
                                        <tr>
                                            <td>
                                                C-
                                                {{$course->id}}
                                            </td>
                                            <td>
                                                {{$course->c_title}}
                                            </td>
                                            <td>
                                                {{$course->c_duration}}
                                            </td>
                                            <td class="text-right">
                                                {{$course->c_fee}}
                                                Rs
                                            </td>
                                            <td class="text-right">
                                                {{$course->created_at->diffforhumans()}}
                                            </td>
                                            <td class="text-right"
                                                style="font-size:18px;">
                                                <span class="tx-teal"
                                                      @click="editCourse({{$course->id}})">
                                                    <i class="icon ion-wrench"></i>
                                                </span>
                                                <span class="tx-orange"
                                                      style="margin-left:10px;"
                                                      @click="deleteCourse({{$course->id}})">
                                                    <i class="icon ion-trash-b"></i>
                                                </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>


                            </div>

                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="row"
                         v-show="editMode">

                        <div class="form-layout form-layout-1">
                            <div class="row mg-b-25">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="form-control-label">Course Name: <span
                                                    class="tx-danger">*</span></label>
                                        <input v-model="course.course_name" class="form-control" type="text"
                                               placeholder="Enter Courses Name">
                                    </div>
                                </div><!-- col-4 -->
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="form-control-label">Course Duration: <span
                                                    class="tx-danger">*</span></label>
                                        <input class="form-control" v-model="course.course_duration" type="text"
                                               placeholder="Enter Course Duration">
                                    </div>
                                </div><!-- col-4 -->
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="form-control-label">Course Fee: <span
                                                    class="tx-danger">*</span></label>
                                        <input class="form-control" type="text" v-model="course.course_fee"
                                               placeholder="Enter Course Fee">
                                    </div>
                                </div>
                                <!-- col-4 -+->
                                <div class="col-lg-4">
                                    <div class="form-group mg-b-10-force">
                                        <label class="form-control-label">Course Status:</label>
                                        <select class="form-control" name="" id="" v-model="course.course_status">
                                            <option value="active">Active</option>
                                            <option value="onHold">On Hold</option>
                                            <option value="archived">Archived</option>

                                        </select>
                                    </div>
                                </div> -->
                                <!-- col-8 -->
                                <div class="col-lg-8">
                                    <div class="form-group mg-b-10-force">
                                        <label class="form-control-label">Comments: </label>
                                        <input class="form-control" v-model="course.course_comments" type="text"
                                               placeholder="Enter Course Comments">
                                    </div>
                                </div><!-- col-4 -->
                            </div><!-- row -->

                            <div class="form-layout-footer">
                                <button class="btn btn-info" @click="addCourse">Create Course</button>
                                <button class="btn btn-secondary" @click="goBack()">Go Back</button>
                            </div><!-- form-layout-footer -->
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('bottom')
    <script src="{{asset('js/app.js')}}"></script>
    <script>
        var qpg = new Vue({
            el: '#queryPage',
            data: {
                courses: {!! json_encode($courses, JSON_HEX_TAG) !!},
                course: {
                    course_name: '654',
                    course_duration: '',
                    course_fee: '',
                    course_comments: '',
                    status: '',
                },
                mShow:false,
                course_id: '',
                search: '',
                pagination: {},
                edit: false,
                editMode: false,
                createMode: true,
            },
            methods: {
                enable(){
                    this.mShow = true;
                },
                goBack() {
                    this.editMode = false;
                    this.edit = false;
                },
                newCourse() {
                    this.editMode = true;
                    this.edit = false;
                    this.course.id = '';
                    this.course.course_id = '';
                    this.course.course_name = '';
                    this.course.course_duration = '';
                    this.course.course_fee = '';
                    this.course.course_comments = '';
                    this.course.course_status = '';
                },
                editCourse(courseid) {
                    this.editMode = true;
                    this.edit = true;
                    fetch("api/courses/" + courseid)
                        .then(res => res.json())
                        .then(data => {
                            this.course.course_name = data.data.c_title;
                            this.course.course_duration = data.data.c_duration;
                            this.course.course_fee = data.data.c_fee;
                        })
                        .catch(err => console.log(err));

                    // this.course.course_fee = course.course_fee;
                    // this.course.course_duration = course.course_duration;
                    // this.course.course_comments = course.course_comments;
                    // this.course.course_status = course.course_status;
                },
                deleteCourse(id) {
                    if (confirm('Are You Sure?')) {
                        fetch(`api/courses/${id}`, {
                            method: 'delete',
                            headers: {
                                "content-type": "application/json",
                                "X-CSRF-TOKEN": document.head.querySelector(
                                    'meta[name="csrf-token"]'
                                ).content
                            }
                        })
                            .then(res => res.json())
                            .then(data => {
                                alert('Course Removed');
                                this.fetchData();
                                window.location.href = window.location.href;
                            })
                            .catch(err => console.log(err));
                    }
                },
                addCourse() {
                    if (this.edit === false) {
                        // Add
                        fetch('api/courses', {
                            method: 'post',
                            body: JSON.stringify(this.course),
                            headers: {
                                'content-type': 'application/json',
                                "X-CSRF-TOKEN": document.head.querySelector(
                                    'meta[name="csrf-token"]'
                                ).content
                            }
                        })
                            .then(res => res.json())
                            .then(data => {
                                this.course.course_name = '';
                                this.course.course_duration = '';
                                this.course.course_fee = '';
                                this.course.course_comments = '';
                                alert('Course Added');
                                this.fetchData();
                            })
                            .catch(err => console.log(err));
                    } else {
                        // Update
                        fetch('api/courses', {
                            method: 'put',
                            body: JSON.stringify(this.course),
                            headers: {
                                'content-type': 'application/json',
                                "X-CSRF-TOKEN": document.head.querySelector(
                                    'meta[name="csrf-token"]'
                                ).content
                            }
                        })
                            .then(res => res.json())
                            .then(data => {
                                this.course.course_name = '';
                                this.course.course_duration = '';
                                this.course.course_fee = '';
                                this.course.course_comments = '';
                                alert('Course Updated');
                                this.fetchData();
                            })
                            .catch(err => console.log(err));
                    }
                    this.editMode = false;
                },
            }
        })
    </script>
@endsection