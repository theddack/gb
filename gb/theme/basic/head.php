<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if (G5_IS_MOBILE) {
    include_once(G5_THEME_MOBILE_PATH.'/head.php');
    return;
}

if(G5_COMMUNITY_USE === false) {
    define('G5_IS_COMMUNITY_PAGE', true);
    include_once(G5_THEME_SHOP_PATH.'/shop.head.php');
    return;
}
include_once(G5_THEME_PATH.'/head.sub.php');
include_once(G5_LIB_PATH.'/latest.lib.php');
include_once(G5_LIB_PATH.'/outlogin.lib.php');
include_once(G5_LIB_PATH.'/poll.lib.php');
include_once(G5_LIB_PATH.'/visit.lib.php');
include_once(G5_LIB_PATH.'/connect.lib.php');
include_once(G5_LIB_PATH.'/popular.lib.php');
?>

<!-- 상단 시작 { -->
<div class="wrap">
    <style>
        .notice_popup {z-index: 1001; position: fixed; left: 50%; transform: translateX(-50%); top: 22%;}
    </style>
    <header id="headerAreaPc">
        <div class="header_inner">
            <div class="header_inner_top">
                <div class="event_box">
                    <ul class="login_box">
                        <li><a href="https://liting.co.kr/bbs/login.php">로그인</a></li>
                        <li><a href="https://liting.co.kr/bbs/register_form.php">회원가입</a></li>
                    </ul>
                </div>
            </div>
            <div class="header_inner_bottom">
                <h1>
                    <a class="logo" href="/" style="background: lightgrey;">리팅 로고</a>
                </h1>
                <nav id="gnb">
                    <h2 class="hidden">네비게이션영역</h2>
                    <div class="depth_first">
                        <h3><a href="/bbs/content.php?co_id=01_01&me_code=1010" target="_self" >리프팅하면리팅</a></h3>
                        <h3><a href="/bbs/content.php?co_id=02_15&me_code=20f0" target="_self" >수술리프팅</a></h3>
                        <h3><a href="/bbs/content.php?co_id=03_01&me_code=3010" target="_self" >쁘띠센터</a></h3>
                        <h3><a href="/bbs/content.php?co_id=04_01&me_code=4010" target="_self" >리프팅 부스터</a></h3>
                        <h3><a href="/bbs/content.php?co_id=05_01&me_code=5010" target="_self" >남자리프팅</a></h3>
                        <h3><a href="/bbs/content.php?co_id=06_01&me_code=6010" target="_self" >병원소개</a></h3>
                        <h3><a href="/bbs/board.php?bo_table=media&amp;me_code=7010&me_code=7010" target="_self" >커뮤니티</a></h3>
                    </div>
                    <ul class="dropdown_menu">
                        <li>
                            <h3>리프팅하면리팅</h3>
                            <a href="/bbs/content.php?co_id=01_01&me_code=1010" target="_self">
                                <span>리프팅,왜 리팅일까?</span>
                            </a>
                            <a href="/bbs/content.php?co_id=01_02&me_code=1020" target="_self">
                                <span>리프팅의 필요성</span>
                            </a>
                        </li>
                        <li>
                            <h3>수술리프팅</h3>
                            <a href="/bbs/content.php?co_id=02_15&me_code=20f0" target="_self">
                                <span>에르믹스 리프팅</span>
                            </a>
                            <a href="/bbs/content.php?co_id=02_09&me_code=2090" target="_self">
                                <span>안면거상</span>
                            </a>
                            <a href="/bbs/content.php?co_id=02_01&me_code=2010" target="_self">
                                <span>미니리프팅</span>
                            </a>
                            <a href="/bbs/content.php?co_id=02_02&me_code=2020" target="_self">
                                <span>커스텀미니리프팅</span>
                            </a>
                            <a href="/bbs/content.php?co_id=02_03&me_code=2030" target="_self">
                                <span>스마일미니리프팅</span>
                            </a>
                            <a href="/bbs/content.php?co_id=02_11&me_code=20b0" target="_self">
                                <span>롱라스팅리프팅</span>
                            </a>
                            <a href="/bbs/content.php?co_id=02_04&me_code=2040" target="_self">
                                <span>브이넥(VN)리프팅</span>
                            </a>
                            <a href="/bbs/content.php?co_id=02_05&me_code=2050" target="_self">
                                <span>이마리프팅</span>
                            </a>
                            <a href="/bbs/content.php?co_id=02_06&me_code=2060" target="_self">
                                <span>스마일거상</span>
                            </a>
                            <a href="/bbs/content.php?co_id=02_07&me_code=2070" target="_self">
                                <span>리팅시그니처리프팅</span>
                            </a>
                            <a href="/bbs/content.php?co_id=02_10&me_code=20a0" target="_self">
                                <span>처진눈리프팅</span>
                            </a>
                        </li>
                        <li>
                            <h3>쁘띠센터</h3>
                            <a href="/bbs/content.php?co_id=03_01&me_code=3010" target="_self">
                                <span>쁘띠센터 소개</span>
                            </a>
                            <a href="/bbs/content.php?co_id=03_03&me_code=3030" target="_self">
                                <span>D-DAY!디데이리프팅</span>
                            </a>
                            <a href="/bbs/content.php?co_id=03_04&me_code=3040" target="_self">
                                <span>펄샤인&샤이닝 리프팅</span>
                            </a>
                            <a href="/bbs/content.php?co_id=03_05&me_code=3050" target="_self">
                                <span>리팅 부스터</span>
                            </a>
                            <a href="/bbs/content.php?co_id=03_12&me_code=30c0" target="_self">
                                <span>초음파 얼굴지방흡입</span>
                            </a>
                            <a href="/bbs/content.php?co_id=03_06&me_code=3060" target="_self">
                                <span>확실한 실리프팅</span>
                            </a>
                            <a href="/bbs/content.php?co_id=03_07&me_code=3070" target="_self">
                                <span>레이저 거상 버츄RF</span>
                            </a>
                            <a href="/bbs/content.php?co_id=03_13&me_code=30d0" target="_self">
                                <span>온다리프팅</span>
                            </a>
                            <a href="/bbs/content.php?co_id=03_08&me_code=3080" target="_self">
                                <span>레이저리프팅</span>
                            </a>
                            <a href="/bbs/content.php?co_id=03_09&me_code=3090" target="_self">
                                <span>베네핏부스터</span>
                            </a>
                            <a href="/bbs/content.php?co_id=03_11&me_code=30b0" target="_self">
                                <span>스킨케어</span>
                            </a>
                        </li>
                        <li>
                            <h3>리프팅 부스터</h3>
                            <a href="/bbs/content.php?co_id=04_01&me_code=4010" target="_self">
                                <span>페이스 지방흡입</span>
                            </a>
                            <a href="/bbs/content.php?co_id=04_02&me_code=4020" target="_self">
                                <span>페이스 지방이식</span>
                            </a>
                        </li>
                        <li>
                            <h3>남자리프팅</h3>
                            <a href="/bbs/content.php?co_id=05_01&me_code=5010" target="_self">
                                <span>리프팅수술</span>
                            </a>
                            <a href="/bbs/content.php?co_id=05_02&me_code=5020" target="_self">
                                <span>실리프팅</span>
                            </a>
                            <a href="/bbs/content.php?co_id=05_03&me_code=5030" target="_self">
                                <span>레이저리프팅</span>
                            </a>
                            <a href="/bbs/content.php?co_id=05_04&me_code=5040" target="_self">
                                <span>리프팅부스터</span>
                            </a>
                        </li>
                        <li>
                            <h3>병원소개</h3>
                            <a href="/bbs/content.php?co_id=06_01&me_code=6010" target="_self">
                                <span>리팅비전</span>
                            </a>
                            <a href="/bbs/content.php?co_id=06_02&me_code=6020" target="_self">
                                <span>대표원장 스토리</span>
                            </a>
                            <a href="/bbs/content.php?co_id=06_03&me_code=6030" target="_self">
                                <span>안면재건술이란</span>
                            </a>
                            <a href="/bbs/board.php?bo_table=doctor&me_code=6040" target="_self">
                                <span>의료진 소개</span>
                            </a>
                            <a href="/bbs/content.php?co_id=06_04&me_code=6050" target="_self">
                                <span>둘러보기</span>
                            </a>
                            <a href="/bbs/content.php?co_id=06_05&me_code=6060" target="_self">
                                <span>오시는 길</span>
                            </a>
                        </li>
                        <li>
                            <h3>커뮤니티</h3>
                            <a href="/bbs/board.php?bo_table=media&amp;me_code=7010&me_code=7010" target="_self">
                                <span>리팅TV</span>
                            </a>
                            <a href="/bbs/board.php?bo_table=compare&amp;me_code=7020&me_code=7020" target="_self">
                                <span>리얼포토후기</span>
                            </a>
                            <a href="/bbs/board.php?bo_table=review&amp;me_code=7030&me_code=7030" target="_self">
                                <span>고객감동후기</span>
                            </a>
                            <a href="/bbs/board.php?bo_table=star&amp;me_code=7040&me_code=7040" target="_self">
                                <span>with 스타</span>
                            </a>
                            <a href="/bbs/board.php?bo_table=event&amp;me_code=7050&me_code=7050" target="_self">
                                <span>이벤트</span>
                            </a>
                            <a href="/bbs/content.php?co_id=07_01&me_code=7070" target="_self">
                                <span>바로예약</span>
                            </a>
                            <a href="/bbs/write.php?bo_table=realmodel&me_code=7060" target="_self">
                                <span>리얼모델 모집</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <div class="right_menu">
                    <div class="select_branch">
                        <a href="javascript:;"><span>서울점</span></a>
                        <ul class="branches">
                            <li class="on"><a href="https://liting.co.kr"><span>서울점</span></a></li>
                            <li class=""><a href="https://seomyeon.liting.co.kr"><span>부산점</span></a></li>
                            <li class=""><a href="https://daegu.liting.co.kr"><span>대구점</span></a></li>
                        </ul>
                    </div>
                    <div class="select_nation">
                        <a href="javascript:;"><img src="/theme/theme01/common/images/icon_global.png" alt="South Korea"><span>KR</span></a>
                        <ul class="dropdown_menu" style="display: none;">
                            <li class="on"><a href="/"><img src="/theme/theme01/common/images/icon_southkorea.png" alt="South Korea"><span>KR</span></a></li>
                            <li><a title="새창으로 열기" target="_blank" href="https://en.liting.co.kr/"><img src="/theme/theme01/common/images/icon_unitedstates.png" alt="United States"><span>EN</span></a></li>
                            <li><a title="새창으로 열기" target="_blank" href="https://ch.liting.co.kr/"><img src="/theme/theme01/common/images/icon_china.png" alt="China"><span>CN</span></a></li>
                            <li><a title="새창으로 열기" target="_blank" href="https://jp.liting.co.kr/"><img src="/theme/theme01/common/images/icon_japan.png" alt="Japan"><span>JP</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>

<!-- } 상단 끝 -->