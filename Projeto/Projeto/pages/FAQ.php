<?php 
    $nameCSS = "FAQ";
    $titlePage = "Página de FAQs";

    include_once "header.php";
?>
    <main>
        <div class="faq-barra-pesquisa secao-pesquisa">
            <input type="search" class="barra-pesquisa-input" placeholder="Pesquisar">
        </div>

        <div class="faq-conteudo">
            <section class="faq-secao">
                <div class="faq-header">
                    <h2 class="faq-titulo">Como faço para agendar uma monitoria?</h2>
                    <button class="faq-toggle-btn" type="button">▼</button>
                </div>
                <div class="faq-cards-container" data-closed="true">
                    <div class="faq-card">
                        <div class="faq-card-header">Para agendar uma monitoria, você deve entrar em contato com um dos
                            monitores da disciplina desejada, verificando a disponibilidade dele e informando a matéria
                            da qual você tem dúvidas.</div>
                    </div>
                </div>
            </section>

            <section class="faq-secao">
                <div class="faq-header">
                    <h2 class="faq-titulo">Quais disciplinas estão disponíveis para monitoria?</h2>
                    <button class="faq-toggle-btn" type="button">▼</button>
                </div>
                <div class="faq-cards-container" data-closed="true">
                    <div class="faq-card">
                        <div class="faq-card-header">É necessário verificar na página de monitores se há um monitor da
                            disciplina desejada</div>
                    </div>
                </div>
            </section>
            <section class="faq-secao">
                <div class="faq-header">
                    <h2 class="faq-titulo"> Qual conteúdo será abordado na monitoria? </h2>
                    <button class="faq-toggle-btn" type="button">▼</button>
                </div>
                <div class="faq-cards-container" data-closed="true">
                    <div class="faq-card">
                        <div class="faq-card-header">O conteúdo abordado na monitoria aparece no espaço referente àquela
                            monitoria, porém, você pode pedir ao monitor para explicar outras matérias na sala.
                        </div>

                    </div>
                </div>
            </section>
            <section class="faq-secao">
                <div class="faq-header">
                    <h2 class="faq-titulo"> Quem são os monitores e como entrar em contato com eles?
                    </h2>
                    <button class="faq-toggle-btn" type="button">▼</button>
                </div>
                <div class="faq-cards-container" data-closed="true">
                    <div class="faq-card">
                        <div class="faq-card-header">Você pode encontrar os monitores e suas respectivas informações na
                            página “Monitores” do nosso site.
                        </div>

                    </div>
                </div>
            </section>
            <section class="faq-secao">
                <div class="faq-header">
                    <h2 class="faq-titulo"> Posso reagendar ou desmarcar uma monitoria?
                    </h2>
                    <button class="faq-toggle-btn" type="button">▼</button>
                </div>
                <div class="faq-cards-container" data-closed="true">
                    <div class="faq-card">
                        <div class="faq-card-header">Sim, é possível reagendar ou remarcar uma monitoria, basta entrar
                            em contato com o monitor.

                        </div>

                    </div>
                </div>
            </section>
            <section class="faq-secao">
                <div class="faq-header">
                    <h2 class="faq-titulo">Onde acontecem as monitorias? </h2>
                    <button class="faq-toggle-btn" type="button">▼</button>
                </div>
                <div class="faq-cards-container" data-closed="true">
                    <div class="faq-card">
                        <div class="faq-card-header">As monitorias acontecem em uma sala determinada pelo monitor, essa
                            informação está disponível junto com as outras informações da monitoria desejada, na agenda.

                        </div>

                    </div>
                </div>
            </section>
            <section class="faq-secao">
                <div class="faq-header">
                    <h2 class="faq-titulo">Como sei se minha vaga na monitoria foi confirmada?
 </h2>
                    <button class="faq-toggle-btn" type="button">▼</button>
                </div>
                <div class="faq-cards-container" data-closed="true">
                    <div class="faq-card">
                        <div class="faq-card-header">Você confirma a sua presença na monitoria por meio do botão “eu vou”, após isso sua vaga foi confirmada

                        </div>

                    </div>
                </div>
            </section>
            <section class="faq-secao">
                <div class="faq-header">
                    <h2 class="faq-titulo">Como recuperar sua senha? </h2>
                    <button class="faq-toggle-btn" type="button">▼</button>
                </div>
                <div class="faq-cards-container" data-closed="true">
                    <div class="faq-card">
                        <div class="faq-card-header">Para recuperar a sua senha, basta clicar no botão “esqueci a minha senha” abaixo do login.


                        </div>

                    </div>
                </div>
            </section>
            <section class="faq-secao">
                <div class="faq-header">
                    <h2 class="faq-titulo">Como entrar em contato com o monitor? </h2>
                    <button class="faq-toggle-btn" type="button">▼</button>
                </div>
                <div class="faq-cards-container" data-closed="true">
                    <div class="faq-card">
                        <div class="faq-card-header">Para entrar em contato com o monitor, você pode utilizar o chat do nosso site ou então, utilizar o e-mail do monitor, que está disponível na página “Monitores”.

                        </div>

                    </div>
                </div>
            </section>
            <section class="faq-secao">
                <div class="faq-header">
                    <h2 class="faq-titulo">Como acessar os anexos da monitoria que participei? </h2>
                    <button class="faq-toggle-btn" type="button">▼</button>
                </div>
                <div class="faq-cards-container" data-closed="true">
                    <div class="faq-card">
                        <div class="faq-card-header">Os anexos da monitoria estão disponíveis junto com as outras informações da monitoria desejada, na agenda

                        </div>

                    </div>
                </div>
            </section>
        </div>
    </main>


<?php
    $scripts = ['faqJs/FAQ'];
    include_once "footer.php";

?>
