<?php
require_once '../../common.php';

$idx = $_GET['idx'];
$massage = $idx ? "수정" : "등록";

$landing_info = new Landing_api();


if($idx){

    $landing_list = $landing_info->landing_list($idx);
    $landing_subject = $landing_list[0]['landing_subject'];
    $landing_key = $landing_list[0]['landing_key'];
    $landing_url = $landing_list[0]['landing_url'];
    $landing_skin = $landing_list[0]['landing_skin'];
    $landing_guide = $landing_list[0]['landing_guide'];
    $landing_category = $landing_list[0]['landing_category'];
}

?>
<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}    
body {
    font-family: Arial, sans-serif;
    background-color: #f5f5f5;
    color: #333;
    padding: 20px;
}
.text_box {
    max-width: 800px;
    margin: 0 auto;
    background-color: white;
    padding: 20px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
}
.submit_button{
    display: flex;
    flex-direction: column; /* 세로로 정렬 */    
    margin-top: 10px; /* 원하는 여백 크기로 조정 */
}

select {
    position: relative;
    z-index: 150; /* 드롭다운이 다른 요소 위에 표시되도록 설정 */
}
h1 {
    text-align: center;
    margin-bottom: 30px;
    font-size: 2.5rem;
    color: #4CAF50;
}
label {
    margin-bottom: 5px;
    font-weight: bold;
}
input[type="text"], input[type="number"] {
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 1rem;
    width: 100%;
}

.submit_button {
    display: flex;
    justify-content: flex-end;
}
.submit_button button {
    padding: 10px 20px;
    margin-left: 10px;
    border: none;
    background-color: #4CAF50;
    color: white;
    border-radius: 5px;
    cursor: pointer;
    font-size: 1rem;
    transition: background-color 0.3s;
}
.submit_button button:hover {
    background-color: #45a049;
}
</style>
<h1>랜딩 등록</h1>
<body>
    <form action="./landing_process/landing_regist.php" method="POST" onsubmit ="return formAlert()" >
        <input type="hidden" class="idx" name="idx" value="<?=$idx ?>">
            <div class="text_box">
                <label for="title"> * 랜딩 제목 </label>
                <input type="text" class="landing_subject" name="landing_subject" value="<?=$landing_subject ?>" placeholder="제목을 입력 해주세요">

                <label for="title"> * 랜딩  키 </label>
                <input type="number" class="landing_key" name="landing_key" value="<?=$landing_key ?>" placeholder="랜딩 키를 입력 해주세요">

                <label for="title"> * 랜딩 경로 </label>
                <input type="text" class="landing_url" name="landing_url" value="<?=$landing_url ?>" placeholder="랜딩 경로를 입력 주세요">

                <label for="title"> * 랜딩 스킨 </label>
                <input type="text" class="landing_skin" name="landing_skin" value="<?=$landing_skin ?>" placeholder="랜딩 스킨을 입력 해주세요">

                <label for="title"> 랜딩 신규 가이드 </label>
                <input type="text" class="landing_guide" name="landing_guide" value="<?=$landing_guide ?>" placeholder="신규 가이드 URL을 입력 해주세요">

                <label for="title"> * 랜딩 카테고리 : </label>
                <select class="landing_category" name="landing_category">
                    <option value="1" <?= ($landing_category == 1) ? 'selected' : '' ?>>1</option>
                    <option value="2" <?= ($landing_category == 2) ? 'selected' : '' ?>>2</option>                
                </select>

                <div class="submit_button">
                    <button type="submit" ><?=$massage ?></button>
                </div>
            </div>
    </form>
</body>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function formAlert() {
        const landing_fields_name = ['landing_subject', 'landing_key', 'landing_url', 'landing_skin'];
        const landing_empty = landing_fields_name.some(field => document.querySelector("." + field).value.trim() === "");

        if (landing_empty) {
            swal.fire({
                icon: 'warning',
                text: '필수 항목들을 작성 해주시기 바랍니다.',
                confirmButtonText: '확인'
            });
            return false;  
        }
        return true;  
    }


</script>

