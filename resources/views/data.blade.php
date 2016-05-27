@extends('base')

@section('content')

    <div class="cotainer-fluid">
        <div class="row">
            <div class="col-md-5">
                <div id="mapId" style="height: 600px;"></div>
            </div>
            <div class="col-md-7">
                <div class="alert alert-danger hidden">
                    Kontrolli üle, et väljades oleksid numbrid ja mingit muud jama ei oleks.
                </div>
                <form action="{{URL::action('Controller@postDetails')}}" class="form-group" id="search">
                    <select name="availableApis" id="apis" class="form-control">
                        @foreach($datasets as $dataset)
                            <option value="{{$dataset->name}}">{{$dataset->title}}</option>
                        @endforeach
                    </select>
                    <div class="form-group" style="margin-top: 5px;">
                        <div class="col-sm-4">
                            Latitude:
                            <input type="text" class="form-control" id="lat" placeholder="Latitude">
                        </div>
                        <div class="col-sm-4">
                            Longitude:
                            <input type="text" class="form-control" id="lng" placeholder="Longitude">
                        </div>
                        <div class="col-sm-4">
                            Mitu:
                            <input type="text" class="form-control" id="depth" placeholder="Mitu" value="1">
                        </div>
                    </div>
                    <button class="btn btn-success form-control" type="submit" style="margin: 6px;">Otsi</button>
                </form>
                <div>
                    <ul class="nav nav-tabs">
                        <li><a href="#metaData" data-toggle="tab">Meta info</a></li>
                        <li class="active"><a href="#details" data-toggle="tab">Detailne info</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="metaData" class="tab-pane">
                            @include('elem.meta', ['dataset' => $dataset[0]])
                        </div>
                        <div id="details" class="tab-pane active js-details">
                            @include('elem.table', ['datasetDetails' => $datasetDetails])
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
@section('scripts')
    @include('elem.map')
    @include('elem.search')
    <script>

        //        var ctx = $("#myChart");
        //        var myChart = new Chart(ctx, {
        //            type: 'bar',
        //            data: {
        //                labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
        //                datasets: [{
        //                    label: '# of Votes',
        //                    data: [12, 19, 3, 5, 2, 3]
        //                }]
        //            },
        //            options: {
        //                scales: {
        //                    yAxes: [{
        //                        ticks: {
        //                            beginAtZero:true
        //                        }
        //                    }]
        //                }
        //            }
        //        });
    </script>
@append