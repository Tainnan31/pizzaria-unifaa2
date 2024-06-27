<?php
session_start();
$carrinho = isset($_SESSION['carrinho']) ? $_SESSION['carrinho'] : [];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho - Pizzaria UNIFAA</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <?php include 'menu.php'; ?>
    <h1>Carrinho de Compras</h1>
    <?php if (empty($carrinho)): ?>
        <p>Seu carrinho está vazio.</p>
    <?php else: ?>
        <ul>
            <?php foreach ($carrinho as $item): ?>
                <li><?php echo $item['pizza'] . ' - R$ ' . $item['preco']; ?></li>
            <?php endforeach; ?>
        </ul>
        <a href="finalizar.php">Finalizar Pedido</a>
    <?php endif; ?>
</body>
</html>
