document.addEventListener('DOMContentLoaded', () => {
    const monitorDiv = document.querySelector('.disciplina.monitor');
    monitorDiv.addEventListener('click', () => {
        const id = monitorDiv.dataset.id;
        window.location.href = `visualizacao_monitor.php?id=${id}`;
    });
});
