<?php
$forder = basename(__DIR__);
$landing_folder = "../". $forder ."/style.css";

include_once('../head.php');


?>

<script>
$(document).ready(function() {
    $(document).on('click', '#submitBtn', function(){
        vaildCheck();
    })

    $(document).on('click', '.bg', function(){
        $(this).addClass('hidden');
        $('.page2').addClass('hidden');
    })

    $(document).on("click", ".hidden-btn", function(){
        hidden_class = $(this).data("hidden-class");
        if($("."+hidden_class).hasClass("hidden")) {
            $("."+hidden_class).removeClass("hidden");
        } else {
            $("."+hidden_class).addClass("hidden");
        }
    })
})
</script>
<div id="landing_container">
    <div class="container_wrap">
        <div class="page1">
            <div>
                <img src="./img/cont01.png">
                <img src="./img/cont02.png">
                <img src="./img/cont03.png">
                <img src="./img/cont04.png">
                <img src="./img/cont05.png">
            </div>
            <div style="padding: 30px 0; box-sizing: border-box; background: #323232;">
                <div class="footer">
                    <?//=$landing_footer_address?>
                </div>
                <?//=$PrivateMedicalFee?>
            </div>
            <div class="price_btn">
                <div class="price_info hidden-btn" data-hidden-class="price_hidden">선착순 상담예약</div>
            </div>
        </div>

        <div class="page2 hidden price_hidden">
            <img class="close_img hidden-btn" src="./img/icon_close.png" data-hidden-class="price_hidden">
            <div>
                <div class="survey_title">
                    49,000원 <span>썸머 프로그램</span>
                </div>
                <div class="event_title">
                    <span>한정수량 마감 시</span> 이벤트가 조기종료 <span>될 수 있습니다.</span>
                </div>
            </div>

            <div class="input_wrap">
                <ul class="input_form">
                    <li class="input_name">
                        <div class="name">이름</div>
                        <input type="text" name="name" id="name" placeholder="홍길동" maxlength="4"/>
                    </li>
                    <li class="input_age">
                        <div class="age">나이</div>
                        <input type="number" name="age" id="age" maxlength="2" placeholder="20"/>
                    </li>
                    <li class="input_phone">
                        <div class="phone">전화번호</div>
                        <input type="number" name="tel_1" id="tel_1" maxlength="11" required placeholder="01012345678"/>
                    </li>
                </ul>
                <div class="agree_btn">
                    <div class="agree_allchk">
                        <input type="checkbox" id="all_agree">
                        <label for="all_agree">
                            전체 동의하기
                        </label>
                    </div>
                    <div>
                        <div class="privacy_check">
                            <input type="checkbox" id="privacy_agree" class="all_agree">
                            <label for="privacy_agree">
                                [필수] 개인정보 수집 및 이용에 대한 동의
                            </label>
                            <a href="javascript:void(0);" class="more_info hidden-btn" data-hidden-class="privacy_content">
                                <span>보기</span>
                            </a>
                        </div>
                        <div class="privacy_content hidden">
                            <?//=$privacy_content?>
                        </div>
                    </div>
                    <div>
                        <div class="mkt_check">
                            <input type="checkbox" name="mkt_chk" id="mkt_chk" class="all_agree" value="Y">
                            <label for="mkt_chk">
                                [선택] 마케팅 활용 및 마케팅 정보 수신 동의
                            </label>
                            <a href="javascript:void(0);" class="more_info hidden-btn" data-hidden-class="mkt_content">
                                <span>보기</span>
                            </a>
                        </div>
                        <div class="mkt_content hidden">
                            <?//=$marketing_content?>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <button type="button" id="submitBtn" class="result_btn">제출하기</button>
            </div>
        </div>
        <div class="bg hidden price_hidden" data-hidden-class="price_hidden"></div>
    </div>
</div>