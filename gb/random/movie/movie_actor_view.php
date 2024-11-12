<?php
include_once ("../key/movie_key.php");
$peopleNm = urlencode($_GET['peopleNm']);
$filmoNames = str_replace(" ", "", $_GET['filmoNames']);
$actor_url ="http://www.kobis.or.kr/kobisopenapi/webservice/rest/people";
$movie_actor_api = $actor_url . "/searchPeopleList.json?key=$movie_api_key&peopleNm=$peopleNm&filmoNames=$filmoNames";
$res1 = file_get_contents($movie_actor_api);
$data = json_decode($res1, true);


?>
<style>
body {
    margin: 0;
    font-family: Arial, sans-serif;
    /* ackground-color: #000; 검은색 배경 */
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
    border: 3px solid #000;
    border-radius: 10px;
    background-color: #000; /* 컨테이너 배경 */
}

.viewer-image {
    width: 150px; /* 이미지 크기 */
    height: 150px;
    border-radius: 10%; /* 원형 이미지 */
    object-fit: cover;
    margin-bottom: 20px;
    border: 3px solid #fff; /* 흰색 테두리 */
    background-color: #fff;
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

.list-div {
    position: absolute;
    top: 11%;
    left: 64%;
    transform: translate(-50%, -50%);
}

.list-a {
    color: #fff;
}

.list {
    color: #000;
}

</style>
<body>
<?php
foreach($data['peopleListResult']['peopleList'] as $filmog){
    $movie_actor_info = $actor_url . "/searchPeopleInfo.json?key=$movie_api_key&peopleCd=" . $filmog['peopleCd'];
    $res2 = file_get_contents($movie_actor_info);
    $data2 = json_decode($res2, true);
?>
    <div class="list-div">
        <a class="list" href="./movie_list.php">목록으로</a>
    </div>

    <div class="viewer-container">
        <img src="actor.jpg" alt="Actor Image" class="viewer-image">
        <h1 class="viewer-name"><?=$filmog['peopleNm'] ?></h1>
        <p class="viewer-job"><?=$filmog['repRoleNm'] ?></p>
        <h2>필모그래피</h2>
        <ul class="viewer-filmography">
        <li>
        <?php
        $movies = explode('|', $filmog['filmoNames']);
        $filmos = $data2['peopleInfoResult']['peopleInfo']['filmos'];
        $movieList = [];

        foreach($movies  as $index => $movie){
            if (isset($filmos[$index]['movieCd'])) {
                $movieList[] = "<a class='list-a' href='./movie_view.php?movieCd=" . $filmos[$index]['movieCd'] . "'>" . trim($movie) . "</a>";
            }
        }
        echo implode(' | ', $movieList);
        ?>
        </li>
        </ul>
    </div>
<?php
}
?>
</body>