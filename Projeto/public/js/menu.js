const menuHamburguer = document.querySelector('.menu-imagem-wrapper');
const listaMenu = document.querySelector('.cabecalho-navegacao-menu-elementos');

const meuPerfil = document.querySelector('.cabecalho-navegacao-menu-perfil-imagem');
const listaMeuPerfil = document.querySelector('.cabecalho-navegacao-menu-perfil-elementos');

menuHamburguer.addEventListener('click', () => {
    if(listaMenu.style.transform == 'translate(0px)'){
        listaMenu.style.transform = 'translate(-100%)'
        listaMenu.style.transition = '0.6s';
        
    } else {
        listaMenu.style.transform = 'translate(0)';
        listaMenu.style.transition = '0.6s';
    }
    console.log(listaMenu.style.transform)
    
})

meuPerfil.addEventListener('click', () => {
    if(listaMeuPerfil.style.transform == "translate(0px)"){
        listaMeuPerfil.style.transform = "translate(100%)"
        listaMeuPerfil.style.transition = "0.6s"
    }else{
        listaMeuPerfil.style.transform = "translate(0)"
        listaMeuPerfil.style.transition = "0.6s"
    }
    console.log(listaMeuPerfil.style.transform)
})
