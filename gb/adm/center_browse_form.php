<?php
$sub_menu = "300510";
require_once './_common.php';

auth_check_menu($auth, $sub_menu, 'w');
$idx = $_GET['idx'];
$g5['title'] = '등록하기';
require_once './admin.head.php';

if($idx){
    $center_info = new Centerbrowse();
    $center_list = $center_info->center_list($idx);
    $center_list_image = $center_info->center_list_image($idx);
    $center_value = $center_list[0]['center'];
    $center_addres = $center_list[0]['center_addres'];
    $center_contents = $center_list[0]['center_contents'];
    $center_yn = $center_list[0]['center_yn'];
}
$token = get_token();

// massage 설정을 삼항 연산자로 변경
$massage = $idx ? "수정" : "등록";

// center_value와 관련된 라디오 버튼 체크 상태 설정을 배열과 삼항 연산자를 활용하여 변경
$center_values = ['seoul', 'busan', 'daegu'];
$checked = array_fill_keys($center_values, '');

if (in_array($center_value, $center_values)) {
    $checked[$center_value] = 'checked';
}

$list_yn = ['Y', 'N'];
$checked2 = array_fill_keys($list_yn, '');

if (in_array($center_yn, $list_yn)) {
    $checked2[$center_yn] = 'checked';
}


?>

<style>
#preview_container {
    width: 100%;  /* 가로 너비를 100%로 설정 */
    max-width: 800px;  /* 전체 컨테이너의 최대 너비를 조정 */
    display: flex;
    flex-wrap: wrap;  /* 이미지들이 넘칠 경우 줄 바꿈 */
    overflow-y: auto;  /* 세로 스크롤 활성화 */
    justify-content: flex-start; /* 이미지를 왼쪽 정렬 */
    padding: 5px;  /* 내부 여백 */
    box-sizing: border-box;
}

#drop_zone {
    height: 300px;  /* 드롭 영역의 높이를 300px로 설정 */
    display: flex;
    align-items: center;
    justify-content: center;
}

</style>
<div id="menu_frm" class="new_win">
    <form name="center_form" id="center_form" class="new_win_con" enctype="multipart/form-data" method="POST" action="./center_browse_api.php">
        <input type="hidden" id="idx" name="idx" value="<?=$idx?>">
        <div class="new_win_desc">
            <table border="1" style="width: 100%; table-layout: auto;">
                <thead>
                    <tr>
                    <th style="width: 25%;">둘러보기 이미지 보기</th>
                    <th style="width: 25%;">둘러보기 이미지</th>                    
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td rowspan="5">
                            <!-- 미리보기 이미지들이 표시될 영역 -->
                            <div id="preview_container" >
                                <?
                                    if($idx){
                                        foreach ($center_list_image as $row){
                                ?>
                                            <img src ="<?=$row['image_src']?>" style="width:100px; height:100px;">
                                            <input type="hidden" name="existing_images[]" value="<?= $row['image_src'] ?>">
                                <?
                                        }

                                    }
                                ?>
                            </div>
                        </td>                       
                        <td>
                            <div id="drop_zone" style="border: 2px dashed #ccc; padding: 10px; text-align: center;">
                                이미지를 여기에 드롭하세요
                                <input type="file" id="file_input" name="drop_zone[]" multiple style="display: none;">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>지점 정보 :     
                            <label>
                                <input type="radio" name="center" id="center" value="seoul" <?=$checked['seoul']?>>서울 &nbsp;
                            </label>
                            <label>
                                <input type="radio" name="center" id="center" value="busan" <?=$checked['busan']?>>부산 &nbsp;
                            </label> 
                            <label>
                                <input type="radio" name="center" id="center" value="daegu" <?=$checked['daegu']?>>대구 &nbsp;
                            </label>                                                       
                        </td>
                    
                    </tr>
                    <tr>
                        <td>사용 여부 : 
                            <label>
                                <input type="radio" name="center_yn" id="center_yn" value="Y" <?=$checked2['Y']?>>Y &nbsp;
                            </label>    
                            <label>
                                <input type="radio" name="center_yn" id="center_yn" value="N" <?=$checked2['N']?>>N &nbsp;
                            </label>                           
                        </td>
                    </tr>
                    <tr>
                        <td>지점 주소 :
                            <textarea id="center_addres" name="center_addres" ><?= isset($center_addres) ? htmlspecialchars($center_addres) : ''; ?></textarea>
                        </td>                        
                    </tr>                        
                    <tr>
                        <td>내용 정보 :
                            <textarea id="center_contents" name="center_contents" ><?= isset($center_contents) ? htmlspecialchars($center_contents) : ''; ?></textarea>
                        </td>                        
                    </tr>                    
                </tbody>
            </table>
        </div>
        <div class="btn_fixed_top ">
            <button class="btn btn_01" type="submit" ><?=$massage ?></button>
        </div>
    </form>
