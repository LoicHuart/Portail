$(document).ready(function(){

    $(".item",this).hover(function(){
        $(".rond", this).animate({right : 0});
    }, function () {
        $(".rond", this).animate({left : 0});

    });

		
});
	
