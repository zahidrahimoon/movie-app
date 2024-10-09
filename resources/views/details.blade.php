<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href={{'images/cinemaze-logo-favi.ico'}} type="image/x-icon">
    <title>Cinemaze</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    @vite('resources/css/app.css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        #movieBackground, #movieVideo {
            width: 100%;
            height: 100%;
            object-fit: cover;
            position: absolute;
            top: 0;
            left: 0;
        }
        section {
            position: relative;
            width: 100%;
            height: 100vh; /* Full viewport height */
            overflow: hidden;
        }
    </style>
</head>
<body class="bg-cover bg-center bg-no-repeat  bg-primary">
    @include('components.header')
    @include('components.moviedetails')
    @include('components.footer')
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            const section = document.querySelector('section');
            const background = document.getElementById('movieBackground');
            const video = document.getElementById('movieVideo');

            section.addEventListener('mouseenter', () => {
                background.style.opacity = '0';
                video.style.opacity = '1';
                video.play();
            });

            section.addEventListener('mouseleave', () => {
                background.style.opacity = '1';
                video.style.opacity = '0';
                video.pause();
            });
        });
    </script>
    </main>
</body>
</html>