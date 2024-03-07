@extends('errors.minimal-layout')
@section('title', '403 ' . __('Unauthorized Action'))
@section('code', '403')
@section('name', __('Unauthorized Action'))

@section('message')
    {!! $message!!}
@endsection
