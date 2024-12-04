@extends('vendor.installer.layouts.master')

@section('title', trans('installer_messages.environment.title'))
@section('style')
    <link href="{{ asset('installer/helloarman-helper/helper.css') }}" rel="stylesheet"/>
    <style>
        .form-control{
            height: 14px;
            width: 100%;
            padding: 15px 15px !important;
            border-radius: 7px;
            font-size: 14px
        }
        .has-error{
            color: red;
        }
        .has-error input{
            color: black;
            border:1px solid red;
        }

        .help-block{
            font-size: 14px
        }
    </style>
@endsection
@section('container')
    <form method="post" action="{{ route('LaravelInstaller::environmentSave') }}" id="env-form">
        <div class="form-group">
            <label class="control-label">Hostname</label>

            <div class="col-sm-12">
                <input type="text" name="hostname" class="form-control" >
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Username</label>
            <div class="col-sm-12">
                <input type="text" name="username" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label  class="col-sm-2 control-label">Password</label>
            <div class="col-sm-12">
                <input type="password" class="form-control" name="password">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Database</label>
            <div class="col-sm-12">
                <input type="text" name="database" class="form-control">
            </div>
        </div>
        <div class="modal-footer mt-3">
            <div class="buttons">
                <button class="button" onclick="checkEnv();return false">
                    {{ trans('installer_messages.next') }}
                </button>
            </div>
        </div>
    </form>
    <script>
        function checkEnv() {
            $.easyAjax({
                url: "{!! route('LaravelInstaller::environmentSave') !!}",
                type: "GET",
                data: $("#env-form").serialize(),
                container: "#env-form",
                messagePosition: "inline"
            });
        }
    </script>
@stop
@section('scripts')
    <script src="{{ asset('installer/js/jQuery-2.2.0.min.js') }}"></script>
    <script src="{{ asset('installer/helloarman-helper/helper.js')}}"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
@endsection
