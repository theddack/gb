<?php
include('../../common.php'); 

/* 기술 

try {
    $poke_data = true;
    $offset = 1;                                                                                                   

    while ($poke_data) {
        $pokemon_api = "https://pokeapi.co/api/v2/pokemon/" . $offset . "/";
        $res = file_get_contents($pokemon_api);
        $data = json_decode($res, true);

        if (empty($data['abilities'])) {
            break;
        }
        
        $sqls = "SELECT idx, pokemon_name FROM pokemon_image WHERE idx=". $offset;
        $rss = sql_fetch($sqls);

        foreach ($data['abilities'] as $poke) {
            $abil_name = $poke['ability']['name']; // Type 이름
            $abil_url = $poke['ability']['url']; // Type URL
            $abil_slot = $poke['slot'];

                // 데이터 저장 로직
                $list = [
                    'pokemon_name' => $rss['pokemon_name'],
                    'pokemon_abil_en' => $abil_name,
                    'pokemon_abil_url' => $abil_url,
                    'pokemon_abil_slot' => $abil_slot,
                    'pokemon_image_idx' => $rss['idx'],
                ];

                if (insertData('pokemon_abil_list', $list)) {
                    echo "데이터가 성공적으로 저장되었습니다.<br>";
                } else {
                    echo "데이터 삽입에 실패했습니다.<br>";
                }
        }

        $offset++;
        //sleep(15); // API 호출 제한 방지를 위해 딜레이를 추가할 수 있습니다.
    }
} catch (Exception $e) {
    echo "데이터베이스 오류: " . $e->getMessage();
}     
*/

?>