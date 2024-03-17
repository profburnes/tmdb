<?php
    if (!isset($page)) exit;
?>
<div class="container">
    <h1>Filmes Destaque:</h1>
    <div class="row">
        <?php
            $url = "https://api.themoviedb.org/3/discover/movie?include_adult=false&api_key={$api_key}&language=pt-BR";
            $dados = file_get_contents($url);
            $dados = json_decode($dados);

            foreach ($dados->results as $dado) {

                ?>
                <div class="col-12 col-md-2">
                    <div class="card">
                        <div class="card-image">
                            <a href="movie/<?=$dado->id?>">
                                <img src="<?=$base_url?>/<?=$dado->poster_path?>" title="<?=$dado->title?>" class="w-100">
                            </a>
                        </div>
                            
                        <div class="card-body">
                            <p><strong><?=$dado->title?></strong></p>
                            <p>
                                Data: <?=formatarData($dado->release_date)?></p>
                            </p>
                        </div>
                    </div>
                </div>
                <?php
                
            }
        ?>
    </div>

    <h1>Séries Destaque:</h1>
    <div class="row">
        <?php
            $url = "https://api.themoviedb.org/3/discover/tv?include_adult=false&api_key={$api_key}&language=pt-BR";
            $dados = file_get_contents($url);
            $dados = json_decode($dados);

            foreach ($dados->results as $dado) {

                $img = $base_url.$dado->poster_path;
                $headers = get_headers($img);
                if($headers && strpos( $headers[0], '400')) {
                    $img = "imagens/semfoto.jpg";
                }

                ?>
                <div class="col-12 col-md-2">
                    <div class="card">
                        <div class="card-image">
                            <a href="serie/<?=$dado->id?>">
                                <img src="<?=$img?>" title="<?=$dado->name?>" class="w-100">
                            </a>
                        </div>
                        <div class="card-body">
                            <p><strong><?=$dado->name?></strong></p>
                            <p>
                                Data: <?=formatarData($dado->first_air_date)?></p>
                            </p>
                        </div>
                    </div>
                </div>
                <?php
                
            }
        ?>
    </div>
</div>