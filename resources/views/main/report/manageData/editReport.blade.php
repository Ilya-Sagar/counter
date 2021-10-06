@extends('main.report.manageData.inner')

@section('main')
    <h3>{{ $report->month_ru }}, {{ $report->year }}</h3>

    <form action="{{ route('attends.createOrUpdate') }}" method="post" class="mt-3">
        @csrf

        <select name="visitor_id" id="" class="form-select">
            @foreach($visitors as $visitor)
                <option value="{{ $visitor->id }}">{{ $visitor->name }}</option>
            @endforeach
        </select>

        <input type="number" class="mt-3 form-control" name="day" placeholder="День">

        <select name="attendType_id" id="" class="mt-3 form-select">
            @foreach($attendTypes as $attendType)
                <option value="{{ $attendType->id }}">{{ $attendType->name }}</option>
            @endforeach

        </select>

        <input type="hidden" name="reportCard_id" value="{{ $report->id }}">
        <input type="submit" class="container mt-3 btn btn-primary" value="Сохранить">
    </form>
@endsection
