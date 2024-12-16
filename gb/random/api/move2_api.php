<?php
include('../../common.php'); 

/* 특성*/

try {
    $poke_data = true;
    $offset = 1;                                                                                                   

    while ($poke_data) {

        $sqls = "SELECT idx, pokemon_move_en, pokemon_move_url FROM poketmon_moves_list2 WHERE idx=". $offset;
        $rss = sql_fetch($sqls);

        $pokemon_api = $rss['pokemon_move_url'];
       // echo $pokemon_api; exit;
        
        $res = file_get_contents($pokemon_api);
        $data = json_decode($res, true);

        if ($offset >= 798) {
            break;
        }

        foreach ($data['flavor_text_entries'] as $poke) {
            $language_name2 = $poke['language']['name'];
            $flavor_text = $poke['flavor_text']; 
            
            if($language_name2 == "ko"){
                // 데이터 저장 로직
                $list = [
                    'flavor_text' => $flavor_text
                ];

                $where = "idx = " . intval($rss['idx']) . " AND pokemon_move_en = '" . addslashes($rss['pokemon_move_en']) . "'";

                if (updateData('poketmon_moves_list2', $list, $where)) {
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