@extends('layout.layout')

@section('head')
    <title>Admission Finance - CRM</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.3/flatpickr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.css">
    <link rel="stylesheet" href="{{asset('css/table.css')}}">
@endsection

@section('page')

    <div id="" class="pd-30">
        <h4 class="tx-gray-800 mg-b-5">Finance Reports</h4>
        <p class="mg-b-0">Expenses Records and details</p>
    </div>

    <div class="br-pagebody mg-t-5 pd-x-30" id="app">

        <v-expenses-table
                url="{{route("expense.table.expenseinit")}}">

        </v-expenses-table>

    </div>


@endsection

@section('bottom')
    <script src="{{asset('js/app.js')}}"></script>

@endsection
