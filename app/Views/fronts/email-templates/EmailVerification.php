<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify email</title>
    <style>
        .massage-box {
            padding: 0 35px;
        }

        @media screen and (max-width: 600px) {
            .massage-box {
                padding: 0 10px;
            }
        }
    </style>
</head>

<body style="margin: 0; padding: 0;">
    <table cellspacing="0" border="0" cellpadding="0" width="100%"
        style="@import url(https://fonts.googleapis.com/css?family=Rubik:300,400,500,700|Open+Sans:300,400,600,700); font-family: 'Open Sans', sans-serif;">
        <tr>
            <td>
                <table style="max-width:670px; background:#fff; margin:0 auto; " width="100%"
                    border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                        <td style="height:40px;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td style="text-align:center;">
                            <!-- <img width="200" src="email.webp" title="logo" alt="logo"> -->
                        </td>
                    </tr>
                    <tr>
                        <td style="height:20px;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td>
                            <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0"
                                style="max-width:670px; border-radius:3px; text-align:center;-webkit-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);-moz-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);box-shadow:0 6px 18px 0 rgba(0,0,0,.06);">
                                <tr>
                                    <td style="height:40px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td class="massage-box">
                                        <h1
                                            style="color:#1e1e2d; font-weight:700; margin:0;font-size:26px;font-family:'Rubik',sans-serif;">
                                            Verify your email address</h1>
                                        <span
                                            style="display:inline-block; vertical-align:middle; margin:29px 0 26px; border-bottom:1px solid #cecece; width:100px;"></span>
                                        <p style="color:#455056; font-size:20px;line-height:24px; margin:0;">
                                            You've enterd <span style="font-weight: 600;"><?= $to ?>
                                            </span>as the email address for your account. <br>
                                            <?php if (isset($otp)): ?>
                                                Your otp is <span style="font-weight: 600;"><?= $otp ?>
                                                </span><br>
                                            <?php endif; ?>
                                            Or verify this email address by clicking button below.
                                        </p>
                                        <a href="<?= $link ?>" target="_blank"
                                            style="background:#3874ff;text-decoration:none !important; font-weight:500; margin-top:35px; color:#fff;text-transform:uppercase; font-size:14px;padding:10px 24px;display:inline-block;border-radius:10px;">Verify email</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="height:80px;">
                                        <p style="color:#797979; font-size:12px; margin:20px 0 0 0;">
                                            Or copy and paste link into your browser <br>
                                            <span style="color: #89aaf8;"><?= $link ?></span>
                                        </p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    <tr>
                        <td style="height:20px;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td style="text-align:center;">
                            <p
                                style="font-size:14px; color:rgba(69, 80, 86, 0.7411764705882353); line-height:18px; margin:0 0 0;">
                                &copy; <strong>baseurl</strong></p>
                        </td>
                    </tr>
                    <tr>
                        <td style="height:80px;">&nbsp;</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

</body>

</html>