@extends('vendor.installer.layouts.master')

@section('title', trans('installer_messages.welcome.title'))
@section('container')
    <p class="paragraph text-align-center">Welcome to Influtics</p>
    <div class="buttons">
        <a href="{{ route('LaravelInstaller::requirements') }}" class="button">{{ trans('installer_messages.next') }}</a>
    </div>
@stop
