<div class="table">

    <table class="table">
        <thead>
        <tr>
            <th><strong>Nimi: </strong></th>
            <th><strong>Väärtus: </strong></th>
        </tr>
        </thead>

        <tbody>
        @foreach ($dataset as $key => $value)
            <tr>
                <td>{{trans("custom.".$key)}}</td>
                @if($key == 'resource')
                    <td><a href="{{$value}}">{{$value}}</a></td>
                @elseif ($key == 'refreshed')
                    <td>{{\Carbon\Carbon::parse($value)}}</td>
                @else
                    <td>{{$value}}</td>
                @endif
            </tr>
        @endforeach
        </tbody>
    </table>

</div>