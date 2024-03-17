<?php
    $api_key = "sua api";
    $base_url = "https://image.tmdb.org/t/p/original/";

    function formatarData($data) {
        echo date("d/m/Y", strtotime($data));
    }
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Movie Database</title>

    <base href="<?php echo "http://" . $_SERVER["HTTP_HOST"] . $_SERVER["SCRIPT_NAME"]; ?>">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="imagens/icone.png">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="home">
                <img src="imagens/logo.svg" alt="The Movie Database" width="200px">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="seriados">Seriados</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cinema">Cinema</a>
                    </li>
                </ul>
                <div class="d-flex">
                    <a href="arquivos.zip" title="Arquivos" class="btn btn-outline-primary">
                        Download Arquivos
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <main>
        <?php
            $page = "home";
            if (isset($_GET["param"])) {
                $p = explode("/", $_GET["param"]);
                $page = $p[0];
                $id = $p[1] ?? NULL;
            }

            $page = "pages/{$page}.php";

            if (file_exists($page)) include $page;
            else include "pages/erro.php";
            
        ?>
    </main>


    <footer class="bg-dark">
        <p class="text-center">The Movie Database <?=date("Y")?></p>
    </footer>

    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/fslightbox.js"></script>
</body>

</html>