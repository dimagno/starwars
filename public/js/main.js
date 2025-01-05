$(document).ready(function(){
    fetch('https://swapi-node.now.sh/api/films')
    .then((response) => {
      // Verifica se a resposta foi bem-sucedida (status 200-299)
      if (!response.ok) {
        throw new Error(`Erro HTTP: ${response.status}`);
      }
      return response.json();  // Converte o corpo da resposta para JSON
    })
    .then((data) => {
      const newData = JSON.stringify(data); // Converte os dados para string, se necessário
      const numProperties = Object.keys(data).length; // Conta o número de propriedades no objeto
     
    })
    .catch((error) => {
      console.log('erro:', error);  // Captura qualquer erro no processo
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

