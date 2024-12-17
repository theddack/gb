<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokemon Viewer</title>
    <style>
.pokedex-entry {
  width: 320px;
  margin: 20px auto;
  border: 2px solid #ccc;
  border-radius: 12px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  font-family: Arial, sans-serif;
  background-color: #fff;
  text-align: center;
  padding: 15px;
}

.pokedex-entry h2 {
  font-size: 1.5em;
  margin: 0;
  color: #333;
}

.pokemon-info img {
  width: 120px;
  margin: 10px 0;
}

.type-label {
  display: inline-block;
  background-color: #8BC34A;
  color: #fff;
  padding: 4px 10px;
  border-radius: 12px;
  font-size: 0.9em;
}

.moves-section h3 {
  font-size: 1.2em;
  color: #444;
  margin-bottom: 10px;
  text-align: left;
}

.move-list {
  max-height: 150px; /* 스크롤 영역 높이 제한 */
  overflow-y: auto; /* 세로 스크롤 */
  border: 1px solid #ddd;
  border-radius: 8px;
  background-color: #f9f9f9;
  padding: 5px;
}

.move-item {
  padding: 8px;
  margin: 5px 0;
  background-color: #f0f0f0;
  border-radius: 6px;
  cursor: pointer;
  transition: background-color 0.3s ease;
  text-align: left;
  color: #333;
  font-weight: bold;
}

.move-item:hover {
  background-color: #e0e0e0;
  position: relative;
}

.move-item:hover::after {
  content: attr(data-description); /* 툴팁 내용 */
  position: absolute; /* 부모 기준으로 절대 위치 */
  bottom: 50%; /* 바로 위에 표시 */
  left: 60%; /* 가로 중앙 정렬 */
  transform: translateX(-50%); /* 가운데 정렬 */
  background: #333; /* 배경색 */
  color: #fff; /* 글씨색 */
  padding: 8px; /* 여백 */
  border-radius: 6px; /* 둥근 모서리 */
  white-space: normal; /* 자동 줄바꿈 */
  width: 200px; /* 툴팁 너비 */
  font-size: 0.9em; /* 글씨 크기 */
  text-align: center; /* 글씨 중앙 정렬 */
  box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.2); /* 그림자 효과 */
  z-index: 10; /* 다른 요소 위에 표시 */
}




    </style>
</head>
<body>
<div class="pokedex-entry">
  <h2>No. 11 <span>단데기</span></h2>
  <div class="pokemon-info">
    <img src="metapod.png" alt="단데기 이미지">
    <span class="type-label">벌레</span>
  </div>
  <div class="moves-section">
    <h3>기술(Moves):</h3>
    <div class="move-list">
      <div class="move-item" data-description="방어를 크게 올리는 기술입니다.">아이언디펜스</div>
      <div class="move-item" data-description="적에게 벌레 타입의 공격을 가합니다.">벌레먹기</div>
      <div class="move-item" data-description="적의 속도를 크게 떨어뜨립니다.">전기거미줄</div>
      <div class="move-item" data-description="상대에게 물리 피해를 줍니다.">몸통박치기</div>
    </div>
  </div>
  <div class="ability-section">
    <p>특성(Ability): <strong>탈피</strong></p>
    <p>성격(Nature): <strong>무모한</strong> <span>[rash]</span></p>
    <p>숨겨진 특성(Passive): <strong class="locked">Locked</strong></p>
  </div>
  <div class="flavor-text">
    <p>있지만 얇은 부드럽기 때문에 강한 공격에는 버티지 못한다.</p>
  </div>
</div>


</body>
<script>
document.querySelectorAll('.accordion-title').forEach(button => {
  button.addEventListener('click', () => {
    const content = button.nextElementSibling;
    content.style.display = content.style.display === 'block' ? 'none' : 'block';
  });
});

</script>
</html>
