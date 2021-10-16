@extends('layouts.admin')

@section('content')
    @include('admin.parts._widget')
    @include('admin.parts._sendNotify')
    @include('admin.parts._runJob')
    @include('admin.parts._export')
    @include('admin.parts._sendJobsMail')
    @include('admin.parts._users')
    @include('admin.parts._messages')
@endsection