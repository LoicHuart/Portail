$(document).ready(function(){
       
$(".oui").owlCarousel({ //carrousel n°1
    items:3,
    loop:true,
    margin:5,
    nav:true,
    dots: true,
    autoplay: true,
    responsive:{
        0:{
            items:1,
            nav: false
            
        },
        600:{
            items:3,
            dots: false
            
        },
        1000:{
            items:4,
            nav: false

        }
    }
 
});
    
$(".non").owlCarousel({ //carrousel n°2
    items:5,
    margin:5,
    nav:true,
    dots: true,
    autoplay: true,
    responsive:{
        0:{
            items:1,
            nav: false
            
        },
        600:{
            items:3,
            dots: false
            
        },
        1000:{
            items:5,
            nav: false
            
        }
    }
  
  });


    $(".carou").owlCarousel({ //carrousel n°3
        items:3,
        margin:5,
        nav:true,
        dots: true,
        autoplay: true,
        responsive:{
            0:{
                items:1,
                nav: false

            },
            600:{
                items:3,
                dots: false

            },
            1000:{
                items:3,
                nav: false

            }
        }

    });

var iWindowsSize = $(window).width();
if (iWindowsSize >=500 ){  // SI LA TAILLE DE LA FENETRE EST SUPERIEUR A 500PX, TU EXECUTE SES SCRIPTS (version PC/Tablette)

  setTimeout(function(){ /* apres 1000ms, quand l'utilisateur passe sa souris sur les elements, l'overlay est modifier */
    $( ".item" ).hover(function() {
            $( '.overlay', this ).stop().animate({'margin-top': '0px', 'height': '120px'}, 200);
        },function() {
            $( '.overlay', this ).stop().animate({'margin-top': '40px', 'height': '80px'}, 200);
    });
    }, 1000);
        
    setTimeout(function(){ /* apres 1000ms, quand l'utilisateur passe sa souris sur les elements, le texte de l'overlay apparait */
    $( ".item" ).hover(function() {
            $( ".overlay p", this ).stop().fadeIn( 200 );
        },function() {
            $( ".overlay p" ).stop().fadeOut( 200 );
    });
    }, 1000);
    
    setTimeout(function(){ /* apres 1000ms, quand l'utilisateur passe sa souris sur les elements, la marge haute augmente */
    $( ".item" ).hover(function() {
            $( this ).stop().animate({'margin-top': '5px'}, 200);
        },function() {
            $( this ).stop().animate({'margin-top': '0px'}, 200);
    });
    }, 1000);
    

}else {}



		
});
	
