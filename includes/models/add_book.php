<?php
header('Access-Control-Allow-Origin: *');
if(isset($_POST['title'])){
$title = $_POST['title'];
$img = $_POST['img'];
$rating = (int) $_POST['rating'];
}

try{
    require_once('../sql_conn/config.php');
    $sql = "INSERT INTO books (title, img, rating) values (?,?,?)";
    $stmt = $link->prepare($sql);
    $stmt->bind_param("ssi", $title, $img, $rating);
    $stmt->execute();
    $id_registro = $stmt->insert_id;
    if($id_registro > 0){
        $respuesta = array(
            'respuesta' => 'exito',
            'id_admin' => $id_registro
        );
    }else{
        $respuesta = array(
            'respuesta' => 'error',
            'message' => 'Error al insertar! Invitado ya existe'
        );
    }
    $stmt->close();
    $link->close();
}catch(Exception $e){
    $respuesta = array(
        'respuesta' => 'error',
        'message' => 'Error: ' . $e->getMessage()
    );
}

die(json_encode($respuesta));

?>