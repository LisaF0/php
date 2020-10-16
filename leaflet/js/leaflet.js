var mymap = L.map('mapid').setView([48.573, 7.752], 13);

// var latlng = L.latLng(48.558, 7.747);
// var mymap = L.map('mapid').setView(latlng, 13);
// var marker = L.marker(latlng).addTo(mymap);

L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    maxZoom: 18,
    id: 'mapbox/streets-v11',
    tileSize: 512,
    zoomOffset: -1,
    accessToken: 'pk.eyJ1IjoibGlzYWYwIiwiYSI6ImNrZ2J3OGF6MTA4ZDIzMHBtZTl4MG5qNzQifQ.58Qq0kZyHo1YlhCFix6uFQ'
}).addTo(mymap);

// var marker = L.marker([48.564659, 7.771913]).addTo(mymap);


var myIcon = L.icon({
    iconUrl: 'img/elan.png',
    iconSize: [38,38],
    popupAnchor: [0, -18]

})

var centres = 
    {
        "Strasbourg":
        {
            "adresse" : {
                "ville" : "Strasbourg",
                "rue" : "202 Avenue de Colmar",
                "codePostal" : "67100"
            },
            "latlng" : [48.558, 7.747]
        },

        "Colmar":
        {
            "adresse" : {
                "ville" : "Colmar",
                "rue" : "3 Place du Capitaine Dreyfus",
                "codePostal" : "6800"                
            },
            "latlng" : [48.075703, 7.344610]
        },

        "Molsheim": 
        {
            "adresse" : {
                "ville" : "Molsheim",
                "rue" : "1 Rue de la Fonderie",
                "codePostal" : "67120" 
            },
            "latlng" : [48.536858, 7.498468]       
        }
    }

var group = []

for(centre in centres){

    var elan = centres[centre]
    L.marker(elan.latlng, {icon: myIcon})
    .addTo(mymap)
    .bindPopup("<strong>Elan Formation " + centre + "</strong><br>" + elan.adresse.rue + "<br>" + elan.adresse.ville + ", " + elan.adresse.codePostal)
    // console.log(elan.latlng)
    group.push(elan.latlng) 
} 
console.log(group)
    mymap.fitBounds(group)




// var circle = L.circle([48.583819, 7.702789], {
//     color: 'red',
//     fillColor: '#f03',
//     fillOpacity: 0.5,
//     radius: 500
// }).addTo(mymap);

// var polygon = L.polygon([
//     [48.564659, 7.771913],
//     [48.583819, 7.702789],
//     // [48.557813, 7.747606]
// ]).addTo(mymap);

// marker.bindPopup("<b>Chez Pierre</b>").openPopup();
// circle.bindPopup("Vers chez Alain");
// polygon.bindPopup("I am a polygon.");

// var popup = L.popup()
//     .setLatLng([48.572816, 7.772183])
//     .setContent("I am a standalone popup.")
//     .openOn(mymap);

//     function onMapClick(e) {
//         alert("You clicked the map at " + e.latlng);
//     }
    
//     mymap.on('click', onMapClick);

// var popup = L.popup();
// var mark = L.marker();
// function onMapClick(e) {
//     mark
//         .setLatLng(e.latlng)
//         .addTo(mymap)
//     popup
//         .setLatLng(e.latlng)
//         .setContent("You clicked the map at " + e.latlng.toString())
//         .openOn(mymap);
// }

// mymap.on('click', onMapClick);


