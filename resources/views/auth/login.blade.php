@extends('layouts.app')

@section('content')
<b-container>
    <b-row align-h="center">
        


        <b-col cols="8">
            <b-card title="Inicio de sesion">
                <b-alert show>Por favor ingresa tus datos</b-alert>
                <b-form method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}

                    <b-form-group
                        id="email"
                        description="Nunca compartiremos tu correo"
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
                    <b-form-input type="password" id="password" name="password"  value="{{ old('password') }}" required></b-form-input>
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
