@extends('layouts.app')
@section('content')
    <messenger-paciente-component :user-id="{{auth()->id()}}"></messenger-paciente-component>
@endsection