<?php
if(!defined(SERVER_URL))
    define(SERVER_URL, '../');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>High Fidelity - Page Not Found</title>
        <meta name="robots" content="noindex">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style type="text/css">
        body {
            text-align: center;
            background-color: #eee;
        }
        * {
            margin: 0;
            padding: 0;
            font-family: courier, Times, "Times New Roman";
            font-weight: bold;
        }
        #container {
            width: 821px;
            height: 576px;
            margin: 0 auto; 
            position: relative;
        }
        .text {
            position: absolute;
            top: 200px;
            left: 467px;
            width: 300px;
        }
        .text h1 {
            text-align: left;
            line-height: 30px;
            color: #000000;
            font-size: 16px;
            padding-bottom: 0px;
        }
        .text p {
            text-align: left;
            margin-top: 20px;
            font-size: 16px;
            color: #666666;
        }
        .text img {
            margin: 6px 0 0 0;
            float: left;
        }
        footer {
            display: block;
            margin: 12px 0 12px 0;
            font-family: Helvetica, Arial, sans-serif;
            color: #555;
        }
        footer a {
            font-family:Helvetica, Arial, sans-serif;
            color: #333;
        }
        footer a:hover {
            color: #000;
            text-decoration: none;
        }
        footer a:active {
            color: #d85f60;
        }
        @media screen and (max-width: 640px) {
            
            body {
                overflow-x: hidden;
            }
            #container .error {
                display: none;
            }
            #container {
                background-color: #fff;
                width: 300px;
                height: 450px;
                margin: 0 auto; 
                position: relative;
            }
            .text {
                margin: 20px;
                position: relative;
                top: 10px;
                left: 0;
            }
            footer {
                display: block;
                float: left;
                margin: 40px;
            }
        }
        </style>
    </head>
    <body>
        <div id="container">
            <img src="<?php echo SERVER_URL;?>errors/images/error_404.png" class="error" 
            title="404 error" alt="The distinguished businessman delivers his most important 404 error message" />
            <div class="text">
                <h1>404 ERROR</h1>
                <p>
                    Distinguished Being:
                </p>
                <p>
                    I was not able to retrieve that page from my filing credenza.
                </p>
                <p>
                    Kindly try accessing <br />the page again.
                </p>
                <p>
                    Yours, most sincerely,
                </p>
                <img src="<?php echo SERVER_URL;?>errors/images/distinguished-signature.png" alt="A distinguished signature, of course."/>
            </div>
            <footer>You can always head back to the <a href="<?php echo SERVER_URL;?>">homepage</a>.</footer>
        </div>
    </body>
</html>
