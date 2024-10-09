<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href={{'images/cinemaze-logo-favi.ico'}} type="image/x-icon">
    <title>Cinemaze | Booking</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    @vite('resources/css/app.css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body class="bg-primary">
    @include('components.header')
    @include('components.pagehero', ['title' => 'Booking' , 'subtitle'=> 'Book your tickets now' , 'backgroundImage' => asset('images/page-hero.jpg') ])
    @include('components.bookingform')
    @include('components.footer')
</body>
</html>