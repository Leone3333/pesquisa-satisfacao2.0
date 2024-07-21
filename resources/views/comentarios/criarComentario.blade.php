@extends('layouts.mainCriarComentario')

@section('title', 'Deixe seu comentario')

<body>
    <div class="container">
        <div class="title">
            <h1>Diga como podemos melhorar!</h1>
        </div>
        <div class="form-container">

            <div class="formulario">
                <form action="/comentarios/criarComentarios/" method="post">
                    @csrf
                    @if (isset($feedbackStatus))
                        <div class="inputs">
                            @if ($feedbackStatus['valor'] == '1')
                                <label style="color: #050820e0" for="setores">Qual você consideraria nosso ponto forte?</label>
                                <input name="setores" list="setores" type="text"
                                    placeholder="Digite ou escolha as opções" required>
                                <datalist id="setores">
                                    <option value="atendimento">atendimento</option>
                                    <option value="organização">organização</option>
                                    <option value="limpeza">limpeza</option>
                                    <option value="caixa">caixa</option>
                                </datalist>
                        </div>
                    @else
                        <div class="inputs">
                            <label style="color: #050820e0" for="setores">Onde você acha que deveriamos
                                melhorar?</label>
                            <input name="setores" list="setores" type="text"
                                placeholder="Digite ou escolha as opções" required>
                            <datalist id="setores">
                                <option value="atendimento">atendimento</option>
                                <option value="organização">organização</option>
                                <option value="limpeza">limpeza</option>
                                <option value="caixa">caixa</option>
                            </datalist>
                        </div>
                    @endif
                @else
                    <h1 style="color: rgb(255, 146, 3)">ERRO NO ENVIO</h3>
                        @endif

                        <div class="inputs">
                            <label style="color: #050820e0" for="comentarioFeedback">Digite sugestões para
                                nossos colaboradores</label>
                            <textarea placeholder="Digite um comentario" name="comentarioFeedback" rows="4" required></textarea>
                        </div>
                        <input name="feedbackStatus" value="@php echo $feedbackStatus['valor']; @endphp" type="hidden">

                        <div class="button-container">
                            <button type="submit">Enviar</button>
                        </div>
                </form>
            </div>
        </div>

        <div class="rodape-container">
            <h3 style="color: aliceblue">Aqui sua opinião importa!</h3>
        </div>
    </div>
</body>

</html>
