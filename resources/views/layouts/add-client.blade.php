@extends('maket.app')
@section('title') Добавление записи @endsection
@section('content')
    <div class="emptyspace">
        <div id="errors">
            <ul id="err_list">
            </ul>
        </div>
    </div>
    @include('inc.form')
    <script src="js/app.js"></script>
@endsection
