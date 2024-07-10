@extends('layouts.mainCriarComentario')

@section('title', 'Deixe seu comentario')

<body>
    <div class="container">
        <div class="form-container">
            <div class="title">
                <h1>Diga como podemos melhorar!</h1>
            </div>


            <div class="formulario">
                <form action="/comentarios/criarComentarios/" method="post">
                    @csrf
                    @if (isset($feedbackStatus))
                        <div class="inputs">
                            @if ($feedbackStatus['valor'] == '1')
                                <label style="color: antiquewhite" for="setores">Qual você diria ter sido o ponto forte
                                    na sua experiencia conosco?</label>
                                <input name="setores" list="setores" type="text"
                                    placeholder="Digite ou escolha as opções">
                                <datalist id="setores">
                                    <option value="atendimento">atendimento</option>
                                    <option value="organização">organização</option>
                                    <option value="limpeza">limpeza</option>
                                    <option value="caixa">caixa</option>
                                </datalist>
                        </div>
                    @else
                        <div class="inputs">
                            <label style="color: antiquewhite" for="setores">Onde voces acham que deveriamos
                                melhorar?</label>
                            <input name="setores" list="setores" type="text"
                                placeholder="Digite ou escolha as opções">
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
                            <label style="color: antiquewhite" for="comentarioFeedback">Digite sugestões ou elogios para
                                nossos gestores</label>
                            <textarea name="comentarioFeedback" rows="4"></textarea>
                        </div>
                        <input name="feedbackStatus" value="@php echo $feedbackStatus['valor']; @endphp" type="hidden">

                        <div class="button-container">
                            <button type="submit">Enviar</button>
                        </div>
                </form>

                <div class="rodape-container">
                    <h3 style="color: antiquewhite">Aqui sua opinião importa!</h3>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
