<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>포켓몬 도감 뷰어</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .pokedex-card {
            width: 300px;
            border: 2px solid #ccc;
            border-radius: 10px;
            background-color: #fff;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            padding: 15px;
            text-align: center;
            position: relative;
        }

        .pokedex-card .header {
            font-weight: bold;
            font-size: 16px;
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
            color: #333;
        }

        .pokedex-card .header .number {
            color: #555;
        }

        .pokedex-card .header .level {
            color: red;
            font-size: 18px;
        }

        .pokedex-card .image {
            margin: 10px 0;
            background-color: #eee;
            border-radius: 10px;
            overflow: hidden;
            width: 120px;
            height: 120px;
            margin: 0 auto;
        }

        .pokedex-card .image img {
            width: 100%;
            height: auto;
        }

        .pokedex-card .types {
            margin: 10px 0;
        }

        .pokedex-card .types span {
            display: inline-block;
            background-color: #78c850;
            color: #fff;
            padding: 3px 10px;
            margin: 0 5px;
            border-radius: 5px;
            font-size: 12px;
        }

        .pokedex-card .types span.poison {
            background-color: #a040a0;
        }

        .pokedex-card .moves {
            margin-top: 10px;
            text-align: left;
            font-size: 12px;
        }

        .pokedex-card .moves ul {
            list-style-type: none;
            padding: 0;
        }

        .pokedex-card .moves li {
            padding: 5px;
            background-color: #f8f8f8;
            border: 1px solid #ddd;
            margin-bottom: 5px;
            border-radius: 5px;
        }

        .pokedex-card .stats {
            font-size: 14px;
            margin-top: 15px;
        }

        .pokedex-card .stats .stat {
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
    <div class="pokedex-card">
        <div class="header">
            <span class="number">No. 0001</span>
            <span class="level">Lv. 1</span>
        </div>
        <div class="image">
            <img src="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/1.png" alt="Bulbasaur">
        </div>
        <div class="types">
            <span class="grass">Grass</span>
            <span class="poison">Poison</span>
        </div>
        <div class="moves">
            <strong>Moves:</strong>
            <ul>
                <li>Tackle</li>
                <li>Growl</li>
                <li>Vine Whip</li>
                <li>Giga Drain</li>
            </ul>
        </div>
        <div class="stats">
            <div class="stat">Ability: <strong>Overgrow</strong></div>
            <div class="stat">Nature: <strong>Hardy</strong></div>
            <div class="stat">Passive: <strong>Locked</strong></div>
        </div>
    </div>
</body>
</html>
