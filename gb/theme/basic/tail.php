<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if (G5_IS_MOBILE) {
    include_once(G5_THEME_MOBILE_PATH.'/tail.php');
    return;
}

if(G5_COMMUNITY_USE === false) {
    include_once(G5_THEME_SHOP_PATH.'/shop.tail.php');
    return;
}
?>
<!-- 하단 시작 { -->
    <footer id="footerArea">
        <div class="footer_inner">
            <div class="footer_top">
                <div class="footer_address">
                    <!-- <img class="footer_logo" src="///common/images/logo.png" alt="리팅성형외과 로고"> -->
                    <p class="footer_title">CS CENTER</p>
                    <div class="btn_tel"><a href="tel:1899-9717">1899-9717</a></div>
                </div>
                <div class="footer_schedule">
                    <p class="footer_title">진료시간</p>
                    <ul>
                        <li><span class="schedule_week">월 수 목</span><span class="schedule_time">AM 10:00 - PM 7:00</span></li>
                        <!-- <li><span class="schedule_week"></span><span class="schedule_time"></span></li> -->
                        <li><span class="schedule_week">화<span style='display: inline-block; width: 1.4em;'></span>금</span><span class="schedule_time">AM 10:00 - PM 9:00 <span style='display: inline-block; font-size: .9em;'>(야간진료)</span></span></li>
                        <li><span class="schedule_week">토 요 일</span><span class="schedule_time">AM 10:00 - PM 7:00</span></li>
                        <li><span class="schedule_week">일요일 휴무</span><span class="schedule_time"></span></li>
                        <li><span class="schedule_week"></span><span class="schedule_time"></span></li>
                    </ul>
                </div>
                <div class="footer_map">
                    <p class="footer_title">오시는 길</p>
                    <a href="https://naver.me/xaPgC2Cb" class="btn_map_naver" title="새창으로 열기" target="_blank"><i class="hidden">네이버맵</i>
                        <p>서울 강남구 도산대로 119 K타워 7층 <span class="icon_box"></span></p>
                        <p>3호선 신사역 8번출구 75M</p>
                    </a>
                </div>
                <div class="footer_sns">
                    <p class="footer_title">SNS</p>
                    <ul>
                        <li>
                            <a href="https://pf.kakao.com/_xfxmiDu" class="bottom_btn_kakao trking" target="_blank" title="새 창에서 열기">
                                <span class="icon_box" style="background-image: url(/theme/theme01/common/images/icon_footer_kakao.png);"></span>KakaoTalk
                            </a>
                        </li>
                        <li>
                            <a href="https://www.instagram.com/liting_psps/" class="bottom_btn_instar trking" target="_blank" title="새 창에서 열기">
                                <span class="icon_box" style="background-image: url(/theme/theme01/common/images/icon_footer_instagram.png);"></span>Instagram
                            </a>
                        </li>
                        <li>
                            <a href="https://www.youtube.com/channel/UC1xWD4jMLNtRjrXPtr468mA" class="bottom_btn_youtube trking" target="_blank" title="새 창에서 열기">
                                <span class="icon_box" style="background-image: url(/theme/theme01/common/images/icon_footer_youtube.png);"></span>Youtube
                            </a>
                        </li>
                        <li>
                            <a href="https://blog.naver.com/night140160" class="bottom_btn_blog trking" target="_blank" title="새 창에서 열기">
                                <span class="icon_box" style="background-image: url(/theme/theme01/common/images/icon_footer_blog.png);"></span>Blog
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="footer_bottom">
                <div class="footer_bottom_left">
                    <ul class="btn_privacy">
                        <li><a href="/bbs/content.php?co_id=policy2">개인정보취급방침</a></li>
                        <li><a href="/bbs/content.php?co_id=policy">이용약관</a></li>
                        <!-- <li><a href="/bbs/content.php?co_id=policy">법적고지</a></li> -->
                        <li><a href="/bbs/content.php?co_id=nonbenefit">비급여 진료수가</a></li>
                        <li><a href="/bbs/content.php?co_id=06_01&me_code=6010">병원소개</a></li>
                    </ul>
                    <p class="main_info">
                        <span>사업자등록번호 : 207-11-91224</span>
                        <span>대표자명: 이성준</span>
                        <span>개인정보보호책임자 : 이성준</span>
                    </p>
                    <p class="copy_text">COPYRIGHT &copy; LITING PLASTIC SURGERY. All rights reserved.</p>
                </div>
                <div class="family">
                    <a class="arrow" href="#">Family Site</a>
                    <ul class="aList">
                        <li><a href="https://daeatdiet.com/" target="_blank" title="새 창에서 열기">다이트 한의원</a></li>
                        <li><a href="https://implan.co.kr/" target="_blank" title="새 창에서 열기">플란치과</a></li>
                        <li><a href="https://wedaeat.com/" target="_blank" title="새 창에서 열기">(주)다이트</a></li>
                    </ul>
                </div>
            </div>

            <div class="quick">
                <ul>
                    <li>
                        <a class="btn_quick call" href="tel:1899-9717">
                            <span style="background-image: url(/theme/theme01/common/images/quick_call.png);"></span>
                            <p>1899-9717</p>
                        </a>
                    </li>
                    <li>
                        <a class="btn_quick" href="https://pf.kakao.com/_xfxmiDu" title="새 창으로 열기" target="_blank">
                            <span style="background-image: url(/theme/theme01/common/images/quick_kakao.png);"></span>
                            <p>빠른상담</p>
                        </a>
                    </li>
                    <li>
                        <a class="btn_quick" href="/bbs/board.php?bo_table=compare&me_code=7020&me_code=7020">
                            <span style="background-image: url(/theme/theme01/common/images/quick_photo.png);"></span>
                            <p>전후사진</p>
                        </a>
                    </li>
                    <li>
                        <a class="btn_quick reservation" href="/bbs/content.php?co_id=07_01&me_code=7070">
                            <span style="background-image: url(/theme/theme01/common/images/quick_calender.png);"></span>
                            <p>바로예약</p>
                        </a>
                    </li>
                    <li>
                        <a class="topMove pc_ver" href="#">
                            <span style="background-image: url(/theme/theme01/common/images/quick_top.png);"></span>
                            <p>TOP</p>
                        </a>
                    </li>
                </ul>
            </div>
            <div id="topMove" class="mo_ver">
                <ul>
                    <li>
                        <a class="topMove" href="#">
                            <span style="background-image: url(/theme/theme01/common/images/quick_top.png);"></span>
                            <p>TOP</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </footer>

<?php
if(G5_DEVICE_BUTTON_DISPLAY && !G5_IS_MOBILE) { ?>
<?php
}

if ($config['cf_analytics']) {
    echo $config['cf_analytics'];
}
?>

<!-- } 하단 끝 -->
</div>

<script>
$(function() {
    // 폰트 리사이즈 쿠키있으면 실행
    font_resize("container", get_cookie("ck_font_resize_rmv_class"), get_cookie("ck_font_resize_add_class"));
});
</script>

<?php
include_once(G5_THEME_PATH."/tail.sub.php");