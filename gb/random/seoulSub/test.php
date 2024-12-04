<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Real-Time Subway Tracker</title>
<style>
    body {
    font-family: Arial, sans-serif;
    background-color: #f8f9fa;
}

.tracker {
    position: relative;
    width: 100%;
    height: 150px;
    overflow-x: scroll;
    white-space: nowrap;
    background: #fff;
    padding: 10px 0;
}

.line {
    position: relative;
    display: flex;
    align-items: center;
    height: 100px;
    background: #ddd;
    border-radius: 5px;
}

.station {
    position: relative;
    width: 50px;
    height: 50px;
    background: #007bff;
    border-radius: 50%;
    text-align: center;
    line-height: 50px;
    color: white;
    margin: 0 15px;
}

.train {
    position: absolute;
    width: 30px;
    height: 30px;
    background: #ff5733;
    border-radius: 50%;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
}

</style>
</head>
<body>
    <div class="tracker">
        <div class="line">
            <!-- 78개의 역 -->
            <div class="station" id="station1">Station 1</div>
            <div class="station" id="station2">Station 2</div>
            <div class="station" id="station3">Station 3</div>
            <!-- 역 계속 추가 -->
            <div class="station" id="station78">Station 78</div>
        </div>
        <!-- 열차 -->
        <div class="train" id="train1"></div>
        <div class="train" id="train2"></div>
        <div class="train" id="train3"></div>
    </div>
    <script src="script.js"></script>
</body>
<script>
    document.addEventListener("DOMContentLoaded", () => {
    // 열차 데이터 (API에서 가져온 데이터로 대체)
    const trains = [
        { id: "train1", currentStation: 1 }, // Station 1에 멈춰 있음
        { id: "train2", currentStation: 3 }, // Station 3에 멈춰 있음
        { id: "train3", currentStation: 5 }, // 역 사이에 있는 경우는 중간 좌표
    ];

    // 역 DOM 요소들
    const stations = document.querySelectorAll(".station");

    // 열차 위치 업데이트
    trains.forEach(train => {
        const trainElement = document.getElementById(train.id);
        const currentStation = stations[train.currentStation - 1]; // 현재 역 ID 기반으로 찾기

        if (currentStation) {
            // 열차 위치를 역 위치로 이동
            trainElement.style.left = `${currentStation.offsetLeft}px`;
        }
    });

    // 주기적으로 업데이트 (API에서 데이터 가져오는 부분과 연결)
    setInterval(() => {
        // API에서 새 데이터 가져오기 (여기서는 임의로 데이터 변경)
        trains[0].currentStation = (trains[0].currentStation % 78) + 1; // 다음 역으로 이동
        trains[1].currentStation = (trains[1].currentStation % 78) + 1; // 다음 역으로 이동

        // 열차 위치 다시 설정
        trains.forEach(train => {
            const trainElement = document.getElementById(train.id);
            const currentStation = stations[train.currentStation - 1];
            if (currentStation) {
                trainElement.style.left = `${currentStation.offsetLeft}px`;
            }
        });
    }, 5000); // 5초마다 업데이트
});

</script>
</html>
