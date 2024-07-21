@extends('layouts.mainLogin')

@section('title', 'Dashbord')

<body>
    <h1>Dashbord</h1>
    {{--
    @dump($user);
    @dump($graficoPizza); --}}

    <form action="/dashboard" method="post">
        @csrf
        <label for="formulario"> <br>Feedbacks<br></label>
        <select id="formsTipoFeedback" name="tipoFeedback">
            <option value="1">Muito satisfeito</option>
            <option value="2">Insatisfeito</option>
            <option value="3">Muito insatisfeito</option>
        </select>
        <input type="submit">
    </form>

    <form action="/dashboard" method="post">
        @csrf
        <label for="formulario"> <br>Setores<br></label>
        <select id="formsSetor" name="setorFeedback">
            <option value="atendimento">atendimento</option>
            <option value="organização">organização</option>
            <option value="limpeza">limpeza</option>
            <option value="caixa">caixa</option>
            <option value="outros">outros</option>
        </select>
        <input type="submit">
    </form>


    <form action="/" method="get">
        <button type="submit">Home</button>
    </form>

    <form action="/dashboard" method="get">
        <button type="submit">Sair</button>
    </form>

    @if (isset($user))
        <table>
            <th>Email</th>
            <th>-----------</th>
            <th>Senha</th>
            <tr>
                <td>{{ $user['user']['email'] }}</td>
                <td>-----------</td>
                <td>{{ $user['user']['senha'] }}</td>
            </tr>
        </table>
    @endif

    @if (isset($table))
        <div class="table">

            @foreach ($table as $line)
                <h4 style="color: #000"> Tipo de feedback:
                    {{ $line['tipoFeedback'] === '2'
                        ? 'Insatisfeito'
                        : ($line['tipoFeedback'] === '1'
                            ? 'Satisfeito'
                            : ($line['tipoFeedback'] === '3'
                                ? 'Muito insatisfeito'
                                : $line['tipoFeedback'])) }}
                </h4>
                <h4 style="color: #000"> Setor: {{ $line['setor'] }}</h4>
                <h4 style="color: #000"> Comentario: {{ $line['comentario'] }}</h4>
                <hr style="color:bisque">
            @endforeach
        </div>
    @endif

    <div style="width: 500px" class="chartPie">
        <h2>Grafico de pizza</h2>
        {!! $graficoPizza->container() !!}
    </div>

    <div style="width: 500px" class="chartPie">
        <h2>Grafico de barra</h2>
        {!! $graficoBarra->container() !!}
    </div>




    {{-- Include the chart's script --}}
    {!! $graficoPizza->script() !!}
    {!! $graficoBarra->script() !!}
</body>
