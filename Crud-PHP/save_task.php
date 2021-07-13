<?php 

include("db.php");
if(isset($_POST['save_task'])){
    $title = $_POST['title'];
    $descripcion = $_POST['descripcion'];
   
    $query ="INSERT INTO task(titulo,descripcion) VALUE('$title','$descripcion')";
    $result = mysqli_query($conn, $query);
    if(!$result){
        die("query Failed");
    }
   
   $_SESSION['message'] = 'tarea guardada satisfactoriamente';
   $_SESSION['message_type']='success';
   
    echo 'saved';

    header("Location: index.php");
}



?>