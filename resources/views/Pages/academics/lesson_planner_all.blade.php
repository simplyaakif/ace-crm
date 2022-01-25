@extends('layout.layout')

@section('head')
    <title>
        Lesson Planner All - CRM
    </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    {{--    <link rel="stylesheet" href="{{asset('/css/tw.css')}}">--}}
@endsection
@section('page')
    <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
        <h4 class="tx-gray-800 mg-b-5">Daily Lesson Planner</h4>
        <p class="mg-b-0">for All Courses</p>
    </div>

    <div id="app" class="br-pagebody">
        <div class="br-section-wrapper">
            <div class="d-flex justify-content-between">
                <h2>Create Lesson Plan</h2>
                <a href="{{route('lesson_planner_create')}}" class="btn btn-primary">Add Lesson Plan</a>
            </div>
            <table id="lesson-table" class="table">
                <thead>
                <tr>
                    <th> Sr. No.</th>
                    <th>Level</th>
                    <th>Batch Time</th>
                    <th>Lesson Code</th>
                    <th>Week Number</th>
                    <th>Date Added</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($lessons as $i=>$lesson)
                    <tr>
                        <td>{{$i+1}}</td>
                        <td>{{$lesson->level}}</td>
                        <td>{{$lesson->batch_time}}</td>
                        <td>{{$lesson->lesson_code}}</td>
                        <td>{{$lesson->week_no}}</td>
                        @if($lesson->created_at)
                            <td>
{{--                                {{ $lesson->created_at->format("h:i:s A d-m-Y")}}--}}
                                {{ $lesson->created_at->format("D d-m-Y")}}
                            </td>
                        @else
                            <td></td>
                        @endif
                        <td>
                            <span>
                                <i class="fa fa-eye"></i>
                            </span>
{{--                            <a class="d-none" onclick="update({{$lesson->id}})"><i class="fas fa-wrench"></i></a>--}}
{{--                            <a onclick="del({{$lesson->id}})"><i class="fas fa-trash"></i></a>--}}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>



@endsection


@section('bottom')
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
    <script>
        jQuery(document).ready(function () {
            jQuery('#lesson-table').DataTable();
        });

    </script>
@endsection
