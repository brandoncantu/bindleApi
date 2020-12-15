<?php
header('Access-Control-Allow-Origin: *');
if(isset($_POST['id'])){
$title = $_POST['title'];
$img = $_POST['img'];
$rating = (int) $_POST['rating'];
$id = (int) $_POST['id'];
}

try{
    require_once('../sql_conn/config.php');
    $sql = "UPDATE books SET
            title = ?,
            img= ?,
            rating = ?
            WHERE id = ?";
    $stmt = $link->prepare($sql);
    $stmt->bind_param("ssii", $title, $img, $rating, $id);
    $stmt->execute();
    if($stmt->affected_rows == 1) {
        $respuesta = array(
            'respuesta' => 'exito'
        );
    }else{
        $respuesta = array(
            'respuesta' => 'error',
            'message' => 'Error al insertar!'
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