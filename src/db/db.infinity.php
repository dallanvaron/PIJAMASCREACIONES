<?php
    class DbInfinity
    {
        private $servidor = 'localhost'; // Servidor
        private $usuario = 'root'; // Usuario PhpMyAdmin
        private $password = ''; // Contraseña usuario
        private $database = 'pijameria_infinity'; // Nombre base de datos

        function conexionDb() {
            $conexion = new mysqli($this->servidor, $this->usuario, $this->password, $this->database);
            if ($conexion -> connect_error) {
                die("Conexión fallida: " . $conexion -> connect_error);
            }

            return $conexion;
        }

        function insertarProducto($producto, $descripcion, $cantidad, $precio, $imagen_path = null) {
            $conexion = $this->conexionDb();
        
            if ($imagen_path) {
                $imagen_path = str_replace("../../", "", $imagen_path);
                
                $sql = "INSERT INTO productos (producto, descripcion, cantidad, precio_unidad, imagen)
                        VALUES ('$producto', '$descripcion', $cantidad, $precio, '$imagen_path')";
            } else {
                $sql = "INSERT INTO productos (producto, descripcion, cantidad, precio_unidad)
                        VALUES ('$producto', '$descripcion', $cantidad, $precio)";
            }
        
            if($conexion->query($sql) === TRUE) {
                echo "Registro guardado con éxito...";
            } else {
                echo "Error: " . $conexion->error;
            }
        
            $conexion->close();
        }
        
        

        function traerProductos() {
            $conexion = $this->conexionDb();

            $sql = "SELECT * FROM productos";
            $resultado = $conexion -> query($sql);
            
            $conexion->close();

            return $resultado;
        }

        function eliminarProducto($id) {
            $conexion = $this->conexionDb();
        
            // Obtener la ruta de la imagen antes de eliminar el registro
            $producto = $this->traerProducto($id);
        
            if ($producto && $producto->num_rows > 0) {
                $fila = $producto->fetch_assoc();
                $imagen_path = "../../". $fila['imagen'];
        
                // Eliminar la imagen si existe
                if (!empty($imagen_path) && file_exists($imagen_path)) {
                    unlink($imagen_path);
                }
            }
        
            // Eliminar el registro de la base de datos
            $sql = "DELETE FROM productos WHERE id = '" . $id . "'";
        
            if ($conexion->query($sql) === TRUE) {
                echo "Se ha eliminado con éxito el registro...";
            } else {
                echo "No se ha podido eliminar el registro...";
            }
        
            $conexion->close();
        }
        
        function traerProducto($id) {
            $conexion = $this -> conexionDb();

            $sql = "SELECT * FROM productos WHERE id= '" . $id . "'";

            $resultado = $conexion -> query($sql);
            
            $conexion->close();

            return $resultado;
        }

        function actualizarProducto($id, $producto, $descripcion, $cantidad, $precio, $imagen_path = null) {
            $conexion = $this->conexionDb();
        
            if ($imagen_path !== null) {
                $imagen_anterior = '../../' . $this->obtenerRutaImagen($id);
        
                if ($imagen_anterior !== null) {
                    unlink($imagen_anterior); // Elimina la imagen anterior
                }
        
                $imagen_path = str_replace("../../", "", $imagen_path);

                $sql = "UPDATE productos SET 
                    producto = '$producto', 
                    descripcion = '$descripcion', 
                    cantidad = $cantidad, 
                    precio_unidad = $precio, 
                    imagen = '$imagen_path'
                    WHERE id = '$id'";
            } else {
                $sql = "UPDATE productos SET 
                    producto = '$producto', 
                    descripcion = '$descripcion', 
                    cantidad = $cantidad, 
                    precio_unidad = $precio
                    WHERE id = '$id'";
            }
        
            if ($conexion->query($sql) === TRUE) {
                echo "Actualización realizada con éxito...";
            } else {
                echo "Error" . $conexion->error; 
            }
        
            $conexion->close();
        }
        
        function obtenerRutaImagen($id) {
            $conexion = $this->conexionDb();
        
            $sql = "SELECT imagen FROM productos WHERE id = '$id'";
            $resultado = $conexion->query($sql);
        
            $conexion->close();
            
            if ($resultado->num_rows > 0) {
                $row = $resultado->fetch_assoc();
                return $row['imagen'];
            } else {
                return null;
            }
        
        }

        function insertarCliente($nombre, $correo, $telefono, $productosInteres) {
            $conexion = $this->conexionDb();
        
            $sql = "INSERT INTO clientes (nombre, correo, telefono, productos_interes)
                    VALUES ('$nombre', '$correo', '$telefono', '$productosInteres')";
        
            if ($conexion->query($sql) === TRUE) {
                echo "Registro guardado con éxito...";
            } else {
                echo "Error: " . $conexion->error;
            }
        
            $conexion->close();
        }
        
    }

    

    
?>