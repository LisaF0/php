// Initialisation de la map
var mymap = L.map('mapid')
L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    maxZoom: 14,
    zoomSnap: 0.1,
    id: 'mapbox/light-v10',
    tileSize: 512,
    zoomOffset: -1,
    accessToken: 'pk.eyJ1IjoibWlrZWhldWwiLCJhIjoiY2p5aTlpcWl1MDdpZTNna2wwMHFhdGt1dCJ9.Wkmzyt3fYtt32I6ZttyHDw'
}).addTo(mymap)

// Icone associée à chaque marqueur (logo ELAN)
var elanIcon = L.icon({
    iconUrl: 'img/elan.png',
    iconSize: [60, 60],
    popupAnchor: [0,-15]
})

// Tableau JSON des centres ELAN (format ville : {adresse, coords[]})
var centres = {
    "ELAN STRASBOURG" : {
        "adresse" : "202 av de Colmar<br/>67100 STRASBOURG",
        "coords" : [48.557779, 7.747435]
    },
    "ELAN COLMAR" : {
        "adresse" : "3 place Capitaine Dreyfus<br/>68000 COLMAR",
        "coords" : [48.076134, 7.344546]
    },
    "ELAN MULHOUSE" : {
        "adresse" : "130 rue de la Mer Rouge<br/>68200 MULHOUSE",
        "coords" : [47.742549, 7.293045]
    },
    "ELAN METZ" : {
        "adresse" : "Grigy-Technopôle<br/>57070 METZ",
        "coords" : [49.106958, 6.233334]
    },
    "ELAN NANTES" : {
        "adresse" : "test",
        "coords" : [47.219783, -1.557311]
    }
}

// Afficher l'ensemble des marqueurs sur la map
var arrayMarkers = []
for (centre in centres){
    m = new L.marker(centres[centre].coords, {icon: elanIcon}).addTo(mymap)
    m.bindPopup("<strong>" + centre + "</strong><br>" + centres[centre].adresse)
    arrayMarkers.push(m)
}

// Cadrer (fit) l'affichage des marqueurs automatiquement
var featureGroup = L.featureGroup(arrayMarkers).addTo(mymap)
mymap.fitBounds(featureGroup.getBounds(), {padding:[50,50]})


