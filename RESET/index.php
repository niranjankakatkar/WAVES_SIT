
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/favicon.png" type="image/x-icon">
    <title>Waves Packging | Change Password </title>

    <!-- Google Font css -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@100;200;300;400;500;600;700;800;900&display=swap">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@200;300;400;600;700;800;900&display=swap"
        rel="stylesheet">

    <style type="text/css">
        body {
            text-align: center;
            margin: 0 auto;
            width: 650px;
            font-family: 'Public Sans', sans-serif;
            background-color: #e2e2e2;
            display: block;
        }

        ul {
            margin: 0;
            padding: 0;
        }

        li {
            display: inline-block;
            text-decoration: unset;
        }

        a {
            text-decoration: none;
        }

        h5 {
            margin: 10px;
            color: #777;
        }

        .text-center {
            text-align: center
        }

        .header-menu ul li+li {
            margin-left: 20px;
        }

        .header-menu ul li a {
            font-size: 14px;
            color: #252525;
            font-weight: 500;
        }

        .password-button {
            background-color: #0DA487;
            border: none;
            color: #fff;
            padding: 14px 26px;
            font-size: 18px;
            border-radius: 6px;
            font-weight: 600;
        }

        .footer-table {
            position: relative;
        }

        .footer-table::before {
            position: absolute;
            content: "";
            background-image: url(images/footer-left.svg);
            background-position: top right;
            top: 0;
            left: -71%;
            width: 100%;
            height: 100%;
            background-repeat: no-repeat;
            z-index: -1;
            background-size: contain;
            opacity: 0.3;
        }

        .footer-table::after {
            position: absolute;
            content: "";
            background-image: url(images/footer-right.svg);
            background-position: top right;
            top: 0;
            right: 0;
            width: 100%;
            height: 100%;
            background-repeat: no-repeat;
            z-index: -1;
            background-size: contain;
            opacity: 0.3;
        }

        .theme-color {
            color: #0DA487;
        }
    </style>
</head>

