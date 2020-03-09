
function initMap(listener) {
// Creation et affichage map centrée sur Douai
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

//fin creation

// ajout infos marqeurs dans bdd
   let tMarker = [
        {'lat':50.3816, 'lng':3.06149, 'url':'view/lot1.html', 'type': new google.maps.MarkerImage('libs/images/icone-maison.jpg'),'info': '<h5>Maison 4 pièces</h5> <p>118 m²</p>  <p>Loyer 920 €/mois</p> ' },
        {'lat':50.379385, 'lng':3.087765, 'url':'view/lot2.html', 'type': new google.maps.MarkerImage('libs/images/icone-appartement.jpg'),'info': '<h5>Appartement 4 pièces</h5> <p>118 m²</p>  <p>Loyer 945 €/mois</p> ' },
        {'lat':50.360588034768334, 'lng':3.0753891051531355, 'url':'view/lot3.html', 'type': new google.maps.MarkerImage('libs/images/icone-local.jpg'),'info': '<h5>Local commercial</h5> <p>118 m²</p>  <p>Loyer 1100 €/mois</p> ' },
        {'lat':50.36834, 'lng':3.078992, 'url': 'view/cgv.html','type': new google.maps.MarkerImage('public/libs/images/logo.jpg'),'info': '<h5>Tork Immo</h5> <p>209 Rue de la Mairie</p><p>59500 Douai</p> ' },

    ];

    // création des markers

    let i, nb = tMarker.length;
    for( i = 0; i < nb; i++){

        let  oMarker = new google.maps.Marker({
            numero : i,
            position : new google.maps.LatLng( tMarker[i].lat, tMarker[i].lng, douai),
            map : map,
           /* icon: tMarker[i].type,*/

        });

    // création infobulle
        let oInfo = new google.maps.InfoWindow({
        });

    // événement clic sur le marker qui envoie sur la page du produit
        google.maps.event.addListener( oMarker, 'click', function() {
            window.location.href = tMarker[this.numero].url;
            // affectation du contenu
            //oInfo.setContent( tMarker[this.numero].info);
            // affichage InfoWindow
            //oInfo.open( this.getMap(), this);
        });

    // événement mouseover sur le marker
        google.maps.event.addListener( oMarker, 'mouseover', function() {
            // affectation du contenu
            oInfo.setContent( tMarker[this.numero].info);
            // affichage InfoWindow
            oInfo.open( this.getMap(), this);

        });
        google.maps.event.addListener( oMarker, 'mouseout', function() {
            // effacage InfoWindow
            oInfo.close( this.getMap(), this);
        });
    }
}

