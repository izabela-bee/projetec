const listaEmojis = document.querySelectorAll('.principal-emojis-emoji');
const listaInputs = document.querySelectorAll('.principal-emojis-input');

listaEmojis.forEach((emoji, i) => {

    emoji.addEventListener('click', () => {
        if (i === 0){
            listaEmojis[i].src = '../public/img/emojisAvaliacao/pessimo.png';
            listaEmojis[1].src = '../public/img/emojisAvaliacao/2.png';
            listaEmojis[2].src = '../public/img/emojisAvaliacao/3.png';
            listaEmojis[3].src = '../public/img/emojisAvaliacao/4.png';
        }
        if (i === 1){
            listaEmojis[i].src = '../public/img/emojisAvaliacao/mediano.png';
            listaEmojis[0].src = '../public/img/emojisAvaliacao/1.png';
            listaEmojis[2].src = '../public/img/emojisAvaliacao/3.png';
            listaEmojis[3].src = '../public/img/emojisAvaliacao/4.png';
        }
        if (i === 2){
            listaEmojis[i].src = '../public/img/emojisAvaliacao/bom.png';
            listaEmojis[0].src = '../public/img/emojisAvaliacao/1.png';
            listaEmojis[1].src = '../public/img/emojisAvaliacao/2.png';
            listaEmojis[3].src = '../public/img/emojisAvaliacao/4.png';
        }
        if (i === 3){
            listaEmojis[i].src = '../public/img/emojisAvaliacao/otimo.png';
            listaEmojis[0].src = '../public/img/emojisAvaliacao/1.png';
            listaEmojis[1].src = '../public/img/emojisAvaliacao/2.png';
            listaEmojis[2].src = '../public/img/emojisAvaliacao/3.png';
        }

    });

    
    
})

