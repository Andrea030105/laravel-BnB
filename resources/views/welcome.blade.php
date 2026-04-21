@extends('layouts.app')
@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="col">
                <div class="d-flex justify-content-around align-items-center">
                    <a class="btn btn-danger w-25" href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
                    <a class="btn btn-danger w-25" href="{{ url('profile') }}">{{ __('Profile') }}</a>
                </div>
            </div>
        </div>
    </div>
@endsection
