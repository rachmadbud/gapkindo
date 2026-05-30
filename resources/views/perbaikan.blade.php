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
            overflow: hidden;
            font-family: Inter, Arial, sans-serif;
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
            width: 100vw;
            height: 100vh;

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
            width: 90px;
            height: auto;

            object-fit: contain;

            border-radius: 12px;
            background: #fff;
            padding: 6px;

            height: 110px;
            width: auto;
            display: block;
            transform: translateX(33px);
        }

        #maintenance-animation {
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

        <div id="maintenance-animation"></div>

        <div class="content">

            <h1>Website Sedang Dalam Perbaikan</h1>

            <p>
                Kami sedang melakukan pemeliharaan sistem.
                Silakan kembali beberapa saat lagi.
            </p>

            <div class="line"></div>

            <h2>Website Under Maintenance</h2>

            <p>
                We are currently performing system maintenance.
                Please check back again shortly.
            </p>

        </div>

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/lottie-web/5.12.2/lottie.min.js"></script>

    <script>
        lottie.loadAnimation({
            container: document.getElementById('maintenance-animation'),
            renderer: 'svg',
            loop: true,
            autoplay: true,

            // Animasi maintenance
            path: 'https://assets10.lottiefiles.com/packages/lf20_j1adxtyb.json'
        });
    </script>

</body>

</html>
