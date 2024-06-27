<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $pizza = $_POST['pizza'];
    $preco = $_POST['preco'];

    if (!isset($_SESSION['carrinho'])) {
        $_SESSION['carrinho'] = [];
    }

    $_SESSION['carrinho'][] = ['pizza' => $pizza, 'preco' => $preco];
    header('Location: carrinho.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Efetuar Pedido - Pizzaria UNIFAA</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <?php include 'menu.php'; ?>
    <h1>Efetuar Pedido</h1>
    <form method="POST" action="pedido.php">
        <label for="pizza">Escolha sua pizza:</label>
        <select name="pizza" id="pizza">
            <option value="Margherita">Margherita - R$ 25,00</option>
            <option value="Calabresa">Calabresa - R$ 30,00</option>
            <option value="Quatro Queijos">Quatro Queijos - R$ 35,00</option>
            <option value="Portuguesa">Portuguesa - R$ 28,00</option>
        </select>
        <input type="hidden" name="preco" id="preco">
        <button type="submit">Adicionar ao Carrinho</button>
    </form>
</body>
<script>
document.getElementById('pizza').addEventListener('change', function() {
    var selectedOption = this.options[this.selectedIndex];
    var preco = selectedOption.text.split('- R$ ')[1];
    document.getElementById('preco').value = preco;
});
</script>
</html>
