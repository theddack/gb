<?php
require_once '../_common.php';



$landing_info = new Landing_api();
$page = $landing_info->page = ($_REQUEST['page'] ?? '1');
$page_size = $landing_info->page_size = 10;
$landing_list = $landing_info->landing_list($idx);
$landing_total = $landing_info->set_total_cnt();

?>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 20px;
        }


        h1 {
            text-align: center;
            margin-bottom: 30px;
            font-size: 2.5rem;
            color: #4CAF50;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            
        }

        /* 등록 버튼 */
        .register-btn {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 20px;
        }

        .register-btn button {
            padding: 10px 20px;
            border: none;
            background-color: #4CAF50;
            color: white;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
            transition: background-color 0.3s;
        }

        .register-btn button:hover {
            background-color: #45a049;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f0f0f0;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }


        /* 페이징 스타일 */
        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .pagination a {
            padding: 10px 15px;
            margin: 0 5px;
            text-decoration: none;
            background-color: #4CAF50;
            color: white;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .pagination a:hover {
            background-color: #45a049;
        }

        .pagination a.active {
            background-color: #2196F3;
            pointer-events: none;
        }

    </style>
</head>
<body>

    <h1>랜딩 리스트</h1>

    <div class="container">
        <!-- 등록 버튼 -->
        <div class="register-btn">
            <button onclick="location.href='./write.php'">등록</button>
        </div>

        <table>
            <thead>
                    <tr>
                        <th>번호</th>
                        <th>제목</th>
                        <th>랜딩키</th>
                        <th>랜딩 URL</th>
                        <th>랜딩 카테고리</th>
                        <th>랜딩 가이드</th>
                        <th>랜딩 수정일</th>                        
                        <th>랜딩 생성일</th>
                        <th>관리</th>
                    </tr>
            </thead>
            <tbody>
            <?php 
                foreach($landing_list as $row){
            ?>
            <tr>
                <td><?=$row['num']--?></td>
                <td><?=$row['landing_subject'] ?></td>
                <td><?=$row['landing_key'] ?></td>
                <td><a href="<?=$row['landing_url'] ?>"> <?=$row['landing_url'] ?></a></td>
                <td><?=$row['landing_category'] ?></td>
                <td><?=$row['landing_guide'] ?></td>
                <td><?=$row['landing_update'] ?></td>
                <td><?=$row['landing_regdate'] ?></td>
                <td> 
                    <button onclick="location.href='./write.php?idx=<?=$row['idx']?>'">수정</button>
                    <button onClick="javascript:delete_data(<?=$row['idx']?>)">삭제</button>
                </td>
            </tr>

            <?php
                }
            ?>
            </tbody>

        </table>

    <?=$landing_info->landing_pageing($config['cf_write_pages'], $page, $qstr) ?>

    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>

function delete_data(idx){
        const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 1000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            }
        });        
        Swal.fire({
            title: '선택하신 게시물을 \r\n삭제 하시 겠습니까?',
            text: '삭제 하시면 다시 되돌릴 수 없습니다.',
            icon: 'info',
            
            showCancelButton: true, // cancel버튼 보이기. 기본은 원래 없음
            confirmButtonColor: '#2196F3', // confrim 버튼 색깔 지정
            cancelButtonColor: '#4CAF50', // cancel 버튼 색깔 지정
            confirmButtonText: '승인', // confirm 버튼 텍스트 지정
            cancelButtonText: '취소', // cancel 버튼 텍스트 지정
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: './landing_process/landing_regist.php',
                    type: 'POST',
                    data: { 
                            idx: idx,
                            data_value: 'delete'
                        },
                    success: function(response) {
                        if(response == "success"){
                            Toast.fire({
                                icon: "success",
                                title: "삭제를 완료 하셨습니다."
                            }).then(() => {
                                // 토스트 메시지가 사라진 후 새로 고침
                                window.location.reload(); // 또는 다른 새로 고침 방식 사용 가능
                            });
                        } else {
                            Toast.fire({
                                icon: "error",
                                title: "삭제를 실패 하셨습니다. \r\n관리자에게 문의 하시기 바랍니다."
                            });
                        }
                    }
                });
            } else {
                Toast.fire({
                    icon: "info",
                    title: "삭제를 취소 하셨습니다."
                })               
            }
        });
}

</script>
</body>

