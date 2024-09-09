<?php
$sub_menu = "300510";
require_once './_common.php';

auth_check_menu($auth, $sub_menu, 'r');

$g5['title'] = '둘러보기';
require_once './admin.head.php';

?>
<div class="local_ov01 local_ov">
    <span class="btn_ov01">
        <span class="ov_txt">전체 </span>
        <span class="ov_num"> 
            <?php echo $total_count; ?>건
        </span>
    </span>
</div>

<div class="btn_fixed_top ">
    <a href="./center_browse_form.php" class="btn btn_01">등록</a>
</div>

<div class="tbl_head01 tbl_wrap">
    <table>
        <tr>
            <th scope="col">번호</th>
            <th scope="col">지점</th>
            <th scope="col">이미지</th>
            <th scope="col">등록자</th>
            <th scope="col">수정자</th>
            <th scope="col">수정일</th>
            <th scope="col">등록일</th>
            <th scope="col">관리</th>
        </tr>
    </table>


</div>


<?php
require_once './admin.tail.php';
