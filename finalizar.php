<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Aqui você pode adicionar lógica para salvar o pedido em um banco de dados ou enviar um email
    unset($_SESSION['carrinho']);
    header('Location: obrigado.php');
    exit();
}

$carrinho = isset($_SESSION['carrinho']) ? $_SESSION['carrinho'] : [];
$total = 0;
foreach ($carrinho as $item) {
    $total += (float) $item['preco'];
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finalizar Pedido - Pizzaria UNIFAA</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <?php include 'menu.php'; ?>
    <h1>Finalizar Pedido</h1>
    <?php if (empty($carrinho)): ?>
        <p>Seu carrinho está vazio.</p>
    <?php else: ?>
        <ul>
            <?php foreach ($carrinho as $item): ?>
                <li><?php echo $item['pizza'] . ' - R$ ' . $item['preco']; ?></li>
            <?php endforeach; ?>
        </ul>
        <p>Total: R$ <?php echo $total; ?></p>
        <form method="POST" action="finalizar.php">
            <button type="submit">Confirmar Pedido</button>
        </form>
    <?php endif; ?>
</body>
</html>
