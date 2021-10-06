@extends('main.report.manageData.inner')

@section('main')
    <form action="{{ route('visitors.create') }}" method="post">
        @csrf
        <input type="text" class="form-control" name="name" placeholder="ФИО">
        <input type="text" class="mt-3 form-control" name="account_number" placeholder="Счет">
        <input type="text" class="mt-3 form-control" name="payment" placeholder="Ежемесячная плата">
        <input type="submit" class="container mt-3 btn btn-primary" value="Добавить">
    </form>
@endsection
