<?php

$nameCSS = 'adminPage';
$titlePage = 'Gerenciamento de Monitores - MONIFÁCIL';

include_once 'header.php';


if (!isset($_SESSION['siape']) || $_SESSION['status'] !== 'Administrador') {
    header('Location: login.php?mensagem=permissao_negada');
    exit;
}

require_once __DIR__ . '/../src/utils/lista_materias.php';

require_once __DIR__ . '/../src/utils/pegar_users.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header('Location: admin-monitores.php?success=1');
    exit;
}

$searchQuery = $_GET['search'] ?? '';
$filterClass = $_GET['class'] ?? '';

$filteredUsers = array_filter($lista_users, function ($lista_users) use ($searchQuery, $filterClass) {
    $matchSearch = empty($searchQuery) ||
        stripos($lista_users['name'], $searchQuery) !== false ||
        stripos($lista_users['id'], $searchQuery) !== false;
    $matchClass = empty($filterClass) || $lista_users['class'] === $filterClass;
    return $matchSearch && $matchClass;
});

$classes = array_unique(array_column($lista_users, 'class'));
sort($classes);


?>


<main class="container mx-auto px-6 py-8">
    <div class="mb-6 text-sm text-gray-600">
        <span>Painel Admin</span> / <span class="text-gray-900 font-semibold">Gerenciar Monitores</span>
    </div>

    <div class="mb-8">
        <h2 class="text-3xl font-bold text-gray-900 mb-2">Gerenciamento de Monitores</h2>
        <p class="text-gray-600">Selecione os usuários que serão monitores e atribua as matérias que irão lecionar</p>
    </div>

    <?php if (isset($_GET['success'])): ?>
        <div id="alertSuccess" class="alert-success mb-6">
            ✓ Alterações salvas com sucesso!
        </div>
    <?php endif; ?>

    <div class="card p-6 mb-8">
        <h3 class="text-lg font-semibold text-gray-900 mb-4">Filtros e Busca</h3>
        <form method="GET" class="grid grid-cols-1 md:grid-cols-3 gap-4">

            <div class="input-search">
                <input
                    type="text"
                    name="search"
                    placeholder="Buscar por nome ou ID..."
                    value="<?php echo htmlspecialchars($searchQuery); ?>"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
            </div>

            <select
                name="class"
                class="select-custom w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                <option value="">Todas as turmas</option>
                <?php foreach ($classes as $class): ?>
                    <option value="<?php echo $class; ?>" <?php echo $filterClass === $class ? 'selected' : ''; ?>>
                        <?php echo htmlspecialchars($class); ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <button
                type="submit"
                class="button-save">
                🔍 Filtrar
            </button>
        </form>
    </div>

    <form method="POST" id="monitoresForm" action="../src/controllers/cadastrar_monitores_admin.php">
        <div class="grid grid-cols-1 gap-4 mb-8">
            <?php foreach ($filteredUsers as $user): ?>
                <div class="card p-6 transition-all hover:shadow-lg">
                    <div class="grid grid-cols-1 md:grid-cols-12 gap-4 items-start card-user">

                        <div class="md:col-span-4 flex items-center gap-4">
                            <div class="user-avatar">
                                <img class="user-avatar-foto" src="<?php echo $user['avatar']; ?>" alt="">
                            </div>
                            <div>
                                <div class="flex items-center gap-2 mb-2">
                                    <h4 class="font-semibold text-gray-900"><?php echo htmlspecialchars($user['name']); ?></h4>
                                    <span class="badge"><?php echo htmlspecialchars($user['class']); ?></span>
                                </div>
                                <p class="text-sm text-gray-600">ID: <?php echo htmlspecialchars($user['id']); ?></p>
                                <p class="text-sm text-gray-600"><?php echo htmlspecialchars($user['email']); ?></p>
                            </div>
                        </div>

                        <div class="md:col-span-2 flex items-center gap-3">
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input
                                    type="checkbox"
                                    name="monitor_<?php echo $user['id']; ?>"
                                    class="checkbox-custom"
                                    <?php echo isset($user['monitor']) && $user['monitor'] ? 'checked' : ''; ?>
                                    onchange="toggleSubjectsField(this, '<?php echo $user['id']; ?>')">
                                <span class="text-sm font-medium text-gray-700">Monitor</span>
                            </label>
                        </div>

                        <div class="md:col-span-6">
                            <div id="subjects_<?php echo $user['id']; ?>" class="<?php echo isset($user['monitor']) && $user['monitor'] ? '' : 'opacity-50 pointer-events-none'; ?>">
                                <label class="text-sm font-medium text-gray-700 block mb-2">Matérias que irá lecionar:</label>
                                <div class="flex flex-wrap gap-2">
                                    <?php
                                    $userSubjects = $user['subjects'] ?? [];
                                    foreach ($materias as $mainSubject => $levels):
                                        foreach ($levels as $subject):
                                    ?>
                                            <label class="flex items-center gap-2 px-3 py-2 border border-gray-300 rounded-lg cursor-pointer hover:bg-gray-50 transition">
                                                <input
                                                    type="checkbox"
                                                    name="subjects_<?php echo $user['id']; ?>[]"
                                                    value="<?php echo htmlspecialchars($subject); ?>"
                                                    <?php echo in_array($subject, $userSubjects) ? 'checked' : ''; ?>
                                                    class="form-checkbox">
                                                <span class="text-xs font-medium"><?php echo htmlspecialchars($subject); ?></span>
                                            </label>
                                    <?php endforeach;
                                    endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <?php if (empty($filteredUsers)): ?>
            <div class="card p-12 text-center">
                <div class="text-4xl mb-4">🔍</div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Nenhum usuário encontrado</h3>
                <p class="text-gray-600">Tente ajustar seus filtros de busca</p>
            </div>
        <?php endif; ?>
        <?php if (!empty($filteredUsers)): ?>
            <div class="flex justify-center mt-8">
                <button type="submit" class="button-save text-lg px-8 py-3">
                    💾 Salvar Alterações
                </button>
            </div>
        <?php endif; ?>
    </form>
</main>

<script>
    setTimeout(() => {
        const alert = document.getElementById('alertSuccess');
        if (alert) {
            alert.style.opacity = '0';
            alert.style.transition = '0.5s';

            setTimeout(() => alert.remove(), 500);
        }
    }, 5000);
</script>

<script>
    function toggleSubjectsField(checkbox, userId) {
        const subjectsDiv = document.getElementById('subjects_' + userId);
        const checkboxes = subjectsDiv.querySelectorAll('input[type="checkbox"]');

        if (checkbox.checked) {
            subjectsDiv.classList.remove('opacity-50', 'pointer-events-none');
        } else {
            subjectsDiv.classList.add('opacity-50', 'pointer-events-none');
            checkboxes.forEach(cb => cb.checked = false);
        }
    }
</script>

<?php

include_once 'footer.php';

?>