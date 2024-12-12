<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokemon Viewer</title>
    <style>
.moves-container {
    max-height: 200px; /* 고정된 높이 */
    overflow-y: auto; /* 세로 스크롤 활성화 */
    border: 1px solid #ddd;
    border-radius: 8px;
    padding: 10px;
    background-color: #f9f9f9;
}

.move-item {
    display: flex;
    justify-content: space-between; /* 좌우 정렬 */
    padding: 10px;
    border-bottom: 1px solid #ddd; /* 기술 간 구분선 */
}

.move-item:last-child {
    border-bottom: none; /* 마지막 항목 구분선 제거 */
}

.move-name {
    font-weight: bold;
}

.move-type {
    color: #007bb5; /* 타입별 색상 */
    font-size: 12px;
}

.move-pp {
    font-size: 12px;
    color: #666;
}
.tooltip {
    position: absolute;
    background-color: #333;
    color: white;
    padding: 5px;
    border-radius: 4px;
    font-size: 12px;
    white-space: nowrap;
    transform: translateY(-100%);
    margin-top: -5px;
}

    </style>
</head>
<body>
<div class="moves-container">
    <div class="move-item">
        <span class="move-name">메가펀치</span>
        <span class="move-type">물</span>
        <span class="move-pp">PP: 20</span>
    </div>
    <div class="move-item">
        <span class="move-name">얼음펀치</span>
        <span class="move-type">얼음</span>
        <span class="move-pp">PP: 15</span>
    </div>
    <!-- 추가 기술 목록 -->
</div>
    <script>
const moveItems = document.querySelectorAll('.move-item');

moveItems.forEach(item => {
    item.addEventListener('mouseenter', () => {
        const tooltip = document.createElement('div');
        tooltip.className = 'tooltip';
        tooltip.innerText = "기술의 상세 설명이 여기에 표시됩니다.";
        item.appendChild(tooltip);
    });

    item.addEventListener('mouseleave', () => {
        const tooltip = item.querySelector('.tooltip');
        if (tooltip) tooltip.remove();
    });
});


    </script>
</body>
</html>
