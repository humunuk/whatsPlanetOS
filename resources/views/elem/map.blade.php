<script>
    //Initiate map and add default position and soom.
    var mymap = L.map('mapId', {
        center : [59.45, 24.76],
        zoom : 9
    });
    L.graticule({interval : 0.5}).addTo(mymap);

    var center = mymap.getCenter();

    //Default marker position
    var marker = L.marker(center, {draggable : true}).addTo(mymap);

    //Create map using openstraatmap data
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

    mymap.addLayer(osm);

    mymap.on('click', onMapClick);

    //Update marker position
    function onMapClick(e) {
        var pos = e.latlng;
        marker.setLatLng(pos);
        marker.update();

        setInputValues(e.latlng);
    }

    lat.val(center.lat);
    lng.val(center.lng);

    function setInputValues(latlng) {
        lat.val(latlng.lat.toFixed(2));
        lng.val(latlng.lng.toFixed(2));
    }

</script>