<?php
include('../../common.php'); 
/*
try {
    $poke_data = true;                                                                                                

    while ($poke_data) {
        $pokemon_api = "https://pokeapi.co/api/v2/nature";
        $res = file_get_contents($pokemon_api);
        $data = json_decode($res, true);

        if (empty($data['results'])) {
            break;
        }


        foreach ($data['results'] as $poke) {
            $natur_name = $poke['name']; // 
            $natur_url = $poke['url']; // 

            $list = [
                'pokemon_natur' => $natur_name,
                'pokemon_natur_url' => $natur_url
            ]; 


            if (insertData('pokemon_nature', $list)) {
                echo "데이터가 성공적으로 저장되었습니다.<br>";
            } else {
                echo "데이터 삽입에 실패했습니다.<br>";
            }
        }
    }
} catch (Exception $e) {
    echo "데이터베이스 오류: " . $e->getMessage();
}   
    */
?>