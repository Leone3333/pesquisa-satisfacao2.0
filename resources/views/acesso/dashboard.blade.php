@extends('layouts.mainLogin')

@section('title', 'Dashbord')

<body>
    <h1>Dashbord</h1>
    {{--
    @dump($user);
    @dump($graficoPizza); --}}

    <form action="/dashboard/filtro" method="post">
        <label for="formulario"> <br>Feedbacks<br></label>
        <select id="forms_" name="feedback">
            <option value="1">Muito satisfeito</option>
            <option value="2">Insatisfeito</option>
            <option value="3">Muito insatisfeito</option>
        </select>
        <input type="submit" value="enviar">
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
