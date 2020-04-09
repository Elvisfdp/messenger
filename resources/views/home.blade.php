@extends('layouts.app')

@if (Auth::user()->level==2)
@section('content')
<a href="#"
    onClick="window.open('/chatMedicos','width=1366px,height=650px,menubar=no,scrollbars=yes,toolbar=no,location=no,directories=no,resizable=no,top=50,left=100')">
    Chatear con un medico
</a>
<a href="#"
    onClick="window.open('/chatPacientes','width=1366px,height=650px,menubar=no,scrollbars=yes,toolbar=no,location=no,directories=no,resizable=no,top=50,left=100')">
    Chatear con un paciente
</a>
@endsection
@else
@section('content')
    <messenger-component :user-id="{{auth()->id()}}"></messenger-component>
@endsection
@endif

