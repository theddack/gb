<?php
include('../../common.php'); 
$p_idx = isset($_GET['idx']) ? $_GET['idx'] : '1';
$page = isset($_GET['page']) ? $_GET['page'] : '1';

$sql_count = "SELECT COUNT(idx) as total FROM pokemon_image";
$total_count = sql_fetch($sql_count);


$sql_select = "SELECT idx, pokemon_name, pokemon_name_kr, pokemon_sound, pokemon_image_url, pokemon_animated, pokemon_flavor_text FROM pokemon_image WHERE idx=". $p_idx;
$rs = sql_fetch($sql_select);

$sql_select2 = "SELECT a.pokemon_image_idx AS 'pokemon_idx', a.pokemon_slot AS 'pokemon_slot', b.type_kr AS 'type_kr', b.type_hex AS 'type_hex'
                FROM pokemon_list_type AS a
                LEFT OUTER JOIN pokemon_type AS b
                ON a.pokemon_slot = b.type_en
                WHERE a.pokemon_image_idx=". $p_idx;
$rs2 = sql_query($sql_select2);


$sql_select3 = "SELECT idx, pokemon_abil_en, pokemon_abil_kr, pokemon_abil_url, pokemon_image_idx FROM pokemon_abil_list WHERE pokemon_image_idx=". $p_idx;
$rs3 = sql_query($sql_select3);


$sql_select4 = "SELECT a.idx, a.pokemon_move_en, a.pokemon_move_kr, a.pokemon_image_idx,
                        b.pokemon_move_url, b.flavor_text
                FROM pokemon_moves_list  as a
                LEFT OUTER JOIN pokemon_moves_list2 as b
                ON a.pokemon_move_en = b.pokemon_move_en
                WHERE a.pokemon_image_idx=". $p_idx;
$rs4 = sql_query($sql_select4);


$sql_select5 = "SELECT pokemon_natur_kr, pokemon_natur_en FROM pokemon_nature ORDER BY RAND() LIMIT 1;";
$rs5 = sql_fetch($sql_select5);
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>포켓몬 도감 뷰어</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .pokedex-card {
            width: 300px;
            border: 2px solid #ccc;
            border-radius: 10px;
            background-color: #fff;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            padding: 15px;
            text-align: center;
            position: relative;
        }

        .pokedex-card .header {
            font-weight: bold;
            font-size: 16px;
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
            color: #333;
        }

        .pokedex-card .header .number {
            color: #555;
        }

        .pokedex-card .header .level {
            color: #555;
            font-size: 18px;
        }

        .pokedex-card .image {
            margin: 10px 0;
            background-color: #eee;
            border-radius: 10px;
            overflow: hidden;
            width: 120px;
            height: 120px;
            margin: 0 auto;
        }

        .pokedex-card .image img {
            width: 100%;
            height: auto;
        }

        .pokedex-card .types {
            margin: 10px 0;
        }

        .pokedex-card .types span {
            display: inline-block;
            color: #fff;
            padding: 3px 10px;
            margin: 0 5px;
            border-radius: 5px;
            font-size: 12px;
        }

        .pokedex-card .types span.poison {
            background-color: #a040a0;
        }

        .pokedex-card .moves {
            margin-top: 10px;
            text-align: left;
            font-size: 12px;
        }

        .pokedex-card .moves ul {
            list-style-type: none;
            padding: 0;
        }

        .pokedex-card .moves li {
            padding: 5px;
            background-color: #f8f8f8;
            border: 1px solid #ddd;
            margin-bottom: 5px;
            border-radius: 5px;
        }

        .pokedex-card .stats {
            font-size: 14px;
            margin-top: 15px;
        }

        .pokedex-card .stats .stat {
            margin-bottom: 5px;
        }

        #image_gif{
            max-width: 100%;
            max-height: 100%;
            width: 111px;
            height: 99px;
            top: 56px;
            left: 109px;  
            object-fit: scale-down;   
            position: absolute;
            transform: scale(1.3);
            filter: blur(0.4px);
        }
    .pagination-button {
        position: absolute;
        width: 110PX;
        height: 50px;
        border: 2px solid #ccc;
        border-radius: 10px;
        background-color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #333;
        text-decoration: none;
        font-weight: bold;
        font-size: 16px;
        transition: transform 0.2s ease, background-color 0.3s ease;
    }

    .pokedex-entry:hover,
    .pagination-button:hover {
        background-color: #f1c40f; /* 포켓볼 느낌의 색상 */
        transform: scale(1.05);
        cursor: pointer;
    }

    .pagination-button:disabled {
        background-color: #eaeaea;
        color: #aaa;
        cursor: not-allowed;
        border-color: #ddd;
    }

    .pagination-button::before {
        position: absolute;
        width: 10px;
        height: 10px;
        background-color: #f1c40f;
        border-radius: 50%;
        top: 15px;
        left: 10px;
        transition: background-color 0.3s ease;
    }

    .pagination-button:hover::before {
        background-color: #d35400; /* 더 어두운 색상 */
    }

    .pagination-button span {
        position: relative;
    }

    .pagination-button.previous {
        text-align: left;
        padding-left: 9px;
        top: 216px;
        left: 793px;
    }

    .pagination-button.next {
        text-align: right;
        padding-right: 9px;
        top: 216px;        
        right: 793px;
    }

    .pagination-button.first {
        text-align: right;
        padding-right: 4px;
        top: 216px;        
        right: 905px;
    }

    /* 클릭 시 효과 */
    .pagination-button:active {
        transform: translateY(25px); /* 아래로 3px 이동 */
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2), inset 0 2px 4px rgba(0, 0, 0, 0.3); /* 눌리는 효과 */
        background-color: #e67e22; /* 클릭 시 더 어두운 배경색 */
    }

    .slot-machine {
        width: 300px;
        height: 106px; /* 보이는 영역 */
        overflow: hidden;
        border: 2px solid #ddd;
        border-radius: 10px;
        position: relative;
    }

    .slot-item {
        text-align: center;
        font-size: 16px;
        font-weight: bold;
        color: #333;
    }

    .slot-machine .slot-item:last-child {
        border-bottom: none;
    }
    .moving-banner {
            position: absolute;
            bottom: 0px; /* 이미지 밑에 띠 위치 */
            width: 101%;
            height: 18px;
            color: #fff;
            font-size: 14px;
            line-height: 20px;
            overflow: hidden;
            white-space: nowrap; /* 한 줄 유지 */
            left: -2px;
            border-radius: 4px;
        }
        .banner-text {
            display: inline-block;
            padding-left: 100%; /* 오른쪽에서 시작 */
            animation: moveBanner 10s linear infinite;
        }
        .banner-text::after {
            content: " "; /* 여백 추가로 자연스러운 연결감 */
        }
        @keyframes moveBanner {
            0% {
                transform: translateX(0%);
            }
            100% {
                transform: translateX(-100%);
            }
        }        
    </style>
