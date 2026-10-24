<?php require_once '../../modelo/receta.php'; 
$Id = $_GET['id'] ?? null;
$Receta = $Id ? Receta::obtenerPorId($Id) : null;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Receta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <h1>Detalle de Receta</h1>

                <?php if ($Receta): ?>
                <div class="card">
                    <div class="card-body">
                        <p><strong>ID:</strong> <?php echo $Receta->Id; ?></p>
                        <p><strong>Nombre:</strong> <?php echo $Receta->Nombre; ?></p>
                        <p><strong>Ingredientes:</strong> <?php echo $Receta->Ingredientes; ?></p>
                        <p><strong>Tiempo de preparacion:</strong> <?php echo $Receta->TiempoPreparacion; ?></p>
                        <p><strong>Porciones:</strong> <?php echo $Receta->Porciones; ?></p>
                        <p><strong>Dificultad:</strong> <?php echo $Receta->Dificultad; ?></p>
                        <p><strong>Calorias:</strong> <?php echo $Receta->Calorias; ?></p>
                    </div>
                </div>

                <div class="mt-3">
                    <a href="listar.php" class="btn btn-secondary">Volver</a>
                    <a href="editar.php?id=<?php echo $Receta->id; ?>" class="btn btn-warning">Editar</a>
                </div>
                <?php else: ?>
                <div class="alert alert-danger">Receta no encontrada</div>
                <a href="listar.php" class="btn btn-secondary">Volver</a>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
