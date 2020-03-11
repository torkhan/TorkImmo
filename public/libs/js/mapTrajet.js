

$.ajax({cache:false,url:"/libs/json/marker.json",success:(infoBase)=>{let tMarker = infoBase;initMap(tMarker)}});


function initMap(tMarker) {console.log(tMarker);
// Creation et affichage map centrée sur Douai
    let douai = {
        lat : 50.36834,
        lng: 3.078992
    };



    let affichePlace = document.querySelector("#map");


    let map = new google.maps.Map( affichePlace, {
        zoom: 13,
        center: douai
    });

//fin creation



    // création des markers

    let  nb = tMarker.length;
    for( let i = 0; i < nb; i++){

        let  oMarker = new google.maps.Marker({
            numero : i,
            position : new google.maps.LatLng( tMarker[i].latitude, tMarker[i].longitude),
            map : map,


        });


        // création infobulle
        let oInfo = new google.maps.InfoWindow({ });

        let agence = new google.maps.Marker({
            position: new google.maps.LatLng(50.36834, 3.078992),
            map: map,
            title: "Tork Immo 209 Rue de la Mairie 59500 Douai",
            icon: new google.maps.MarkerImage('/libs/images/logo.jpg')

        });

//affichage de l itineraire  non fonctionnel faut payer!!
        let directionsService = new google.maps.DirectionsService();
        let directionsDisplay = new google.maps.DirectionsRenderer({'map': map});
        let request = {
            origin: douai,    //entre agence
            destination: new google.maps.LatLng( tMarker[i].latitude, tMarker[i].longitude),      //et le bien
            travelMode: google.maps.DirectionsTravelMode.DRIVING,//moyen de locomotion
        };

        directionsService.route(request, function (response, status) {
            if (status == google.maps.DirectionsStatus.OK) {
                directionsDisplay.setDirections(response);
                directionsDisplay.setOptions({'suppressMarkers': true});
            }
        });


        // événement mouseover sur le marker
        google.maps.event.addListener( oMarker, 'mouseover', function() {
            // affectation du contenu
            oInfo.setContent( tMarker[this.numero].typeProduits + '</br>' + tMarker[this.numero].adresse + '</br>' + tMarker[this.numero].prixHt );

            // affichage InfoWindow
            oInfo.open( this.getMap(), this);


        });
        google.maps.event.addListener( oMarker, 'mouseout', function() {
            // effacage InfoWindow
            oInfo.close( this.getMap(), this);

        });
    }
}
//modifier les class input pour avoir l affichage de ce que l on y met
$("input").removeClass("custom-file-input");
$("div").removeClass("custom-file");


