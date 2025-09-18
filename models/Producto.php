<?php
    class Productos extends Conectar {
        public function get_producto() {
            $conectar = parent::conexion(); //
            parent::set_names();
            $sql = "SELECT * FROM tm_producto WHERE status_product = 1";
            $sql = $conectar->prepare($sql);
            $sql->execute();

            return $resultado = $sql->fetchAll();
        }

        public function get_producto_x_id($product_id) { // Hacer busqueda por ID
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "SELECT * FROM tm_producto WHERE product_id = ?";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $product_id);
            $sql->execute();

            return $resultado = $sql->fetchAll();
        }

        public function delete_producto($product_id) { // Eliminar producto
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "UPDATE tm_producto SET status_product, date_del = now() WHERE product_id = ?";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1,$product_id);
            $sql->execute();

            return $resultado = $sql->fetchAll();
        }

        public function insert_producto($product_name) {
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "INSERT INTO tm_producto (product_id, product_name, date_create, date_mod, date_del, status_product) VALUES (NULL, ?, now(), NULL, NULL, 1);";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1,$product_name);
            $sql->execute();

            return $resultado = $sql->fetchAll();
        }

        public function update_producto($product_id, $product_name) {
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "UPDATE tm_producto SET product_name = ?, date_mod = now() WHERE product_id = ?";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1,$product_name);
            $sql->bindValue(2,$product_id);
            $sql->execute();

            return $resultado = $sql->fetchAll();
        }   
    }
?>
