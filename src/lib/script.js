$(document).ready(function(){

    $(".rond").hover(function(){
        $(this).stop().animate({width: '225px' },200).css({'z-index' : '10'});
    }, function () {
        $(this).stop().animate({width: '17px', height: '17px' }, 200).css({'z-index' : '1'});
    });​

		
});
	
