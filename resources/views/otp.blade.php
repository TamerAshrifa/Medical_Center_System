<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>Email Verification</h2>

    <p>Here is your email verification code:</p>

    <h1>{{ $otp_code }}</h1>

    <p>This code is valid for 10 minutes and can only be used once.</p>

    <h4>Please don't share this code with anyone:<p>we will never ask for it on the phone or via email.</p>
    </h4>

    <p>Thanks,</p>
    <p>The Medical Center Team</p>

    You're receiving this email because a verification code was requested for your GitHub account. If this wasn't you,
    please ignore this email.
</body>

</html> -->




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Verification</title>
</head>

<body style="
    margin:0;
    padding:0;
    background-color:#0d1117;
    font-family:Arial, Helvetica, sans-serif;
    color:#ffffff;
">

    <table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:#0d1117; padding:40px 15px;">

        <tr>
            <td align="center">

                <!-- Main Container -->
                <table width="100%" cellpadding="0" cellspacing="0" border="0" style="
                        max-width:600px;
                        background-color:#161b22;
                        border-radius:16px;
                        padding:40px 30px;
                        border:1px solid #30363d;
                    ">

                    <!-- Title -->
                    <tr>
                        <td align="center" style="
                            font-size:38px;
                            font-weight:bold;
                            color:#ffffff;
                            padding-bottom:15px;
                        ">
                            Please verify your identity
                        </td>
                    </tr>

                    <!-- OTP Box -->
                    <tr>
                        <td>
                            <table width="100%" cellpadding="0" cellspacing="0" border="0" style="
                                    border:1px solid #30363d;
                                    border-radius:12px;
                                    padding:30px;
                                    background-color:#0d1117;
                                ">

                                <tr>
                                    <td style="
                                        font-size:24px;
                                        color:#c9d1d9;
                                        padding-bottom:20px;
                                        text-align:center;
                                    ">
                                        Here is your email verification code:
                                    </td>
                                </tr>

                                <tr>
                                    <td align="center" style="
                                        font-size:56px;
                                        letter-spacing:8px;
                                        font-weight:bold;
                                        color:#ffffff;
                                        padding:20px 0;
                                    ">
                                        {{ $otp_code }}
                                    </td>
                                </tr>

                                <tr>
                                    <td style="font-size:18px;
                                        color:#c9d1d9;
                                        line-height:1.8;
                                        text-align:center;
                                        padding-top:15px;
                                    ">
                                        This code is valid for
                                        <strong style="color:#ffffff;">10 minutes</strong>
                                        and can only be used once.
                                    </td>
                                </tr>

                                <tr>
                                    <td style="
                                        font-size:18px;
                                        color:#c9d1d9;
                                        line-height:1.8;
                                        text-align:center;
                                        padding-top:25px;
                                    ">
                                        <strong style="color:#ffffff;">
                                            Please don't share this code with anyone:
                                        </strong>
                                        we'll never ask for it on the phone or via email.
                                    </td>
                                </tr>

                            </table>
                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td style="
                            padding-top:35px;
                            font-size:18px;
                            line-height:1.8;
                            color:#c9d1d9;
                        ">
                            <p style="margin:0;">Thanks,</p>
                            <p style="margin:0;">The Medical Center Team.</p>
                        </td>
                    </tr>

                    <!-- Divider -->
                    <tr>
                        <td style="padding:30px 0;">
                            <hr style="
                                border:none;
                                border-top:1px solid #30363d;
                            ">
                        </td>
                    </tr>

                    <!-- Bottom Text -->
                    <tr>
                        <td style="
                            font-size:16px;
                            line-height:1.8;
                            color:#8b949e;
                            text-align:center;
                        ">
                            You're receiving this email because a verification code
                            was requested for your account.
                            If this wasn't you, please ignore this email.
                        </td>
                    </tr>

                </table>

            </td>
        </tr>

    </table>

</body>

</html>