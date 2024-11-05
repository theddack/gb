<?php
include_once ("../key/movie_key.php");
$peopleNm = urlencode($_GET['peopleNm']);
$movie_actor_api = "http://www.kobis.or.kr/kobisopenapi/webservice/rest/people/searchPeopleList.json?key=$movie_api_key&peopleNm=$peopleNm";
$res1 = file_get_contents($movie_actor_api);
$data = json_decode($res1, true);
?>
<style>
body {
    margin: 0;
    font-family: Arial, sans-serif;
    background-color: #000; /* 검은색 배경 */
    color: #fff; /* 흰색 글자 */
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.viewer-container {
    text-align: center;
    max-width: 600px;
    padding: 20px;
    border: 3px solid #fff;
    border-radius: 10px;
    background-color: #111; /* 컨테이너 배경 */
}

.viewer-image {
    width: 150px; /* 이미지 크기 */
    height: 150px;
    border-radius: 10%; /* 원형 이미지 */
    object-fit: cover;
    margin-bottom: 20px;
    border: 2px solid #fff; /* 흰색 테두리 */
}

.viewer-name {
    font-size: 2.5em;
    margin: 0.5em 0;
}

.viewer-job {
    font-size: 1.2em;
    font-style: italic;
    margin-bottom: 1.5em;
}

.viewer-filmography {
    list-style: none;
    padding: 0;
}

.viewer-filmography li {
    margin: 0.5em 0;
    font-size: 1.1em;
}

.viewer-filmography li::before {
    content: "🎬 "; /* 영화 아이콘 */
    color: #fff;
}

</style>
<body>
<?php
foreach($data['peopleListResult']['peopleList'] as $filmog){
?>
      
        <div class="viewer-container">
        <img src="actor.jpg" alt="Actor Image" class="viewer-image">
        <h1 class="viewer-name"><?=$filmog['peopleNm'] ?></h1>
        <p class="viewer-job"><?=$filmog['repRoleNm'] ?></p>
        <h2>필모그래피</h2>
        <ul class="viewer-filmography">
            <li><?=str_replace("|", " | ", $filmog['filmoNames']) ?></li>

        </ul>
    </div>
<?php
}
?>
</body>