@extends('layout.layout')

@section('head')
    <title>{{$student->a_name}} Info - CRM</title>
    <style>
        dt {
            display: inline-block;
            width: 33%;
        }

        dd {
            display: inline-block;
            width: 66%;
        }

        dl {
            /*display: flex;*/
        }

    </style>
    <link rel="stylesheet" href="https://unpkg.com/vue-multiselect@2.1.0/dist/vue-multiselect.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.css">
    <link rel="stylesheet" href="{{asset('css/table.css')}}">
@endsection
@section('page')

    <div id="" class="pd-x-30 pd-t-30">
        <h4 class="tx-gray-800 mg-b-5 text-capitalize">{{$student->a_name}} Information</h4>
        {{--<p class="mg-b-0">Admissions Reports and Sub Reports</p>--}}
    </div>

    <div id="app" class="br-pagebody pd-x-30">
        <div class="row ">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="p-1">

{{--                            <v-media-manager inline-template>--}}
{{--                                <div>--}}

{{--                                    --}}{{-- manager --}}
{{--                                    <div v-if="inputName">@include('MediaManager::extras.modal')</div>--}}

{{--                                    --}}{{-- items selector --}}
{{--                                    <media-modal item="cover" :name="inputName"></media-modal>--}}

{{--                                    --}}{{-- for editor --}}
{{--                                    @include('MediaManager::extras.editor')--}}

