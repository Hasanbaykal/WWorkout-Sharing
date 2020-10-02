<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
           
        html, body {
            font-family: 'Raleway', sans-serif;
            height: 100%;
            background: url('https://img4.goodfon.com/original/1920x1080/d/5a/bodybuilding-bodibilder-weight-training-muscles-bodybuilder.jpg') no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            background-size: cover;
            -o-background-size: cover;
            overflow-x: hidden;
            -webkit-text-size-adjust: 100%;
        }

        .homepage-title {
            color: rgba(255,255,255,0.4);
            margin-bottom: 0px;
            padding-bottom: 0px;
            font-size: 425%;
        }

        .homepage-subtitle {
            color: rgba(255,255,255,0.4);
            margin-top: 0px;
            padding-top: 0px;
            font-size: 100%;
            text-align: center;
        }

        .active {
            display: block;
        }

        .menu {
            position: fixed; 
            width: 14%;
            z-index: 1; 
            top: 2%;
        }

        #menu-list {
            background-color: rgba(255,255,255,0.25);
            border-radius: 15px;
            font-size: 16px; 
            padding: 0;
            text-align: justify;
        }

        #menu-list > li {
            display: block;
        }


        #menu-list > li > a {
            font-family: 'Raleway', sans-serif; 
            padding: 10px 0 10px 30px; 
            text-decoration: none; 
            display: block;
            color: rgba(0,0,0,1);
        }

        #menu-list > .active > a,
        #menu-list > li > a:hover { 
            background-color: rgba(255,255,255,0.25);
            border-radius: 15px;
        }

        </style>

    </head>
    <body>
        @yield ('header')
        @yield ('content')
        @yield ('footer')
    </body>
</html>