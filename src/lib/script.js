$(document).ready(function(){

    $( "#pronote" ).hover(function() {
        $( "header" ).stop().animate({ backgroundColor: "#1abc9c" }, 500 );
        $( "#lycee" ).stop().animate({ color: "#1abc9c" }, 500 );
    },function() {
        $( "header" ).stop().animate({ backgroundColor: "#424242" }, 500 );
        $( "#lycee" ).stop().animate({ color: "#424242" }, 500 );
    });

    $( "#cnam, #sig" ).hover(function() {
        $( "header" ).stop().animate({ backgroundColor: "#e74c3c" }, 500 );
        $( "#lycee" ).stop().animate({ color: "#e74c3c" }, 500 );
    },function() {
        $( "header" ).stop().animate({ backgroundColor: "#424242" }, 500 );
        $( "#lycee" ).stop().animate({ color: "#424242" }, 500 );
    });

    $( "#ovh" ).hover(function() {
        $( "header" ).stop().animate({ backgroundColor: "#34495e" }, 500 );
    },function() {
        $( "header" ).stop().animate({ backgroundColor: "#424242" }, 500 );
    });

    $( "#git" ).hover(function() {
        $( "header" ).stop().animate({ backgroundColor: "#8e44ad" }, 500 );
        $( "#lycee" ).stop().animate({ color: "#8e44ad" }, 500 );
    },function() {
        $( "header" ).stop().animate({ backgroundColor: "#424242" }, 500 );
        $( "#lycee" ).stop().animate({ color: "#424242" }, 500 );
    });

    $( "#mood, #glpi" ).hover(function() {
        $( "header" ).stop().animate({ backgroundColor: "#f1c40f" }, 500 );
        $( "#lycee" ).stop().animate({ color: "#f1c40f" }, 500 );
    },function() {
        $( "header" ).stop().animate({ backgroundColor: "#424242" }, 500 );
        $( "#lycee" ).stop().animate({ color: "#424242" }, 500 );
    });

    $( "#node" ).hover(function() {
        $( "header" ).stop().animate({ backgroundColor: "#2ecc71" }, 500 );
        $( "#lycee" ).stop().animate({ color: "#2ecc71" }, 500 );
    },function() {
        $( "header" ).stop().animate({ backgroundColor: "#424242" }, 500 );
        $( "#lycee" ).stop().animate({ color: "#424242" }, 500 );
    });



});

