<?php

// require_once('../sql_conn/config.php');
// $resultado = $link->query($sql);
// while($book = $resultado){
//     echo $book;
// }
header('Access-Control-Allow-Origin: *');
$all_books = array(
    'books' => array()
);
$books = array();
try{
    require_once('../sql_conn/config.php');
    $sql = "SELECT * FROM books";
    $res = $link->query($sql);
}catch(Exception $e){
    echo $e->getMessage();
}
while($book = $res->fetch_assoc() ){
    $respuesta = array(
        'id' => $book['id'],
        'title' => $book['title'],
        'img' => $book['img'],
        'rating' => $book['rating']

    );
    array_push($books, $respuesta);
}
$all_books['books'] = $books;
$resp= (json_encode($all_books));
//die(var_dump($all_books));
echo json_encode($all_books, JSON_PRETTY_PRINT);
?>