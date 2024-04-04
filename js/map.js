(function ($) {
  /**
   * initMap
   *
   * Renders a Google Map onto the selected jQuery element
   *
   * @date    22/10/19
   * @since   5.8.6
   *
   * @param   jQuery $el The jQuery element.
   * @return  object The map instance.
   */
  function initMap($el) {
    // Find marker elements within map.
    var $markers = $el.find(".marker");

    var mapArgs = {
      zoom: $el.data("zoom") || 16,
      mapTypeId: google.maps.MapTypeId.ROADMAP,
      styles: [
        {
          featureType: "all",
          elementType: "labels",
          stylers: [
            {
              visibility: "off",
            },
            {
              color: "#f49f53",
            },
          ],
        },
        {
          featureType: "all",
          elementType: "labels.text",
          stylers: [
            {
              visibility: "simplified",
            },
          ],
        },
        {
          featureType: "administrative",
          elementType: "geometry.fill",
          stylers: [
            {
              color: "#932920",
            },
            {
              visibility: "on",
            },
          ],
        },
        {
          featureType: "administrative",
          elementType: "geometry.stroke",
          stylers: [
            {
              visibility: "on",
            },
            {
              color: "#932920",
            },
          ],
        },
        {
          featureType: "landscape",
          elementType: "all",
          stylers: [
            {
              color: "#f9ddc5",
            },
            {
              lightness: -7,
            },
          ],
        },
        {
          featureType: "landscape",
          elementType: "geometry",
          stylers: [
            {
              color: "#932920",
            },
          ],
        },
        {
          featureType: "poi",
          elementType: "geometry",
          stylers: [
            {
              color: "#9d2920",
            },
          ],
        },
        {
          featureType: "poi.business",
          elementType: "all",
          stylers: [
            {
              color: "#0e0404",
            },
            {
              lightness: 38,
            },
          ],
        },
        {
          featureType: "poi.government",
          elementType: "all",
          stylers: [
            {
              color: "#671c1c",
            },
            {
              lightness: 46,
            },
          ],
        },
        {
          featureType: "poi.medical",
          elementType: "geometry",
          stylers: [
            {
              color: "#0e0404",
            },
          ],
        },
        {
          featureType: "poi.medical",
          elementType: "geometry.fill",
          stylers: [
            {
              color: "#813033",
            },
            {
              lightness: 38,
            },
            {
              visibility: "off",
            },
          ],
        },
        {
          featureType: "poi.park",
          elementType: "all",
          stylers: [
            {
              color: "#0e0404",
            },
            {
              lightness: 39,
            },
          ],
        },
        {
          featureType: "poi.park",
          elementType: "geometry",
          stylers: [
            {
              color: "#830a0a",
            },
          ],
        },
        {
          featureType: "poi.school",
          elementType: "all",
          stylers: [
            {
              color: "#a95521",
            },
            {
              lightness: 35,
            },
          ],
        },
        {
          featureType: "poi.school",
          elementType: "geometry",
          stylers: [
            {
              color: "#a02e2e",
            },
          ],
        },
        {
          featureType: "poi.sports_complex",
          elementType: "all",
          stylers: [
            {
              color: "#9e5916",
            },
            {
              lightness: 32,
            },
          ],
        },
        {
          featureType: "poi.sports_complex",
          elementType: "geometry",
          stylers: [
            {
              color: "#941a1a",
            },
          ],
        },
        {
          featureType: "road",
          elementType: "all",
          stylers: [
            {
              color: "#813033",
            },
            {
              lightness: 43,
            },
          ],
        },
        {
          featureType: "road",
          elementType: "geometry.fill",
          stylers: [
            {
              color: "#a9362c",
            },
          ],
        },
        {
          featureType: "road.highway",
          elementType: "geometry.fill",
          stylers: [
            {
              color: "#b43f00",
            },
          ],
        },
        {
          featureType: "road.highway",
          elementType: "geometry.stroke",
          stylers: [
            {
              color: "#b43f00",
            },
          ],
        },
        {
          featureType: "road.arterial",
          elementType: "geometry",
          stylers: [
            {
              color: "#aa3c00",
            },
          ],
        },
        {
          featureType: "road.local",
          elementType: "geometry.fill",
          stylers: [
            {
              color: "#763714",
            },
            {
              weight: 1.3,
            },
            {
              visibility: "on",
            },
            {
              lightness: 16,
            },
          ],
        },
        {
          featureType: "road.local",
          elementType: "geometry.stroke",
          stylers: [
            {
              color: "#aa3c00",
            },
            {
              lightness: -10,
            },
          ],
        },
        {
          featureType: "transit",
          elementType: "all",
          stylers: [
            {
              lightness: 38,
            },
          ],
        },
        {
          featureType: "transit",
          elementType: "geometry.fill",
          stylers: [
            {
              color: "#ff0000",
            },
          ],
        },
        {
          featureType: "transit.line",
          elementType: "all",
          stylers: [
            {
              color: "#813033",
            },
            {
              lightness: 22,
            },
          ],
        },
        {
          featureType: "transit.station",
          elementType: "all",
          stylers: [
            {
              visibility: "off",
            },
          ],
        },
        {
          featureType: "water",
          elementType: "all",
          stylers: [
            {
              color: "#1994bf",
            },
            {
              saturation: -69,
            },
            {
              gamma: 0.99,
            },
            {
              lightness: 43,
            },
          ],
        },
        {
          featureType: "water",
          elementType: "geometry.fill",
          stylers: [
            {
              color: "#4b2217",
            },
          ],
        },
        {
          featureType: "water",
          elementType: "labels",
          stylers: [
            {
              visibility: "off",
            },
          ],
        },
      ],
    };
    var map = new google.maps.Map($el[0], mapArgs);

    // Add markers.
    map.markers = [];
    $markers.each(function () {
      initMarker($(this), map);
    });

    // Center map based on markers.
    centerMap(map);

    // Return map instance.
    return map;
  }

  /**
   * initMarker
   *
   * Creates a marker for the given jQuery element and map.
   *
   * @date    22/10/19
   * @since   5.8.6
   *
   * @param   jQuery $el The jQuery element.
   * @param   object The map instance.
   * @return  object The marker instance.
   */
  function initMarker($marker, map) {
    // Get position from marker.
    var lat = $marker.data("lat");
    var lng = $marker.data("lng");
    var latLng = {
      lat: parseFloat(lat),
      lng: parseFloat(lng),
    };

    // Retrieve the URL of the custom marker icon from ACF field.
    var customIconUrl =
      "https://pattymeltdown.bcitwebdeveloper.ca/wp-content/themes/patty-meltdown/images/map-icon.png";

    var iconSize = new google.maps.Size(40, 40);

    // Create marker instance with custom icon.
    var marker = new google.maps.Marker({
      position: latLng,
      map: map,
      icon: {
        url: customIconUrl,
        scaledSize: iconSize, // Resize the custom marker icon
      },
    });

    // Append to reference for later use.
    map.markers.push(marker);

    // If marker contains HTML, add it to an infoWindow.
    if ($marker.html()) {
      // Create info window.
      var infowindow = new google.maps.InfoWindow({
        content: $marker.html(),
      });

      // Show info window when marker is clicked.
      google.maps.event.addListener(marker, "click", function () {
        infowindow.open(map, marker);
      });
    }
  }
  /**
   * centerMap
   *
   * Centers the map showing all markers in view.
   *
   * @date    22/10/19
   * @since   5.8.6
   *
   * @param   object The map instance.
   * @return  void
   */
  function centerMap(map) {
    // Create map boundaries from all map markers.
    var bounds = new google.maps.LatLngBounds();
    map.markers.forEach(function (marker) {
      bounds.extend({
        lat: marker.position.lat(),
        lng: marker.position.lng(),
      });
    });

    // Case: Single marker.
    if (map.markers.length == 1) {
      map.setCenter(bounds.getCenter());

      // Case: Multiple markers.
    } else {
      map.fitBounds(bounds);
    }
  }

  // Render maps on page load.
  $(document).ready(function () {
    $(".acf-map").each(function () {
      var map = initMap($(this));
    });
  });
})(jQuery);
