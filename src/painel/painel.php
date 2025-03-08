<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Exo+2:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../../static/styles/reset.css">
    <link rel="stylesheet" href="../../static/styles/painel.css">
    <title>Painel</title>
</head>
<body>
    <header>
        <h1>Painel</h1>
    </header>
    <main class="container">
        <form action="post-painel.php" method="post" enctype="multipart/form-data">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="title">
            <label for="text-body">Text</label>
            <textarea name="text-body" id="text-body"></textarea>
            <label for="music-link">Song Link</label>
            <input type="text" name="music-link" id="music-link" class="music-link">
            <label for="img-path">Image</label>
            <div class="img-file">
                <input type="file" accept="image/*" name="img-path" class="ipt-img-file">
                <img class="file-preview">
            </div>

            <input type="submit" value="Enviar">

        </form>
    </main>

    <script>
        let imgFile = document.querySelector(".ipt-img-file");
        let imgElement = document.querySelector(".file-preview")

        imgFile.addEventListener("change", (e) =>{
            imgElement.src = URL.createObjectURL(imgFile.files[0]);

            imgFile.insertAdjacentElement('afterend',imgElement);
        })
    </script>

           

    
</body>
</html>