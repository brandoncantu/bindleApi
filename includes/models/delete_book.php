<?php
header('Access-Control-Allow-Origin: *');
if(isset($_POST['id'])){
$id = $_POST['id'];
}

try{
    require_once('../sql_conn/config.php');
    $sql = "DELETE FROM books WHERE id = ?";
    $stmt = $link->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    if($stmt->affected_rows == 1) {
        $respuesta = array(
            'respuesta' => 'exito'
        );
    }else{
        $respuesta = array(
            'respuesta' => 'error',
            'message' => 'Error al borrar!'
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