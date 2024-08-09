<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Memory Game</title>
    <style>
        .div {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            transition: transform 0.5s, opacity 0.5s;
        }

        .selected {
            transform: scale(1.2);
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }

        .removed {
            opacity: 0;
            transform: scale(0.5);
        }
    </style>
</head>

<body>
    <div id="game-board"></div>
</body>
<script>
    const gameBoard = document.getElementById('game-board');
    const numDivs = 10; // number of divs to create
    const colors = ['red', 'blue', 'green', 'yellow', 'orange', 'purple'];

    function getRandomLocation() {
        const maxX = window.innerWidth - 50;
        const maxY = window.innerHeight - 50;
        return {
            x: Math.floor(Math.random() * maxX),
            y: Math.floor(Math.random() * maxY),
        };
    }

    function getRandomColor() {
        return colors[Math.floor(Math.random() * colors.length)];
    }

    let divs = [];

    for (let i = 0; i < numDivs / 2; i++) {
        const color = getRandomColor();
        for (let j = 0; j < 2; j++) {
            const div = document.createElement('div');
            div.className = 'div';
            const location = getRandomLocation();
            div.style.position = 'absolute';
            div.style.top = `${location.y}px`;
            div.style.left = `${location.x}px`;
            div.style.backgroundColor = color;
            gameBoard.appendChild(div);
            divs.push(div);
        }
    }

    let clickedDivs = [];

    divs.forEach((div) => {
        div.addEventListener('click', () => {
            if (clickedDivs.length === 0) {
                clickedDivs.push(div);
                div.classList.add('selected');
            } else if (clickedDivs[0] === div) {
                // if the same div is clicked again, remove the selected class
                div.classList.remove('selected');
                clickedDivs = [];
            } else if (clickedDivs[0].style.backgroundColor === div.style.backgroundColor) {
                // if the colors match, remove both divs
                clickedDivs[0].classList.add('removed');
                div.classList.add('removed');
                setTimeout(() => {
                    clickedDivs[0].remove();
                    div.remove();
                    divs = divs.filter((d) => d !== clickedDivs[0] && d !== div);
                    if (divs.length === 0) {
                        // if all divs are removed, restart the game
                        restartGame();
                    }
                    clickedDivs = [];
                }, 500);
            } else {
                // if the colors don't match, reset the clicked divs array and remove selected class
                setTimeout(() => {
                    clickedDivs[0].classList.remove('selected');
                    div.classList.remove('selected');
                }, 500);
                clickedDivs = [];
            }
        });
    });

    function restartGame() {
        // remove all remaining divs
        gameBoard.innerHTML = '';
        // create new divs
        divs = [];
        for (let i = 0; i < numDivs / 2; i++) {
            const color = getRandomColor();
            for (let j = 0; j < 2; j++) {
                const div = document.createElement('div');
                div.className = 'div';
                const location = getRandomLocation();
                div.style.position = 'absolute';
                div.style.top = `${location.y}px`;
                div.style.left = `${location.x}px`;
                div.style.backgroundColor = color;
                gameBoard.appendChild(div);
                divs.push(div);
            }
        }
        // add event listeners to the new divs
        divs.forEach((div) => {
            div.addEventListener('click', () => {
                if (clickedDivs.length === 0) {
                    clickedDivs.push(div);
                    div.classList.add('selected');
                } else if (clickedDivs[0] === div) {
                    // if the same div is clicked again, remove the selected class
                    div.classList.remove('selected');
                    clickedDivs = [];
                } else if (clickedDivs[0].style.backgroundColor === div.style.backgroundColor) {
                    // if the colors match, remove both divs
                    clickedDivs[0].classList.add('removed');
                    div.classList.add('removed');
                    setTimeout(() => {
                        clickedDivs[0].remove();
                        div.remove();
                        divs = divs.filter((d) => d !== clickedDivs[0] && d !== div);
                        if (divs.length === 0) {
                            // if all divs are removed, restart thegame
                            restartGame();
                        }
                        clickedDivs = [];
                    }, 500);
                } else {
                    // if the colors don't match, reset the clicked divs array and remove selected class
                    setTimeout(() => {
                        clickedDivs[0].classList.remove('selected');
                        div.classList.remove('selected');
                    }, 500);
                    clickedDivs = [];
                }
            });
        });
    }
</script>

</html>c