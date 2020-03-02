function initMap(listener) {
    // les coordonnées de Douai
    let douai = {
        lat : 50.36834,
        lng: 3.078992
    };
    let content = "<h5>Tork Immo</h5> <p>209 Rue de la Mairie</p><p>59500 Douai</p>";
    let affichePlace = document.querySelector("#map");
    let map = new google.maps.Map( affichePlace, {
        zoom: 13,
        center: douai
    });
    let marker = new google.maps.Marker({
        position: douai,
        map: map,
        icon: new google.maps.MarkerImage('../src/images/logo.jpg')
    });

    let infos = new google.maps.InfoWindow({
        content: content,
        position: douai
    });

    // creation du markeur  maison  et affich.infos
    let maison= {
        lat: 50.360588034768334,
        lng: 3.0753891051531355
    };
    let contentMaison= "<h5>Local commercial</h5> <p>118 m²</p><p>Loyer 1100 €/mois</p>";
    let infosMaison = new google.maps.InfoWindow({
        content: contentMaison,
        position: maison
    });
    let markerMaison = new google.maps.Marker({
        position: maison,
        map: map,
        icon: new google.maps.MarkerImage('../src/images/icone-local.jpg'),
        content: contentMaison
    });

//affichage de l itineraire
    let directionsService = new google.maps.DirectionsService();
    let directionsDisplay = new google.maps.DirectionsRenderer({'map': map});
    let request = {
        origin: douai,//entre agence
        destination:  maison,//et la maison a louer
        travelMode: google.maps.DirectionsTravelMode.DRIVING,
        unitSystem: google.maps.DirectionsUnitSystem.METRIC
    };

    directionsService.route(request, function (response, status) {
        if (status == google.maps.DirectionsStatus.OK) {
            directionsDisplay.setDirections(response);
            directionsDisplay.setOptions({polylineOptions: {
                    strokeColor: "red"}//pour changer la couleur de la route
            });
            directionsDisplay.setOptions({'suppressMarkers': true});
        }
    });

//fonction d'affichage au click des infos
    let markers = [marker,markerMaison];
    for (let i = 0; i <markers.length ; i++) {
        markers[i].addListener("click", () => {
            infos.open(map);
            infosMaison.open(map);
            setTimeout(function() { infos.close();infosMaison.close(); }, 5000);
        });
    }
}
initMap();