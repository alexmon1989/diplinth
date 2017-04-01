// https://developers.google.com/maps/documentation/javascript/examples/
function initMap(lat, lng) {
    var customMapType = new google.maps.StyledMapType([
        {
            stylers: [
                {'saturation': -100},
                {'lightness': 51},
                {'visibility': 'simplified'}
            ]
        },
        {
            elementType: 'labels',
            stylers: [{visibility: 'on'}]
        },
        {
            featureType: 'water',
            stylers: [{color: '#cccccc'}]
        }
    ], {
        name: 'DiPlinth Style'
    });

    var image = new google.maps.MarkerImage(
        'unify/img/marker.png',
        new google.maps.Size(48,54),
        new google.maps.Point(0,0),
        new google.maps.Point(24,54)
    );

    var customMapTypeId = 'custom_style';

    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 13,
        scrollwheel: false,
        center: {lat: lat, lng: lng},  // Сосюры, 6.
        mapTypeControlOptions: {
            mapTypeIds: [google.maps.MapTypeId.ROADMAP, customMapTypeId]
        }
    });

    var infowindow = new google.maps.InfoWindow;
    infowindow.setContent('<b>Brooklyn</b>');

    var marker = new google.maps.Marker({
        map: map,
        clickable: false,
        icon: image,
        position: {lat: lat, lng: lng}
    });

    map.mapTypes.set(customMapTypeId, customMapType);
    map.setMapTypeId(customMapTypeId);
}
