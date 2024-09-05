<?php
$sub_menu = "300510";
require_once './_common.php';

auth_check_menu($auth, $sub_menu, 'r');

$g5['title'] = '등록하기';
require_once './admin.head.php';

?>