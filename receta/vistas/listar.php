
<?php 
require_once '../../modelo/receta.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recetas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row mb-4">
            <div class="col">
                <h1>Recetas</h1>
            </div>
            <div class="col text-end">
                <a href="editar.php" class="btn btn-success">+ Agregar</a>
            </div>
        </div>

        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Ingredientes</th>
                    <th>TiempoPreparacion</th>
                    <th>Porciones</th>
                    <th>Dificultad</th>
                    <th>Calorias</th>
                </tr>
            </thead>
            <tbody>
                <?php $recetas = Receta::obtenerTodas(); foreach ($recetas as $r): ?>
                <tr>
                    <td><?php echo $r->Id; ?></td>
                    <td><?php echo $r->Nombre; ?></td>
                    <td><?php echo $r->Ingredientes; ?></td>
                    <td><?php echo $r->TiempoPreparacion; ?></td>
                    <td><?php echo $r->Porciones; ?></td>
                    <td><?php echo $r->Dificultad; ?></td>
                    <td><?php echo $r->Calorias; ?></td>
                    
                    <td>
                        <a href="ver.php?id=<?php echo $r->Id; ?>" class="btn btn-sm btn-primary">Ver</a>
                        <a href="editar.php?id=<?php echo $r->Id; ?>" class="btn btn-sm btn-warning">Editar</a>
                        <form method="POST" action="../acciones.php" style="display:inline;">
                            <input type="hidden" name="accion" value="eliminar">
                            <input type="hidden" name="id" value="<?php echo $r->Id; ?>">
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Está seguro?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
