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
        lat: 50.3816,
        lng: 3.06149
    };
    let contentMaison= "<h5>Maison 4 pièces</h5> <p>118 m²</p><p>Loyer 920 €/mois</p>";
    let markerMaison = new google.maps.Marker({
        position: maison,
        map: map,
        icon: new google.maps.MarkerImage('../src/images/icone-maison.jpg'),
    });
    let infosMaison = new google.maps.InfoWindow({
        content: contentMaison,
        position: maison
    });

//affichage de l itineraire
    let directionsService = new google.maps.DirectionsService();
    let directionsDisplay = new google.maps.DirectionsRenderer({'map': map});
    let request = {
        origin: douai,    //entre agence
        destination:  maison,     //et la maison a louer
        travelMode: google.maps.DirectionsTravelMode.DRIVING,//moyen de locomotion
    };

    directionsService.route(request, function (response, status) {
        if (status == google.maps.DirectionsStatus.OK) {
            directionsDisplay.setDirections(response);
            directionsDisplay.setOptions({'suppressMarkers': true});
        }
    });

//fonction d'affichage au click des infos et fermeture auto
    let markers = [marker,markerMaison];
    for (let i = 0; i <markers.length ; i++) {
        markers[i].addListener("click", () => {
            infos.open(map);
            infosMaison.open(map);
            setTimeout(function() { infos.close();infosMaison.close(); }, 5000);//disparition auto
        });
    }
}
initMap();