<body style="margin: 20px auto;">
    <table align="center" border="0" cellpadding="0" cellspacing="0"
        style="background-color: white; width: 100%; box-shadow: 0px 0px 14px -4px rgba(0, 0, 0, 0.2705882353);-webkit-box-shadow: 0px 0px 14px -4px rgba(0, 0, 0, 0.2705882353);">
        <tbody>
            <tr>
                <td>
                    <table class="header-table" align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
                        <tr class="header"
                            style="background-color: #f7f7f7;display: flex;align-items: center;justify-content: space-between;width: 100%;">
                            <td class="header-logo " align="center">
                                <a href="../front-end/index.html" style="display: block; text-align: left;">
                                    <img src="../assets/images/logo/Waves Logo Jpg.jpg" style="width:80%" class="main-logo" alt="logo">
                                </a>
                            </td>
                            
                        </tr>
                    </table>

                    <table class="content-table" style="margin-top: 40px;" align="center" border="0" cellpadding="0"
                        cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <td>
                                    <img src="images/reset.png" alt="">
                                </td>
                            </tr>
                        </thead>
                    </table>

                    <table class="content-table" style="margin-top: 40px;" align="center" border="0" cellpadding="0"
                        cellspacing="0" width="100%">
                        <thead>
                            <tr style="display: block;">
                                <td style="display: block;">
                                    <h3 style="font-weight: 700; font-size: 20px; margin: 0;">Reset Password</h3>
                                </td>

                               

                                <td >
                                 
                                </td>
                            </tr>
                        </thead>
                    </table>

                    <table class="button-table" style="margin-top: 27px;" align="center" border="0" cellpadding="0"
                        cellspacing="0" width="100%">
                        <thead>
                        <div class="custom-form"><br><br>
                                    <label for="email" class="form-label">New Password</label>
                                    <div class="custom-input">
                                        <input type="password" class="form-control" id="email" name="username"
                                            required>
                                    </div>
                          </div>

                          <div class="custom-form"><br>
                                    <label for="email" class="form-label">Confirm Password</label>
                                    <div class="custom-input">
                                        <input type="password" class="form-control" id="email" name="username"
                                            required>
                                    </div>
                          </div>
                        </thead>
                    </table>

                    <table class="content-table" style="margin-top: 27px;" align="center" border="0" cellpadding="0"
                        cellspacing="0" width="100%">
                        <thead>
                            <tr style="display: block;">
                                <td style="display: block;">
                                    <p
                                        style="font-size: 17px;font-weight: 600;width: 74%;margin: 8px auto 0;line-height: 1.5;color: #939393;">
                                        If you didn’t request a password reset, you can ignore this email. your password
                                        will not be changed.</p>
                                </td>
                            </tr>
                        </thead>
                    </table>

                    <table class="text-center footer-table" align="center" border="0" cellpadding="0" cellspacing="0"
                        width="100%"
                        style="background-color: #282834; color: white; padding: 24px; overflow: hidden; z-index: 0; margin-top: 30px;">
                        <tr>
                            <td>
                                <table border="0" cellpadding="0" cellspacing="0" class="footer-social-icon text-center"
                                    align="center" style="margin: 8px auto 11px;">
                                    <tr>
                                        <td>
                                            <h4 style="font-size: 19px; font-weight: 700; margin: 0;">Shop For <span
                                                    class="theme-color">Waves Packging</span></h4>
                                        </td>
                                    </tr>
                                </table>
                                <table border="0" cellpadding="0" cellspacing="0" class="footer-social-icon text-center"
                                    align="center" style="margin: 8px auto 20px;">
                                    <tr>
                                        <td>
                                            <a href="javascript:void(0)"
                                                style="font-size: 14px; font-weight: 600; color: #fff; text-decoration: underline; text-transform: capitalize;">Contact
                                                Us</a>
                                        </td>
                                        <td>
                                            <a href="javascript:void(0)"
                                                style="font-size: 14px; font-weight: 600; color: #fff; text-decoration: underline; text-transform: capitalize; margin-left: 20px;">unsubscribe</a>
                                        </td>
                                        <td>
                                            <a href="javascript:void(0)"
                                                style="font-size: 14px; font-weight: 600; color: #fff; text-decoration: underline; text-transform: capitalize; margin-left: 20px;">privacy
                                                Policy</a>
                                        </td>
                                    </tr>
                                </table>
                                <table border="0" cellpadding="0" cellspacing="0" class="footer-social-icon text-center"
                                    align="center" style="margin: 23px auto;">
                                    <tr>
                                        <td>
                                            <a href="www.facebook.com">
                                                <img src="images/fb.png"
                                                    style="font-size: 25px; margin: 0 18px 0 0;width: 22px;filter: invert(1);"
                                                    alt="">
                                            </a>
                                        </td>
                                        <td>
                                            <a href="www.twitter.com">
                                                <img src="images/twitter.png"
                                                    style="font-size: 25px; margin: 0 18px 0 0;width: 22px;filter: invert(1);"
                                                    alt="">
                                            </a>
                                        </td>
                                        <td>
                                            <a href="www.instagram.com">
                                                <img src="images/insta.png"
                                                    style="font-size: 25px; margin: 0 18px 0 0;width: 22px;filter: invert(1);"
                                                    alt="">
                                            </a>
                                        </td>
                                        <td>
                                            <a href="www.pinterest.com">
                                                <img src="images/pinterest.png"
                                                    style="font-size: 25px; margin: 0 18px 0 0;width: 22px;filter: invert(1);"
                                                    alt="">
                                            </a>
                                        </td>
                                    </tr>
                                </table>
                                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                    <tr>
                                        <td>
                                            <h5 style="font-size: 13px; text-transform: uppercase; margin: 0; color:#ddd;
                                letter-spacing:1px; font-weight: 500;">Want to change how you receive these emails?
                                            </h5>
                                            <h5 style="font-size: 13px; text-transform: uppercase; margin: 10px 0 0; color:#ddd;
                                letter-spacing:1px; font-weight: 500;">2024-25 copy right by Waves Packging powerd by
                                                SIT Solutions</h5>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
</body>

</html>