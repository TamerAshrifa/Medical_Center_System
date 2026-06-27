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
                                        Here is your OTP-Code:
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
                                            Please don't share this code with anyone
                                        </strong>
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