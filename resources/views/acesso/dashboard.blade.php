@extends('layouts.mainDashboard')

@section('title', 'Dashbord')

<body>
    <input value="15" type="hiden">
    <!-- As a link -->
    <nav class="navBar">
        <h1>Dashboard</h1>
        <div class="navButtons">
            <form action="/" method="get">
                <button class="navButton" type="submit">Home</button>
            </form>

            <form action="/dashboard1" method="get">
                <button class="navButtonReload" type="submit">Recarregar</button>
            </form>
        </div>
    </nav>

    <div class="sideBar">
        <ul class="nav-links">

            <div class="toltip">
            <li>
                <a href="#card-section">
                        <i class='bx bxs-chart'></i>
                        <p class="link-text">Cards</p>
                    </a>
                </li>
            </div>

            <div class="toltip">
                <li>
                    <a href="#charts-section">
                        <i class='bx bxs-pie-chart-alt-2'></i>
                        <p class="link-text">Graficos</p>
                    </a>
                </li>
            </div>

            <div class="toltip">
                <li>
                    <a href="#table-section">
                        <i class='bx bx-table'></i>
                        <p class="link-text">Tabela</p>
                    </a>
                </li>
            </div>
        </ul>
    </div>
    {{-- @dump($graficoPizza->container()); --}}

    <div id="card-section"></div>
    <div class="session-charts">

        <div class="container-cards">

            <div id="positive-card" class="div-card">
                <h2>Satisfeitos:</h2>
                <h3>{{ $cardColorfull[0]['perTipoFeedback'] }}%</h3>
            </div>

            <div id="moreLass-card" class="div-card">
                <h2>Insatisfeitos:</h2>
                <h3>{{ $cardColorfull[1]['perTipoFeedback'] }}%</h3>
            </div>

            <div id="negative-card" class="div-card">
                <h2>Muito insatisfeitos:</h2>
                <h3>{{ $cardColorfull[2]['perTipoFeedback'] }}%</h3>
            </div>

            <div id="total-card" class="div-card">
                <h2>Total feedbacks:</h2>
                <h3>{{ $cardGray[0]['total'] }}</h3>
            </div>

        </div>

        <div id="charts-section"></div>
        <div class="container-charts">
            <div class="div-chart">
                <h2>Grafico de pizza</h2>
                {!! $graficoPizza->container() !!}
            </div>

            <div class="div-chart">
                <h2>Grafico de barra</h2>
                {!! $graficoBarra->container() !!}
            </div>
        </div>

        <div id="table-section"></div>
        <div class="container-table">
            <div class="div-table">
                <h1>Comentarios</h1>
                <table class="table">
                    <div class="filters">
                        <form action="/dashboard" method="get">
                            @csrf
                            <div class="selected-feedback">
                                <div class="selected-feedback-labels">
                                    <label>Tipo Feedback</label>
                                    <select class="select-class" id="formsTipoFeedback" name="tipoFeedback">
                                        <option value="1">Muito satisfeito</option>
                                        <option value="2">Insatisfeito</option>
                                        <option value="3">Muito insatisfeito</option>
                                    </select>
                                </div>
                                <input class="selectedButton" type="submit">
                            </div>
                        </form>

                        <form action="/dashboard" method="get">
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

                    <div class="table-links">

                        {{ $table->links('vendor.pagination.custom') }}
                    </div>
                    <tr>
                        <div class="titles-table">
                            <th id="simple-topic" class="topics">Tipo Feedback</th>
                            <th id="simple-topic" class="topics">Setor</th>
                            <th class="topics">Comentario</th>
                        </div>
                    </tr>

                    @if (isset($table) && $table->count())
                        @foreach ($table as $line)
                            <tr>
                                <td class="topics" id="simple-topic">
                                    {{ $line->tipoFeedback === '2' ? 'Insatisfeito' : ($line->tipoFeedback === '1' ? 'Satisfeito' : ($line->tipoFeedback === '3' ? 'Muito insatisfeito' : $line->tipoFeedback)) }}
                                </td>
                                <td id="simple-topic" class="topics">{{ $line->setor }}</td>
                                <td class="topics">{{ $line->comentario }}</td>
                            </tr>
                        @endforeach
                    @endif
                </table>

            </div>
        </div>

    </div>



    {{-- Include the chart's script --}}
    {!! $graficoPizza->script() !!}
    {!! $graficoBarra->script() !!}
</body>
