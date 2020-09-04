@extends('layout.layout')

@section('head')
    <title>Recoveries - CRM</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.3/flatpickr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.css">
    <link rel="stylesheet" href="{{asset('css/table.css')}}">
@endsection
@section('page')

    <div class="pd-30">
        <h4 class="tx-gray-800 mg-b-5">Student Recoveries</h4>
        <p class="mg-b-0">Recovery Reports</p>
    </div>

    <div class="br-pagebody mg-t-5 pd-x-30">
        <div class="row row-sm">
            {{--Admissions Records--}}
            <div class="col-sm-6 col-xl-3">
                <div class="bg-teal rounded overflow-hidden">
                    <div class="pd-25 d-flex align-items-center">
                        <i class="ion ion-earth tx-60 lh-0 tx-white op-7"></i>
                        <div class="mg-l-20">
                            <p class="tx-10 tx-spacing-1 tx-mont tx-medium tx-uppercase tx-white-8 mg-b-10">Week's
                                Recovery
                            </p>
                            <p class="tx-24 tx-white tx-lato tx-bold mg-b-2 lh-1">{{$weekRecoveries}}</p>
                            <span class="tx-11 tx-roboto tx-white-6">From Mon to Sat</span>
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
                            <p class="tx-10 tx-spacing-1 tx-mont tx-medium tx-uppercase tx-white-8 mg-b-10">OverDue
                                Recovery</p>
                            <p class="tx-24 tx-white tx-lato tx-bold mg-b-2 lh-1">{{$overDueRecoveries->count()}}</p>
                            <span class="tx-11 tx-roboto tx-white-6">Pending Recoveries</span>
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
                            <p class="tx-10 tx-spacing-1 tx-mont tx-medium tx-uppercase tx-white-8
                            mg-b-10">Month Recoveries</p>
                            <?php
                            $date = \Carbon\Carbon::now();
                            ?>
                            <p class="tx-24 tx-white tx-lato tx-bold mg-b-2 lh-1">{{$monthRecoveries}}</p>
                            <span class="tx-11 tx-roboto tx-white-6">{{$date->endOfWeek()->format('d M')}} to End of
                                Month</span>
                        </div>
                    </div>
                </div>
            </div><!-- col-3 -->
            <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
                <div class="bg-br-primary rounded overflow-hidden">
                    <div class="pd-25 d-flex align-items-center">
                        <i class="ion ion-pricetag tx-60 lh-0 tx-white op-7"></i>
                        <div class="mg-l-20">
                            <p class="tx-10 tx-spacing-1 tx-mont tx-medium tx-uppercase tx-white-8 mg-b-10">Next
                                Recoveries
                            </p>
                            <p class="tx-24 tx-white tx-lato tx-bold mg-b-2 lh-1">{{$nextRecoveries}}</p>
                            <span class="tx-11 tx-roboto tx-white-6"> After {{$date->endOfMonth()->format('d M Y')}}
                            </span>
                        </div>
                    </div>
                </div>
            </div><!-- col-3 -->
        </div><!-- row -->

        <div class="row mt-3">
            <div class="col-md-12">
                <div id="app">
                    <v-recovery-table
                            url="{{route("recovery.table.recoveryinit")}}"
                    >
                    </v-recovery-table>
                </div>
            </div>
        </div>





    </div>
@endsection

@section('bottom')

    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{asset('js/components/v-searchadmission.js')}}"></script>

@endsection