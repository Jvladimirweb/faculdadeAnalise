<?php

function buscarSigno($dataNascimento) {
    $xml = simplexml_load_file('signos.xml');
    $data = DateTime::createFromFormat('Y-m-d', $dataNascimento);
    if (!$data) {
        return "Data inválida!";
    }
    
    // Obter o ano do nascimento
    $ano = $data->format('Y'); 
    foreach ($xml->signo as $signo) {
        $dataInicio = DateTime::createFromFormat('d/m/Y', $signo->dataInicio . "/$ano");
        $dataFim = DateTime::createFromFormat('d/m/Y', $signo->dataFim . "/$ano");

        if ($dataInicio && $dataFim && $data >= $dataInicio && $data <= $dataFim) {
            return [
                'nome' => (string) $signo->signoNome,
                'caracteristicas' => (string) $signo->descricao
            ];
        }
    }

    return "Signo não encontrado!";
}

if (isset($_POST['data_nascimento'])) {
    $dataNascimento = $_POST['data_nascimento'];
    $signo = buscarSigno($dataNascimento);
} else {
    $signo = null;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado do Signo</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <?php if ($signo): ?>
        <?php if (is_array($signo)): ?>
            <div class="resultado-signo">
                <h2>Seu signo é: <?= htmlspecialchars($signo['nome']) ?></h2>
                <p>Características: <?= htmlspecialchars($signo['caracteristicas']) ?></p>
            </div>
        <?php else: ?>
            <p><?= htmlspecialchars($signo) ?></p>
        <?php endif; ?>
    <?php else: ?>
        <p>Erro: Nenhuma data de nascimento foi enviada.</p>
    <?php endif; ?>
    <a class="voltar-link" href="index.php">Voltar</a>
</body>
</html>
