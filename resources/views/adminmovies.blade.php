<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href={{'images/cinemaze-logo-favi.ico'}} type="image/x-icon">
    <title>Cinemaze | Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
    </style>
    @vite('resources/css/app.css')
</head>
<body class="bg-cover bg-center bg-no-repeat  bg-primary">
    @include('components.adminheader')
    <div class="flex justify-between">
        <div class="w-[30%]">
            @include('components.adminsidebar')
        </div>
        <div class="w-[70%] mt-[100px] mr-[100px]">
            @include('components.allmoviesdisplay')
        </div>
    </div>
    @include('components.adminfooter')
 
    @vite('resources/js/app.js')
</body>
</html>