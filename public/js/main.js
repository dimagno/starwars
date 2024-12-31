$(document).ready(function(){
 fetch('https://swapi-node.vercel.app/films').then((data)=>{
        console.log('dados:'+data)
    }).catch((error)=>{
        console.log("erro :"+error)
    });
    
    let stars = $('.stars');
    let moon = $('.moon');
    let mountainB = $('.mountain-b');
    let mountainF = $('.mountain-f');
    let text = $('#text');
    
    $(window).on('scroll', function () {
        let scrollValue = $(this).scrollTop(); // Obtém o valor do scroll vertical

        // Aplica o efeito parallax em cada elemento
        stars.css('left', scrollValue * 0.5 + 'px'); // As estrelas movem-se mais lentamente
        moon.css('top', scrollValue * 1.15 + 'px');   // A lua move-se devagar para cima
        mountainB.css('top', scrollValue * 0.2 + 'px'); // Montanha de trás, efeito suave
        mountainF.css('top', scrollValue * 0 + 'px'); // Montanha da frente, movimento mais pronunciado
      
    });
}); 

