@extends('layout.layout')

@section('head')
    <title>
        Create Query</title>
    <link rel="stylesheet" href="https://unpkg.com/vue-multiselect@2.1.0/dist/vue-multiselect.min.css">

@endsection

@section('page')
    <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
        <h4 class="tx-gray-800 mg-b-5">New Query</h4>
        <p class="mg-b-0">Create New Queries from here.</p>
    </div>

    <div id="app" class="br-pagebody">
        <div class="br-section-wrapper">
            <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10">Query Format</h6>
            <p class="mg-b-30 tx-gray-600">Query form.</p>


            <v-createquery
                    :courses="{{json_encode($courses)}}"
            ></v-createquery>

        </div><!-- br-section-wrapper -->
    </div>
@endsection


@section('bottom')
    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{asset('js/components/v-createquery.js')}}"></script>
@endsection