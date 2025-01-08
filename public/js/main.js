$(document).ready(function(){ /*
    $('#logLink').click(function(){
        async function getPassword() {
            const { value: password } = await Swal.fire({
              title: "Digite a senha de administrador para visualizar os logs",
              input: "password",
              inputLabel: "Senha:",
              inputPlaceholder: "Digite a senha",
              inputAttributes: {
                maxlength: "10",
                autocapitalize: "off",
                autocorrect: "off"
              }
            });
            
            if (password!="1234") {
              Swal.fire(`Senha incorreta`);
            }
            else{
                setTimeout(function() {
                    window.location.href = '/starwars';
                  }, 2000); // 3000 milissegundos = 3 segundos

            }
          }
          getPassword(); 
         
    }) */
    $('html, body').animate({
        scrollTop: 500
      }, {
        duration: 2000,
        easing: 'easeOutQuad' // Certifique-se de que a função de easing está disponível no jQuery UI
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
        var transparency = Math.min(0.8, scrollValue / 150); // Calcula a transparência
        $('#navbar').css('background-color', 'rgba(0, 0, 0, ' + transparency + ')');
      
    });
    
}); 

