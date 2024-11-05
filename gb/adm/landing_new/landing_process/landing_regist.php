<?php
include_once('../../_common.php'); 


$idx = isset($_POST['idx']) ? $_POST['idx'] : '';
$landing_subject = isset($_POST['landing_subject']) ? $_POST['landing_subject'] : '';  
$landing_key = isset($_POST['landing_key']) ? $_POST['landing_key'] : '';
$landing_url = isset($_POST['landing_url']) ? $_POST['landing_url'] : '';
$landing_skin = isset($_POST['landing_skin']) ? $_POST['landing_skin'] : '';
$landing_guide = isset($_POST['landing_guide']) ? $_POST['landing_guide'] : '';
$landing_category = isset($_POST['landing_category']) ? $_POST['landing_category'] : '';
$landing_userid = $_SESSION['ss_mb_id'];
$landing_data = isset($_POST['data_value']) ? $_POST['data_value'] : '';
$table_name = 'landing_list';


function deleteLanding($table_name, $idx) {
    $sql = "DELETE FROM ". $table_name ." WHERE idx = '" . $idx . "'";
    return sql_query($sql) ? "success" : "error";
}

function insertLanding($table_name, $landing_subject, $landing_key, $landing_url, $landing_skin, $landing_guide, $landing_category, $landing_userid) {
    $sql = "INSERT INTO ". $table_name ." (landing_subject, landing_key, landing_url, landing_skin, landing_guide, landing_category, landing_userId) 
            VALUES ('$landing_subject', '$landing_key', '$landing_url', '$landing_skin', '$landing_guide', '$landing_category', '$landing_userid')";
    return sql_query($sql);
}

function updateLanding($table_name, $idx, $landing_subject, $landing_key, $landing_url, $landing_skin, $landing_guide, $landing_category) {
    $sql = "UPDATE ". $table_name ." SET landing_subject = '$landing_subject', landing_key = '$landing_key', landing_url = '$landing_url',
            landing_skin = '$landing_skin', landing_guide = '$landing_guide', landing_category = '$landing_category', landing_update = NOW()
            WHERE idx = '$idx'";
    return sql_query($sql);
}


if ($landing_data) {
    // 삭제 로직
    $result = deleteLanding($table_name, $idx );
    echo $result;
} else {
    // 추가 또는 업데이트 로직
    if (!$idx) {
        $result = insertLanding($table_name, $landing_subject, $landing_key, $landing_url, $landing_skin, $landing_guide, $landing_category, $landing_userid);
    } else {
        $result = updateLanding($table_name, $idx, $landing_subject, $landing_key, $landing_url, $landing_skin, $landing_guide, $landing_category);
    }

    // 리디렉션 처리
    if ($result) {
        header("Location: ../list.php");
    } else {
        header("Location: ../write.php");
    }
}

?>