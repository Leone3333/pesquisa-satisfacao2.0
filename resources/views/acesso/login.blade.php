@extends('layouts.mainLogin')

@section('title', 'Acesso')

<body>
    <div class="main-login">
        <div class="container-left">

            <div class="title-left">
                <h1>Bem vindo!<br>Acesse o sistema aqui</h1>
            </div>

            <div class="error">
                @if (session()->has('msgErro'))
                    <h2>{{ session()->get('msgErro') }}</h2>
                @endif
            </div>

            <div class="img">
                <img src="./img/Business.png" alt="imagem indisponivel">
            </div>

            {{-- container-left --}}
        </div>

        <div class="container-right">
            <div class="tilte-rigth">
                <h1>LOGIN</h1>

                <div class="logo">
                    <img src="./img/logo.png" alt="imagem indisponivel">
                </div>

                {{-- tilte-rigth --}}
            </div>

            <div class="forms">
                <form action="/login" method="post">
                    @csrf

                <div class="form-group">
                    <input id="input-form" name="email" type="text" placeholder=" " required>
                    <label id="input-label">Email</label>
                </div>

                <div class="form-group">
                    <input name="senha" type="text" placeholder=" " required>
                    <label for="">Senha</label>
                </div>

                <div class="form-button">
                    <button type="submit">Enviar</button>
                </div>
            </div>
            </form>
            {{-- container-right --}}
        </div>
        {{-- main-login --}}
    </div>

</body>
