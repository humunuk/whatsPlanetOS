@extends('base')

@section('content')

    <div class="cotainer-fluid">
        <div class="row">
            <div class="col-md-5">
                <div id="mapId" style="height: 600px;"></div>
            </div>
            <div class="col-md-2">

            </div>
            <div class="col-md-5">

            </div>
        </div>
    </div>

@stop

@section('scripts')
    <script>
        var mymap = L.map('mapId', {center: [59.45, 24.76], zoom: 12});
        var marker = L.marker(mymap.getCenter(), {draggable: true}).addTo(mymap);
        var osmUrl='https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
        var osmAttrib='Map data © <a href="http://openstreetmap.org">OpenStreetMap</a> contributors';
        var osm = new L.TileLayer(osmUrl, {minZoom: 2, maxZoom: 14, attribution: osmAttrib});

        mymap.addLayer(osm);

        function onMapClick(e) {
            console.log(e.latlng);
            console.log(mymap.zoom);
            marker.setLatLng(e.latlng);
            marker.update();
        }

        mymap.on('click', onMapClick);

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