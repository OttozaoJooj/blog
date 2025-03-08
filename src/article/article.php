<?php    
    ini_set('display_errors',1);
    error_reporting(E_ALL);
    require_once("../../config.php");
    $stmt = $conn->prepare('SELECT * FROM posts WHERE postId = ?');
    $stmt->bindParam(1, $_REQUEST["postId"]);
    if(!$stmt->execute()){
        die("Erro: execução do sql");
    }
    if($stmt->rowCount() > 0){
        $row = $stmt->fetchAll()[0];
    }
    

    
    function getIDVideo($url){
        if(str_contains($url, 'youtu.be')){
            return substr($url, 17, 11);
        }else{
            return substr($url, 32,11);
        }

    }
    
    
    date_default_timezone_set('America/Sao_Paulo');

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Exo+2:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../../static/styles/reset.css">
    <link rel="stylesheet" href="../../static/styles/article.css">
    <title><?= $row["title"]?></title>    
</head>
<body>
    <header>
        <img src="../../uploads/img/<?=$row["img_path"]?>" class="img-bg">
        <div class="iframe-yt">
            <iframe width="500" height="250" src="https://www.youtube.com/embed/<?php echo getIDVideo($row['musicLink'])?>?si=CZ9AjhrsvAgpAxv9" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        </div>        
    </header>
    <main class="container">
        <aside class="as-icon-back">
            <a class="icon-back" href="../../index.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="white" class="bi bi-arrow-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8"/>
                </svg>
            </a>
        </aside>
        <section class="content">
            <div class="title-date">
                <h1><?=$row["title"]?></h1>
                <span><?=date('d/m/Y', strtotime($row["created_at"]))?> às <?=date('h:i:sa', strtotime($row["created_at"]))?></span>
            </div>
            <hr>
            <div class="text-body">
                <p><?=$row["textBody"]?></p>
            </div>
        </section>
        <aside class="edit">
            <button class="btn btn-edit">Editar</button>
            <div class="drop-edit">
                <button class="btn btn-update">Update</button>
                <button class="btn btn-delete">Delete</button>
            </div>
            
        </aside>
    </main>
    
    <script src="js/ajax.js"></script>
</body>
</html>