</head>
<body>
    <form method="get" style="display: inline;">
        <input type="hidden" name="idx" value="<?=$p_idx - 1 ?>">
        <button type="submit" class="pagination-button previous" id="previous" <?=$p_idx <= 1 ? 'disabled' : '' ?>>이전</button>
    </form>
    <form method="get" action="./poket_list.php" style="display: inline;">
        <input type="hidden" name="page" value="<?=$page?>">
        <button type="submit" class="pagination-button first" >처음으로</button>
    </form>
    <form method="get" style="display: inline;">
        <input type="hidden" name="idx" value="<?=$p_idx + 1 ?>">
        <button type="submit" class="pagination-button next" id="next" <?=$p_idx >= $total_count['total'] ? 'disabled' : '' ?>>다음</button>
    </form>    
    <div class="pokedex-card">
        <div class="header">
            <span class="number">No. <?=$rs['idx'] ?></span>
            <span class="level"><?=$rs['pokemon_name_kr'] ?></span>
        </div>
        <div class="image">
            <img id="image" src="<?=$rs['pokemon_image_url'] ?>" alt="<?=$rs['pokemon_name_kr'] ?>"  style="cursor: pointer;"  draggable="false">
        </div>
        <audio id="audio" class="audio" src="<?=$rs['pokemon_sound'] ?>" > </audio>
        <div class="types">
<?php      
        foreach ($rs2 as $rsd) {
?>
            <span class="<?=$rsd['pokemon_slot'] ?>" style="background-color: <?=$rsd['type_hex'] ?>;"><?=$rsd['type_kr'] ?></span>
<?php
        }
?> 
        </div>
        <div class="moving-banner" style="background-color: <?=$rsd['type_hex'] ?>;">
            <div class="banner-text" >
                    <?=$rs['pokemon_flavor_text'] ?> <!-- 공백으로 연결 -->
            </div>
        </div>          
        <div class="moves">
            <strong>기술(Moves):</strong>
            <ul class="slot-machine">
<?php
                foreach ($rs4 as $rsd3) { 
?>        
                    <li class="slot-item"><?=$rsd3['pokemon_move_kr'] ?></li>
<?php
                }
?>  
            </ul>
        </div>
        <div class="stats">         
            <div class="stat">특성(Ability): 
                <strong>
<?php
                    foreach ($rs3 as $rsd2) { 
?>                      
                        <?=$rsd2['pokemon_abil_kr'] ?>,  
<?php
                    }
?>                     
                </strong>
            </div>           
            <div class="stat">
                성격(Nature): 
                <strong>
                    <?=$rs5['pokemon_natur_kr']?> [<?=$rs5['pokemon_natur_en'] ?>]
                </strong>
            </div>
            <div class="stat">숨겨진 특성(Passive): <strong>Locked</strong></div>
        </div>
    </div>
<script>
const image =  document.getElementById('image');
const audio = document.getElementById('audio');
const slotMachine = document.querySelector('.slot-machine');
const slotItems = document.querySelectorAll('.slot-item');
let isDragging = false;
let startY, scrollTop;


image.addEventListener('click', () => {
    audio.play();
    image.id = "image_gif";
    image.src = "<?=$rs['pokemon_animated'] ?>";
})

slotMachine.addEventListener('mousedown', (e) => {
    isDragging = true;
    startY = e.pageY - slotMachine.offsetTop;
    scrollTop = slotMachine.scrollTop;
});

slotMachine.addEventListener('mousemove', (e) => {
    if (!isDragging) return;
    const y = e.pageY - slotMachine.offsetTop;
    const walk = (y - startY) * 1.5; // 드래그 감도 조정
    slotMachine.scrollTop = scrollTop - walk;
});

slotMachine.addEventListener('mouseup', () => {
    isDragging = false;
  // 스냅 효과 적용
    const itemHeight = 50; // 각 아이템 높이
    const nearestItemIndex = Math.round(slotMachine.scrollTop / itemHeight);
    slotMachine.scrollTop = nearestItemIndex * itemHeight;
});

slotMachine.addEventListener('mouseleave', () => {
    isDragging = false;
});

</script>    
</body>
</html>
