@extends('layout.layout')

@section('head')
    <title>
        Search Query</title>
    <link rel="stylesheet"
          href="{{asset('lib/select2/css/select2.min.css')}}">
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
            width: 95%;
            padding:0.65rem 0.75rem;
        }
        .full-top{
            z-index: 9999;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.3/flatpickr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.css">
    <style>
        .dropdown .dropdown-trigger .button.input .angle {
            right: 10px !important;
        }
        .modals .modal .modal-content{
            overflow: visible!important;
            width:auto!important;
        }

        .tagged span{
            align-items: center;
            border-radius: 4px;
            display: inline-flex;
            justify-content: center;
            line-height: 1.5;
            padding-left: 0.75em;
            padding-right: 0.75em;
            white-space: nowrap;
            background-color: #209cee;
            color: #fff;
            font-size: 0.8rem;
            font-weight: bold;
            height: 2em;
            box-shadow: 0 1px 1px rgba(10, 10, 10, 0.2);
        }
        .box ul{
            margin-bottom: 0!important;
        }
        .box .dropdown-content{
            padding:0px!important;
            box-shadow: none!important;
            color:#4a4a4a;
        }
        .box .dropdown-content .dropdown-item.is-active,.pagination-link.is-current{
            color:#fff!important;
        }
        .table{
            color: #4a4a4a !important;
            font-size:14px!important;
        }
        .vue-table .dropdown-menu{
            min-width: auto!important;
        }
        .vue-table label{
            margin-bottom:0px!important;
        }
        .dropdown.vue-select .dropdown-trigger .button.input .control-display .delete {
            right: 24px;
        }
        .dropdown.vue-select .dropdown-menu .dropdown-content .dropdown-item .label.tag {
            right: 10px;
        }
        .dropdown.vue-select .dropdown-trigger .button.input .control-display .field.is-grouped.is-grouped-multiline
        .control:last-child .tags:not(:last-child){
            margin-right: 3px;
        }
    </style>
@endsection


@section('page')
    <div id="paged" class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
        <h4 class="tx-gray-800 mg-b-5">
            Search a Query</h4>
        <p class="mg-b-0">
            Search the query using filters</p>
    </div>

    <div id="app" id="querySearch" class="br-pagebody">
        <v-table-data
        url="{{route("examples.table.queryinit")}}"
        :courses="{{$courses}}"
        ></v-table-data>

    </div>
@endsection


@section('bottom')


    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{asset('js/components/v-searchquery.js')}}"></script>



@endsection
