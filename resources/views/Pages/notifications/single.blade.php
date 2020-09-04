@extends('layout.layout')

@section('head')
    <title>
        SMS & Email Notification - CRM </title>
    <link rel="stylesheet" href="https://unpkg.com/vue-multiselect@2.1.0/dist/vue-multiselect.min.css">
@endsection
@section('page')

    <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
        <h4 class="tx-gray-800 mg-b-5">SMS & Email Notification</h4>
    </div>

    <div id="app" class="br-pagebody">
        <div class="br-section-wrapper">
            <div class="form-layout form-layout-1">
                <div class="row mg-b-25">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label">Mobile Number<span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="firstname" value="John Paul" placeholder="Enter firstname">
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label">Email Address<span class="tx-danger">*</span></label>
                            <input class="form-control" type="email" name="lastname" value="McDoe" placeholder="Enter
                            lastname">
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-12">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label">Mail Address: <span class="tx-danger">*</span></label>
                            <textarea class="form-control" name="" id="" cols="30" rows="10"></textarea>
                        </div>
                </div><!-- row -->

                <div class="form-layout-footer">
                    <button class="btn btn-info">Submit Form</button>
                    <button class="btn btn-secondary">Cancel</button>
                </div><!-- form-layout-footer -->
            </div>
        </div>
    </div>
@endsection

@section('bottom')
    <script src="{{asset('js/app.js')}}"></script>
@endsection