<?php
session_start();

if (!isset($_SESSION['user'])) {
    die("Por favor, faça login para acessar esta página.");
}

$cargo = $_SESSION['tipo'] ?? '';

$usuarios = [
    ['id' => 1, 'nome' => 'Alice', 'status' => 'Ativo'],
    ['id' => 2, 'nome' => 'Bob', 'status' => 'Mutado']
];
?>

<h2>Olá! Você está logado como: <?php echo htmlspecialchars(strtoupper($_SESSION['user'])); ?> (<?php echo htmlspecialchars(strtoupper($cargo)); ?>)</h2>
<a href="index.php">Voltar para a Home</a> | <a href="logout.php">Sair</a>
<hr>

<?php if ($cargo === 'usuario'): ?>
    <h3>Seu Bloco de Notas</h3>
    <textarea id="nota" placeholder="Digite algo aqui..." rows="4" cols="40"></textarea>
    <p id="aviso" style="color: green;"></p>

    <script>
        const campo = document.getElementById('nota');
        campo.value = localStorage.getItem('minha_nota') || '';
        campo.addEventListener('input', () => {
            localStorage.setItem('minha_nota', campo.value);
            document.getElementById('aviso').textContent = "Salvo!";
        });
    </script>

<?php elseif ($cargo === 'mod'): ?>
    <h3>Lista de Usuários (Apenas Visualização)</h3>
    <ul>
        <?php foreach ($usuarios as $u): ?>
            <li><strong><?php echo htmlspecialchars($u['nome']); ?></strong> - Status: <?php echo htmlspecialchars($u['status']); ?></li>
        <?php endforeach; ?>
    </ul>

<?php elseif ($cargo === 'admin'): ?>
    <h3>Gerenciar Usuários</h3>
    <?php foreach ($usuarios as $u): ?>
        <p>
            <?php echo htmlspecialchars($u['nome']); ?>
            <a href="acoes.php?acao=editar&id=<?php echo $u['id']; ?>">[Editar]</a>
            <a href="acoes.php?acao=excluir&id=<?php echo $u['id']; ?>" onclick="return confirm('Apagar este usuário?')">[Excluir]</a>
        </p>
    <?php endforeach; ?>

<?php endif; ?>