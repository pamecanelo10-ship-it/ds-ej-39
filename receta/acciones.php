<?php
require_once '../modelo/receta.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $Accion = $_POST['accion'] ?? '';
    $Nombre = $_POST['nombre'] ?? '';
    $Ingredientes = $_POST['ingredientes'] ?? '';
    $TiempoPreparacion = $_POST['tiempoPreparacion'] ?? '';
    $Porciones = $_POST['porciones'] ?? '';
    $Dificultad = $_POST['dificultad'] ?? '';
    $Calorias = $_POST['calorias'] ?? '';
    
    
    $Id = $_POST['id'] ?? '';

    if ($Accion === 'agregar') {
        Receta::agregar($Nombre, $Ingredientes, $TiempoPreparacion, $Porciones, $Dificultad, $Calorias);
        header('Location: vistas/listar.php');
        exit;
    }

    if ($Accion === 'editar') {
        Receta::editar($Id, $Nombre, $Ingredientes, $TiempoPreparacion, $Porciones, $Dificultad, $Calorias);
        header('Location: vistas/listar.php');
        exit;
    }

    if ($Accion === 'eliminar') {
        Receta::eliminar($Id);
        header('Location: vistas/listar.php');
        exit;
    }
}
?>
