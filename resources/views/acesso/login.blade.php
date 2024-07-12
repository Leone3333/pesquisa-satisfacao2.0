@extends('layouts.mainLogin')

@section('title', 'Acesso')

<body>
    <div class="main-login">

        @if (session()->has('msgErro'))
            <h2>{{session()->get('msgErro')}}</h2>
        @endif

        <h1>Bem vindo!<br>Acesse o sistema aqui</h1>

        <div class="main-login-right">
            <h1>LOGIN</h1>
            <form action="/login" method="post">
                @csrf
                <div class="form-group">
                    <label for="">Email</label>
                    <input name="email" type="text">
                </div>

                <div class="form-group">
                    <label for="">Senha</label>
                    <input name="senha" type="text">
                </div>

                <div class="form-button">
                    <button type="submit">Enviar</button>
                </div>
            </form>
        </div>
    </div>

</body>
