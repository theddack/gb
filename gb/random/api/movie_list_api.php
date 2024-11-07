<?php
include('../../common.php'); 
include_once('../key/movie_key.php');

/*

try {


    $curPage = 1; // 초기 페이지 설정
    $movie_data = true;
    $nationAlt = "한국";
    while($movie_data){

        $movie_api_url = "http://kobis.or.kr/kobisopenapi/webservice/rest/movie/searchMovieList.json?key=$movie_api_key&curPage=$curPage"; 
        $res = file_get_contents($movie_api_url);
        $data = json_decode($res, true);
        
        if(empty($data['movieListResult']['movieList'])){
            break;
        }

        foreach ($data['movieListResult']['movieList'] as $movie){
            $list = [
                'movieCd' => $movie['movieCd'],
                'movieNm' => $movie['movieNm'],
                'movieNmEn' => $movie['movieNmEn'],
                'prdtYear' => $movie['prdtYear'],
                'typeNm' => $movie['typeNm'],
                'prdtStatNm' => $movie['prdtStatNm'],
                'nationAlt' => $movie['nationAlt'],
                'genreAlt' => $movie['genreAlt'],
                'directors' => $movie['directors'][0]['peopleNm'] ?? null,  // 감독 이름이 없을 경우 대비
                'companyNm' => $movie['companys'][0]['companyNm'] ?? null  // 회사 이름이 없을 경우 대비
            ];
            if (insertData('movieList', $list)) {
                echo "데이터가 성공적으로 저장되었습니다.";
            } else {
                echo "데이터 삽입에 실패했습니다.";
            }

        }
        $curPage++;
        sleep(200);
    }
} catch (Exception $e) {
    echo "데이터베이스 오류: " . $e->getMessage();
}

*/

?>