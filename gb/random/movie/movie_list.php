<?php
include_once ("../key/movie_key.php");
$movie_date = date("Ymd" ,strtotime("-1 day")); //조회하고자 하는 날짜
$weekGb = "0"; //주간/주말/주중 : 0/1/2


// api URL
$movie_api_url = "http://www.kobis.or.kr/kobisopenapi/webservice/rest/boxoffice/searchDailyBoxOfficeList.json?key=$movie_api_key&targetDt=$movie_date&weekGb=$weekGb"; 

$res = file_get_contents($movie_api_url);
$data = json_decode($res, true);
?>
<style>
@font-face {
    font-family : 'ChosunCentennial';
    src:url('../../css/font/ChosunCentennial_ttf.ttf') format('truetype');
}
body {
    font-family: 'ChosunCentennial', Arial, sans-serif;
    background-color: #fff;
    color: #000;
    margin: 20px;
}

table {
    width: 100%;
    border-collapse: collapse;
}

th, td {
    padding: 12px;
    text-align: left;
    border-bottom: 1px solid #000;
}

th {
    background-color: #000;
    color: #fff;
}

tr:nth-child(even) {
    background-color: #f9f9f9;
}

tr:nth-child(odd) {
    background-color: #fff;
}

tr:hover {
    background-color: #ddd;
}

caption {
    caption-side: top; 
    font-size: 1.5em;
    font-weight: bold;
    margin-bottom: 10px;
}




</style>
<body>
    <table>
        <thead>
                <tr>
                    <th>순위</th>
                    <th>진입</th>
                    <th>영화명</th>
                    <th>영화코드</th>
                    <th>개봉일</th>
                    <th>전일 매출액</th>
                    <th>전일 관객수</th>
                    <th>전일 상영된 횟수</th>
                    <th>누적 관객 수</th>
                </tr>
        </thead>
        <tbody>
    <?php
    // 데이터 출력
    if (isset($data['boxOfficeResult']['dailyBoxOfficeList'])){
        foreach ($data['boxOfficeResult']['dailyBoxOfficeList'] as $movie){

            if($movie['rankOldAndNew'] == "OLD"){
                $rankOldAndNew = "기존";
            } else { // NEW
                $rankOldAndNew = "신규";
            }
    ?>        
        <tr>
            <td><?=$movie['rank'] ?></td>
            <td><?=$rankOldAndNew  ?></td>
            <td><a href="./movie_view.php?movieCd=<?=$movie['movieCd'] ?>" ><?=$movie['movieNm'] ?></a></td>
            <td><?=$movie['movieCd'] ?></td>
            <td><?=$movie['openDt'] ?></td>
            <td><?=number_format($movie['salesAmt']) ?></td>
            <td><?=number_format($movie['audiCnt']) ?></td>
            <td><?=number_format($movie['showCnt']) ?></td>
            <td><?=number_format($movie['audiAcc']) ?></td>
        </tr>    
     <?php 

        }
    }
    ?>
        </tbody>
    </table>
</body>