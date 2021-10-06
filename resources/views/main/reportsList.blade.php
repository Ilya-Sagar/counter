@extends('root-inner')

@section('main')
    <a href="{{ route('reports.create-form') }}" class="btn btn-primary">+ Табель</a>
    @foreach($reports as $report)
        <a href="{{ route('reports.show', ['id' => $report->id]) }}" class="mt-3 btn btn-primary">{{ $report->month_ru }}, {{ $report->year }}</a>
    @endforeach
@endsection
