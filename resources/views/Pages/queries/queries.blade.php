@extends('layout.layout')

@section('head')
    <title>Queries</title>
    <link rel="stylesheet" href="{{asset('lib/datatables/jquery.dataTables.css')}}">
@endsection
@section('page')

    <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
        <h4 class="tx-gray-800 mg-b-5">Queries Record</h4>
        <p class="mg-b-0">Query records for the last 30 days.</p>
    </div>
    <div class="br-pagebody">
        <div class="br-section-wrapper">
            <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10">Basic Responsive DataTable</h6>
            <p class="mg-b-25 mg-lg-b-50">Searching, ordering and paging goodness will be immediately added to the table, as shown in this example.</p>

            <div class="table-wrapper">
                <table id="datatable1" class="table display responsive nowrap">
                    <thead>
                    <tr>
                        <th class="wd-15p">Query Name</th>
                        <th class="wd-20p">Phone #</th>
                        <th class="wd-15p">Email Address</th>
                        <th class="wd-10p">Courses</th>
                        <th class="wd-25p">Timings</th>
                        <th class="wd-25p">Date of Visit</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($queries as $query)

                    <tr>
                        <td>{{$query->q_name}}</td>
                        <td>{{$query->q_contact}}</td>
                        <td>{{$query->q_email}}</td>
                        <td>Courses</td>
                        <td>{{$query->q_session_type}}</td>
                        <td>{{$query->created_at}}</td>
                    </tr>

                    @endforeach
                    </tbody>
                </table>
            </div><!-- table-wrapper -->

        </div>
    </div>
            @endsection

@section('bottom')
    {{--<script src="https://cdn.jsdelivr.net/npm/vue"></script>--}}
    {{--<script>--}}
        {{--var app = new Vue({--}}
            {{--el: '#queryPage',--}}
            {{--data: {--}}
                {{--toggle: false,--}}
                {{--message: 'Some Message'--}}
            {{--}--}}
        {{--})--}}
    {{--</script>--}}
    <script src="{{asset('lib/datatables/jquery.dataTables.js')}}"></script>
    <script>
        jQuery('#datatable1').DataTable({
            responsive: true,
            language: {
                searchPlaceholder: 'Search...',
                sSearch: '',
                lengthMenu: '_MENU_ items/page',
            }
        });
    </script>
@endsection