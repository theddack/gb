<?php
$sub_menu = "300510";
require_once './_common.php';

auth_check_menu($auth, $sub_menu, 'r');

$g5['title'] = '둘러보기';
require_once './admin.head.php';

$center_info = new Centerbrowse();
$center_list = $center_info->center_list($idx);
$center_total = $center_info->set_total_cnt();

?>
<div class="local_ov01 local_ov">
    <span class="btn_ov01">
        <span class="ov_txt">전체 </span>
        <span class="ov_num"> 
            <?=$center_total ?>건
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
            <th scope="col">내용</th>
            <th scope="col">수정자</th>
            <th scope="col">수정일</th>
            <th scope="col">등록자</th>            
            <th scope="col">등록일</th>
            <th scope="col">관리</th>
        </tr>
        
<?
        foreach ($center_list as $row){
        
            $update_user = $row['update_user'] ?? '-';
            $update_date =$row['update_date'] ?? '-';

?>
        <tr>  
                <th scope="col"><?=$center_total?></th>
                <th scope="col"><?=$row['center']?></th>
                <th scope="col">
                    <?
                        $center_list_image = $center_info->center_list_image($row['idx']);

                        foreach($center_list_image as $row2) {
                            $image_src = explode('..', $row2['image_src']);
                    ?>
                        <img src = "<?=$image_src[1]?>" style="width:50px; height:50px;">
                    <?
                        }
                    ?>
                </th>
                <th scope="col"><?=$row['center_contents']?></th>
                <th scope="col"><?=$update_user?></th>
                <th scope="col"><?=$update_date?></th>
                <th scope="col"><?=$row['user_id']?></th>  
                <th scope="col"><?=$row['reg_date']?></th>  
                <th scope="col">
                    <a href="./center_browse_form.php?idx=<?=$row['idx']?>" class="btn btn_01">수정</a>
                    <a href="javascript:list_delete(<?=$row['idx']?>)" class="btn btn_01">삭제</a>
                </th>
        </tr>           
<?

        }
?>        
        
    </table>


</div>
<script>
    function list_delete(idx){
        Swal.fire({
            title: '선택하신 게시물을 \r\n삭제 하시 겠습니까?',
            text: '삭제 하시면 다시 되돌릴 수 없습니다.',
            icon: 'warning',
            
            showCancelButton: true, // cancel버튼 보이기. 기본은 원래 없음
            confirmButtonColor: '#ff4081', // confrim 버튼 색깔 지정
            cancelButtonColor: '#3f51b5', // cancel 버튼 색깔 지정
            confirmButtonText: '승인', // confirm 버튼 텍스트 지정
            cancelButtonText: '취소', // cancel 버튼 텍스트 지정
        }).then((result) => {});

    }

</script>

<?php
require_once './admin.tail.php';
