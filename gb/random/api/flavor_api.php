<?php
include('../../common.php'); 

/* 기술 */

try {
    $poke_data = true;
    $offset = 901;                                                                                                   

    while ($poke_data) {
        $pokemon_api = "https://pokeapi.co/api/v2/pokemon-species/" . $offset . "/";
        $res = file_get_contents($pokemon_api);
        $data = json_decode($res, true);

        if (empty($data['flavor_text_entries'])) {
            break;
        }
        
        $sqls = "SELECT idx, pokemon_name FROM pokemon_image WHERE idx=". $offset;
        $rss = sql_fetch($sqls);

        foreach ($data['flavor_text_entries'] as $poke) {
            $language_name = $poke['language']['name']; //
            $flavor_text = $poke['flavor_text']; //

            if($language_name == "en"){
                // 데이터 저장 로직 
                $list = [
                    'pokemon_flavor_text' => $flavor_text
                ];

                $where = "idx = " . intval($rss['idx']) . " AND pokemon_name = '" . addslashes($rss['pokemon_name']) . "'";

                if (updateData('pokemon_image', $list, $where)) {
                    echo "업데이트 성공: idx = {$rss['idx']}<br>";
                } else {
                    echo "업데이트 실패: idx = {$rss['idx']}, 오류 원인 확인 필요<br>";
                    print_r($list);
                }
            }
        }

        $offset++;
        sleep(15); // API 호출 제한 방지를 위해 딜레이를 추가할 수 있습니다.
    }
} catch (Exception $e) {
    echo "데이터베이스 오류: " . $e->getMessage();
}     


?>