@extends('main.report.manageData.inner')

@section('main')
    <table>
        {{--headers--}}
        <tr class="border">
            <td class="border">Ребенок</td>
            @for($i=1; $i<=$daysInMonth; $i++)
                <td class="border">{{ $i }}</td>
            @endfor
            @foreach($attendTypes as $attendType)
                <td class="border">{{ $attendType->name }}</td>
            @endforeach
            <td class="border">общ.нет</td>
            <td class="border">общ.есть</td>
        </tr>

        {{--visitors--}}
        @foreach($visitors as $visitor)
            <tr class="border">
                {{--show names--}}
                <td class="border">{{ $visitor }}</td>
                {{--show month attends--}}
                @for($i=1; $i<=$daysInMonth; $i++)
                    <td class="border">{{ $visits[$visitor]['days'][$i] }}</td>
                @endfor
                {{--show attend types--}}
                @foreach($attendTypes as $attendType)
                    <td class="border">{{ $visits[$visitor]['attend'][$attendType->name] }}</td>
                @endforeach
                {{--show total attends--}}
                <td class="border">{{ $visits[$visitor]['attend']['общ.нет'] }}</td>
                <td class="border">{{ $visits[$visitor]['attend']['общ.есть'] }}</td>
            </tr>
        @endforeach
    </table>
@endsection
