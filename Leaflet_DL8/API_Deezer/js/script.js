
$(document).ready(() => {
    $("#submit").click(() => {
        
        $("#albums-list").html("")
        var artist = $('#artist').val()

        console.log('https://api.deezer.com/search/artist?q=' + artist)
        $.ajax({
            type: 'GET',
            url: 'https://api.deezer.com/search/artist?q=' + artist + '&output=jsonp',
            dataType: 'jsonp',
            success: function(data) {
                $("#result").html(
                    "<h1>" + data.data[0].name + "</h1>"
                )

                $.ajax({
                    type: 'GET',
                    url: 'https://api.deezer.com/artist/'+ data.data[0].id +'/albums?output=jsonp',
                    dataType: 'jsonp',
                    success: function(albums) {
                        for(album in albums.data){
                            $("#albums-list").append(
                                "<tr>"
                                + "<td><img class='img-cover' src='" + albums.data[album].cover_big + "'></td>"
                                + "<td>" + albums.data[album].title + "</td>"
                                + "<td>" + albums.data[album].release_date + "</td></tr>"                            
                            )
                        }
                    }
                })
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                console.log(XMLHttpRequest);
                console.log(textStatus);
                console.log(errorThrown);
            }
        });
    })
})