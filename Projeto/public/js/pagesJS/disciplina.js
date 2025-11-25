document.addEventListener('DOMContentLoaded', () => {

    document.querySelectorAll('.cards-container').forEach(container => {
        container.style.maxHeight = '0';
        container.style.opacity = '0';
        container.style.overflow = 'hidden';
        container.style.marginTop = '0';
        container.dataset.closed = 'true';
      });
    

    document.querySelectorAll('.disciplina-secao').forEach(secao => {
      const divs = secao.querySelector('.disciplina-header');
      const btn = secao.querySelector('.toggle-btn');
      const cards = secao.querySelector('.cards-container');
  
      if (btn && cards || divs) {
        btn.addEventListener('click', () => {
            const isClosed = cards.dataset.closed === 'true';

            cards.style.maxHeight = isClosed ? '2000px' : '0';
            cards.style.opacity = isClosed ? '1' : '0';
            cards.style.marginTop = isClosed ? '20px' : '0';
    
            cards.dataset.closed = (!isClosed).toString();
            btn.classList.toggle('rotate');
        });

        divs.addEventListener('click', () => {
          const isClosed = cards.dataset.closed === 'true';

          cards.style.maxHeight = isClosed ? '2000px' : '0';
          cards.style.opacity = isClosed ? '1' : '0';
          cards.style.marginTop = isClosed ? '20px' : '0';
  
          cards.dataset.closed = (!isClosed).toString();
          btn.classList.toggle('rotate');
      });

      }
    });
});

const monitorias = document.querySelectorAll('.card-monitoria');
const resultado = document.getElementById('resultado')

monitorias.forEach((monitoria, i) => {
  monitoria.addEventListener(('click'),(e) => {
    fetch('modal.php').then(response => response.text()).then((data) => {
      resultado.innerHTML = data
    })
  })
})

function fecharModal() {
  resultado.innerHTML = '';
}
