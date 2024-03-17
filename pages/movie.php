<?php
    if (!isset($page)) exit;
    $url = "https://api.themoviedb.org/3/movie/{$id}?&api_key={$api_key}}&language=pt-BR";

    $dados = file_get_contents($url);
    $dados = json_decode($dados);

    if (empty($dados->title)) {
        ?>
        <div class="container">
            <h1 class="text-center">Mídia não encontrada!</h1>
            <h2 class="text-center">
                O filme que está tentando ver foi removido.
            </h2>
            <p class="text-center">
                <a href="javascript:history.back()" class="btn btn-outline-primary">
                    Voltar à página anterior
                </a>
            </p>
        </div>
        <?php
    } else {
        ?>
        <div class="container">
            <h1 class="text-center"><?=$dados->title?></h1>
            <div class="row">
                <div class="col-12 col-md-3">
                    <img src="<?=$base_url?>/<?=$dados->poster_path?>" alt="<?=$dados->title?>" class="w-100">
                </div>
                <div class="col-12 col-md-9">
                    <p>
                        <strong>Tagline:</strong> <?=$dados->tagline?>
                    </p>
                    <p>
                        <strong>Nome original:</strong> <?=$dados->original_title?>
                    </p>
                    <p>
                        <strong>Data de Lançamento:</strong> <?=formatarData($dados->release_date)?>
                    </p>
                    <p>
                        <strong>Sinopse do filme:</strong>
                    </p>
                    <p>
                        <?=$dados->overview?>
                    </p>
                </div>
            </div>
        </div>

        <?php
    }