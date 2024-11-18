<?php
include('../../common.php'); 

/*
try {

    $offset = 0;
    $limit = 20; // 초기 페이지 설정
    $poke_data = true;
    while($poke_data){

        $pokemon_api = "https://pokeapi.co/api/v2/pokemon?offset=" .  $offset . "&limit=" . $limit; 
       // echo $pokemon_api; exit;
        $res = file_get_contents($pokemon_api);
        if ($res === false) {
            echo "API 요청에 실패했습니다. 다시 시도해 주세요.";
            break;
        }
        $data = json_decode($res, true);
        
        if(empty($data['results'])){
            break;
        }

        foreach ($data['results'] as $poke){
            $list = [
                'pokemon_name' => $poke['name'],
                'pokemon_url' => $poke['url']
            ];
            if (insertData('pokemon_list', $list)) {
                echo "데이터가 성공적으로 저장되었습니다.<br>";
            } else {
                echo "데이터 삽입에 실패했습니다.<br>";
            }

        }
        $offset += $limit;
        sleep(200);
    }
} catch (Exception $e) {
    echo "데이터베이스 오류: " . $e->getMessage();
}

*/
?>