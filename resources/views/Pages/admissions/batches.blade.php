@extends('layout.layout')

@section('head')
    <title>
        Batch wise Students - CRM </title>
    <link rel="stylesheet" href="https://unpkg.com/vue-multiselect@2.1.0/dist/vue-multiselect.min.css">
@endsection
@section('page')

    <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
        <h4 class="tx-gray-800 mg-b-5">Students</h4>
        <p class="mg-b-0">in Active Batches</p>
    </div>

    <div id="app" class="br-pagebody">
        <div class="br-section-wrapper">

            @foreach($batches as $batch)
                <div id="accordion" class="accordion" role="tablist" aria-multiselectable="true">
                    <div class="card">
                        <div class="card-header" role="tab" id="headingOne">
                            <h6 class="mg-b-0">
                                <a data-toggle="collapse" data-parent="#accordion"
                                   href="#collapseOne{{$loop->iteration}}"
                                   aria-expanded="true" aria-controls="collapseOne" class="tx-gray-800 transition
                                   ">
                                    <div class="d-inline-block">
                                        {{sprintf("%02d", $loop->iteration)}}
                                        . {{$batch[0]->b_name}} {{$batch[0]->b_timings}}
                                    </div>
                                    <div class="d-inline-block text-right pull-right tx-14 "
                                         style="font-weight: 400;">
                                        ({{sprintf("%02d", $batch->count())}})
                                    </div>
                                </a>
                            </h6>
                        </div><!-- card-header -->

                        <div id="collapseOne{{$loop->iteration}}" class="collapse" role="tabpanel"
                             aria-labelledby="headingOne">
                            <div class="card-block pd-20">
                                <table class="table table-responsive">
                                    <thead>
                                    <tr>
                                        <th>Sr. No.</th>
                                        <th>Profile</th>
                                        <th>Student Name</th>
                                        <th>Reg #</th>
                                        <th>Mobile Number</th>
                                        <th>Email Address</th>
                                        <th>Session End Date</th>
                                        <th>Student</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($batch as $student)
                                        <tr>
                                            <td>
                                                {{$loop->iteration}}
                                            </td>
                                            <td>
                                                @isset($student->a_dp)
                                                    <img class="img-fluid wd-60 "
                                                         src="{{$student->a_dp}}"
                                                         alt="">
                                                @endisset
                                                @empty($student->a_dp)
                                                    <img class="img-fluid wd-40 rounded-circle"
                                                         src="http://via.placeholder.com/300x300"
                                                         alt="">
                                                @endempty
                                            </td>

                                            <td>
                                                {{$student->a_name}}
                                            </td>
                                            <td>
                                                @isset($student->a_dp)
                                                    {{$student->a_reg_id}}
                                                @endisset
                                            </td>
                                            <td>
                                                {{$student->a_mobile}}
                                            </td>
                                            <td>
                                                {{$student->a_email}}
                                            </td>
                                            <td>
                                                {{\Carbon\Carbon::parse($student->session_end_date)->format('d M Y')}}
                                            </td>
                                            <td class="pd-r-0-force tx-center">
                                                <a href="{{url('misc/student/'.$student->aid)}}" class="tx-gray-600"><i
                                                            class="icon ion-more tx-18 lh-0"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div><!-- card -->
                    <!-- ADD MORE CARD HERE -->
                </div><!-- accordion -->

            @endforeach
        </div>
    </div>
@endsection

@section('bottom')
    <script src="{{asset('js/app.js')}}"></script>
@endsection