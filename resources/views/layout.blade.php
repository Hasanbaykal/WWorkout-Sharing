<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <div class="background-img" style="background-image: url('https://img4.goodfon.com/original/1920x1080/d/5a/bodybuilding-bodibilder-weight-training-muscles-bodybuilder.jpg')">;

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .background-img {
                width: 100%;
                height: auto;
                background-size: cover;
                background-position: center center;
                background-repeat: no-repeat;
                background-attachment: fixed;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .title {
                font-size: 50px;
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

  .menu-list1 {
    position: fixed; 
    width: 12%;
    z-index: 1; 
    top: 80%;
  }

#menu-list {
    background-color: rgba(120, 180, 0, 0.8);
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
    color: #fff; 
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