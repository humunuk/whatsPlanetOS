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
                <form action="{{URL::action('Controller@getDetails')}}" class="form-group" id="search">
                    <select name="availableApis" id="apis" class="form-control">
                        <option value="copernicus_goba_global_weekly">Global Ocean Biogeochemical analysis</option>
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
                            <input type="text" class="form-control" id="depth" placeholder="Mitu">
                        </div>
                    </div>
                    <button class="btn btn-success form-control" type="submit" style="margin: 6px;">Otsi</button>
                </form>
                <div class="table">
                    <table class="table">
                        <thead>
                        @foreach($datasetDetails['entries'] as $details)
                            @foreach($details['data'] as $key => $value)
                                <th>{{$key}}</th>
                            @endforeach
                        @endforeach
                        </thead>

                        <tbody>
                        @foreach($datasetDetails['entries'] as $details)
                            @foreach($details['data'] as $key => $value)
                                <td>{{round($value, 2)}}</td>
                            @endforeach
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@stop

@section('scripts')
    <script>
        var mymap = L.map('mapId', {
            center : [59.45, 24.76],
            zoom : 12
        });
        L.graticule({interval: 0.5}).addTo(mymap);
        var center = mymap.getCenter();
        var marker = L.marker(center, {draggable : true}).addTo(mymap);
        var osmUrl = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
        var osmAttrib = 'Map data © <a href="http://openstreetmap.org">OpenStreetMap</a> contributors';
        var osm = new L.TileLayer(osmUrl, {
            minZoom : 2,
            maxZoom : 14,
            attribution : osmAttrib
        });
        var lat = $("#lat");
        var lng = $("#lng");
        var depth = $("#depth");
        var form = $("#search");
        var alert = $(".alert");

        mymap.addLayer(osm);

        function onMapClick(e) {
            var pos = e.latlng;
            marker.setLatLng(pos);
            marker.update();

            setInputValues(e.latlng);
        }

        mymap.on('click', onMapClick);


        $(function() {

            form.on('submit', function(e) {
                e.preventDefault();
                var url = $(this).attr('action');
                $.ajax(url, {
                    type : 'post',
                    data : {
                        lat : lat.val(),
                        lng : lng.val(),
                        api : $('#apis').val()
                    },
                    headers : {
                        'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                    },
                    success : function(data) {
                        console.log(data);
                    },
                    error : function() {
                        alert.removeClass('hidden');
                    }
                })
            });

            lat.val(center.lat);
            lng.val(center.lng);
        });

        function setInputValues(latlng) {
            lat.val(latlng.lat.toFixed(2));
            lng.val(latlng.lng.toFixed(2));
        }

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