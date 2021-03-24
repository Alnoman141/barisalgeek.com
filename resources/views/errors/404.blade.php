<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BarisalGeek | Page-Not-Found</title>
    <style>
        /* 404 Error Page */
        #oopss {
            background: #377FB0;
            position: fixed;
            left: 0px;
            top: 0;
            width: 100%;
            height: 100%;
            line-height: 1.5em;
            z-index: 9999;
        #error-text {
            font-size: 40px;
            display: flex;
            flex-direction: column;
            align-items: center;
            font-family: 'Shabnam', Tahoma, sans-serif;
            color: #000;
        img {
            margin: 85px auto 20px;
            height: 342px;
        }
        span {
            position: relative;
            font-size: 3.3em;
            font-weight: 900;
            margin-bottom: 50px;
        }
        p {
        &.p-a {
             font-size: 19px;
             margin: 30px 0 15px 0;
         }
        &.p-b {
             font-size: 15px;
         }
        }
        .back { // Homepage bButton
        background: #fff;
            color: #000;
            font-size: 30px;
            text-decoration: none;
            margin: 2em auto 0;
            padding: .7em 2em;
            border-radius: 500px;
            box-shadow: 0 20px 70px 4px rgba(0, 0, 0, 0.1), inset 7px 33px 0 0px #fff300;
            font-weight: 900;
            transition: all 300ms ease;
        &:hover {
             transform: translateY(-13px);
             box-shadow: 0 35px 90px 4px rgba(0,0,0, .3), inset 0px 0 0 3px #000;
         }
        }
        }
        }

        @font-face {
            font-family: Shabnam;
            src: url('https://cdn.rawgit.com/ahmedhosna95/upload/ba6564f8/fonts/Shabnam/Shabnam-Bold.eot');
            src: url('https://cdn.rawgit.com/ahmedhosna95/upload/ba6564f8/fonts/Shabnam/Shabnam-Bold.eot?#iefix') format('embedded-opentype'),
            url('https://cdn.rawgit.com/ahmedhosna95/upload/ba6564f8/fonts/Shabnam/Shabnam-Bold.woff') format('woff'),
            url('https://cdn.rawgit.com/ahmedhosna95/upload/ba6564f8/fonts/Shabnam/Shabnam-Bold.woff2') format('woff2'),
            url('https://cdn.rawgit.com/ahmedhosna95/upload/ba6564f8/fonts/Shabnam/Shabnam-Bold.ttf') format('truetype');
            font-weight: bold;
        }

        @font-face {
            font-family: Shabnam;
            src: url('https://cdn.rawgit.com/ahmedhosna95/upload/ba6564f8/fonts/Shabnam/Shabnam.eot');
            src: url('https://cdn.rawgit.com/ahmedhosna95/upload/ba6564f8/fonts/Shabnam/Shabnam.eot?#iefix') format('embedded-opentype'),
            url('https://cdn.rawgit.com/ahmedhosna95/upload/ba6564f8/fonts/Shabnam/Shabnam.woff') format('woff'),
            url('https://cdn.rawgit.com/ahmedhosna95/upload/ba6564f8/fonts/Shabnam/Shabnam.woff2') format('woff2'),animated 404 page
            url('https://cdn.rawgit.com/ahmedhosna95/upload/ba6564f8/fonts/Shabnam/Shabnam.ttf') format('truetype');
            font-weight: normal;
        }
    </style>
</head>
<body>
<div id='oopss'>
    <div id='error-text' style="text-align: center">
        <img src="https://cdn.rawgit.com/ahmedhosna95/upload/1731955f/sad404.svg" alt="404">
        <h1>404 Not Found</h1>
        <p class="p-a">Your Requested Page Not Found</p>
        <a href='{{ route('index') }}' class="back">Go Back</a>
    </div>
</div>
</body>
</html>