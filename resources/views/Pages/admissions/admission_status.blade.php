@extends('layout.layout')

@section('head')
    <title>Admissions Status - CRM</title>
@endsection
@section('page')

    <div class="pd-30">
        <h4 class="tx-gray-800 mg-b-5">Admissions Reports</h4>
        <p class="mg-b-0">Admissions Reports and Sub Reports</p>
    </div>

    <div class="br-pagebody mg-t-5 pd-x-30">
        <div class="row row-sm">
            {{--Admissions Records--}}
            <div class="col-sm-6 col-xl-3">
                <div class="bg-teal rounded overflow-hidden">
                    <div class="pd-25 d-flex align-items-center">
                        <i class="ion ion-earth tx-60 lh-0 tx-white op-7"></i>
                        <div class="mg-l-20">
                            <p class="tx-10 tx-spacing-1 tx-mont tx-medium tx-uppercase tx-white-8 mg-b-10">Today's
                                Admissions</p>
                            <p class="tx-24 tx-white tx-lato tx-bold mg-b-2 lh-1">{{$todayAdmissions}}</p>
                            <span class="tx-11 tx-roboto tx-white-6">{{$yesterAdmissions}} admissions yesterday</span>
                        </div>
                    </div>
                </div>
            </div><!-- col-3 -->
            {{--Admission Records--}}
            <div class="col-sm-6 col-xl-3 mg-t-20 mg-sm-t-0">
                <div class="bg-danger rounded overflow-hidden">
                    <div class="pd-25 d-flex align-items-center">
                        <i class="ion ion-earth tx-60 lh-0 tx-white op-7"></i>
                        <div class="mg-l-20">
                            <p class="tx-10 tx-spacing-1 tx-mont tx-medium tx-uppercase tx-white-8 mg-b-10">Weeks's
                                Admissions</p>
                            <p class="tx-24 tx-white tx-lato tx-bold mg-b-2 lh-1">{{$weekAdmissions}}</p>
                            <span class="tx-11 tx-roboto tx-white-6">From Mon to Sat</span>
                        </div>
                    </div>
                </div>
            </div><!-- col-3 -->
            {{--Online Registration Records--}}
            <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
                <div class="bg-primary rounded overflow-hidden">
                    <div class="pd-25 d-flex align-items-center">
                        <i class="ion ion-pricetag tx-60 lh-0 tx-white op-7"></i>
                        <div class="mg-l-20">
                            <p class="tx-10 tx-spacing-1 tx-mont tx-medium tx-uppercase tx-white-8 mg-b-10">Month's
                                Admissions</p>
                            <?php
                            $date = \Carbon\Carbon::now();
                            ?>
                            <p class="tx-24 tx-white tx-lato tx-bold mg-b-2 lh-1">{{$monthAdmissions}}</p>
                            <span class="tx-11 tx-roboto tx-white-6">In {{$date->format('F')}} Month</span>
                        </div>
                    </div>
                </div>
            </div><!-- col-3 -->
            <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
                <div class="bg-br-primary rounded overflow-hidden">
                    <div class="pd-25 d-flex align-items-center">
                        <i class="ion ion-pricetag tx-60 lh-0 tx-white op-7"></i>
                        <div class="mg-l-20">
                            <p class="tx-10 tx-spacing-1 tx-mont tx-medium tx-uppercase tx-white-8 mg-b-10">Last
                                Month</p>
                            <p class="tx-24 tx-white tx-lato tx-bold mg-b-2 lh-1">{{$lastMonth}}</p>
                            <span class="tx-11 tx-roboto tx-white-6">In {{$date->subMonth()->format('F')}} Month</span>
                        </div>
                    </div>
                </div>
            </div><!-- col-3 -->
        </div><!-- row -->

        <div class="row row-sm mg-t-20">
            <div class="col-8">

                <div class="card bd-0 shadow-base pd-30 ">
                    <div class="d-flex align-items-center justify-content-between mg-b-30">
                        <div>
                            <h6 class="tx-13 tx-uppercase tx-inverse tx-semibold tx-spacing-1">Recent Admissions</h6>
                            <p class="mg-b-0"><i class="icon ion-calendar mg-r-5"></i>
                                @if($recentAdmissions->min('created_at') != null)
                                    {{$recentAdmissions->min
                                ('created_at')->format('M d Y')}} -
                                    {{$recentAdmissions->max
                                ('created_at')->format('M d Y')}}
                                @endif
                            </p>
                        </div>
                        <a href="{{route('queries')}}" class="btn btn-outline-info btn-oblong  tx-11 tx-uppercase
                        tx-mont tx-medium
                    tx-spacing-1 pd-x-30 bd-2">See more</a>
                    </div><!-- d-flex -->

                    <table class="table table-valign-middle mg-b-0">
                        <thead>
                        <tr>
                            <th>Pic</th>
                            <th>Reg. #</th>
                            <th>Name</th>
                            <th>Batch</th>
                            <th>D.O. Admission</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($recentAdmissions as $recentAdmission)
                            <tr>
                                <td class="pd-l-0-force">
                                    <img src="http://via.placeholder.com/280x280" class="wd-40 rounded-circle" alt="">
                                </td>
                                <td class="tx-black">
                                    <strong>
                                        {{$recentAdmission->a_reg_id}}
                                    </strong>
                                </td>
                                <td>
                                    <h6 class="tx-inverse tx-14 mg-b-0">{{$recentAdmission->a_name}}</h6>
                                    <span class="tx-12">{{$recentAdmission->a_mobile}}</span>
                                </td>
                                <td>
                                    @foreach($recentAdmission->batches as $batch)
                                        <span class="badge badge-pill badge-secondary tx-12 font-weight-light mg-l-10">
                                            {{$batch->b_name}} - {{$batch->b_timings}}
                                        </span>
                                    @endforeach
                                </td>
                                <td class="tx-10">{{$recentAdmission->created_at->diffforhumans()}}</td>
                                <td class="pd-r-0-force tx-center">
                                    <a href="{{url('misc/student/'.$recentAdmission->id)}}" class="tx-gray-600"><i
                                                class="icon ion-more tx-18 lh-0"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div><!-- card -->

            </div><!-- col-8 -->
            <div class="col-4">

                <div class="card pd-0 bd-0 shadow-base ">
                    <div class="pd-x-30 pd-t-30 pd-b-15">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <h6 class="tx-13 tx-uppercase tx-inverse tx-semibold tx-spacing-1">
                                    Admission Progress in Each Batch
                                </h6>
                                <p class="mg-b-10">Active Admissions in each batch.</p>
                                <p class="mg-b-0">
                                    @foreach($batchAdmissions as $admission)
                                        @if($admission->admissions_count == 0)
                                            @continue
                                        @else
                                            <span class="square-8 rounded-circle bg-purple mg-r-10"></span>
                                            {{$admission->b_name}} {{$admission->b_timings}}
                                            ({{$admission->admissions_count}})
                                            <span class="mg-r-20"></span>
                                            <br>
                                        @endif
                                    @endforeach
                                </p>
                            </div>
                        </div><!-- d-flex -->
                    </div>
                    <div class="pd-x-15 pd-b-15">
                    </div>
                </div><!-- card -->

                <div class="card pd-0 bd-0 shadow-base mg-t-20 ">
                    <div class="pd-x-30 pd-t-30 pd-b-15">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <h6 class="tx-13 tx-uppercase tx-inverse tx-semibold tx-spacing-1">
                                    Session Ending for following students
                                </h6>
                                <p class="mg-b-10">Number of Admissions in each batch this month.</p>
                                @foreach($sessionsEnd as $end)
                                    <a href="{{url('misc/student/'.$end->aid)}}" class="mg-b-0">
                                        {{--                                        @if($admission->admissions_count == 0)--}}
                                        {{--@continue--}}
                                        {{--@else--}}
                                        {{--<span class="square-8 rounded-circle bg-purple mg-r-10"></span>--}}
                                        <span style="color:red;">
                                        Student:
                                        {{$end->a_name}}
                                        </span>
                                        <br>
                                        <span style="color:black;">
                                        Session: {{$end->c_title}}
                                        </span>
                                        <br>
                                        <span style="color:black;">
                                        Batch: {{$end->b_name}}
                                            <span class="badge badge-pill badge-primary text-light ">
                                            {{$end->b_timings}}
                                            </span>
                                        </span>

                                        <br>
                                        <span class="" style="color:green;">
                                        End Date: {{\Carbon\Carbon::parse($end->session_end_date)->format('d M Y ') }}
                                        </span>
                                    </a>
                                    <hr>
                                    {{--@endif--}}
                                @endforeach
                            </div>
                        </div><!-- d-flex -->
                    </div>
                    <div class="pd-x-15 pd-b-15">
                    </div>
                </div><!-- card -->

            </div><!-- col-4 -->
        </div><!-- row -->

    </div>
@endsection