<?php
include('../../common.php'); 
include('../key/seoul_key.php');


$seoul_api_url = "http://swopenAPI.seoul.go.kr/api/subway/" . $seoul_key . "/json/realtimePosition/0/5/1호선";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $seoul_api_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$re = curl_exec($ch);
curl_close($ch);


// JSON 데이터 파싱
$data = json_decode($re, true);



if(isset($data['realtimePositionList'])){
    foreach($data['realtimePositionList'] as $train){ 

        $trainStatus = [
            0 => "진입",
            1 => "도착",
            2 => "출발", 
            3 => "전역출발"
        ];

        $directInfo = [
            0 => "아님",
            1 => "급행",
            7 => "특급"
        ];
        

        $trainSttus = $trainStatus[$train['trainSttus']];
        $directAt = $directInfo[$train['directAt']];

?>
        열차 번호 : <?=$train['trainNo'] ?>  | 
        행선지 : <?=$train['statnNm'] ?> | 
        급행 여부 : <?=$directAt ?> |
        현재 위치 : <?=$trainSttus ?>  <br>  
<?php
    }

}
/*
공통	list_total_count 총 데이터 건수 (정상조회 시 출력됨)
공통	RESULT.CODE	요청결과 코드 (하단 메세지설명 참고)
공통	RESULT.MESSAGE 요청결과 메시지 (하단 메세지설명 참고)
1	subwayId 지하철호선ID (1001:1호선, 1002:2호선, 1003:3호선, 1004:4호선, 1005:5호선 1006:6호선, 1007:7호선, 1008:8호선, 1009:9호선, 1063:경의중앙선, 1065:공항철도, 1067:경춘선, 1075:수인분당선 1077:신분당선, 1092:우이신설선, 1032:GTX-A)
2	subwayNm 지하철호선명
3	statnId	지하철역ID
4	statnNm	지하철역명
5	trainNo	열차번호
6	lastRecptnDt 최종수신날짜
7	recptnDt	최종수신시간
8	updnLine	상하행선구분 (0 : 상행/내선, 1 : 하행/외선)
9	statnTid	종착지하철역ID
10	statnTnm	종착지하철역명
11	trainSttus	열차상태구분 (0:진입 1:도착, 2:출발, 3:전역출발)
12	directAt	급행여부 (1:급행, 0:아님, 7:특급)
13	lstcarAt	막차여부 (1:막차, 0:아님)

*/
?>