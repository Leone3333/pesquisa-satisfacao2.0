@extends('layouts.mainLogin')

@section('title', 'Dashbord')

<body>
    <h1>Dashbord</h1>

    @dump($user);
    @dump($graficoPizza);

    @if (isset($user))
    {{-- @foreach($user as $item)
        <table>
            <th>Email</th>
            <th>Senha</th>
            <tr>
                <td>{{$item->email}}</td>
                <td>{{ $item->senha }}</td>
            </tr>
        </table>
        @endforeach --}}

        <div style="width: 500px" class="chartPie">
            {{$graficoPizza}}
        </div>
    @endif
</body>
