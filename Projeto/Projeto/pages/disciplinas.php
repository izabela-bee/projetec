<?php

$nameCSS = "disciplina";
$titlePage = "Página de Disciplinas";

include_once "header.php";
?>

<main>
        <div class="main-barra-de-pesquisa secao-pesquisa">
            <input type="search" class="barra-pesquisa-input" placeholder="Pesquisar">
        </div>
        <div class="disciplina">
            <section class="disciplina-secao">
                <div class="disciplina-header">
                    <h2 class="disciplina-titulo">Matemática</h2>
                    <button class="toggle-btn" data-target="matematica-cards">▼</button>
                </div>
            
                <div class="cards-container" id="cards-matematica" data-closed="true">
                    
                    <article class="card-monitoria matematica-card">
                        <header class="card-cabecalho">
                            <span class="monitor-nome">Lucas Andrade</span>
                            <div class="monitoria-info">
                                <span class="monitoria-horario">13:15</span> - <span class="monitoria-data">14/08/2024</span>
                            </div>
                        </header>
                        <div class="card-conteudo">
                            <ul class="monitoria-observacoes">
                                <li>Função Quadrática</li>
                                <li>Vértice e raízes</li>
                            </ul>
                        </div>
                        <footer class="card-rodape">
                            <span class="monitoria-sala">Info-1</span>
                        </footer>
                    </article>
                    
                    <article class="card-monitoria matematica-card">
                        <header class="card-cabecalho">
                            <span class="monitor-nome">Marina Oliveira</span>
                            <div class="monitoria-info">
                                <span class="monitoria-horario">14:00</span> - <span class="monitoria-data">22/09/2024</span>
                            </div>
                        </header>
                        <div class="card-conteudo">
                            <ul class="monitoria-observacoes">
                                <li>Trigonometria no triângulo retângulo</li>
                                <li>Seno, cosseno e tangente</li>
                            </ul>
                        </div>
                        <footer class="card-rodape">
                            <span class="monitoria-sala">Info-3</span>
                        </footer>
                    </article>
                    
                    <article class="card-monitoria matematica-card">
                        <header class="card-cabecalho">
                            <span class="monitor-nome">Renato Lima</span>
                            <div class="monitoria-info">
                                <span class="monitoria-horario">15:45</span> - <span class="monitoria-data">10/03/2025</span>
                            </div>
                        </header>
                        <div class="card-conteudo">
                            <ul class="monitoria-observacoes">
                                <li>Progressão Aritmética (PA)</li>
                                <li>Soma dos termos</li>
                            </ul>
                        </div>
                        <footer class="card-rodape">
                            <span class="monitoria-sala">Info-2</span>
                        </footer>
                    </article>
                    
                    <article class="card-monitoria matematica-card">
                        <header class="card-cabecalho">
                            <span class="monitor-nome">Aline Souza</span>
                            <div class="monitoria-info">
                                <span class="monitoria-horario">13:45</span> - <span class="monitoria-data">17/11/2024</span>
                            </div>
                        </header>
                        <div class="card-conteudo">
                            <ul class="monitoria-observacoes">
                                <li>Geometria Analítica</li>
                                <li>Distância entre dois pontos</li>
                            </ul>
                        </div>
                        <footer class="card-rodape">
                            <span class="monitoria-sala">Info-1</span>
                        </footer>
                    </article>
                    
                    <article class="card-monitoria matematica-card">
                        <header class="card-cabecalho">
                            <span class="monitor-nome">João Pedro</span>
                            <div class="monitoria-info">
                                <span class="monitoria-horario">14:30</span> - <span class="monitoria-data">05/02/2025</span>
                            </div>
                        </header>
                        <div class="card-conteudo">
                            <ul class="monitoria-observacoes">
                                <li>Estatística básica</li>
                                <li>Média, mediana e moda</li>
                            </ul>
                        </div>
                        <footer class="card-rodape">
                            <span class="monitoria-sala">Info-3</span>
                        </footer>
                    </article>
                    
                    <article class="card-monitoria matematica-card">
                        <header class="card-cabecalho">
                            <span class="monitor-nome">Beatriz Castro</span>
                            <div class="monitoria-info">
                                <span class="monitoria-horario">15:00</span> - <span class="monitoria-data">28/06/2025</span>
                            </div>
                        </header>
                        <div class="card-conteudo">
                            <ul class="monitoria-observacoes">
                                <li>Função Exponencial</li>
                                <li>Aplicações em crescimento populacional</li>
                            </ul>
                        </div>
                        <footer class="card-rodape">
                            <span class="monitoria-sala">Info-2</span>
                        </footer>
                    </article>

                    <article class="card-monitoria matematica-card">
                        <header class="card-cabecalho">
                            <span class="monitor-nome">Sofia Reis</span>
                            <div class="monitoria-info">
                                <span class="monitoria-horario">13:30</span> - <span class="monitoria-data">11/12/2024</span>
                            </div>
                        </header>
                        <div class="card-conteudo">
                            <ul class="monitoria-observacoes">
                                <li>Volume de Pirâmide</li>
                                <li>Área de Pirâmide</li>
                            </ul>
                        </div>
                        <footer class="card-rodape">
                            <span class="monitoria-sala">Info-2</span>
                        </footer>
                    </article>

                    <article class="card-monitoria matematica-card">
                        <header class="card-cabecalho">
                            <span class="monitor-nome">Carlos Dias</span>
                            <div class="monitoria-info">
                                <span class="monitoria-horario">13:00</span> - <span class="monitoria-data">15/03/2025</span>
                            </div>
                        </header>
                        <div class="card-conteudo">
                            <ul class="monitoria-observacoes">
                                <li>Equação do segundo grau</li>
                                <li>Equação do primeiro grau</li>
                            </ul>
                        </div>
                        <footer class="card-rodape">
                            <span class="monitoria-sala">Info-1</span>
                        </footer>
                    </article>
            
                    <article class="card-monitoria matematica-card">
                        <header class="card-cabecalho">
                            <span class="monitor-nome">Fernanda D.</span>
                            <div class="monitoria-info">
                                <span class="monitoria-horario">13:30</span> - <span class="monitoria-data">29/03/2025</span>
                            </div>
                        </header>
                        <div class="card-conteudo">
                            <ul class="monitoria-observacoes">
                                <li>Trigonometria</li>
                                <li>Relações trigonométricas</li>
                            </ul>
                        </div>
                        <footer class="card-rodape">
                            <span class="monitoria-sala">Info-2</span>
                        </footer>
                    </article>

                    <article class="card-monitoria matematica-card">
                        <header class="card-cabecalho">
                            <span class="monitor-nome">Ricardo dias</span>
                            <div class="monitoria-info">
                                <span class="monitoria-horario">13:30</span> - <span class="monitoria-data">10/04/2025</span>
                            </div>
                        </header>
                        <div class="card-conteudo">
                            <ul class="monitoria-observacoes">
                                <li>Geometria</li>
                                <li>Corpos redondos</li>
                            </ul>
                        </div>
                        <footer class="card-rodape">
                            <span class="monitoria-sala">Info-2</span>
                        </footer>
                    </article>

                    <article class="card-monitoria matematica-card">
                        <header class="card-cabecalho">
                            <span class="monitor-nome">Alberto And.</span>
                            <div class="monitoria-info">
                                <span class="monitoria-horario">16:00</span> - <span class="monitoria-data">03/04/2025</span>
                            </div>
                        </header>
                        <div class="card-conteudo">
                            <ul class="monitoria-observacoes">
                                <li>Matriz</li>
                                <li>Matrizes quadriculares</li>
                            </ul>
                        </div>
                        <footer class="card-rodape">
                            <span class="monitoria-sala">Info-3</span>
                        </footer>
                    </article>
                    
                    <article class="card-monitoria matematica-card">
                        <header class="card-cabecalho">
                            <span class="monitor-nome">Bernardo S.</span>
                            <div class="monitoria-info">
                                <span class="monitoria-horario">13:30</span> - <span class="monitoria-data">31/03/2025</span>
                            </div>
                        </header>
                        <div class="card-conteudo">
                            <ul class="monitoria-observacoes">
                                <li>Probabilidade</li>
                                <li>Equações</li>
                            </ul>
                        </div>
                        <footer class="card-rodape">
                            <span class="monitoria-sala">Info-1</span>
                        </footer>
                    </article>
            
                </div>
            </section>
                
            <section class="disciplina-secao">
                <div class="disciplina-header">
                    <h2 class="disciplina-titulo">Português</h2>
                    <button class="toggle-btn" type="button">▼</button>
                </div>
                <div class="cards-container" id="cards-portugues" data-closed="true">

                </div>
            </section>
    
            <section class="disciplina-secao">
                <div class="disciplina-header">
                    <h2 class="disciplina-titulo">História</h2>
                    <button class="toggle-btn" type="button">▼</button>
                </div>
                <div class="cards-container" id="cards-historia" data-closed="true">

                </div>
            </section>
    
            <section class="disciplina-secao">
                <div class="disciplina-header">
                    <h2 class="disciplina-titulo">Geografia</h2>
                    <button class="toggle-btn" type="button">▼</button>
                </div>
                <div class="cards-container" id="cards-geografia" data-closed="true">

                </div>
            </section>

            <section class="disciplina-secao">
                <div class="disciplina-header">
                    <h2 class="disciplina-titulo">Biologia</h2>
                    <button class="toggle-btn" type="button">▼</button>
                </div>
                <div class="cards-container" id="cards-biologia" data-closed="true">

                </div>
            </section>
            
            <section class="disciplina-secao">
                <div class="disciplina-header">
                    <h2 class="disciplina-titulo">Química</h2>
                    <button class="toggle-btn" type="button">▼</button>
                </div>
                <div class="cards-container" id="cards-quimica" data-closed="true">

                </div>
            </section>

            <section class="disciplina-secao">
                <div class="disciplina-header">
                    <h2 class="disciplina-titulo">Física</h2>
                    <button class="toggle-btn" type="button">▼</button>
                </div>
                <div class="cards-container" id="cards-fisica" data-closed="true">

                </div>
            </section>

            <section class="disciplina-secao">
                <div class="disciplina-header">
                    <h2 class="disciplina-titulo">Sociologia</h2>
                    <button class="toggle-btn" type="button">▼</button>
                </div>
                <div class="cards-container" id="cards-sociologia" data-closed="true">

                </div>
            </section>

            <section class="disciplina-secao">
                <div class="disciplina-header">
                    <h2 class="disciplina-titulo">Filosofia</h2>
                    <button class="toggle-btn" type="button">▼</button>
                </div>
                <div class="cards-container" id="cards-filosofia" data-closed="true">

                </div>
            </section>
        </div>
    </main>
    <div id="resultado"></div>

<?php
    $scripts = ['disciplinasJS/disciplina'];
    include_once "footer.php";

?>
