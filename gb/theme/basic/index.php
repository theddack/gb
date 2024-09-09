<?php
if (!defined('_INDEX_')) define('_INDEX_', true);
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if (G5_IS_MOBILE) {
    include_once(G5_THEME_MOBILE_PATH.'/index.php');
    return;
}

if(G5_COMMUNITY_USE === false) {
    include_once(G5_THEME_SHOP_PATH.'/index.php');
    return;
}

include_once(G5_THEME_PATH.'/head.php');
?>

<!-- -->
    <div class="visual">
        <div class="swiper-container">
            <ul class="swiper-wrapper">
                <li class="swiper-slide">
                    <a href="/bbs/content.php?co_id=07_01&me_code=7070?ifdotrk_campaign=quickreservation&ifdotrk_slot=main_top_1&ifdotrk_material=banner&ifdotrk_rest=2024_0326">
                        <picture>
                            <source media="(min-width: 1024px)" srcset="/theme/theme01/images/gangnam/visual_reservation.png" alt="이젠 수술까지 빠르게, 1초 예약">
                            <source media="(min-width: 768px)" srcset="/theme/theme01/images/gangnam/visual_reservation_tab.png" alt="이젠 수술까지 빠르게, 1초 예약">
                            <img src="/theme/theme01/images/gangnam/visual_reservation_mo.png" alt="이젠 수술까지 빠르게, 1초 예약">
                        </picture>
                    </a>
                    <div class="hidden">
                        <h2>
                            <span>이젠 수술까지 빠르게, 1초 예약. 클릭 한번으로 쉽고 간편하게</span>
                            <strong>바로예약 리뉴얼 OPEN!</strong>
                            <span>전화상담 NO, 수술까지 YES</span>
                        </h2>
                        <p>
                            <span>*수면마취가 필요한 경우 당일 금식이 필요합니다.</span>
                            <span>*기저질환이 있으신 분들은 주치의 소견서를 지참 후 상담 가능합니다.</span>
                            <span>바로예약하고 혜택받기</span>
                        </p>
                    </div>
                </li>
                <li class="swiper-slide">
                    <a href="/bbs/content.php?co_id=02_09&me_code=2090">
                        <picture>
                            <source media="(min-width: 1024px)" srcset="/theme/theme01/images/gangnam/visual_facelift.png" alt="안면재건술을 공부한 성형외과전문의가 하는 안면거상">
                            <source media="(min-width: 768px)" srcset="/theme/theme01/images/gangnam/visual_facelift_tab.png" alt="안면재건술을 공부한 성형외과전문의가 하는 안면거상">
                            <img src="/theme/theme01/images/gangnam/visual_facelift_mo.png" alt="안면재건술을 공부한 성형외과전문의가 하는 안면거상">
                        </picture>
                    </a>
                    <div class="hidden">
                        <h2>안면재건술을 공부한 성형외과전문의가 하는 안면거상</h2>
                        <p>
                            리프팅은 노화로 생긴 얼굴의 변화와 기능적 결함을 개선하는 의술인 만큼,
                            큰 의미에서 안면재건술이라고 생각합니다.
                            의과대학 수련 시절 수행한 안면재건술의 다양한 지식과 기술이,
                            리프팅 분야에 기여할 수 있는 부분이 많다고 생각합니다.
                            <strong>안면거상은 어려운 수술입니다. 그러나 누가, 어떻게 하느냐에 따라 따릅니다.</strong>
                        </p>
                        <p>리팅성형외과 이성준 대표원장</p>
                    </div>
                </li>
                <li class="swiper-slide doctor_phj" data-video-id="7ibikka_aFI">
                    <a href="https://youtu.be/7ibikka_aFI?si=NANmr3LcnqZRbbY8&ifdotrk_campaign=doctorhyunjun_youtube&ifdotrk_slot=main_top_3&ifdotrk_material=banner&ifdotrk_rest=2024_0326" title="새창에서 열기" target="_blank">
                        <picture>
                            <source media="(min-width: 1024px)" srcset="/theme/theme01/images/gangnam/visual_hyeonjun.png" alt="병원 가기 전 필수 시청!, 리프팅의 모든 것, 현준보감">
                            <source media="(min-width: 768px)" srcset="/theme/theme01/images/gangnam/visual_hyeonjun_tab.png" alt="병원 가기 전 필수 시청!, 리프팅의 모든 것, 현준보감">
                            <img src="/theme/theme01/images/gangnam/visual_hyeonjun_mo.png" alt="병원 가기 전 필수 시청!, 리프팅의 모든 것, 현준보감">
                        </picture>
                    </a>
                    <div class="video_ytb">
                        <div id="video1">
                            <div class="video_frame"></div>
                        </div>
                    </div>
                    <div class="hidden">
                        <h2>
                            <span>지속기간!? 병원 고르는 팁, 주름별 리프팅. 병원 가기 전 필수 시청!</span>
                            <strong>리프팅의 모든 것, 현준보감</strong>
                        </h2>
                        <p>성형외과 전문의 박현준 원장</p>
                    </div>
                </li>
                <li class="swiper-slide lifting_talk" data-video-id="7e3xETeH8nI">
                    <a href="https://liting.co.kr/landing/?id=1711425468&ifdotrk_campaign=sinsa_no1&ifdotrk_slot=main_top_4&ifdotrk_material=banner&ifdotrk_rest=customminicheck_2024_0326" title="새창에서 열기" target="_blank">
                        <picture>
                            <source media="(min-width: 1024px)" srcset="/theme/theme01/images/gangnam/visual_liftingtalk.png?v=240722" alt="리팅 대표원장들이 말하는 리얼 리프팅 토크">
                            <source media="(min-width: 768px)" srcset="/theme/theme01/images/gangnam/visual_liftingtalk_tab.png?v=240722" alt="리팅 대표원장들이 말하는 리얼 리프팅 토크">
                            <img src="/theme/theme01/images/gangnam/visual_liftingtalk_mo.png?v=240722" alt="리팅 대표원장들이 말하는 리얼 리프팅 토크">
                        </picture>
                    </a>
                    <div class="video_ytb">
                        <div id="video2">
                            <div class="video_frame"></div>
                        </div>
                    </div>
                    <div class="hidden">
                        <h2>
                            <span>리팅 대표원장들이 말하는</span>
                            <strong>리얼 리프팅 토크</strong>
                        </h2>
                        <p>서울점 대표원장 이성준(50대, 최강동안), 부산점 대표원장 유한수(신의한수, 공감의신), 대구점 대표원장 김재봉(한땀장인, 가족수술)</p>
                    </div>
                </li>
                <li class="swiper-slide">
                    <a href="https://liting.co.kr/landing/?id=1683856189&ifdotrk_campaign=custommini&ifdotrk_slot=main_top_5&ifdotrk_material=banner&ifdotrk_rest=custommini_2024_0422" title="새창에서 열기" target="_blank">
                        <picture>
                            <source media="(min-width: 1024px)" srcset="/theme/theme01/images/visual_custom.png" alt="고민부위별 커스텀 미니리프팅">
                            <source media="(min-width: 768px)" srcset="/theme/theme01/images/visual_custom_tab.png" alt="고민부위별 커스텀 미니리프팅">
                            <img src="/theme/theme01/images/visual_custom_mo.png" alt="고민부위별 커스텀 미니리프팅">
                        </picture>
                    </a>
                    <div class="hidden">
                        <h2>
                            <span>custom mini Lifting</span>
                            <strong>고민부위별 커스텀 미니리프팅</strong>
                        </h2>
                        <p>#처진눈꺼풀 #팔자주름 #처진볼턱</p>
                    </div>
                </li>
                <li class="swiper-slide doctor_cyh" data-video-id="1Iz06zPGDJk">
                    <a href="https://liting.co.kr/landing/?id=1711602973&ifdotrk_campaign=liftingclass&ifdotrk_slot=main_top_7&ifdotrk_material=banner&ifdotrk_rest=doctorjo49%_2024_0422" title="새창에서 열기" target="_blank">
                        <picture>
                            <source media="(min-width: 1024px)" srcset="/theme/theme01/images/gangnam/visual_younghoo.png" alt="리프팅 수술 전 꼭 봐야 하는 리프팅 특강">
                            <source media="(min-width: 768px)" srcset="/theme/theme01/images/gangnam/visual_younghoo_tab.png" alt="리프팅 수술 전 꼭 봐야 하는 리프팅 특강">
                            <img src="/theme/theme01/images/gangnam/visual_younghoo_mo.png" alt="리프팅 수술 전 꼭 봐야 하는 리프팅 특강">
                        </picture>
                    </a>
                    <div class="video_ytb">
                        <div id="video3">
                            <div class="video_frame"></div>
                        </div>
                    </div>
                    <div class="hidden">
                        <h2>
                            <span>리프팅 수술 전 꼭 봐야 하는 리프팅 특강</span>
                            <strong>리프팅 1타 강사 조영후 원장, 특강 자세히 보기</strong>
                        </h2>
                    </div>
                </li>
                <li class="swiper-slide">
                    <a href="https://www.youtube.com/@liting_ps?ifdotrk_campaign=litingtv&ifdotrk_slot=main_top_6&ifdotrk_material=banner&ifdotrk_rest=youtube_2024_0326" title="새창에서 열기" target="_blank">
                        <picture>
                            <source media="(min-width: 1024px)" srcset="/theme/theme01/images/gangnam/visual_litingtv.png" alt="리팅TV 유튜브 공식 계정">
                            <source media="(min-width: 768px)" srcset="/theme/theme01/images/gangnam/visual_litingtv_tab.png" alt="리팅TV 유튜브 공식 계정">
                            <img src="/theme/theme01/images/gangnam/visual_litingtv_mo.png" alt="리팅TV 유튜브 공식 계정">
                        </picture>
                    </a>
                    <div class="hidden">
                        <h2>
                            <span>리팅TV, 아직도 구독 안하셨나요?</span>
                            <strong>다양한 리프팅에 대한 설명부터 드라마틱한 후기까지 쏙쏙!</strong>
                        </h2>
                    </div>
                </li>

            </ul>

            <div class="arrow_wrap">
                <div class="swiper-pagination">
                    <ul>
                        <li class=""><span class="num">1</span><div class="prog"><div><span></span></div></div><span class="visual_num"></span></li>
                        <li class=""><span class="num">2</span><div class="prog"><div><span></span></div></div><span class="visual_num"></span></li>
                        <li class=""><span class="num">3</span><div class="prog"><div><span></span></div></div><span class="visual_num"></span></li>
                        <li class=""><span class="num">4</span><div class="prog"><div><span></span></div></div><span class="visual_num"></span></li>
                        <li class=""><span class="num">5</span><div class="prog"><div><span></span></div></div><span class="visual_num"></span></li>
                        <li class=""><span class="num">6</span><div class="prog"><div><span></span></div></div><span class="visual_num"></span></li>
                        <li class=""><span class="num">7</span><div class="prog"><div><span></span></div></div><span class="visual_num"></span></li>
                        <!--li class=""><span class="num">8</span><div class="prog"><div><span></span></div></div><span class="visual_num"></span></li-->
                    </ul>
                    <button id="slideVisualCtr">정지</button>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
                <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
            </div>
            <script>
                // 영상 컨트롤
                var tag = document.createElement('script');
                tag.src = "https://www.youtube.com/iframe_api";
                var firstScriptTag = document.getElementsByTagName('script')[0];
                firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

                /* var player1;

                function onYouTubeIframeAPIReady() {
                    player1 = new YT.Player('video_frame1', {
                        videoId: 'kKznDd4AEYg',
                        playerVars: {
                            'autoplay': 1,
                            'modestbranding': 1,
                            'playsinline': 1,
                            'controls': 0,
                            'color':'black',
                            'loop': 1,
                            'mute': 1,
                        }
                    });
                } */

                var players = {};

                // YouTube 플레이어 초기화
                function onYouTubeIframeAPIReady() {
                    initializePlayers();
                }

                function initializePlayers() {
                    var videoFrames = document.querySelectorAll('.swiper-slide[data-video-id] .video_frame');
                    videoFrames.forEach(function(frame, index) {
                        var videoId = frame.closest('.swiper-slide').getAttribute('data-video-id');
                        var playerId = 'player_' + index;
                        frame.setAttribute('id', playerId);
                        players[playerId] = new YT.Player(playerId, {
                            videoId: videoId,
                            playerVars: {
                                'autoplay': 1,
                                'modestbranding': 1,
                                'playsinline': 1,
                                'controls': 0,
                                'color': 'black',
                                'loop': 1,
                                'mute': 1,
                            }
                        });
                    });
                }

                function playVideoForSlide() {
                    var activeVisual = document.querySelector(".visual .swiper-container .swiper-slide-active");
                    var videoFrame = activeVisual.querySelector('.video_frame');
                    var playerId = null;
                    if (videoFrame) {
                        playerId = videoFrame.getAttribute('id');
                        if (players[playerId]) {
                            players[playerId].playVideo();
                        }
                    }
                    Object.keys(players).forEach(function(id) {
                        if (id !== playerId && players[id]) {
                            players[id].stopVideo();
                        }
                    });
                }

                // YT.Player의 시작, 종료 함수
                /* function playVideoForSlide() {
                    var activeVisual = $(".visual .swiper-container").find(".swiper-slide-active");
                    if(activeVisual.hasClass('seomyeon_open')) {
                        player1.playVideo();
                        player1.mute();
                    }else{
                        player1.stopVideo();
                    }
                } */

            </script>
            <script type="text/javascript">
                $(function(){
                    $(".visual .swiper-pagination ul li").eq(0).addClass("on");
                    var visualNum = $(".visual .swiper-pagination ul li").length;
                    $('.visual_num').html(visualNum);

                    var swiper = new Swiper(".visual .swiper-container", {
                        loop: true,
                        speed: 700,
                        autoplay: {
                            delay: 6000,
                            disableOnInteraction: false,
                        },
                        navigation: {
                            nextEl: ".swiper-button-next",
                            prevEl: ".swiper-button-prev",
                        },
                        initialSlide: 0,
                        on: {
                            slideChange : function() {
                                //슬라이드 이동 이벤트 발생시 play 버튼 스타일 변경
                                if (!$(this).hasClass("play")) {
                                    $("#slideVisualCtr").removeClass("play");
                                };
                            },
                            slideChangeTransitionEnd: function() {
                                playVideoForSlide();
                            }
                        },
                    });

                    // 페이지네이션 인덱스 숫자 변경
                    swiper.on('slideChangeTransitionStart', function(){
                        $(".visual .swiper-pagination li").removeClass("on");
                        $(".visual .swiper-pagination li").eq(this.realIndex).addClass("on");
                        swiper.autoplay.start();
                        $(".swiper-pagination ul").removeClass("paused");
                        playVideoForSlide();
                    });

                    // 비주얼 롤링 재생 컨트롤 버튼
                    $("#slideVisualCtr").click(function () {
                        if (!$(this).hasClass("play")) {
                            $(this).addClass("play");
                            swiper.autoplay.stop();
                            $(".swiper-pagination ul").addClass("paused");
                        } else {
                            $(this).removeClass("play");
                            swiper.slideNext();
                            swiper.autoplay.start();
                        }
                    });

                    $(".visual .swiper-pagination .num").click(function(){
                        var idx = $(this).parent().index();
                        swiper.slideToLoop(idx);
                        //console.log(idx);
                    });

                });
            </script>
        </div>
    </div>
    <article id="content">
        <h2 class="hidden">본문콘텐츠영역</h2>

        <section class="event">
            <div class="inner">
                <h3><span class="add_text">EVENT</span>리팅성형외과 이벤트</h3>
                <div class="mySwiper">
                    <ul class="swiper-wrapper">
                        <li class="swiper-slide">
                            <!--랜딩링크 있으면 랜딩으로 이동-->
                            <a class="img_box" href="https://liting.co.kr/landing/?id=1681804987" target="_blank">
                                <img src="https://liting.co.kr/data/file/event/2023041841022034.jpg" alt="" style="width:100%;">
                            </a>
                        </li>
                        <li class="swiper-slide">
                            <!--랜딩링크 있으면 랜딩으로 이동-->
                            <a href="https://liting.co.kr/bbs/board.php?bo_table=event&amp;wr_id=803&me_code=7050" >
                                <img src="https://liting.co.kr/data/file/event/202302201261422163.jpg" alt="" style="width:100%;">
                            </a>
                        </li>
                        <li class="swiper-slide">
                            <!--랜딩링크 있으면 랜딩으로 이동-->
                            <a href="https://liting.co.kr/bbs/board.php?bo_table=event&amp;wr_id=718&me_code=7050" >
                                <img src="https://liting.co.kr/data/file/event/20220127584257784.jpg" alt="" style="width:100%;">
                            </a>
                        </li>
                        <li class="swiper-slide">
                            <!--랜딩링크 있으면 랜딩으로 이동-->
                            <a class="img_box" href="https://liting.co.kr/landing/?id=1681805315" target="_blank">
                                <img src="https://liting.co.kr/data/file/event/202304182136312697.jpg" alt="" style="width:100%;">
                            </a>
                        </li>
                    </ul>
                    <div class="swiper-scrollbar"></div>
                </div>
            </div>
            <script>
                $(document).ready(function(){
                    var ww = window.innerWidth;
                    var swiper;

                    responsiveSwiper();

                    function initSwiper(loop) {
                        if (typeof(swiper) == 'object') swiper.destroy();

                        return swiper = new Swiper('.event .mySwiper', {
                            loop: true,
                            centeredSlides: true,
                            autoplay: {
                                delay: 3000,
                                disableOnInteraction: false,
                            },
                            slidesPerView: 1.2,
                            spaceBetween: 20,
                            scrollbar : {  // 스크롤바
                                el : '.swiper-scrollbar',
                                draggable : true, // 스크롤바 드래그 여부
                            },
                            breakpoints: {
                                1024: {
                                    slidesPerView: 3.8,
                                    spaceBetween: 40,
                                },
                                768: {
                                    slidesPerView: 1.8,
                                }
                            }
                        });
                    }

                    function responsiveSwiper() {
                        if (ww >= 768) {
                            // 무한루프
                            initSwiper('true');
                        } else if (ww < 768) {
                            // 루프 없음
                            initSwiper('false');
                        }
                    }

                    window.addEventListener('resize', function() {
                        ww = window.innerWidth;
                        responsiveSwiper();
                    });
                });
            </script>
        </section>
    </article>
    <section class="doctor_story">
        <div class="inner">
            <ul>
                <li class="img_box">
                    <img src="/theme/theme01/images/gangnam/img_doctor.png" alt="이성준 대표원장">
                </li>
                <li class="text_box">
                    <h3>
                        <span class="add_text">STORY</span>
                        이성준 대표원장님의 <span class="block"></span>안면재건술 이야기
                    </h3>
                    <p>리팅의 리프팅이 다를 수밖에 없는 이유, <span class="block"></span>지금 확인해 보세요.</p>
                    <a class="btn_more" href="bbs/content.php?co_id=06_03&me_code=6030">VIEW MORE</a>
                </li>
            </ul>
        </div>
    </section>
    <section class="program">
        <div class="inner">
            <h3><span class="add_text">PROGRAM</span>리프팅 노하우가 집약된 <i></i>리팅만의 프로그램</h3>
            <div class="mySwiper">
                <ul class="swiper-wrapper">

                    <li class="swiper-slide">
                        <a href="/bbs/content.php?co_id=02_03&me_code=2030">
                            <div class="img_box" >
                                <img src="/theme/theme01/images/img_program01.png" alt="프로그램 01">
                            </div>
                            <dl class="text_box">
                                <dt>스마일 미니리프팅</dt>
                                <dd>얼굴 중앙부 개선으로 환한 인상을 <span class="block"></span>되찾아주는 리팅 시그니처</dd>
                            </dl>
                        </a>
                    </li>
                    <li class="swiper-slide">
                        <a href="/bbs/content.php?co_id=03_07&me_code=3070">
                            <div class="img_box" >
                                <img src="/theme/theme01/images/img_program02.png" alt="프로그램 02">
                            </div>
                            <dl class="text_box">
                                <dt>레이저거상, 버츄RF</dt>
                                <dd>NO통증 NO마취 <span class="block"></span>30분 즉각 효과를 만나보세요!</dd>
                            </dl>
                        </a>
                    </li>
                    <li class="swiper-slide">
                        <a href="/bbs/content.php?co_id=02_07&me_code=2070">
                            <div class="img_box" >
                                <img src="/theme/theme01/images/img_program03.png" alt="프로그램 03">
                            </div>
                            <dl class="text_box">
                                <dt>리팅 시그니처리프팅</dt>
                                <dd>모근 손상은 더 줄이고 <span class="block"></span>피부와 근막층까지 동시 개선!</dd>
                            </dl>
                        </a>
                    </li>

                </ul>
                <div class="swiper-scrollbar"></div>
            </div>
        </div>
        <script>
            $(document).ready(function(){
                new Swiper(".program .mySwiper", {
                    loop : false,
                    loopAdditionalSlides : 1, // 슬라이드 반복 시 마지막 슬라이드에서 다음 슬라이드가 보여지지 않는 현상 수정
                    slidesPerView: 1.2,
                    spaceBetween: 20,
                    initialSlide: 0, //시작위치값
                    allowTouchMove : true,
                    scrollbar : {  // 스크롤바
                        el : '.swiper-scrollbar',
                        draggable : true, // 스크롤바를 드래그 여부
                    },
                    breakpoints: {
                        1280: {
                            slidesPerView: 3,
                            spaceBetween: 100,
                        },
                        1024: {
                            spaceBetween: 60,
                        },
                        768: {
                            slidesPerView: 2.2,
                            spaceBetween: 40,
                        },
                    },
                });
            });
        </script>
    </section>
    <section class="only_lifting">
        <div class="inner">
            <div class="mySwiper">
                <ul class="swiper-wrapper">
                    <li class="swiper-slide bg01" style="background-image: url(/theme/theme01/images/img_only_bg01.png)">
                        <h3><span class="add_text">ONlY Liting</span><span class="pc_ver">리팅성형외과는 </span><span class="block"></span><i></i>리프팅에 <b></b>집중합니다.</h3>
                        <div class="text_box">
                            <div class="b_text"><strong id="count1" class="num_text">19,274</strong><span>건</span></div>
                            <p class="explain">리프팅 시/수술 건 수</p>
                            <p class="notice">
                                2024년 1월 ~ 6월 기준 <!-- <span class="block"></span>
                                        (민트실, 엘라스티꿈, 울트라V, 닥터캐번, N스캐폴드, <i></i>M코그실, QTL 거래원장기준) -->
                            </p>
                        </div>
                    </li>
                    <li class="swiper-slide bg02" style="background-image: url(/theme/theme01/images/img_only_bg02.png)">
                        <h3><span class="add_text">ONlY Liting</span><span class="pc_ver">리팅성형외과는 </span><span class="block"></span>A부터 Z까지 <i></i><b></b>리프팅 원스톱시스템<span class="pc_ver">을 제공합니다.</span></h3>
                        <div class="text_box">
                            <div class="b_text"><strong class="num_text">A TO Z</strong></div>
                            <p class="explain">리팅성형외과는 환자분들의 세세한 부분까지 <i></i>놓치지 않고 수술 및 시술을 합니다.</p>
                            <a href="/bbs/content.php?co_id=01_01&me_code=1010" class="btn_more">VIEW MORE</a>
                        </div>
                    </li>
                </ul>
                <div class="swiper-pagination"></div>
            </div>
        </div>
        <script>
            $(document).ready(function(){
                //배너 슬라이드
                var swiper = new Swiper(".only_lifting .mySwiper", {
                    loop : false,
                    loopAdditionalSlides : 1, // 슬라이드 반복 시 마지막 슬라이드에서 다음 슬라이드가 보여지지 않는 현상 수정
                    slidesPerView: 1,
                    spaceBetween: 0,
                    autoplay: {
                        delay: 10000,
                        disableOnInteraction: false  // false-스와이프 후 자동 재생
                    },
                    pagination: {
                        el: ".swiper-pagination",
                        clickable: true
                    },
                    on: {
                        slideChange : function() {
                            onoff = false;
                            numberCountStart(19274);
                        },
                    },
                });


                // 리프팅 실 사용건수 카운팅
                var onoff = false;

                $(window).on('scroll',function(){
                    var windowHeight = $(window).height();
                    var countPoint = $('.only_lifting').offset().top - windowHeight/2;
                    var windowScroll = $(window).scrollTop();

                    //console.log(countPoint +' / '+ windowScroll);
                    //console.log(onoff);

                    if(windowScroll > countPoint && onoff == false){
                        onoff = true;
                        numberCountStart(19274);
                    }
                });

                function numberCountStart(memberCountConTxt) {
                    //var memberCountConTxt = 19274;
                    $({ val: 0 }).animate({ val: memberCountConTxt }, {
                        duration: 2000,
                        step: function () {
                            var number = numberWithCommas(Math.floor(this.val));
                            $("#count1").text(number);
                        },
                        complete: function () {
                            var number = numberWithCommas(Math.floor(this.val));
                            $("#count1").text(number);
                        }
                    });
                }

                function numberWithCommas(x) {
                    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                }

                $(window).resize(function(){
                    windowHeight = $(window).height();
                    countPoint = $('.only_lifting').offset().top - windowHeight/2;
                    windowScroll = $(window).scrollTop();
                });
            });
        </script>
    </section>
    <section class="youtube">
        <div class="inner">
            <h3><span class="add_text">Youtube</span>리팅성형외과의 모든 것! <i></i>리팅TV</h3>
            <div class="mySwiper">
                <ul class="swiper-wrapper">
                    <li class="swiper-slide">
                        <a href="https://liting.co.kr/bbs/board.php?bo_table=media&amp;wr_id=458">
                            <div class="img_box">
                                <img src="https://liting.co.kr/data/file/media/7cf4303159deedfc30dfb1e371be1a62_8pDkfv6B_bf16f15c0451ffb3cdf661fb10db00a342d814d4.png" alt="유튜브 썸네일 1">
                            </div>
                            <div class="text_box">
                                <p><span class="icon"></span>[안면거상술 후기 리뷰] 가족에게 직접 리…</p>
                            </div>
                        </a>
                    </li>
                    <li class="swiper-slide">
                        <a href="https://liting.co.kr/bbs/board.php?bo_table=media&amp;wr_id=453">
                            <div class="img_box">
                                <img src="https://liting.co.kr/data/file/media/e85d73913f45c645c017274e5a138afd_HOfAQilp_a9f42e52b2ef15c261dc751ec308a2ee9816a214.png" alt="유튜브 썸네일 1">
                            </div>
                            <div class="text_box">
                                <p><span class="icon"></span>[중년눈성형] ‘이것' 없으면 남자는 무조…</p>
                            </div>
                        </a>
                    </li>
                    <li class="swiper-slide">
                        <a href="https://liting.co.kr/bbs/board.php?bo_table=media&amp;wr_id=452">
                            <div class="img_box">
                                <img src="https://liting.co.kr/data/file/media/107950e45d246e6c18445ed8dc4bceb2_TflnQaj6_2f082e641047d5d089211e8731c635635467a5f7.png" alt="유튜브 썸네일 1">
                            </div>
                            <div class="text_box">
                                <p><span class="icon"></span>팔자주름 확실하게 없애는 법 시술 vs 수…</p>
                            </div>
                        </a>
                    </li>
                    <li class="swiper-slide">
                        <a href="https://liting.co.kr/bbs/board.php?bo_table=media&amp;wr_id=450">
                            <div class="img_box">
                                <img src="https://liting.co.kr/data/file/media/3127e8f231ee1a4462bae7d60f95cf89_SzMgyEXQ_d66ec14d0c1c62618d17eac51f4863a92b4a4b2f.png" alt="유튜브 썸네일 1">
                            </div>
                            <div class="text_box">
                                <p><span class="icon"></span>안면거상만 하지마세요! | 거상 이성준</p>
                            </div>
                        </a>
                    </li>
                    <li class="swiper-slide">
                        <a href="https://liting.co.kr/bbs/board.php?bo_table=media&amp;wr_id=441">
                            <div class="img_box">
                                <img src="https://liting.co.kr/data/file/media/ca4867d43e91f4b1c52f0bc151b1dfc9_pojT6qVg_68cb117b954436f830d4e31822e8cd9f6c15ae73.png" alt="유튜브 썸네일 1">
                            </div>
                            <div class="text_box">
                                <p><span class="icon"></span>[충격] 안면거상 후기! 안면거상술하면 나…</p>
                            </div>
                        </a>
                    </li>
                    <li class="swiper-slide">
                        <a href="https://liting.co.kr/bbs/board.php?bo_table=media&amp;wr_id=440">
                            <div class="img_box">
                                <img src="https://liting.co.kr/data/file/media/ca4867d43e91f4b1c52f0bc151b1dfc9_aN4EgRrz_7930e07e08b9859ced59e7a424f24f4eee554e7a.png" alt="유튜브 썸네일 1">
                            </div>
                            <div class="text_box">
                                <p><span class="icon"></span>안면거상 후 시기별 회복과정 붓기, 출혈,…</p>
                            </div>
                        </a>
                    </li>
                    <li class="swiper-slide">
                        <a href="https://liting.co.kr/bbs/board.php?bo_table=media&amp;wr_id=439">
                            <div class="img_box">
                                <img src="https://liting.co.kr/data/file/media/ca4867d43e91f4b1c52f0bc151b1dfc9_Gsj2QD6h_b65e1f1f82bac9e7d4eab03b950489c056480698.png" alt="유튜브 썸네일 1">
                            </div>
                            <div class="text_box">
                                <p><span class="icon"></span>장영란 팔자주름 없애는 법 실제 효과! 성…</p>
                            </div>
                        </a>
                    </li>
                    <li class="swiper-slide">
                        <a href="https://liting.co.kr/bbs/board.php?bo_table=media&amp;wr_id=438">
                            <div class="img_box">
                                <img src="https://liting.co.kr/data/file/media/a1acf133b5841b8afaeae20cced1b8d2_6igb7lGy_4470d7060f62844080055f9bfa35a250eec43416.png" alt="유튜브 썸네일 1">
                            </div>
                            <div class="text_box">
                                <p><span class="icon"></span>안면거상 '이것' 안하면 효과 없습니다! …</p>
                            </div>
                        </a>
                    </li>
                </ul>
                <div class="swiper-scrollbar"></div>
            </div>
            <div class="btn_box">
                <a class="btn_more" href="/bbs/board.php?bo_table=media&me_code=1090">VIEW MORE</a>
            </div>
        </div>
        <script type="text/javascript">
            $(document).ready(function(){
                //contents
                new Swiper(".youtube .mySwiper", {
                    loop: true,
                    centeredSlides: true,
                    autoplay: {
                        delay: 3000,
                        disableOnInteraction: false,
                    },
                    allowTouchMove : true,
                    loopAdditionalSlides : 1, // 슬라이드 반복 시 마지막 슬라이드에서 다음 슬라이드가 보여지지 않는 현상 수정
                    slidesPerView: 1.2,
                    spaceBetween: 20,
                    scrollbar : {  // 스크롤바
                        el : '.swiper-scrollbar',
                        draggable : true, // 스크롤바를 드래그해서 움직일수 있는지 여부
                    },
                    breakpoints: {
                        1024: {
                            slidesPerView: 2.8,
                            spaceBetween: 80,
                        },
                        768: {
                            slidesPerView: 1.4,
                            spaceBetween: 40,
                        },
                    }
                });
            });
        </script>
    </section>
<!-- -->

<?php
include_once(G5_THEME_PATH.'/tail.php');