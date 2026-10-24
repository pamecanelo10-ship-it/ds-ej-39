<?php
require_once __DIR__ . '/../core/Database.php';

class Receta {

    
    public $Id;
    public $Nombre;
    public $Ingredientes;
    public $TiempoPreparacion;
    public $Porciones;
    public $Dificultad;
    public $Calorias;

    public function __construct() {
        // Constructor vacío para que FETCH_CLASS funcione correctamente
    }

    /**
     * Obtener todas las recetas desde la BD
     * Usando FETCH_CLASS para mapear automáticamente a objetos Receta (ORM)
     */
    public static function obtenerTodas() {
        try {
            $db = Database::getInstance()->getConnection();
            $stmt = $db->prepare('SELECT Id, Nombre, Ingredientes, TiempoPreparacion, Porciones, Dificultad, Calorias FROM recetas ORDER BY Id DESC');
            $stmt->execute();
            
            // PDO mapea automáticamente las columnas a las propiedades de la clase
            return $stmt->fetchAll(PDO::FETCH_CLASS, 'Receta');
        } catch (PDOException $e) {
            error_log("Error al obtener recetas: " . $e->getMessage());
            return [];
        }
    }

    /**
     * Obtener una receta por ID
     * Usando FETCH_CLASS para mapear automáticamente a objeto Receta (ORM)
     */
    public static function obtenerPorId($Id) {
        try {
            $db = Database::getInstance()->getConnection();
            $stmt = $db->prepare('SELECT Id, Nombre, Ingredientes, TiempoPreparacion, Porciones, Dificultad, Calorias FROM recetas WHERE Id = :id');
            $stmt->execute([':id' => $Id]);
            
            // PDO mapea automáticamente las columnas a las propiedades de la clase
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Receta');
            return $stmt->fetch();
        } catch (PDOException $e) {
            error_log("Error al obtener receta: " . $e->getMessage());
            return null;
        }
    }

    /**
     * Agregar una nueva receta
     */
    public static function agregar($Nombre, $Ingredientes, $TiempoPreparacion, $Porciones, $Dificultad, $Calorias) {
        try {
            $db = Database::getInstance()->getConnection();
            $stmt = $db->prepare('INSERT INTO recetas (Nombre, Ingredientes, TiempoPreparacion, Porciones, Dificultad, Calorias) VALUES (:nombre, :ingredientes, :tiempoPreparacion, :porciones, :dificultad, :calorias)');
            
            return $stmt->execute([
                ':nombre' => $Nombre,
                ':ingredientes' => $Ingredientes,
                ':tiempoPreparacion' => $TiempoPreparacion,
                ':porciones' => $Porciones,
                ':dificultad' => $Dificultad,
                ':calorias' => $Calorias

            ]);
        } catch (PDOException $e) {
            error_log("Error al agregar receta: " . $e->getMessage());
            return false;
        }
    }

    /**
     * Editar una receta existente
     */
    public static function editar($Id, $Nombre, $Ingredientes, $TiempoPreparacion, $Porciones, $Dificultad, $Calorias ) {
        try {
            $db = Database::getInstance()->getConnection();
            $stmt = $db->prepare('UPDATE recetas SET Nombre = :nombre, Ingredientes = :ingredientes, TiempoPreparacion = :tiempoPreparacion, Porciones = :porciones, Dificultad = :dificultad, Calorias = :calorias WHERE Id = :id');
            
            return $stmt->execute([
                ':id' => $Id,
                ':nombre' => $Nombre,
                ':ingredientes' => $Ingredientes,
                ':tiempoPreparacion' => $TiempoPreparacion,
                ':porciones' => $Porciones,
                ':dificultad' => $Dificultad,
                ':calorias' => $Calorias
            ]);
        } catch (PDOException $e) {
            error_log("Error al editar receta: " . $e->getMessage());
            return false;
        }
    }

    /**
     * Eliminar una receta
     */
    public static function eliminar($Id) {
        try {
            $db = Database::getInstance()->getConnection();
            $stmt = $db->prepare('DELETE FROM recetas WHERE Id = :id');
            
            return $stmt->execute([':id' => $Id]);
        } catch (PDOException $e) {
            error_log("Error al eliminar receta: " . $e->getMessage());
            return false;
        }
    }
}
?>
