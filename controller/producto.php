<?php
    require_once("../config/conexion.php");
    require_once("../models/Productos.php");
    $producto = new Producto();

    switch($_GET["op"]) {
        case "listar":
            $datos = $producto->get_producto();
            $data = Array();
            foreach($datos as $row) {
                    $sub_array = array();
                    $sub_array[] = $row["product_name"];
                    $sub_array[] = '<button type="button" onClick="editar('.$row["product_id"].');" id="'.$row["product_id"].'" class="btn btn-inline btn-warning btn-sm ladda-button"><i class="fa fa-edit"></i></button>';
                    $sub_array[] = '<button type="button" onClick="eliminar('.$row["product_id"].');" id="'.$row["product_id"].'" class="btn btn-inline btn-danger btn-sm ladda-button"><i class="fa fa-trash"></i></button>';
                    $data[] = $sub_array;
            }

            $results = array(
                "sEcho" => 1,
                "iTotalRecords" => count($data),
                "iTotalDisplayRecords" => count($data),
                "aaData" => $data);
            echo json_encode($results);
            break;
    }
?>