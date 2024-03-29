<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="/admin/assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="/admin/assets/img/favicon.png">
    <title>
        Панель рецептів
        @laravelPWA
    </title>
    @notifyCss
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="/admin/assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="/admin/assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="/admin/assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="/admin/assets/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />
    <link href="/admin/assets/css/custom.css" rel="stylesheet" />
    <style>
        #spinner-container {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.9); /* Кольоровий фон для розмиття */
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 10000;
        }

        .spinner {
            width: 3rem;
            height: 3rem;
            border: 4px solid rgba(255, 255, 255, 0.3); /* Колір спінера */
            border-top: 4px solid #fff;
            border-radius: 50%;
            animation: spin 1.5s linear infinite; /* Анімація спінера */
        }

        /* Keyframe анімація для спінера */
        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
        }
    </style>
</head>
<body class="g-sidenav-show   bg-gray-100">
<div id="spinner-container">
    <div class="spinner"></div>
</div>

<div class="min-height-300 bg-primary position-absolute w-100"></div>
