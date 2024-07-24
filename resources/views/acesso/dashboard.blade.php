@extends('layouts.mainDashboard')

@section('title', 'Dashbord')

<body>
    <!-- As a link -->
    <nav class="navBar">
        <h1>Dashboard</h1>
        <div class="navButtons">
            <form action="/" method="get">
                <button class="navButton" type="submit">Home</button>
            </form>

            <form action="/dashboard" method="get">
                <button class="navButtonReload" type="submit">Recarregar</button>
            </form>
        </div>
    </nav>


    {{-- @dump($graficoPizza->container()); --}}

    <div class="container-charts">
        <div class="div-table">
            <h1>Comentarios</h1>
            <table class="table">
                <div class="filters">
                    <form action="/dashboard" method="post">
                        @csrf
                        <div class="selected-feedback">
                    <div class="selected-feedback-labels">
                        <label>Feedbacks</label>
                        <select class="select-class" id="formsTipoFeedback" name="tipoFeedback">
                            <option value="1">Muito satisfeito</option>
                            <option value="2">Insatisfeito</option>
                            <option value="3">Muito insatisfeito</option>
                        </select>
                    </div>
                        <input class="selectedButton" type="submit">
                    </div>
                    </form>

                    <form action="/dashboard" method="post">
                        @csrf
                        <div class="selected-feedback">
                            <div class="selected-feedback-labels">
                        <label for="formulario">Setores</label>
                        <select id="formsSetor" name="setorFeedback">
                            <option value="atendimento">atendimento</option>
                            <option value="organização">organização</option>
                            <option value="limpeza">limpeza</option>
                            <option value="caixa">caixa</option>
                            <option value="outros">outros</option>
                        </select>
                            </div>
                        <input class="selectedButton" type="submit">
                    </div>
                    </form>
                </div>

                <tr>
                    <th>Tipo Feedback</th>
                    <th>Setor</th>
                    <th>Comentario</th>
                </tr>

                @if (isset($table))
                    @foreach ($table as $line)
                        <tr>
                            <td>
                                {{ $line['tipoFeedback'] === '2'
                                    ? 'Insatisfeito'
                                    : ($line['tipoFeedback'] === '1'
                                        ? 'Satisfeito'
                                        : ($line['tipoFeedback'] === '3'
                                            ? 'Muito insatisfeito'
                                            : $line['tipoFeedback'])) }}
                            </td>

                            <td>{{ $line['setor'] }}</td>

                            <td>{{ $line['comentario'] }}</td>
                    @endforeach
                @endif
                </tr>
            </table>
        </div>

        <div style="width: 500px" class="chartPie">
            <h2>Grafico de pizza</h2>
            {!! $graficoPizza->container() !!}
        </div>

        <div style="width: 500px" class="chartPie">
            <h2>Grafico de barra</h2>
            {!! $graficoBarra->container() !!}
        </div>
    </div>



    {{-- Include the chart's script --}}
    {!! $graficoPizza->script() !!}
    {!! $graficoBarra->script() !!}
</body>
