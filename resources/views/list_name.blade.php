<!doctype html>
<html lang="ru">
<head>
    <!-- Обязательные метатеги -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css"
          integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <!-- Bootstrap CSS -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Список имен</title>
</head>
<body>

<div class="container">
    <div class="row align-items-center mt-5">
        <h1 class="mt-5">Таблица с заявками</h1>
        @if (count($names))
            <div class="col-12 shadow p-3 mb-5 bg-white rounded">
                <table class="table table-sm">
                    <thead>
                    <tr class="">
                        <th scope="col">#</th>
                        <th scope="col">Имя</th>
                        <th scope="col">Статус</th>
                        <th scope="col">Почему отказ</th>
                        <th scope="col">Дата статуса</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($names as $name)
                        <tr @if(!empty($name->status) && $name->status == false) class="alert-danger" @endif
                        @if(!empty($name->status) && $name->status == true) class="alert-success" @endif>
                            <th scope="row">{{ $name->id }}</th>
                            <td>{{ $name->name }}</td>
                            <td>{{ $name->status?'Подтверждено':'Отказ' }}</td>
                            <td>{{ $name->reason_for_refusal }}</td>
                            <td>{{ $name->date_status }}</td>
                            <td>
                                <a href="{{ route('name.showForm', ['id'=> $name->id]) }}"
                                class="btn btn-info">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div>
                    {{ $names->links() }}
                </div>
            </div>
        @else
            <div class="col-12 shadow p-3 mb-5 bg-white rounded">
                <h2>Нет заявок</h2>
            </div>
        @endif
    </div>
</div>

<script src="{{ asset('assets/js/script.js') }}"></script>

</body>
</html>
