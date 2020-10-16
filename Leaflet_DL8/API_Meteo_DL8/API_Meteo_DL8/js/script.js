
$("#submit").click(() => {
    $.ajax({
        url: 'http://api.weatherstack.com/forecast',
        data: {
            access_key: '017642edb7471035791cda1f9c0d0df0',
            // query: 'Erstein',
            query: $("#ville").val()
        },
        dataType: 'json',
        success: function(apiResponse) {
            console.log(apiResponse)
            if(!apiResponse.error){
                $("#result").html(
                    "<p>Pays : " + apiResponse.location.country + "</p>"+
                    "<p>Latitude : " + apiResponse.location.lat + "</p>" +
                    "<p>Longitude : " + apiResponse.location.lon + "</p>" + 
                    "<img src='" + apiResponse.current.weather_icons + "'>" + 
                    "<p>" + apiResponse.current.temperature + "</p>"
                )   
            } else {
                $("#result").html(
                    "<p>Cette ville n'existe pas</p>"
                )
            }
        },
    });
})




//input text bouton
// rechercher la ville et afficher la meteo de cette ville

//input rentrer le nom de l'artiste et afficher tout les albums de cet artiste là