{{--                                    --}}{{-- form --}}
{{--                                    <div action="" method="">--}}
{{--                                        --}}{{-- cover --}}
{{--                                        <section class="text-center">--}}
{{--                                            @isset($student->a_dp)--}}
{{--                                                <img class="img-fluid" v-if="cover ==''" src="{{$student->a_dp}}"--}}
{{--                                                     alt="">--}}
{{--                                            @endisset--}}
{{--                                            @empty($student->a_dp)--}}
{{--                                                <img class="img-fluid" v-if="cover ==''"--}}
{{--                                                     src="http://via.placeholder.com/300x300"--}}
{{--                                                     alt="">--}}
{{--                                            @endempty--}}
{{--                                            <img v-else :src="cover" alt="" class="img-fluid">--}}
{{--                                            <input type="hidden" name="cover" :value="cover"/>--}}
{{--                                            <button @click="toggleModalFor('cover')" class="mt-2 button--}}
{{--                                        is-primary">--}}
{{--                                                <i class="fa fa-upload" aria-hidden="true"></i>--}}
{{--                                            </button>--}}
{{--                                        </section>--}}

{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </v-media-manager>--}}
                            <v-upload-dp
                                    :id= {{$student->id}}
                            ></v-upload-dp>
                        </div>

                        <ul class="list-unstyled tx-14 p-3 mb-0">
                            <li>
                                Reg #: {{$student->a_reg_id}}
                            </li>
                            <li>
                                Date of Admission: {{\Carbon\Carbon::parse($student->created_at)->format('d-m-Y') }}
                            </li>
                            <li>

                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card mg-t-20">
                    <div class="card-body text-center">
                        <v-edit-student
                                :student_id="{{$student->id}}"
                        ></v-edit-student>
                        <a onclick="return confirm('Are you sure? This is irreversible action. It will delete the ' +
                         'student with all of his information.')"
                           href="{{url
                        ('admissions/delete-student')}}/{{$student->id}}" class="btn btn-danger"><i
                                    class="fa
                        fa-trash"
                                    aria-hidden="true"></i>
                            Delete</a>
                    </div>
                </div>
            </div>

            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title tx-gray-600 text-uppercase mb-0 tx-22">
                            Student Personal Information
                        </div>
                        <hr class="my-2">
                        <div class="row">
                            <div class="col-md-6">
                                <dl>
                                    <dt>Name</dt>
                                    <dd>{{$student->a_name}}</dd>
                                    <dt>Father Name</dt>
                                    <dd>{{$student->a_father_name}}</dd>
                                    <dt>Date Of Birth</dt>
                                    <dd>{{\Carbon\Carbon::parse($student->a_dob)->format('d M Y')}}</dd>
                                    <dt>Age</dt>
                                    <dd>{{\Carbon\Carbon::parse($student->a_dob)->age }} Years Old</dd>
                                </dl>
                            </div>
                            <div class="col-md-6">
                                <dl>
                                    <dt>Mobile Number</dt>
                                    <dd>{{$student->a_mobile}}</dd>
                                    <dt>Email Address</dt>
                                    <dd>{{$student->a_email}}</dd>
                                </dl>
                                <ul class="list-inline tx-20 ">
                                    <li class="list-inline-item">
                                        <v-single-sms
                                                :student="{{json_encode($student)}}"
                                        ></v-single-sms>
                                    </li>
                                    <li class="list-inline-item">
                                        <i class="fa fa-envelope" aria-hidden="true"></i>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mg-t-20">
                    <div class="card-body">
                        <div class="card-title tx-gray-600 text-uppercase mb-0 tx-22">
                            Student Batches
                        </div>
                        <hr>
                        @foreach($student->batches as $batch)
                            <div class="row">
                                <div class="col-md-6">
                                    <dl>
                                        <dt>Batch Name:</dt>
                                        <dd>{{$batch->b_name}}</dd>
                                        <dt>Batch Time:</dt>
                                        <dd>{{$batch->b_timings}}</dd>
                                        <dt>Session Status</dt>
                                        <dd>
                                            @if($batch->pivot->completion_status==0)
                                                <span class="tag is-info">   Active</span>
                                            @elseif ($batch->pivot->completion_status==1)
                                                <span class="tag is-success">Completed</span>
                                            @elseif ($batch->pivot->completion_status==2)
                                                <span class="tag is-warning">Freeze</span>
                                            @elseif ($batch->pivot->completion_status==3)
                                                <span class="tag is-danger">Cancelled</span>
                                        @endif
                                    </dl>
                                </div>
                                <div class="col-md-6">
                                    <dl>
                                        <dt>Session Start:</dt>
                                        <dd>{{\Carbon\Carbon::parse($batch->pivot->session_start_date)->format('D
                                        d M Y')}}</dd>
                                        <dt>Session End:</dt>
                                        <dd>{{\Carbon\Carbon::parse($batch->pivot->session_end_date)->format('D
                                        d M Y')}}</dd>
                                        <dt>Recoveries Edit</dt>
                                        <dd>
                                        <!-- Batch ID : {{$batch->id}} -->
                                            <v-edit-finance-student
                                                    :batch_id="{{$batch->id}}"
                                                    :student_id="{{$student->id}}"
                                            ></v-edit-finance-student>
                                        </dd>
                                    </dl>
                                </div>
                            </div>
                            <table class="table table-valign-middle tx-gray-800">
                                <thead>
                                <tr>
                                    <th>Sr. #</th>
                                    <th class="text-right">Amount</th>
                                    <th class="text-right">Due Date</th>
                                    <th>Status</th>
                                    <th>Slip #</th>
                                    <th>Date Paid On</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($batch->fee($batch->pivot->id) as $fee)

                                    <tr style="background-color:rgba{{$fee->paid_status ? '(0,255,0,.1)' : '(255,0,0,.1)'}}">
                                        <td>{{$loop->iteration}}</td>
                                        <td class="text-right">{{$fee->instAmount}} Rs</td>
                                        <td class="text-right">{{\Carbon\Carbon::parse($fee->dueDate)->format('D
                                        d M Y')}}</td>
                                        <td>
                                            @if($fee->paid_status)
                                                Paid
                                            @else
                                                Not Paid
                                            @endif
                                        </td>
                                        @if($fee->paid_status)
                                            <td>
                                                {{$fee->slip_number}}
                                            </td>
                                            <td>
                                                {{\Carbon\Carbon::parse($fee->paidOn)->format('D
                                        d M Y')}}

                                            </td>
                                        @else
                                            <td colspan="2" class="text-center">
                                                <a onclick="return confirm('Are you sure? This is irreversible. Count' +
                                             ' the money again and then confirm.')"
                                                   href="{{url('finance/pay\/').$fee->id}}"
                                                   class="btn btn-sm
                                                btn-teal">Pay
                                                    Now</a>
                                            </td>
                                            <td><v-pay-recovery
                                                id="{{$fee->id}}"
                                                ></v-pay-recovery></td>
                                        @endif
                                    </tr>

                                @endforeach
                                </tbody>
                            </table>
                            <hr>
                        @endforeach
                    </div>
                </div>
            </div><!-- col-8 -->
        </div><!-- row -->

        <div class="row">
            <div class="col-md-12">
                <div class="card mg-t-20">
                    <div class="card-body">
                        <div class="card-title">
                            <h3>
                                Messages Record
                            </h3>
                        </div>
                        <table class="table table-valign-middle">
                            <thead>
                            <tr>
                                <th>
                                    Sr.#
                                </th>
                                <th>
                                    Message
                                </th>
                                <th>
                                    Date
                                </th>
                                <th>
                                    Status
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @isset($student->messages)
                                @foreach($student->messages as $message)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$message->m_text}}</td>
                                        <td>
                                            {{\Carbon\Carbon::parse($message->created_at)->format('D
                                                d M Y')}}
                                        </td>
                                        @if($message->m_status)
                                            <td class="text-center text-success">
                                                <i class="fa fa-check" aria-hidden="true"></i> Message Sent
                                            </td>
                                        @else
                                            <td class="text-center text-danger">
                                                <i class="fa fa-times" aria-hidden="true"></i> Error
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                            @endisset
                            @if (count($student->messages) ==0)
                                <tr>
                                    <td colspan="4" class="text-center">No Messages sent to this student so far</td>

                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('bottom')
    @stack('styles')
    @stack('scripts')
    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{asset('js/components/v-single-sms.js')}}"></script>
@endsection
