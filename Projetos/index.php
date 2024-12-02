<?php include('layouts/header.php'); ?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de Signo</title>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Descubra Seu Signo</h1>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form id="signo-form" method="POST" action="show_zodiac_sign.php" class="p-4 border rounded bg-light">
                    <div class="mb-3">
                        <label for="data_nascimento" class="form-label">Digite sua data de nascimento</label>
                        <input 
                            type="date" 
                            id="data_nascimento" 
                            name="data_nascimento" 
                            class="form-control" 
                            required>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary w-100">Consultar Signo</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
