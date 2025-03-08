<?php

require_once __DIR__.'/config.php';

$sql = 'SELECT * FROM posts';

$stmt = $conn->prepare($sql);
if($stmt->execute()){
    $rows = $stmt->fetchAll();
}else{
    die('Erro: execução sql');
}




?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Exo+2:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    
    <link rel="stylesheet" href="static/styles/reset.css">
    <link rel="stylesheet" href="static/styles/index.css">

    <title>Blog</title>
</head>
<body>
    <header>
        <div class="header-content">
            <div class="ipt-search">
                <input type="text" name="search">
            </div>
            <div class="btn-painel">
                <a href="src/painel/painel.php">Painel</a>
            </div>
        </div>
    </header>
    <main class="container">
        <section class="posts">
            <?php foreach($rows as $r){?>
                <a href="src/article/article.php?postId=<?php echo $r['postId']?>" >
                    <div class="post">
                        <img src="uploads/img/<?php echo $r['img_path']?>">
                    
                        <div class="line-column">
                            <span></span>
                        </div>
                        <div class="post-content">

                            <div class="title-date-post">
                                <h1><?php echo $r['title']; ?></h1>
                                <span><?php echo $r['created_at']?></span>
                            </div>

                            <div class="text-body-post">
                                <p><?php echo $r['textBody']; ?></p>
                            </div>
                        </div>                    
                    </div>
                </a>
            <?php };?>
        </section>
    </main>

    <footer>

    </footer>
</body>
</html>
