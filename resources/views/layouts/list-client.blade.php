@extends('maket.app')
@section('title') Поиск человека @endsection
@section('content')
    <div class="container">
        <h1 class="my-md-5 my-4"> Поиск записей </h1>
        <div class="row">
            <div class="col-md-8">
                <form id="search-form">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="text" name="surname" class="form-control" placeholder=" ">
                        <label>Введите Фамилию</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" name="name" class="form-control" placeholder=" ">
                        <label>Введите Имя</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" name="otch" class="form-control" placeholder=" ">
                        <label>Введите Отчество</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="date" min="1940-01-01" max="{{ date("Y-m-d") }}" name="birthdate" class="form-control" placeholder=" ">
                        <label>Введите дату рождения</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" name="snils" class="form-control" placeholder=" ">
                        <label>Введите СНИЛС</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" name="polis" class="form-control" placeholder=" ">
                        <label>Введите полис ОМС</label>
                    </div>
                    <div class="mybutton">
                        <button class="btn btn-primary" type="submit">Искать</button>
                        <a href="{{ route('client-export') }}" type="button" class="btn btn-success">Выгрузка в Excel</a>
                    </div>
                </form>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table" id="excel-table">
                <thead>
                <tr>
                    <th scope="col">Фамилия</th>
                    <th scope="col">Имя</th>
                    <th scope="col">Отчество</th>
                    <th scope="col">Дата рождения</th>
                    <th scope="col">СНИЛС</th>
                    <th scope="col">Полис ОМС</th>
                </tr>
                </thead>
                <tbody id="search-result">

                </tbody>
            </table>
        </div>
    </div>
    <script src="js/search.js"></script>
@endsection
