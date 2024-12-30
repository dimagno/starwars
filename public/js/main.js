$(document).ready(function(){
    alert('ok')
    fetch('https://swapi-node.vercel.app/films').then((data)=>{
        console.log('dados:'+data)
    }).catch((error)=>{
        console.log("erro :"+error)
    });
}); 