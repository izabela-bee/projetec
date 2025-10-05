<?php 
$nameCSS = "adminPage";
$titlePage = "Página de Admin";

include_once "header.php";
if($_SESSION['status'] !== 'Administrador'){
    header('Location: inicial.php?mensagem=usuario_sem_permissao_acesso');
}
?>

<main class="main-admin">

    <section class="admin-procurar_alunos">
        <div class="admin-procurar-container">
            <label>
                <input type="search" name="pesquisaAlunos" class="admin-procurar_alunos-pesquisa" placeholder="Pesquise o aluno que deseja encontrar">
                <img src="../public/img/formsComponents/search.png" alt="Icon de pesquisa" class="icon-search">
            </label>
        </div>
        

        <table class="tabela-alunos-geral">
            <tr>
                <th>0078953</th>
                <th class="linha-foto">Gabriel Luis B. S. <img src="../public/img/fotosPerfil/avatar.png" class="foto-table" alt="Foto avatar"></th>
                <th class="linha-check">INFO-3 <input type="checkbox" name="check-aluno-1" class="check-aluno"></th>
            </tr>  
            <tr>
                <th>2223445</th>
                <th class="linha-foto">Rafael A. S. <img src="../public/img/fotosPerfil/avatar.png" class="foto-table" alt="Foto avatar"></th>
                <th class="linha-check">ADM-2 <input type="checkbox" name="check-aluno-2" class="check-aluno"></th>
            </tr>  
            <tr>
                <th>0078953</th>
                <th class="linha-foto">Gabriel Luis B. S. <img src="../public/img/fotosPerfil/avatar.png" class="foto-table" alt="Foto avatar"></th>
                <th class="linha-check">INFO-3 <input type="checkbox" name="check-aluno-1" class="check-aluno"></th>
            </tr>
            <tr>
                <th>0078953</th>
                <th class="linha-foto">Gabriel Luis B. S. <img src="../public/img/fotosPerfil/avatar.png" class="foto-table" alt="Foto avatar"></th>
                <th class="linha-check">INFO-3 <input type="checkbox" name="check-aluno-1" class="check-aluno"></th>
            </tr>
            <tr>
                <th>0078953</th>
                <th class="linha-foto">Gabriel Luis B. S. <img src="../public/img/fotosPerfil/avatar.png" class="foto-table" alt="Foto avatar"></th>
                <th class="linha-check">INFO-3 <input type="checkbox" name="check-aluno-1" class="check-aluno"></th>
            </tr>
            <tr>
                <th>0078953</th>
                <th class="linha-foto">Gabriel Luis B. S. <img src="../public/img/fotosPerfil/avatar.png" class="foto-table" alt="Foto avatar"></th>
                <th class="linha-check">INFO-3 <input type="checkbox" name="check-aluno-1" class="check-aluno"></th>
            </tr>
            <tr>
                <th>0078953</th>
                <th class="linha-foto">Gabriel Luis B. S. <img src="../public/img/fotosPerfil/avatar.png" class="foto-table" alt="Foto avatar"></th>
                <th class="linha-check">INFO-3 <input type="checkbox" name="check-aluno-1" class="check-aluno"></th>
            </tr>
            <tr>
                <th>0078953</th>
                <th class="linha-foto">Gabriel Luis B. S. <img src="../public/img/fotosPerfil/avatar.png" class="foto-table" alt="Foto avatar"></th>
                <th class="linha-check">INFO-3 <input type="checkbox" name="check-aluno-1" class="check-aluno"></th>
            </tr>
            <tr>
                <th>0078953</th>
                <th class="linha-foto">Gabriel Luis B. S. <img src="../public/img/fotosPerfil/avatar.png" class="foto-table" alt="Foto avatar"></th>
                <th class="linha-check">INFO-3 <input type="checkbox" name="check-aluno-1" class="check-aluno"></th>
            </tr>
            <tr>
                <th>0078953</th>
                <th class="linha-foto">Gabriel Luis B. S. <img src="../public/img/fotosPerfil/avatar.png" class="foto-table" alt="Foto avatar"></th>
                <th class="linha-check">INFO-3 <input type="checkbox" name="check-aluno-1" class="check-aluno"></th>
            </tr>
            <tr>
                <th>0078953</th>
                <th class="linha-foto">Gabriel Luis B. S. <img src="../public/img/fotosPerfil/avatar.png" class="foto-table" alt="Foto avatar"></th>
                <th class="linha-check">INFO-3 <input type="checkbox" name="check-aluno-1" class="check-aluno"></th>
            </tr>
            <tr>
                <th>0078953</th>
                <th class="linha-foto">Gabriel Luis B. S. <img src="../public/img/fotosPerfil/avatar.png" class="foto-table" alt="Foto avatar"></th>
                <th class="linha-check">INFO-3 <input type="checkbox" name="check-aluno-1" class="check-aluno"></th>
            </tr>
            <tr>
                <th>0078953</th>
                <th class="linha-foto">Gabriel Luis B. S. <img src="../public/img/fotosPerfil/avatar.png" class="foto-table" alt="Foto avatar"></th>
                <th class="linha-check">INFO-3 <input type="checkbox" name="check-aluno-1" class="check-aluno"></th>
            </tr>
            <tr>
                <th>0078953</th>
                <th class="linha-foto">Gabriel Luis B. S. <img src="../public/img/fotosPerfil/avatar.png" class="foto-table" alt="Foto avatar"></th>
                <th class="linha-check">INFO-3 <input type="checkbox" name="check-aluno-1" class="check-aluno"></th>
            </tr>
        </table>
    </section>

    <section class="admin-achar_alunos">
        <div class="admin-achar_alunos-selecionados">
            <h2>Alunos Selecionados: </h2>
            <table class="admin-achar_alunos-selecionados-tabela">
                <tr class="admin-achar_alunos-selecionados-tabela-linha aluno_selecionado_1">
                    <th>0078953</th>
                    <th class="linha-foto">Gabriel Luis B. S. <img src="../public/img/fotosPerfil/avatar.png" class="foto-table" alt="Foto avatar"></th>
                    <th class="linha-check">INFO-3</th>
                </tr> 
                <tr class="admin-achar_alunos-selecionados-tabela-linha aluno_selecionado_2">
                    <th>0078953</th>
                    <th class="linha-foto">Gabriel Luis B. S. <img src="../public/img/fotosPerfil/avatar.png" class="foto-table" alt="Foto avatar"></th>
                    <th class="linha-check">INFO-3</th>
                </tr> 
                <tr class="admin-achar_alunos-selecionados-tabela-linha aluno_selecionado_3">
                    <th>0078953</th>
                    <th class="linha-foto">Gabriel Luis B. S. <img src="../public/img/fotosPerfil/avatar.png" class="foto-table" alt="Foto avatar"></th>
                    <th class="linha-check">INFO-3</th>
                </tr> 
                <tr class="admin-achar_alunos-selecionados-tabela-linha aluno_selecionado_4">
                    <th>0078953</th>
                    <th class="linha-foto">Gabriel Luis B. S. <img src="../public/img/fotosPerfil/avatar.png" class="foto-table" alt="Foto avatar"></th>
                    <th class="linha-check">INFO-3</th>
                </tr> 
                <tr class="admin-achar_alunos-selecionados-tabela-linha aluno_selecionado_5">
                    <th>0078953</th>
                    <th class="linha-foto">Gabriel Luis B. S. <img src="../public/img/fotosPerfil/avatar.png" class="foto-table" alt="Foto avatar"></th>
                    <th class="linha-check">INFO-3</th>
                </tr> 
                <tr class="admin-achar_alunos-selecionados-tabela-linha aluno_selecionado_6">
                    <th>0078953</th>
                    <th class="linha-foto">Gabriel Luis B. S. <img src="../public/img/fotosPerfil/avatar.png" class="foto-table" alt="Foto avatar"></th>
                    <th class="linha-check">INFO-3</th>
                </tr> 
            </table>
        </div>

        <div class="admin-achar_alunos-materias">
            <h2 class="admin-achar_alunos-materias-title">Disciplina Monitorada:</h2>
            <div class="materias_monitoria_aluno_1">
                <select name="materias_monitoria" class="materias_monitoria">
                    <option value="matematica">Matemática</option>
                    <option value="portugues">Português</option>
                    <option value="fisica">Fásica</option>
                    <option value="quimica">Química</option>
                    <option value="biologia">Biologia</option>
                    <option value="ed-fisica">Educação F.</option>
                </select>
            </div>
            <div class="materias_monitoria_aluno_2">
                <select name="materias_monitoria" class="materias_monitoria">
                    <option value="matematica">Matematica</option>
                    <option value="portugues">Português</option>
                    <option value="fisica">Fisica</option>
                    <option value="quimica">Quimica</option>
                    <option value="biologia">Biologia</option>
                    <option value="ed-fisica">Educação F.</option>
                </select>
            </div>
            <div class="materias_monitoria_aluno_3">
                <select name="materias_monitoria" class="materias_monitoria">
                    <option value="matematica">Matematica</option>
                    <option value="portugues">Português</option>
                    <option value="fisica">Fisica</option>
                    <option value="quimica">Quimica</option>
                    <option value="biologia">Biologia</option>
                    <option value="ed-fisica">Educação F.</option>
                </select>
            </div>
            <div class="materias_monitoria_aluno_4">
                <select name="materias_monitoria" class="materias_monitoria">
                    <option value="matematica">Matematica</option>
                    <option value="portugues">Português</option>
                    <option value="fisica">Fisica</option>
                    <option value="quimica">Quimica</option>
                    <option value="biologia">Biologia</option>
                    <option value="ed-fisica">Educação F.</option>
                </select>
            </div>
            <div class="materias_monitoria_aluno_5">
                <select name="materias_monitoria" class="materias_monitoria">
                    <option value="matematica">Matematica</option>
                    <option value="portugues">Português</option>
                    <option value="fisica">Fisica</option>
                    <option value="quimica">Quimica</option>
                    <option value="biologia">Biologia</option>
                    <option value="ed-fisica">Educação F.</option>
                </select>
            </div>
            <div class="materias_monitoria_aluno_6">
                <select name="materias_monitoria" class="materias_monitoria">
                    <option value="matematica">Matematica</option>
                    <option value="portugues">Português</option>
                    <option value="fisica">Fisica</option>
                    <option value="quimica">Quimica</option>
                    <option value="biologia">Biologia</option>
                    <option value="ed-fisica">Educação F.</option>
                </select>
            </div>
        </div>
    </section>

    <button class="botao_confirmar_inscricao_monitores">
        Cadastrar
    </button>

</main>


<?php
    $scripts = [];
    include_once "footer.php";

?>
