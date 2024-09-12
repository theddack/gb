<?
$sub_menu = "300510";
include_once('./_common.php');
include_once(G5_EDITOR_LIB);
auth_check_menu($auth, $sub_menu, "w");



$idx = isset($_POST['idx']) ? $_POST['idx'] : '';
$center = isset($_POST['center']) ? $_POST['center'] : '';
$center_contents = isset($_POST['center_contents']) ? trim($_POST['center_contents']) : '';

$user_id = $_SESSION['ss_mb_id'];


// 파일 업로드 처리
$upload_dir = '../img/uploads/';  // 업로드될 디렉토리 설정
$image_paths = array();

// 업로드할 폴더가 없으면 생성
if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
}



if(!$idx) {
        $sql = "INSERT INTO center_browse (center, center_contents, user_id)
                VALUES ('". $center ."', '". $center_contents ."', '". $user_id ."')";
} else {
        
        $sql = "UPDATE center_browse SET center = '" .$center . "',  center_contents = '" . $center_contents . "'
                WHERE idx = '" . $idx . "'";
  
}

if (sql_query($sql)) {
// 방금 삽입한 데이터의 idx 가져오기
        $sql2 = "SELECT idx FROM center_browse WHERE center ='". $center ."' AND user_id='". $user_id ."'";
        $result = sql_query($sql2);
        $row = sql_fetch_array($result);  // 여기서 idx 값을 가져옴
        if($row){
                //var_dump($_FILES['drop_zone']['name']); exit;   
                if ($_FILES['drop_zone']['name']) {
                        foreach ($_FILES['drop_zone']['name'] as $key => $name) {
                                $tmp_name = $_FILES['drop_zone']['tmp_name'][$key];
                                $file_name = basename($name);
                                $target_file = $upload_dir . $file_name;
                        
                                // 파일 업로드
                                if (move_uploaded_file($tmp_name, $target_file)) {
                                        $image_paths[] = $target_file; // 업로드된 파일 경로 저장
                                }
                                // 이미지 경로 문자열로 변환 (필요 시 JSON 형식으로 저장할 수도 있음)  
                                $sql3 = "INSERT INTO center_browse_image (center_idx, center, image_src, image_name, image_id)
                                VALUES ('". $row['idx'] ."', '". $center ."', '". $target_file ."', '". $_FILES['drop_zone']['name'] ."', '".$user_id ."')
                                "; 
                                sql_query($sql3);
                        }
                        header("Location: ".$_SERVER['HTTP_REFERER']);
                }       
        }
}


?>