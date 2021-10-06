@extends('main.inner')

@section('main')
    <form action="{{ route('reports.create') }}" method="post">
        @csrf
        <input type="text" class="form-control" name="month_ru" placeholder="Месяц отчета">
        <input type="number" min="1000" max="9999" class="mt-3 form-control" name="year" placeholder="Год отчета">
        <input type="submit" class="container mt-3 btn btn-primary" value="Добавить">
    </form>
@endsection
