<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>포켓몬 View - 자연스러운 움직임</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
        }
        .pokemon-container {
            position: relative;
            width: 300px;
            margin: 0 auto;
        }
        .pokemon-image {
            width: 100%;
            height: auto;
            border: 1px solid #ddd;
            border-radius: 10px;
        }
        .moving-banner {
            position: absolute;
            bottom: -30px; /* 이미지 밑에 띠 위치 */
            width: 100%;
            height: 20px;
            background-color: #ffcc00;
            color: #000;
            font-size: 14px;
            line-height: 20px;
            overflow: hidden;
            white-space: nowrap; /* 한 줄 유지 */
        }
        .banner-text {
            display: inline-block;
            padding-left: 100%; /* 오른쪽에서 시작 */
            animation: moveBanner 10s linear infinite;
        }
        .banner-text::after {
            content: " "; /* 여백 추가로 자연스러운 연결감 */
        }
        @keyframes moveBanner {
            0% {
                transform: translateX(0%);
            }
            100% {
                transform: translateX(-100%);
            }
        }
    </style>
</head>
<body>
    <h1>포켓몬 View 페이지</h1>

    <div class="pokemon-container">
        <!-- 포켓몬 이미지 -->
        <img src="pokemon_image.png" alt="포켓몬 이미지" class="pokemon-image">
        
        <!-- 움직이는 띠 -->
        <div class="moving-banner">
            <div class="banner-text">
                이 포켓몬은 매우 희귀합니다! 잡으러 가세요!  <!-- 공백으로 연결 -->
            </div>
        </div>
    </div>
</body>
</html>
