@extends('layouts.app')

@section('content')
<b-container>
    <b-row align-h="center">
        <b-col cols="8">
            <b-card title="Inicio de sesion" class="my-3">

                @if ($errors->any())
                <b-alert show variant="danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </b-alert>
                @else
                <b-alert show>Por favor ingresa tus datos</b-alert>
                @endif

                <b-form method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}

                    <b-form-group
                        id="email"
                        label="Correo electronico"
                        label-for="email"
                        >
                    <b-form-input type="email" id="email" name="email" placeholder="example@dominio.com" value="{{ old('email') }}" required autofocus></b-form-input>
                    </b-form-group>

                    <b-form-group
                        id="password"
                        label="Contraseña"
                        label-for="password"
                        >
                    <b-form-input type="password" id="password" name="password" required></b-form-input>
                    </b-form-group>
                    <b-form-group>
                        <b-form-checkbox
                        name="Remember" {{ old('remember') ? 'checked="true"' : '' }}
                        >
                        Recordar sesion
                        </b-form-checkbox>
                    </b-form-group>
                        <b-button type="submit" variant="primary">
                            Ingresar
                        </b-button>

                        <b-button href="{{ route('password.request') }}" variant="link">
                            ¿Olvidaste tu contraseña?
                        </b-button>
                </b-form>
            </b-card>
        </b-col>
    </b-row>
</b-container>
@endsection
