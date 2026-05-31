<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maintenance</title>

    <style>
        body {
            background: #0f172a;
            color: #fff;
            font-family: Inter, Arial, sans-serif;
            margin: 0;
        }

        body::before {
            content: "";
            position: fixed;
            width: 500px;
            height: 500px;

            background: rgba(3, 138, 59, 0.15);
            filter: blur(120px);

            top: 50%;
            left: 50%;

            transform: translate(-50%, -50%);
            z-index: -1;
        }

        .maintenance-page {
            min-height: 100vh;

            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;

            text-align: center;
            padding: 20px;
        }

        .logo {
            width: 180px;
            margin-bottom: 10px;
        }

        .logo img {
            width: 100%;
            display: block;
        }

        #maintenance-animation {
            width: 280px;
            height: 280px;
        }

        .content {
            max-width: 600px;
            margin-top: 10px;
        }

        h1 {
            font-size: 36px;
            font-weight: 700;
            margin-bottom: 12px;
        }

        h2 {
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 10px;
        }

        p {
            color: #94a3b8;
            line-height: 1.8;
            font-size: 15px;
        }

        .line {
            width: 120px;
            height: 1px;
            background: rgba(255, 255, 255, .15);
            margin: 28px auto;
        }

        .logo img {
            width: auto;
            height: 110px;

            object-fit: contain;

            border-radius: 12px;
            background: #fff;
            padding: 6px;

            display: block;
            margin: 0 auto;
        }

        #maintenance-animation {
            width: 280px;
            height: 280px;
        }

        .animation-wrapper {
            display: flex;
            justify-content: center;
            margin: 5px auto 10px;
        }

        .animation-wrapper dotlottie-player {
            width: 260px;
            height: 260px;
        }

        .animation-wrapper dotlottie-player,
        .animation-wrapper iframe {
            width: 180px;
            height: 180px;
        }
    </style>
</head>

<body>

    <div class="maintenance-page">

        <div class="logo">
            <img src="{{ asset('guest/assets/img/logo-gapkindo.jpg') }}" alt="Logo">
        </div>

        <div class="animation-wrapper">
            <dotlottie-player src="https://lottie.host/28faf264-8262-4082-92d7-9e4255da40e0/hDvYKDspRx.lottie" autoplay
                loop style="width: 300px; height: 300px;">
            </dotlottie-player>
        </div>

        <div class="content">

            <h1>Website Sedang Dalam Perbaikan</h1>

            <p>
                Website Under Maintenance
            </p>

            <div class="line"></div>


        </div>

    </div>

    <script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script>

</body>

</html>
