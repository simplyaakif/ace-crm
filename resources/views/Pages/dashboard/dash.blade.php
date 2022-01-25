@extends('layout.layout')

@section('head')
    <title>Dashboard - CRM</title>
@endsection
@section('page')

    <div class="pd-30 ">
        <div class="row">
            <div class="col-md-6">
                <h4 class="tx-gray-800 mg-b-5">Dashboard</h4>
                <p class="mg-b-0">Main Screen - Todays details</p>

            </div>
            <div class="col-md-6 text-right">
                <a href="{{route('q_create')}}" class="btn btn-teal">New Query</a>
                <a href="{{route('s_create')}}" class="btn btn-primary">New Admission</a>

            </div>
        </div>

    </div>

    @if(auth()->user()->permissions == "admin" || auth()->user()->permissions == "manager" )
        <div id="app" class="br-pagebody mg-t-5 pd-x-30">
            <div class="row row-sm">
                {{--Queries Records--}}
                <div class="col-sm-6 col-xl-3 mg-xl-t-10">
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
                <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-10">
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
                <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-10">
                    <div class="bg-primary rounded overflow-hidden">
                        <div class="pd-25 d-flex align-items-center">
                            <i class="ion ion-pricetag tx-60 lh-0 tx-white op-7"></i>
                            <div class="mg-l-20">
                                <p class="tx-10 tx-spacing-1 tx-mont tx-medium tx-uppercase tx-white-8 mg-b-10">Today's
                                    Sale</p>
                                <p class="tx-24 tx-white tx-lato tx-bold mg-b-2 lh-1">Rs. {{$todaySale}}</p>
                                <span class="tx-11 tx-roboto tx-white-6">Sale other than online</span>
                            </div>
                        </div>
                    </div>
                </div><!-- col-3 -->
                <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-10">
                    <div class="bg-primary rounded overflow-hidden">
                        <div class="pd-25 d-flex align-items-center">
                            <i class="ion ion-pricetag tx-60 lh-0 tx-white op-7"></i>
                            <div class="mg-l-20">
                                <p class="tx-10 tx-spacing-1 tx-mont tx-small tx-uppercase tx-white-8
                                mg-b-10">Today's Online Sale</p>
                                <p class="tx-24 tx-white tx-lato tx-bold mg-b-2 lh-1">Rs. {{$todayOnlineSale}}</p>
                                <span class="tx-11 tx-roboto tx-white-6">Only online batch sale</span>
                            </div>
                        </div>
                    </div>
                </div><!-- col-3 -->
                @if( auth()->user()->permissions == "admin" )
                    <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-10">
                        <div class="bg-br-primary rounded overflow-hidden">
                            <div class="pd-25 d-flex align-items-center">
                                <i class="ion ion-pricetag tx-60 lh-0 tx-white op-7"></i>
                                <div class="mg-l-20">
                                    <p class="tx-10 tx-spacing-1 tx-mont tx-medium tx-uppercase tx-white-8 mg-b-10">
                                        Month's
                                        Sale</p>
                                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-2 lh-1">Rs. {{$monthSale}}</p>
                                    <span
                                        class="tx-11 tx-roboto tx-white-6">In {{\Carbon\Carbon::now()->monthName}}</span>
                                </div>
                            </div>
                        </div>
                    </div><!-- col-3 -->
                    <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-10">
                        <div class="bg-br-primary rounded overflow-hidden">
                            <div class="pd-25 d-flex align-items-center">
                                <i class="ion ion-pricetag tx-60 lh-0 tx-white op-7"></i>
                                <div class="mg-l-20">
                                    <p class="tx-10 tx-spacing-1 tx-mont tx-medium tx-uppercase tx-white-8 mg-b-10">
                                        Online Month</p>
                                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-2 lh-1">Rs. {{$monthOnlineSale}}</p>
                                    <span
                                        class="tx-11 tx-roboto tx-white-6">In {{\Carbon\Carbon::now()->monthName}}</span>
                                </div>
                            </div>
                        </div>
                    </div><!-- col-3 -->
                    <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-10">
                        <div class="bg-br-primary rounded overflow-hidden">
                            <div class="pd-25 d-flex align-items-center">
                                <i class="ion ion-pricetag tx-60 lh-0 tx-white op-7"></i>
                                <div class="mg-l-20">
                                    <p class="tx-10 tx-spacing-1 tx-mont tx-medium tx-uppercase tx-white-8 mg-b-10">
                                        Total Month's
                                        Sale</p>
                                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-2 lh-1">Rs.
                                        {{$monthSale + $monthOnlineSale}}</p>
                                    <span
                                        class="tx-11 tx-roboto tx-white-6">In {{\Carbon\Carbon::now()->monthName}}</span>
                                </div>
                            </div>
                        </div>
                    </div><!-- col-3 -->
                @endif
            </div><!-- row -->
            <div class="row ">
                <div class="col-md-6 mg-t-20">
                    <div class="card pd-0 bd-0 shadow-base">
                        <div class="pd-x-30 pd-t-30 pd-b-15">
                            <h6 class="tx-13 tx-uppercase tx-inverse tx-semibold tx-spacing-1">Month's Sale Chart
                            </h6>
                            <p class="mg-b-10">This Months Daily Sale
                                Record.</p>
                            @if ($saleMax != -1)
                                <v-bar-chart
                                    :data_labels="{{json_encode($dtDy)}}"
                                    :data_value="{{json_encode($monthDayWiseSaleAmount)}}"
                                    :data_max="{{json_encode($saleMax)}}"
                                    :height="230"
                                ></v-bar-chart>
                            @else
                                <p>Unfotunatley no data found for this month</p>
                            @endif

                        </div>
                    </div>
                </div>
                @if( auth()->user()->permissions == "admin" )
                    <div class="col-md-6 mg-t-20">
                        <div class="card pd-0 bd-0 shadow-base">
                            <div class="pd-x-30 pd-t-30 pd-b-15">
                                <h6 class="tx-13 tx-uppercase tx-inverse tx-semibold tx-spacing-1">Year's Sale Chart
                                </h6>
                                <p class="mg-b-10">This Years Monthly Sale
                                    Record.</p>
                                @if ($yearMax != -1)
                                    <v-bar-chart
                                        :data_labels="{{json_encode($yearMonth)}}"
                                        :data_value="{{json_encode($yearMonthSaleAmount)}}"
                                        :data_max="{{json_encode($yearMax)}}"
                                        :data_bg="{{json_encode('#B71E21')}}"
                                        :height="230"
                                    ></v-bar-chart>
                                @else
                                    <p>Unfotunatley no data found for this year</p>
                                @endif
                            </div>
                        </div>
                    </div>
                @endif
            </div>

            <div class="row mg-t-20">
                <div class="col-md-8">
                    <div class="card pd-0 bd-0 shadow-base">
                        <div class="pd-x-30 pd-t-30 pd-b-15">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <h6 class="tx-13 tx-uppercase tx-inverse tx-semibold tx-spacing-1">This Months
                                        Admission
                                        Progress
                                    </h6>
                                    <p class="mg-b-10">Number of Admissions in each course this month.</p>
                                    <p class="mg-b-0">

                                        @foreach($batchAdmissions as $admission)
                                            @if($admission->admissions_count == 0)
                                                @continue
                                            @else
                                                <v-monthly-batch-admissions
                                                    :admission="{{json_encode($admission)}}"
                                                ></v-monthly-batch-admissions>
                                    @endif
                                    @endforeach
                                </div>
                            </div><!-- d-flex -->
                        </div>
                        <div class="pd-x-15 pd-b-15">
                        </div>
                    </div><!-- card -->

                    <div class="card bd-0 shadow-base pd-30 mg-t-20">
                        <div class="d-flex align-items-center justify-content-between mg-b-30">
                            <div>
                                <h6 class="tx-13 tx-uppercase tx-inverse tx-semibold tx-spacing-1">Newly Registered
                                    Students</h6>
                                <p class="mg-b-0"><i class="icon ion-calendar mg-r-5"></i>
                                    @if($admissions->min('created_at') != null)
                                        {{$admissions->min('created_at')->format('M d Y')}}
                                        -
                                        {{$admissions->max('created_at')->format('M d Y')}}
                                    @endif
                                </p>
                            </div>
                            <a href="{{route('a_search')}}"
                               class="btn btn-outline-info btn-oblong tx-11 tx-uppercase tx-mont tx-medium tx-spacing-1 pd-x-30 bd-2">See
                                more</a>
                        </div><!-- d-flex -->

                        <table class="table table-responsive table-valign-middle mg-b-0 text-capitalize">
                            <thead>
                            <tr>
                                <th>Pic</th>
                                <th>Reg. #</th>
                                <th>Name</th>
                                <th>Batch</th>
                                <th>D.O. Admission</th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($admissions as $admission)
                                <tr>
                                    <td class="pd-l-0-force">
                                        @isset($admission->a_dp)
                                            <img class="img-fluid wd-40 "
                                                 src="{{$admission->a_dp}}"
                                                 alt="">
                                        @endisset
                                        @empty($admission->a_dp)
                                            <img class="img-fluid wd-40 rounded-circle"
                                                 src="http://via.placeholder.com/300x300"
                                                 alt="">
                                        @endempty
                                    </td>
                                    <td>
                                        <strong>
                                            {{$admission->a_reg_id}}
                                        </strong>
                                    </td>
                                    <td>
                                        <h6 class="tx-inverse tx-14 mg-b-0">{{$admission->a_name}}</h6>
                                        <span class="tx-12">{{$admission->a_mobile}}</span>
                                    </td>
                                    <td>
                                        @foreach($admission->batches as $batch)
                                            <span class="badge badge-dark">
                                        {{$batch->b_name}}
                                    </span>
                                        @endforeach
                                    </td>
                                    <td>
                                        @if($admission->created_at != null)
                                            {{$admission->created_at->format('d-M-Y')}}
                                        @endif
                                    </td>

                                    <td>
                                        <v-single-sms
                                            :student="{{json_encode($admission)}}"
                                        ></v-single-sms>
                                    </td>

                                    <td class="pd-r-0-force tx-center">
                                        {{--<v-student--}}
                                        {{--:student="{{json_encode($admission)}}"--}}
                                        {{--></v-student>--}}
                                        <a href="{{url('misc/student/'.$admission->id)}}" class="tx-gray-600"><i
                                                class="icon ion-more tx-18 lh-0"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div><!-- card -->
                    <div class="card bd-0 shadow-base pd-30 mg-t-20">
                        <div class="d-flex align-items-center justify-content-between mg-b-30">
                            <div>
                                <h6 class="tx-13 tx-uppercase tx-inverse tx-semibold tx-spacing-1">Upcoming Recoveries
                                    of
                                    Students</h6>
                                <p class="mg-b-0"><i class="icon ion-calendar mg-r-5"></i>
                                    From
                                    @if($recoveries->min('created_at') != null)
                                        {{Carbon\Carbon::parse($recoveries->min('dueDate'))->format('M d Y')}}
                                        -
                                        {{Carbon\Carbon::parse($recoveries->max('dueDate'))->format('M d Y')}}
                                    @endif
                                </p>
                            </div>
                            <a href="{{route('f_recoveries')}}"
                               class="btn btn-outline-info btn-oblong tx-11 tx-uppercase tx-mont tx-medium tx-spacing-1 pd-x-30 bd-2">See
                                more</a>
                        </div><!-- d-flex -->

                        <table class="table table-responsive table-valign-middle mg-b-0 text-capitalize">
                            <tbody>
                            @foreach($recoveries as $recovery)
                                <tr>
                                    <td class="pd-l-0-force">
                                        @isset($recovery->a_dp)
                                            <img class="img-fluid wd-40 "
                                                 src="{{$recovery->a_dp}}"
                                                 alt="">
                                        @endisset
                                        @empty($recovery->a_dp)
                                            <img class="img-fluid wd-40 rounded-circle"
                                                 src="http://via.placeholder.com/300x300"
                                                 alt="">
                                        @endempty
                                    </td>
                                    <td>
                                        <h6 class="tx-inverse tx-14 mg-b-0">{{$recovery->a_name}}</h6>
                                        <span class="tx-14">
                                        <span class="badge badge-dark">
                                            {{$recovery->b_name}}
                                        </span>
                                        <span class="badge badge-dark">
                                    {{$recovery->b_timings}}
                                        </span>
                                     </span>
                                    </td>
                                    <td class="text-right tx-black">
                                        <strong>{{$recovery->instAmount}} Rs</strong>

                                    </td>
                                    <td class="text-center">
                                        @if($recovery->dueDate <  Carbon\Carbon::today()->sub(1,'day'))
                                            <span class="badge badge-danger">
                                        OverDue
                                    </span>
                                        @elseif($recovery->dueDate >= Carbon\Carbon::today()->sub(1,'day') && $recovery->dueDate <=
                                        Carbon\Carbon::today()->add(7,'day') )
                                            <span class="badge badge-warning">
                                        Upcoming
                                    </span>
                                        @else
                                            <span class="badge badge-primary">
                                        Normal
                                    </span>
                                        @endif
                                    </td>

                                    <td>{{ Carbon\Carbon::parse($recovery->dueDate)->format('d-M-Y')}}</td>

                                    <td class="pd-r-0-force tx-center">
                                        <a href="{{url('misc/student/'.$recovery->aid)}}" class="tx-gray-600"><i
                                                class="icon ion-more tx-18 lh-0"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div><!-- card -->

                </div><!-- col-9 -->
                <div class="col-md-4">

                    <div class="card bd-0 shadow-base pd-30">
                        <div class="d-flex align-items-center justify-content-between mg-b-30">
                            <div>
                                <h6 class="tx-13 tx-uppercase tx-inverse tx-semibold tx-spacing-1">Recent Queries</h6>
                                <p class="mg-b-0"><i class="icon ion-calendar mg-r-5"></i>
                                    @if($recentQueries->min('created_at') != null)
                                        {{$recentQueries->min('created_at')->format('M d Y')}}
                                        -
                                        {{$recentQueries->max('created_at')->format('M d Y')}}
                                    @endif
                                </p>
                            </div>

                        </div><!-- d-flex -->

                        <table class="table table-responsive table-valign-middle mg-b-0 text-capitalize">
                            <tbody>
                            @foreach($recentQueries as $recentQuery)
                                <tr>
                                    <td class="pd-l-0-force">
                                        <img src="http://via.placeholder.com/280x280" class="wd-40 rounded-circle"
                                             alt="">
                                    </td>
                                    <td>
                                        <h6 class="tx-inverse tx-14 mg-b-0">{{$recentQuery->q_name}}</h6>
                                        <span class="tx-12">{{$recentQuery->q_contact}}</span>
                                    </td>
                                    <td class="tx-10">{{$recentQuery->created_at->diffforhumans()}}</td>
                                    {{--<td class="pd-r-0-force tx-center"><a href="" class="tx-gray-600"><i class="icon ion-more tx-18 lh-0"></i></a></td>--}}
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <a href="{{route('q_search')}}" class="btn btn-outline-info btn-oblong mg-t-20  tx-11 tx-uppercase
                        tx-mont tx-medium
                    tx-spacing-1 pd-x-30 bd-2">See more</a>
                    </div><!-- card -->

                </div><!-- col-3 -->
            </div><!-- row -->

        </div>
    @endif
@endsection

@section('bottom')
    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{asset('js/components/v-monthlyBatchAdmissions.js')}}"></script>

@endsection
