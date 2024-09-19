<?
$sub_menu = "300510";
include_once('./_common.php');
include_once(G5_EDITOR_LIB);
auth_check_menu($auth, $sub_menu, "w");



$idx = isset($_POST['idx']) ? $_POST['idx'] : '';
$center = isset($_POST['center']) ? $_POST['center'] : '';
$center_contents = isset($_POST['center_contents']) ? trim($_POST['center_contents']) : '';
$existing_images = $_POST['existing_images'] ?? []; // 기존 이미지를 배열로 받아옴
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
        $sql2 = "SELECT idx FROM center_browse WHERE center ='" . $center . "' AND user_id='" . $user_id . "'";
        $result = sql_query($sql2);
        $row = sql_fetch_array($result);

        if ($row) {
                $existing_images = $_POST['existing_images'] ?? []; // 기존 이미지 정보

                // 업로드된 파일 처리
                $uploaded_files = $_FILES['drop_zone']['name'] ?? [];
                foreach ($uploaded_files as $key => $name) {
                        $tmp_name = $_FILES['drop_zone']['tmp_name'][$key];
                        $file_name = basename($name);
                        $target_file = $upload_dir . $file_name;

                        if (move_uploaded_file($tmp_name, $target_file)) {
                                $existing_images[] = $target_file; // 업로드된 파일 경로 추가
                        }
                }

                // 기존 이미지와 업로드된 이미지를 모두 처리
                foreach ($existing_images as $image) {
                        // 이미지가 데이터베이스에 존재하는지 확인
                        $sql_check = "SELECT idx FROM center_browse_image WHERE center_idx = '" . $row['idx'] . "' AND image_src = '" . $image . "'";
                        $result_check = sql_query($sql_check);
                        $row_check = sql_fetch_array($result_check);

                        if ($row_check) {
                                // 이미지가 이미 존재하면 업데이트
                                $sql_update = "UPDATE center_browse_image 
                                                SET center ='" . $center . "', image_name='" . basename($image) . "', image_id= '" . $user_id . "'
                                                WHERE idx='" . $row_check['idx'] . "'";
                                sql_query($sql_update);
                        } else {
                                // 이미지가 존재하지 않으면 삽입
                                $sql_insert = "INSERT INTO center_browse_image (center_idx, center, image_src, image_name, image_id)
                                                VALUES ('" . $row['idx'] . "', '" . $center . "', '" . $image . "', '" . basename($image) . "', '" . $user_id . "')";
                                sql_query($sql_insert);
                        }
                }
                // 업데이트 또는 삽입이 완료되면 리다이렉트
                header("Location: " . $_SERVER['HTTP_REFERER']);
        }
}

?>