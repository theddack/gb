<!DOCTYPE html>
<html lang="en">
<>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Real-Time Subway Tracker</title>
<style>
.train {
    width: 50px;
    height: 50px;
    background-color: #ff5733; /* 열차 기본 색상 */
    border-radius: 50%; /* 동그란 모양 */
    display: flex;
    justify-content: center;
    align-items: center;
    position: relative;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2); /* 그림자 효과 */
    border: 2px solid #fff; /* 테두리 */
}

/* 열차 내부 텍스트 */
.train-text {
    font-size: 20px; /* 열차 내부 텍스트 크기 */
    color: white;
    font-weight: bold;
    pointer-events: none; /* 텍스트 클릭 방지 */
}

@keyframes moveTrain {
    0% { transform: translateX(0); }
    100% { transform: translateX(200px); }
}

.train {
    animation: moveTrain 2s linear infinite; /* 열차 애니메이션 */
}
</style>

<div class="train">
    <span class="train-text">🚆</span>
</div>
</body>
<script>


</script>
</html>
