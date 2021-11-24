<!doctype html>
<html lang="ru">
<head>
    <!-- Обязательные метатеги -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css"
          integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <!-- Bootstrap CSS -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">


    <title>Изменение заявки №{{ $name->id }}</title>
</head>
<body>

<div class="container">
    <div class="row align-items-center mt-5">
        <h1 class="mt-5">Изменение заявки №{{ $name->id }}</h1>
        <form action="{{ route('name.update') }}" method='post' class="shadow p-3 mb-5 bg-white rounded">
            @csrf
            <input type="hidden" name="id" value="{{ $name->id }}">
            <div class="form-group mb-3">
                <label for="name">Имя</label>
                <input type="text" disabled class="form-control" id="name" value="{{ $name->name }}">
            </div>
            <div class="form-group mb-3">
                <label for="status" class="">Подтвердить</label>
                <input type="checkbox" name="status" @if($name->status) checked @endif class="form-check" id="status" value="Y">
            </div>
            <div class="form-group mb-3">
                <label for="reason_for_refusal">Причина отказа(если отказ то указать причину)</label>
                <input type="text" class="form-control" name="reason_for_refusal" id="reason_for_refusal" value="{{ $name->reason_for_refusal }}">
            </div>
            <button type="submit" class="btn btn-primary">Изменить</button>
        </form>
    </div>
</div>

<script src="{{ asset('assets/js/script.js') }}"></script>
</body>
</html>
