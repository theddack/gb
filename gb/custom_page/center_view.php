<?
require_once '../common.php';

$center_info = new Centerbrowse();
$center_list = $center_info->center_list($idx);

include_once(G5_THEME_PATH.'/head.php');


$center_branch = ($_REQUEST['center'] ? $_REQUEST['center'] : 'seoul' );
?>

<style>
    body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

.nav {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px;
    background-color: #f8f8f8;
}

.nav-item {
    font-size: 24px;
}

.nav-button {
    background-color: #1e90ff;
    color: white;
    padding: 10px 20px;
    border: none;
    cursor: pointer;
    font-size: 16px;
}

.nav-button:hover {
    background-color: #0056b3;
}

/* 메인 컨테이너 */
.main-container {
    display: flex;
    padding: 20px;
}

/* 이미지 및 설명 영역 */
.image-container {
    flex: 2;
    position: relative;
}

.image-description {
    padding: 10px;
}

.image-description h3 {
    font-size: 20px;
    margin-bottom: 10px;
}

.image-description p {
    font-size: 16px;
    margin-bottom: 15px;
}

.icons span {
    font-size: 20px;
    margin-right: 10px;
}

/* 탭 버튼 영역 */
.tabs {
    flex: 1;
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    padding: 20px;
}

.tab {
    background-color: #e0e0e0;
    border: none;
    padding: 10px 20px;
    margin-bottom: 10px;
    cursor: pointer;
    width: 100%;
    text-align: left;
    font-size: 16px;
}



.tab:hover {
    background-color: #0056b3;
    color: white;
}

/* 슬라이더 스타일 */
.image-slider {
    position: relative;
    max-width: 47%;
    overflow: hidden;
}

.slides {
    display: flex;
    transition: transform 0.5s ease-in-out;
}

.slide {
    min-width: 100%;
}

.slide img {
    width: 800px;
    height: auto;
}

/* 이전/다음 버튼 스타일 */
.prev, .next {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background-color: rgba(0, 0, 0, 0.5);
    color: white;
    border: none;
    padding: 10px;
    cursor: pointer;
    font-size: 18px;
    z-index: 10;
}

.prev {
    left: 10px;
}

.next {
    right: 10px;
}

.prev:hover, .next:hover {
    background-color: rgba(0, 0, 0, 0.8);
}

/* 박스 */
.slider_text_cont {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 115px;
    background-color: rgb(27 35 50 / 90%);
    z-index: 100;
}
.slider_text_cont li {
    margin: auto;
    padding: 10px;
    color: #fff;
}


.icon-container {
    position: absolute;
    bottom: 0;
    right: 0;
    padding: 45px;
}
</style>
<body>    <!-- 상단 네비게이션 -->
    <div class="nav">
        <a href="#" class="nav-item">둘러보기</a>
    </div>
<?php
// 모든 지점을 배열로 정의
$centers = array("seoul" => "서울", "busan" => "부산", "daegu" => "대구");

foreach ($center_list as $row) {
    // 현재 선택된 지점에 대한 정보만 표시
    if($center_branch == $row['center']){
        $current_center_name = $centers[$row['center']];

        if($row['center_yn'] == 'Y'){
?>
        <div class="main-container">
            <div class="image-slider">
                <div class="slides">
<?php
        // 선택된 지점의 이미지 목록 가져오기
        $center_list_image = $center_info->center_list_image($row['idx']);

        if (empty($center_list_image)) {
            // 이미지가 없을 경우
?>
                    <div class="slide">
                        <img src="../img/uploads/test.jpg" alt="이미지 없음" class="main-image">
                    </div>
<?php
        } else {
            // 이미지가 있을 경우
            foreach($center_list_image as $row2) {
                $image_src = explode('..', $row2['image_src']);
?>        
                    <div class="slide">
                        <img src="<?=$image_src[1]?>" alt="<?=$current_center_name?>" class="main-image">
                    </div>    
<?php
            }
        }// 이미지가 있을 경우 end
?>    
        </div>
        <button class="prev" onclick="prevSlide()">&#10094;</button>
        <button class="next" onclick="nextSlide()">&#10095;</button>    
        <div>   
        <ul class ="slider_text_cont">
                <li>
                    <h1>테스트 <?=$current_center_name ?>점</h1><br/>
                    <p><?=$row['center_addres'] ?></p>
                    <div class="icon-container">
                        <span>📞</span>
                        <span>💬</span>
                        <span>🔗</span>
                    </div>
                </li>
        </ul> 

        </div>
    </div>
    <div class="image-description">

        <!-- 지점 버튼을 가로로 배치 -->
        <div class="center-tabs" style="display: flex; flex-direction: row;">
            <?php 
                // 등록된 지점을 버튼으로 표시하기 위해 $centers와 $center_list 매칭
                foreach ($centers as $center_code => $center_name) { 
                    $is_current_center = ($center_code == $center_branch);
                    $is_center_registered = false;
                    
                    // 등록된 지점이 있는지 확인
                    foreach ($center_list as $row) {
                        if ($center_code == $row['center'] && $row['center_yn'] == 'Y') {
                            $is_center_registered = true;
                            break;
                        }
                    }
                    
                    // 등록된 지점만 버튼 생성
                    if ($is_center_registered) {
            ?>
                        <button class="tab" onclick="window.location.href='./center_view.php?center=<?=$center_code?>'" style="margin-right: 10px; <?= $is_current_center ? 'background-color: #0056b3; color: white;' : '' ?>">
                            <?= $center_name ?>점
                        </button>
            <?php 
                    }
                }
            ?>
        </div>

        <p><?=$row['center_contents']?></p>
    </div>
</div>   
<?php
        } else {
            echo '등록하신 내용이 존재 하지 않습니다.';
        }
    }
}
?>   

</body>
<script>
let currentSlide = 0;
const slides = document.querySelectorAll('.slide');

function showSlide(index) {
    if (index >= slides.length) {
        currentSlide = 0;
    } else if (index < 0) {
        currentSlide = slides.length - 1;
    } else {
        currentSlide = index;
    }

    const offset = -currentSlide * 100;
    document.querySelector('.slides').style.transform = `translateX(${offset}%)`;
}

function nextSlide() {
    showSlide(currentSlide + 1);
}

function prevSlide() {
    showSlide(currentSlide - 1);
}

// 첫 번째 슬라이드 표시
showSlide(currentSlide);

</script>
<?php
include_once(G5_THEME_PATH.'/tail.php');