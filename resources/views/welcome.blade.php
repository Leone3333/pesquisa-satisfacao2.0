@extends('layouts.main')

@section('title', 'satisfacao')

<body>
    <div class="container">
        <div class="title">
            <h1>Deixe sua opinião!</h1>
        </div>

        <div id="" class="container-buttons">
            <form action="/comentarios" method="post">
                @csrf
                <div class="section-buttons">
                    <div class="button-label-container">
                        <button name="valor" id="smile-button" class="button-emoji" value=1 type="submit">&#128578;</button>
                        <label id="" class="smile-label" for="">Muito agradavel!</label>
                    </div>
            </form>

            <form action="/comentarios" method="post">
                @csrf
                <div class="button-label-container">
                    <button name="valor" id="morelas-button" class="button-emoji" value=2 type="submit">&#128528;</button>
                    <label id="" class="morelas-label" for="">Mais ou menos.</label>
                </div>
            </form>

            <form action="/comentarios" method="post">
                @csrf
                <div class="button-label-container">
                    <button name="valor" id="bad-button" value=3 class="button-emoji" type="submit">&#128577;</button>
                    <label id="" class="bad-label" for="">Poderia ser melhor.</label>
                </div>
        </div>
        </form>
    </div>
    </div>

</body>

</html>
