<?php
include('../../common.php'); 
$limit = 24;
$poket_serach = isset($_GET['search']) ? $_GET['search'] : '';
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($page - 1) * $limit;


$sql_count = "SELECT COUNT(idx) as total FROM pokemon_image";
$total_count = sql_fetch($sql_count);
$total_rows = $total_count['total'];
$total_page = ceil($total_rows / $limit);

if($poket_serach){
    if(preg_match('/^[a-zA-Z]+$/',$poket_serach)){
        $name_sql = "WHERE pokemon_name LIKE '%" . $poket_serach . "%'";
    } else if (preg_match('/^[가-힣]+$/u', $poket_serach) ) {
        $name_sql = "WHERE pokemon_name_kr LIKE '%" . $poket_serach . "%'";
    }
}

$sql_select = "SELECT idx, pokemon_name, pokemon_name_kr, pokemon_image_url FROM pokemon_image $name_sql LIMIT $offset, $limit";
$rs = sql_query($sql_select);

?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>포켓몬 도감</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f9f9f9;
        margin: 0;
        padding: 20px;
    }

    a {
        text-decoration: none;
    }

    .pokedex-row {
        display: flex;
        justify-content: center; /* 중앙 정렬 */
        gap: 10px; /* 카드 간 간격 */
        margin-bottom: 20px; /* 줄 간 간격 */
    }

    .pokedex-entry {
        width: 150px;
        border: 2px solid #ccc;
        border-radius: 10px;
        background-color: #fff;
        text-align: center;
        padding: 10px;
    }

    .pokedex-entry .number {
        font-size: 14px;
        font-weight: bold;
        color: #555;
    }

    .pokedex-entry .image {
        margin: 10px 0;
        width: 100%;
        height: 100px;
        background-color: #eee;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 10px;
        overflow: hidden;
    }

    .pokedex-entry .image img {
        max-width: 100%;
        max-height: 100%;
    }

    .pokedex-entry .names {
        margin-top: 10px;
    }

    .pokedex-entry .names .korean-name {
        font-size: 14px;
        font-weight: bold;
        color: #333;
    }

    .pokedex-entry .names .english-name {
        font-size: 12px;
        color: #777;
    }

    .pokedex-grid {
        display: flex;
        position: relative;
        flex-wrap: wrap;
        gap: 10px;
        justify-content: center;
        margin: 12px auto;
        top: 50px;
    }
    .pagination {
        display: flex;
        position: relative;
        justify-content: space-between;
        width: 354px;
        margin-top: 20px;
        left: 92px;

    }

    .pagination-button {
        position: absolute;
        width: 120px;
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
        content: "";
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

    .pagination-button.previous {
        text-align: left;
        padding-left: 20px;
        top: 20px;
        left: 301px;
    }

    .pagination-button.next {
        text-align: right;
        padding-right: 20px;
        top: 20px;        
        right: -305px;
    }

    .pagination-button.first {
        text-align: right;
        padding-right: 20px;
        top: 20px;        
        right: -305px;
    }

    .search-container {
        position: absolute;
        top: 80px;
        right: 771px;
    }

    .search-input {
        position: absolute;
        top: -20px;
        right: -174px;
        width: 174px;
        height: 50px;
        border: 2px solid #ccc;
        border-radius: 10px;
        padding: 8px 12px;
        font-size: 14px;
        outline: none;
        transition: border-color 0.3s ease;
    }

    .search-button{
        position: absolute;
        top: -20px;
        right: -358px;
        width: 174px;
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

    .search-input:focus {
        border-color: #f1c40f; /* 포켓볼 색상 */
    }


    .search-button:hover {
        background-color: #f1c40f; /* 포켓볼 느낌의 색상 */
        transform: scale(1.05);
    }

    .search-button:active {
        background-color: #d35400; /* 클릭 시 더 어두운 색상 */
        transform: scale(0.95);
    }

    .search-button::before {
        content: "";
        position: absolute;
        width: 12px;
        height: 12px;
        background-color: #f1c40f;
        border-radius: 50%;
        left: 10px;
        top: 50%;
        transform: translateY(-50%);
        transition: background-color 0.3s ease;
    }

    .search-button:hover::before {
        background-color: #d35400; /* 더 어두운 색상 */
    }

    </style>
</head>

<body>
<div class="pagination">
    <form method="get" style="display: inline;">
        <input type="hidden" name="page" value="<?=$page - 1 ?>">
        <button type="submit" class="pagination-button previous" id="previous" <?=$page <= 1 ? 'disabled' : '' ?>>이전</button>
    </form>    
<?php 
    if($page < $total_page && !$search){
?>
    <form method="get" style="display: inline;">
        <input type="hidden" name="page" value="<?=$page + 1 ?>">
        <button type="submit" class="pagination-button next" id="next" <?=$page >= $total_page ? 'disabled' : '' ?>>다음</button>
    </form>
<? } else { ?>
    <form method="get" style="display: inline;">
        <input type="hidden" name="page" value="1">
        <button type="submit" class="pagination-button first" >처음으로</button>
    </form>
<? } ?>

</div>
<div class="search-container">
    <form method="get" style="display: inline;">
        <input type="text" name="search" class="search-input" placeholder="검색어 입력" >
        <button class="search-button">검색</button>
    </form>    
</div>

<div class="pokedex-grid">

<?php
$count = 0;
foreach ($rs as $poket) {
    if($count > 0 && $count % 6 == 0){
        echo '</div><div class="pokedex-grid">';
    }
?>
    <a href="./poket_view.php?idx=<?=$poket['idx']?>&page=<?=$page ?>">
        <div class="pokedex-entry">
            <div class="number">#<?=$poket['idx']?></div>
            <div class="image">
                <!-- 이미지 추가 시 여기에 <img src="이미지 URL" alt="포켓몬 이름"> -->
                <span>
                    <img src="<?=$poket['pokemon_image_url']?>" alt="<?=$poket['pokemon_name_kr']?>"  draggable="false">
                </span>
            </div>
            <div class="names">
                <div class="korean-name"><?=$poket['pokemon_name_kr']?></div>
                <div class="english-name"><?=ucfirst($poket['pokemon_name'])?></div>
            </div>
        </div>
    </a>    
<?php
    $count++;
}

if ($count % 6 != 0) {
    echo '</div>';
}
?>


</body>
