@extends('layout.layout')

@section('head')
    <title>Queries Status - CRM</title>
@endsection
@section('page')

    <div class="pd-30">
        <h4 class="tx-gray-800 mg-b-5">Queries Reports</h4>
        <p class="mg-b-0">Queries Reports and Sub Reports</p>
    </div>

    <div id="app" class="br-pagebody mg-t-5 pd-x-30">
        <div class="row row-sm">
            {{--Queries Records--}}
            <div class="col-sm-6 col-xl-3">
                <div class="bg-teal rounded overflow-hidden">
                    <div class="pd-25 d-flex align-items-center">
                        <i class="ion ion-earth tx-60 lh-0 tx-white op-7"></i>
                        <div class="mg-l-20">
                            <p class="tx-10 tx-spacing-1 tx-mont tx-medium tx-uppercase tx-white-8 mg-b-10">Today's
                                Visits</p>
                            <p class="tx-24 tx-white tx-lato tx-bold mg-b-2 lh-1">{{$todayQueries}}</p>
                            <span class="tx-11 tx-roboto tx-white-6">{{$yesterQueries}} queries yesterday</span>
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
                                Visits</p>
                            <p class="tx-24 tx-white tx-lato tx-bold mg-b-2 lh-1">{{$weekQueries}}</p>
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
                                Queries</p>
                            <?php
                            $date = \Carbon\Carbon::now();
                            ?>
                            <p class="tx-24 tx-white tx-lato tx-bold mg-b-2 lh-1">{{$monthQueries}}</p>
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

        <div class="row ">
            <div class="col-md-6 mg-t-20">
                <div class="card pd-0 bd-0 shadow-base">
                    <div class="pd-x-30 pd-t-30 pd-b-15">
                        <h6 class="tx-13 tx-uppercase tx-inverse tx-semibold tx-spacing-1">Month's Query Visits
                        </h6>
                        <p class="mg-b-10">This Months Daily query visits record.</p>

                        @if ($visitMax != -1)
                            <v-bar-chart
                                :data_labels="{{json_encode($monthDayWiseVisitDates[0])}}"
                                :data_value="{{json_encode($monthDayWiseVisitDates[1])}}"
                                :data_max="{{json_encode($visitMax)}}"
                                :height="230"
                            ></v-bar-chart>
                        @else
                            <p>Unfotunatley no data found for this month</p>
                        @endif

                    </div>
                </div>
            </div>
            <div class="col-md-6 mg-t-20">
                <div class="card pd-0 bd-0 shadow-base">
                    <div class="pd-x-30 pd-t-30 pd-b-15">
                        <h6 class="tx-13 tx-uppercase tx-inverse tx-semibold tx-spacing-1">Year's Query Record
                        </h6>
                        <div class="mg-b-10 d-flex">This Years Query Visit
                            Record.
                        <ul class="list-inline mb-0  ml-auto">
                            <li class="list-inline-item">Total
                                {{array_sum($queryYearVisitData[1])}}
                            </li>
                            <li class="list-inline-item">Max
                                {{max($queryYearVisitData[1])}}
                            </li>
                            <li class="list-inline-item">Max
                                {{min($queryYearVisitData[1])}}
                            </li>
                        </ul>
                        </div>

                        @if ($yearVisitMax != -1)
                            <v-bar-chart
                                :data_labels="{{json_encode($queryYearVisitData[0])}}"
                                :data_value="{{json_encode($queryYearVisitData[1])}}"
                                :data_max="{{json_encode($yearVisitMax)}}"
                                :data_bg="{{json_encode('#B71E21')}}"
                                :height="230"
                            ></v-bar-chart>
                        @else
                            <p>Unfotunatley no data found for this year</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="row row-sm mg-t-20">
            <div class="col-8">

                <div class="card bd-0 shadow-base pd-30 ">
                    <div class="d-flex align-items-center justify-content-between mg-b-30">
                        <div>
                            <h6 class="tx-13 tx-uppercase tx-inverse tx-semibold tx-spacing-1">Recent Queries</h6>
                            <p class="mg-b-0"><i class="icon ion-calendar mg-r-5"></i>
                                @if($recentQueries->min('created_at') != null)
                                {{$recentQueries->min
                            ('created_at')->format('M d Y')}} -
                                {{$recentQueries->max
                            ('created_at')->format('M d Y')}}
                                    @endif
                            </p>
                        </div>
                        <a href="{{route('queries')}}" class="btn btn-outline-info btn-oblong  tx-11 tx-uppercase
                        tx-mont tx-medium
                    tx-spacing-1 pd-x-30 bd-2">See more</a>
                    </div><!-- d-flex -->

                    <table class="table table-valign-middle mg-b-0">
                        <tbody>
                        @foreach($recentQueries as $recentQuery)
                            <tr>
                                <td class="pd-l-0-force">
                                    <img src="http://via.placeholder.com/280x280" class="wd-40 rounded-circle" alt="">
                                </td>
                                <td>
                                    <h6 class="tx-inverse tx-14 mg-b-0">{{$recentQuery->q_name}}</h6>
                                    <span class="tx-12">{{$recentQuery->q_contact}}</span>
                                </td>
                                <td>
                                    @foreach($recentQuery->courses as $course)
                                        <span class="badge badge-pill badge-secondary tx-12 font-weight-light mg-l-10">
                                            {{$course->c_title}}
                                        </span>
                                    @endforeach
                                </td>
                                <td class="tx-10">{{$recentQuery->created_at->diffforhumans()}}</td>
                                {{--<td class="pd-r-0-force tx-center"><a href="" class="tx-gray-600"><i class="icon ion-more tx-18 lh-0"></i></a></td>--}}
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div><!-- card -->

            </div><!-- col-8 -->
            <div class="col-4">

                <div class="card pd-0 bd-0 shadow-base">
                    <div class="pd-x-30 pd-t-30 pd-b-15">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <h6 class="tx-13 tx-uppercase tx-inverse tx-semibold tx-spacing-1">
                                    Queries contact type
                                </h6>
                                <p class="mg-b-10">Queries Interaction Type Count this Month</p>

                            </div>
                        </div><!-- d-flex -->
                        <table class="table table-valign-middle mg-b-0">
                            <thead>
                            <tr class="tx-10">
                                <th class="tx-10">Sr. #</th>
                                <th class="tx-10">Interaction Type</th>
                                <th class="tx-10">Total Count</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($contactType as $Type)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$Type->q_interaction_type}}</td>
                                    <td class="text-right">{{$Type->total}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="pd-x-15 pd-b-15">
                    </div>
                </div><!-- card -->

                <div class="card pd-0 bd-0 shadow-base mg-t-20">
                    <div class="pd-x-30 pd-t-30 pd-b-15">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <h6 class="tx-13 tx-uppercase tx-inverse tx-semibold tx-spacing-1">
                                    Months Queries Progress
                                </h6>
                                <p class="mg-b-10">Number of Queries in each course this month.</p>
                                <p class="mg-b-0">
                                    @foreach($courseQueries as $query)
                                    <span class="square-8 rounded-circle bg-purple mg-r-10"></span>
                                    {{$query->c_title}} ({{$query->queries_count}})
                                        <span class="mg-r-20"></span>
                                        <br>
                                    @endforeach
                                </p>
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


@section('bottom')
    <script src="{{asset('js/app.js')}}"></script>
@endsection
