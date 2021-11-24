<!doctype html>
<html lang="ru">
<head>
    <!-- Обязательные метатеги -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

    <title>Введите имя</title>
</head>
<body>

<div class="container mt-5">
    <h1>Ввод имени для смс сервиса</h1>
    <div class="row align-items-center mt-5">
        <div class="col-12">
            <form class="shadow p-3 mb-5 bg-white rounded" action="{{ route('name.store') }}" method="post">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="list-unstyled">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if(!empty($success))
                    <div class="alert alert-success">
                        <p>{{ $success }}</p>
                    </div>
                @endif

                @if(!empty($error))
                    <div class="alert alert-success">
                        <p>{{ $error }}</p>
                    </div>
                @endif

                @csrf
                <div class="mb-3">
                    <label for="nameUser" class="form-label">Имя</label>
                    <input pattern="[a-zA-z0-9]{3,11}" type="text" class="form-control" id="nameUser" name="nameUser"
                           aria-describedby="nameUserHelp">
                    <div id="nameUserHelp" class="form-text">Введите имя от 3 до 11 символов</div>
                </div>
                <button type="submit" class="btn btn-primary">Отправить</button>
            </form>
        </div>
    </div>
</div>

<script src="{{ asset('assets/js/script.js') }}"></script>

</body>
</html>
