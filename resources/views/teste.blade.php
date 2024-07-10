@extends('layouts.main')

@section('title', 'teste')

<body>
<div class="container">
    <div class="title">
        <h1>Deixe sua opnião</h1>
    </div>

    @if (isset($feedbacks))
        @dump($feedbacks);

        @foreach ($feedbacks as $feedback)
            <h4 style="color: aliceblue"> ID: {{$feedback->id}}</h4>
            <h4 style="color: aliceblue"> Tipo de feedback: {{$feedback->tipoFeedback}}</h4>
            <h4 style="color: aliceblue"> Setor: {{$feedback->setor}}</h4>
            <h4 style="color: aliceblue"> Comentario: {{$feedback->comentario}}</h4>
            <hr style="color:bisque">
        @endforeach

    @endif

</div>
</body>
</html>
