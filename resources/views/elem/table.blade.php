<div class="table">
    <table class="table">
        <tr>
            @foreach($datasetDetails['entries'] as $details)
                @foreach($details['axes'] as $key => $value)
                    <th>{{trans('custom.'.$key)}}</th>
                @endforeach
            @endforeach
        </tr>
        <tr>
            @foreach($datasetDetails['entries'] as $details)
                @foreach($details['axes'] as $key => $value)
                    @if ($key == 'time')
                        <td>{{\Carbon\Carbon::parse($value)}}</td>
                    @elseif($key == 'z')
                        <td>{{round($value, 2)}}</td>
                    @else
                        <td>{{$value}}</td>
                    @endif
                @endforeach
            @endforeach
        </tr>
    </table>
    <table class="table">
        <thead>
        @foreach($datasetDetails['entries'] as $details)
            @foreach($details['data'] as $key => $value)
                <th>{{trans('custom.'.$key)}}</th>
            @endforeach
        @endforeach
        </thead>

        <tbody>
        <tr>
            @foreach($datasetDetails['entries'] as $details)
                @foreach($details['data'] as $key => $value)
                    <td>{{round($value, 2)}}</td>
                @endforeach
            @endforeach
        </tr>
        </tbody>
    </table>
</div>