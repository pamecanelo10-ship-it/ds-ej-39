<?php require_once '../../modelo/receta.php'; 
$Id = $_GET['id'] ?? null;
$Receta = $Id ? Receta::obtenerPorId($Id) : null;
$Titulo = $Receta ? 'Editar Receta' : 'Agregar Receta';
$Accion = $Receta ? 'editar' : 'agregar';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $Titulo; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <h1><?php echo $Titulo; ?></h1>

                <form method="POST" action="../acciones.php">
                    <input type="hidden" name="accion" value="<?php echo $Accion; ?>">
                    <?php if ($Receta): ?>
                    <input type="hidden" name="id" value="<?php echo $Receta->Id; ?>">
                    <?php endif; ?>

                    <div class="mb-3">
                        <label class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="nombre" value="<?php echo $Receta ? $Receta->Nombre : ''; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Ingredientes</label>
                        <input type="text" class="form-control" name="ingredientes" value="<?php echo $Receta ? $Receta->Ingredientes : ''; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tiempo de Preparacion</label>
                        <input type="number" class="form-control" name="tiempoPreparacion" value="<?php echo $Receta ? $Receta->TiempoPreparacion : ''; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Porciones</label>
                        <input type="text" class="form-control" name="porciones" value="<?php echo $Receta ? $Receta->Porciones : ''; ?>" required>
                    </div>
                    
                    
                   
                    <div class="mb-3">
                        <label class="form-label">Dificultad</label>
                        <input type="text" class="form-control" name="dificultad" value="<?php echo $Receta ? $Receta->Dificultad : ''; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Calorias</label>
                        <input type="text" class="form-control" name="calorias" value="<?php echo $Receta ? $Receta->Calorias : ''; ?>" required>
                    </div>


                    <div class="d-grid gap-2 d-sm-flex">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <a href="listar.php" class="btn btn-secondary">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
