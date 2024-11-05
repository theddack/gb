<?php
include_once ("../key/movie_key.php");
$movieCd = $_GET['movieCd'];

// api URL
$movie_api_url = "http://www.kobis.or.kr/kobisopenapi/webservice/rest/movie/searchMovieInfo.json?key=$movie_api_key&movieCd=$movieCd"; 
$res = file_get_contents($movie_api_url);
$data = json_decode($res, true);
$view = $data['movieInfoResult']['movieInfo'];


?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>영화 정보</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fff;
            color: #000;
            margin: 0;
            padding: 20px;
        }
        
        .movie-container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            border: 1px solid #000;
            padding: 20px;
        }
        
        .movie-title {
            font-size: 2em;
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
        }
        
        .movie-image {
            text-align: center;
            margin-bottom: 20px;
        }

        .movie-image img {
            max-width: 100%;
            height: auto;
            border: 1px solid #000;
        }

        .movie-info {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
        }
        
        .info-label {
            font-weight: bold;
        }
        
        .info-value {
            background-color: #f9f9f9;
            padding: 10px;
            border: 1px solid #000;
        }
        
        .full-width {
            grid-column: span 2;
        }
    </style>
</head>
<body>

<div class="movie-container">
    <div class="movie-title"> <?=$view['movieNm']?> </div>
    <div class="movie-image">
        <img src="path_to_movie_poster.jpg" alt="영화 포스터">
    </div>
    <div class="movie-info">
        <div class="info-label">제작년도</div>
        <div class="info-value"><?=$view['prdtYear']?></div>
        
        <div class="info-label">상영시간</div>
        <div class="info-value"><?=$view['showTm']?>분</div>
        
        <div class="info-label">개봉연도</div>
        <div class="info-value"><?=date('Y-m-d',strtotime($view['openDt']))?></div>
        
        <div class="info-label">제작상태</div>
        <div class="info-value"><?=$view['prdtStatNm']?></div>
        
        <div class="info-label">영화유형</div>
        <div class="info-value"> <?=$view['typeNm']?></div>
        
        <div class="info-label">제작국가</div>
        <div class="info-value"> <?=$view['nations'][0]['nationNm']?></div>
        
        <div class="info-label">장르</div>
        <div class="info-value">
            <?php 
                foreach($view['genres'] as $genre) {
                    echo $genre['genreNm'].", ";
                }   
            ?>             
        </div>
        
        <div class="info-label full-width">감독</div>
        <div class="info-value full-width">
            <a href="./movie_actor_view.php?peopleNm=<?=$view['directors'][0]['peopleNm']?>">  
                <?=$view['directors'][0]['peopleNm']?> 
            </a>
        </div>
        
        <div class="info-label full-width">배우</div>
        <div class="info-value full-width"> 
            <?php 
                foreach($view['actors'] as $actor) {
            ?>
                    <a href="./movie_actor_view.php?peopleNm=<?=$actor['peopleNm']?>" ><?= $actor['peopleNm']?></a>,
            <?php

                }   
            ?> 
        </div>
        
        <div class="info-label full-width">스텝 [직함]</div>
        <div class="info-value full-width">
            <?php 
                foreach($view['staffs'] as $staff) {
                    echo $staff['peopleNm']."[". $staff['staffRoleNm'] ."], ";
                }   
            ?>             
        </div>

    </div>
</div>

</body>
</html>
