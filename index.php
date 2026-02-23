<?php
require_once 'Generador.php';

$resultados = [];
if ($_POST) {
    $gen = new Generador();
    $resultados = $gen->calcular(
        $_POST['x0'], 
        $_POST['a'], 
        $_POST['c'], 
        $_POST['m'], 
        $_POST['n']
    );
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>SVPE - Sistema de Validación</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h2 class="text-center">Sistema de Validación de Procesos Estocásticos (SVPE)</h2>
        <p class="text-center text-muted">Objetivo A: Generador Congruencial Lineal</p>
        
        <div class="card shadow-sm p-4 mb-4">
            <form method="POST" class="row g-3">
                <div class="col-md-2">
                    <label>Semilla (X0)</label>
                    <input type="number" name="x0" class="form-control" required value="27">
                </div>
                <div class="col-md-2">
                    <label>Constante (a)</label>
                    <input type="number" name="a" class="form-control" required value="17">
                </div>
                <div class="col-md-2">
                    <label>Constante (c)</label>
                    <input type="number" name="c" class="form-control" required value="43">
                </div>
                <div class="col-md-3">
                    <label>Módulo (m)</label>
                    <input type="number" name="m" class="form-control" required value="100">
                </div>
                <div class="col-md-3">
                    <label>Cantidad (n)</label>
                    <input type="number" name="n" class="form-control" required value="10">
                </div>
                <div class="col-12 text-center">
                    <button type="submit" class="btn btn-primary">Generar Números</button>
                </div>
            </form>
        </div>

        <?php if ($resultados): ?>
            <div class="card shadow-sm p-4">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>n</th>
                            <th>Xn (Valor)</th>
                            <th>ri (Normalizado)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($resultados as $res): ?>
                        <tr>
                            <td><?php echo $res['n']; ?></td>
                            <td><?php echo $res['x']; ?></td>
                            <td><?php echo $res['ri']; ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>