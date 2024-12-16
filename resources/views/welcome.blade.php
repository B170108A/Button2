<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bursting Stars Effect Button</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            width: 100%;
            overflow: hidden;
            position: relative;
        }

        /* Fullscreen background */
        .background-image {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            object-fit: cover;
        }

        /* Button 64 - Ice Blue Gradient */
        .button-64 {
            align-items: center;
            background-image: linear-gradient(144deg, #E0F7FA, #80DEEA 50%, #00ACC1);
            border: 0;
            border-radius: 8px;
            box-shadow: rgba(0, 123, 164, 0.2) 0 15px 30px -5px;
            box-sizing: border-box;
            color: #FFFFFF;
            display: flex;
            font-family: Phantomsans, sans-serif;
            font-size: 32px;
            font-weight: bold;
            justify-content: center;
            line-height: 1.2em;
            max-width: 100%;
            min-width: 220px;
            padding: 8px;
            text-decoration: none;
            user-select: none;
            touch-action: manipulation;
            white-space: nowrap;
            cursor: pointer;
            position: absolute;
            top: 70%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .button-64 span {
            background-color: #B2EBF2;
            padding: 24px 50px;
            border-radius: 6px;
            width: 100%;
            height: 100%;
            transition: 300ms;
        }

        .button-64:hover span {
            background: none;
        }

        @media (min-width: 768px) {
            .button-64 {
                font-size: 40px;
                min-width: 280px;
            }
        }
    </style>
</head>
<body>
    <!-- Background Image -->
    <img class="background-image" src="https://lh3.googleusercontent.com/d/1UpSmcz8gt9P-5tLNOzLLue_-Cf5kAK3j" alt="Background Image">

    <!-- Bursting Stars Button -->
    <button id="starsButton" class="button-64" role="button">
        <span class="text">CLICK TO BURST</span>
    </button>

    <!-- Canvas Confetti Library -->
    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.6.0/dist/confetti.browser.min.js"></script>

    <script>
        // Bursting Stars Effect
        document.getElementById('starsButton').addEventListener('click', function () {
            const duration = 3000; // Total duration for the effect
            const end = Date.now() + duration;

            const colors = ['#FFD700', '#FFECB3', '#FFFFFF', '#80DEEA']; // Star-like colors

            (function burstingStars() {
                confetti({
                    particleCount: 30, // Smaller bursts
                    startVelocity: 40,
                    spread: 80, // Wider spread for stars
                    scalar: 1.2, // Slightly bigger particles
                    shapes: ['circle'], // Simulates stars
                    colors: colors,
                    origin: { x: Math.random(), y: Math.random() * 0.5 + 0.2 }
                });

                if (Date.now() < end) {
                    requestAnimationFrame(burstingStars);
                }
            })();

            // Larger central starburst after 500ms
            setTimeout(() => {
                confetti({
                    particleCount: 50,
                    startVelocity: 50,
                    spread: 100,
                    scalar: 1.5,
                    shapes: ['circle'],
                    colors: colors,
                    origin: { x: 0.5, y: 0.5 } // Center position
                });
            }, 500);
        });
    </script>
</body>
</html>
