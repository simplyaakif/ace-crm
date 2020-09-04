@extends('layout.layout')

@section('head')
    <title>
        New Admission</title>
    <link rel="stylesheet" href="https://unpkg.com/vue-multiselect@2.1.0/dist/vue-multiselect.min.css">
    <style>
        .setupDate{
            padding: 0 !important;
        }
        .setupDate div:first-child{
            width:100%;
        }
        .setupDate div:first-child input{
            border:0px;
            width: 90%;
            padding:0.65rem 0.75rem;
        }
        .full-top{
            z-index: 9999;
        }
    </style>
@endsection

@section('page')
    <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
        <h4 class="tx-gray-800 mg-b-5">New Admission</h4>
        <p class="mg-b-0">Create New Admissions from here.</p>
    </div>

    <div id="app" class="br-pagebody">
        <div class="br-section-wrapper">
            <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10">Admission Format</h6>
            <p class="mg-b-30 tx-gray-600">Admission form.</p>

                <v-createadmission
                :batches="{{json_encode($batches)}}"
                ></v-createadmission>

        </div><!-- br-section-wrapper -->
    </div>
@endsection


@section('bottom')
    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{asset('js/components/v-createadmission.js')}}"></script>
@endsection