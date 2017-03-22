let siderbarOpened = false;
let button = document.querySelector('#menu');
var retour = document.querySelector('#retour');

button.addEventListener('click', function(e){
    e.stopPropagation();
    e.preventDefault();
	if(!siderbarOpened){
    document.body.classList.add('has-sidebar');
    siderbarOpened = true;
	$('.sidebar').fadeIn(200);
	}else{
	document.body.classList.remove('has-sidebar');
	$('.sidebar').fadeOut(200);
	siderbarOpened = false;
	}
})

document.body.addEventListener('click', function () {
    if (siderbarOpened){
        document.body.classList.remove('has-sidebar');  
		$('.sidebar').fadeOut(200);
        siderbarOpened = false;
    }
})

retour.addEventListener('click', function(){
	if(siderbarOpened){
	document.body.classList.remove('has-sidebar');
	$('.sidebar').fadeOut(200);
	siderbarOpened = false;
	}
})