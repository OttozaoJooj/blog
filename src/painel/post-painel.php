<?php
ini_set('display_errors',1);
error_reporting(E_ALL);
require_once __DIR__.'/../../config.php';
/*
print_r($_POST);
print_r($_FILES);
*/
if($_SERVER["REQUEST_METHOD"] == 'POST' && isset($_FILES['img-path'])){

    $target_file = __DIR__.'/../../uploads/img/'.$_FILES['img-path']['name'];

    $title = $_POST['title'];   
    $text = $_POST['text-body'];
    $link = $_POST['music-link'];
    $image = $_FILES['img-path']['name'];

    try{    
        if (move_uploaded_file($_FILES["img-path"]["tmp_name"], $target_file)) {
            echo "The file ". htmlspecialchars( basename( $_FILES["img-path"]["name"])). " has been uploaded.";
        } else {
            die("Sorry, there was an error uploading your file.");
        }
    } catch (Exception $e){
        echo $e;
    }
   

    $sql = 'INSERT INTO posts(title, textBody, musicLink, img_path) VALUES (?, ?, ?, ?);';


    $stmt = $conn->prepare($sql);
    $stmt->bindParam(1, $title);
    $stmt->bindParam(2, $text);
    $stmt->bindParam(3, $link);
    $stmt->bindParam(4, $image);

    if($stmt->execute()){
        header('location: ../../index.php');
    }else{
        die('Erro: execução do sql');
    }


    

}

?>