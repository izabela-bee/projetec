const listaEmojis = document.querySelectorAll('.principal-emojis-emoji');
const listaInputs = document.querySelectorAll('.principal-emojis-input');

listaInputs.forEach(element => {
  console.log(element.checked)
});
listaEmojis.forEach((emoji, index) => {
  emoji.addEventListener('click', () => {
    if(index === 0){
      listaEmojis[0].src = '../public/img/emojisAvaliacao/pessimo.png';
      listaEmojis[1].src = '../public/img/emojisAvaliacao/2.png';
      listaEmojis[2].src = '../public/img/emojisAvaliacao/3.png';
      listaEmojis[3].src = '../public/img/emojisAvaliacao/4.png';
      listaInputs[0].checked = true;
    }else if (index === 1){
      listaEmojis[0].src = '../public/img/emojisAvaliacao/1.png';
      listaEmojis[1].src = '../public/img/emojisAvaliacao/mediano.png';
      listaEmojis[2].src = '../public/img/emojisAvaliacao/3.png';
      listaEmojis[3].src = '../public/img/emojisAvaliacao/4.png';
      listaInputs[1].checked = true;
    } else if (index === 2){
      listaEmojis[0].src = '../public/img/emojisAvaliacao/1.png';
      listaEmojis[1].src = '../public/img/emojisAvaliacao/2.png';
      listaEmojis[2].src = '../public/img/emojisAvaliacao/bom.png';
      listaEmojis[3].src = '../public/img/emojisAvaliacao/4.png';
      listaInputs[2].checked = true;
    } else if (index === 3){
      listaEmojis[0].src = '../public/img/emojisAvaliacao/1.png';
      listaEmojis[1].src = '../public/img/emojisAvaliacao/2.png';
      listaEmojis[2].src = '../public/img/emojisAvaliacao/3.png';
      listaEmojis[3].src = '../public/img/emojisAvaliacao/otimo.png';
      listaInputs[3].checked = true;
    }
})});
