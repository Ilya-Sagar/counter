@extends('main.report.inner')

@section('main')
    <h3>{{ $report->month }}, {{ $report->year }}</h3>

    <a href="{{ route('attends.createOrUpdateForm', $report->id) }}" class="mt-3 btn btn-primary">Редактировать</a>
    <a href="{{ route('attends.detailReport', $report->id) }}" class="mt-3 btn btn-primary">Показать отчет</a>
    <a href="{{ route('visitors.create-form') }}" class="mt-3 btn btn-primary">Добавить ребенка</a>
@endsection
