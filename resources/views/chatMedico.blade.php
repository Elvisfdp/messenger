@extends('layouts.app')
@section('content')
    <messenger-medico-component :user-id="{{auth()->id()}}"></messenger-medico-component>
@endsection