</div>

<script>
    $(document).ready(function() {
        $('#center_contents').summernote({
            height: 300,                 // 에디터 높이
            minHeight: null,             // 최소 높이
            maxHeight: null,             // 최대 높이
            focus: true,                  // 페이지 로드 후 포커스 설정
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'clear']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']],
                ['insert', [ 'link']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ],            
            placeholder: '여기에 내용을 작성하세요'
        });

    });    

    document.addEventListener('DOMContentLoaded', () => {
        const dropZone = document.getElementById('drop_zone');
        const fileInput = document.getElementById('file_input');
        const previewContainer = document.getElementById('preview_container');

        // 드래그 오버 시 스타일 변경
        dropZone.addEventListener('dragover', (event) => {
            event.preventDefault(); // 기본 동작 방지
            dropZone.style.borderColor = '#000'; // 드래그 중 스타일 변경
        });

        // 드래그를 벗어날 때 스타일 복원
        dropZone.addEventListener('dragleave', () => {
            dropZone.style.borderColor = '#ccc';
        });

        // 이미지가 드롭되었을 때 처리
        dropZone.addEventListener('drop', (event) => {
            event.preventDefault(); // 기본 동작 방지
            dropZone.style.borderColor = '#ccc'; // 스타일 복원

            const files = event.dataTransfer.files;

            // 여러 이미지를 미리보기로 표시
            if (files.length > 0) {
                fileInput.files = files;  // 파일 입력 필드에 드롭된 파일 설정
                previewContainer.innerHTML = '';  // 기존 미리보기 초기화

                for (let i = 0; i < files.length; i++) {
                    const file = files[i];

                    // 이미지 파일 여부 확인
                    if (file.type.startsWith('image/')) {
                        const reader = new FileReader();

                        reader.onload = (e) => {
                            const img = document.createElement('img');
                            img.src = e.target.result;
                            img.style.maxWidth = '100px';
                            img.style.maxHeight = '100px';
                            img.style.margin = '5px';
                            previewContainer.appendChild(img); // 미리보기 컨테이너에 이미지 추가
                        };

                        reader.readAsDataURL(file); // 파일을 읽어서 DataURL 형식으로 변환
                    } else {
                        alert('이미지 파일만 업로드할 수 있습니다.');
                    }
                }
            }
        });
        
        // 클릭하여 파일 선택
        dropZone.addEventListener('click', () => {
            fileInput.click();
        });

        // 파일 입력 필드에서 파일 선택 시 처리 (미리보기)
        fileInput.addEventListener('change', (event) => {
            previewContainer.innerHTML = '';

            const files = event.target.files;
            for (let i = 0; i < files.length; i++) {
                const file = files[i];

                if (file.type.startsWith('image/')) {
                    const reader = new FileReader();

                    reader.onload = (e) => {
                        const img = document.createElement('img');
                        img.src = e.target.result;
                        img.style.maxWidth = '100px';
                        img.style.maxHeight = '100px';
                        img.style.margin = '5px';
                        previewContainer.appendChild(img);
                    };

                    reader.readAsDataURL(file);
                } else {
                    alert('이미지 파일만 업로드할 수 있습니다.');
                }
            }
        });

    });
</script>


<?php
require_once './admin.tail.php';
