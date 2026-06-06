<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Laravel API Documentation</title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.style.css") }}" media="screen">
    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.print.css") }}" media="print">

    <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.10/lodash.min.js"></script>

    <link rel="stylesheet"
          href="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/styles/obsidian.min.css">
    <script src="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/highlight.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jets/0.14.1/jets.min.js"></script>

    <style id="language-style">
        /* starts out as display none and is replaced with js later  */
                    body .content .bash-example code { display: none; }
                    body .content .javascript-example code { display: none; }
            </style>

    <script>
        var tryItOutBaseUrl = "http://127.0.0.1:8000";
        var useCsrf = Boolean();
        var csrfUrl = "/sanctum/csrf-cookie";
    </script>
    <script src="{{ asset("/vendor/scribe/js/tryitout-5.10.0.js") }}"></script>

    <script src="{{ asset("/vendor/scribe/js/theme-default-5.10.0.js") }}"></script>

</head>

<body data-languages="[&quot;bash&quot;,&quot;javascript&quot;]">

<a href="#" id="nav-button">
    <span>
        MENU
        <img src="{{ asset("/vendor/scribe/images/navbar.png") }}" alt="navbar-image"/>
    </span>
</a>
<div class="tocify-wrapper">
    
            <div class="lang-selector">
                                            <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                            <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                    </div>
    
    <div class="search">
        <input type="text" class="search" id="input-search" placeholder="Search">
    </div>

    <div id="toc">
                    <ul id="tocify-header-introduction" class="tocify-header">
                <li class="tocify-item level-1" data-unique="introduction">
                    <a href="#introduction">Introduction</a>
                </li>
                                    <ul id="tocify-subheader-introduction" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="this-documentation-was-initialized-by-tamer-ashrifahttpstmetamer-ashrifa">
                                <a href="#this-documentation-was-initialized-by-tamer-ashrifahttpstmetamer-ashrifa">This documentation was initialized by [Tamer Ashrifa](https://t.me/Tamer_Ashrifa).</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-authenticating-requests" class="tocify-header">
                <li class="tocify-item level-1" data-unique="authenticating-requests">
                    <a href="#authenticating-requests">Authenticating requests</a>
                </li>
                            </ul>
                    <ul id="tocify-header-authentication-apis" class="tocify-header">
                <li class="tocify-item level-1" data-unique="authentication-apis">
                    <a href="#authentication-apis">Authentication APIs</a>
                </li>
                                    <ul id="tocify-subheader-authentication-apis" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="authentication-apis-POSTapi-register">
                                <a href="#authentication-apis-POSTapi-register">Register New User</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="authentication-apis-POSTapi-verifyOtp">
                                <a href="#authentication-apis-POSTapi-verifyOtp">Verify Sent OTP</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="authentication-apis-POSTapi-login">
                                <a href="#authentication-apis-POSTapi-login">Login User</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="authentication-apis-POSTapi-forgotPassword">
                                <a href="#authentication-apis-POSTapi-forgotPassword">Forgot Password</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="authentication-apis-POSTapi-resetPassword">
                                <a href="#authentication-apis-POSTapi-resetPassword">Reset Password</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="authentication-apis-POSTapi-logout">
                                <a href="#authentication-apis-POSTapi-logout">Logout User</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-patient-apis" class="tocify-header">
                <li class="tocify-item level-1" data-unique="patient-apis">
                    <a href="#patient-apis">Patient APIs</a>
                </li>
                                    <ul id="tocify-subheader-patient-apis" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="patient-apis-POSTapi-patients">
                                <a href="#patient-apis-POSTapi-patients">Add New Patient</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="patient-apis-GETapi-patients--per_page-">
                                <a href="#patient-apis-GETapi-patients--per_page-">Show All Patients</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="patient-apis-GETapi-patients-show--patientId-">
                                <a href="#patient-apis-GETapi-patients-show--patientId-">Show Specified Patient</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="patient-apis-PUTapi-patients--patientId-">
                                <a href="#patient-apis-PUTapi-patients--patientId-">Update Patient</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="patient-apis-DELETEapi-patients--patientId-">
                                <a href="#patient-apis-DELETEapi-patients--patientId-">Delete Patient</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-room-apis" class="tocify-header">
                <li class="tocify-item level-1" data-unique="room-apis">
                    <a href="#room-apis">Room APIs</a>
                </li>
                                    <ul id="tocify-subheader-room-apis" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="room-apis-POSTapi-rooms">
                                <a href="#room-apis-POSTapi-rooms">Add New Room</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="room-apis-GETapi-rooms--per_page-">
                                <a href="#room-apis-GETapi-rooms--per_page-">View All Rooms</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="room-apis-GETapi-rooms-show--roomId-">
                                <a href="#room-apis-GETapi-rooms-show--roomId-">View a Specified Room</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="room-apis-PUTapi-rooms--roomId-">
                                <a href="#room-apis-PUTapi-rooms--roomId-">Update Room</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="room-apis-DELETEapi-rooms--roomId-">
                                <a href="#room-apis-DELETEapi-rooms--roomId-">Delete Room</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-doctor-apis" class="tocify-header">
                <li class="tocify-item level-1" data-unique="doctor-apis">
                    <a href="#doctor-apis">Doctor APIs</a>
                </li>
                                    <ul id="tocify-subheader-doctor-apis" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="doctor-apis-POSTapi-doctors">
                                <a href="#doctor-apis-POSTapi-doctors">Add New Doctor</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="doctor-apis-GETapi-doctors--per_page-">
                                <a href="#doctor-apis-GETapi-doctors--per_page-">View All Doctors</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="doctor-apis-GETapi-doctors-show--doctorId-">
                                <a href="#doctor-apis-GETapi-doctors-show--doctorId-">View a Specified Doctor</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="doctor-apis-PUTapi-doctors--doctorId-">
                                <a href="#doctor-apis-PUTapi-doctors--doctorId-">Update a Doctor</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="doctor-apis-DELETEapi-doctors--doctorId-">
                                <a href="#doctor-apis-DELETEapi-doctors--doctorId-">Delete a Doctor</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-speciality-apis" class="tocify-header">
                <li class="tocify-item level-1" data-unique="speciality-apis">
                    <a href="#speciality-apis">Speciality APIs</a>
                </li>
                                    <ul id="tocify-subheader-speciality-apis" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="speciality-apis-POSTapi-specialities">
                                <a href="#speciality-apis-POSTapi-specialities">Add New Speciality</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="speciality-apis-GETapi-specialities--per_page-">
                                <a href="#speciality-apis-GETapi-specialities--per_page-">View All Specialities</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="speciality-apis-GETapi-specialities-show--specialityId-">
                                <a href="#speciality-apis-GETapi-specialities-show--specialityId-">View a Specified Speciality</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="speciality-apis-PUTapi-specialities--specialityId-">
                                <a href="#speciality-apis-PUTapi-specialities--specialityId-">Update a Speciality</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="speciality-apis-DELETEapi-specialities--specialityId-">
                                <a href="#speciality-apis-DELETEapi-specialities--specialityId-">Delete a Speciality</a>
                            </li>
                                                                        </ul>
                            </ul>
            </div>

    <ul class="toc-footer" id="toc-footer">
                    <li style="padding-bottom: 5px;"><a href="{{ route("scribe.postman") }}">View Postman collection</a></li>
                            <li style="padding-bottom: 5px;"><a href="{{ route("scribe.openapi") }}">View OpenAPI spec</a></li>
                <li><a href="http://github.com/knuckleswtf/scribe">Documentation powered by Scribe ✍</a></li>
    </ul>

    <ul class="toc-footer" id="last-updated">
        <li>Last updated: June 7, 2026</li>
    </ul>
</div>

<div class="page-wrapper">
    <div class="dark-box"></div>
    <div class="content">
        <h1 id="introduction">Introduction</h1>
<h2 id="this-documentation-was-initialized-by-tamer-ashrifahttpstmetamer-ashrifa">This documentation was initialized by <a href="https://t.me/Tamer_Ashrifa">Tamer Ashrifa</a>.</h2>
<aside>
    <strong>Base URL</strong>: <code>http://127.0.0.1:8000/api</code>
</aside>
<pre><code>This documentation aims to provide all the information you need to work
with the "Medical_Center_System" APIs.

As you scroll, you will see code examples for working with the APIs in
different programming languages in the dark area to the right (or as
part of the content on mobile).
You can switch the language used with the tabs at the top right (or
from the nav menu at the top left on mobile).</code></pre>

        <h1 id="authenticating-requests">Authenticating requests</h1>
<p>To authenticate requests, include a <strong><code>Bearer Token</code></strong> auth type, fill it with the value <strong><code>"Bearer {YOUR_AUTH_KEY}"</code></strong>.</p>
<p>All authenticated endpoints are marked with a <code>requires authentication</code> badge in the documentation below.</p>
<p>You can retrieve your token by logging in.</p>

        <h1 id="authentication-apis">Authentication APIs</h1>

    <p>Any Patient wants to assign to the app, he needs firstly to register by 'register' API, then he goes to verify
his email by 'verifyOTP' API; After that, he goes to 'Add New Patient' API and the assign himself (specifically 
himself). Admins and doctors can't be added by themselves, they need to talk to an admin and then he makes 
acounts for them in the appropriate table and permissions; After an admin makes, they can login by 'login' API.</p>

                                <h2 id="authentication-apis-POSTapi-register">Register New User</h2>

<p>
</p>

<h3>For: Mobile (Patient)</h3>

<span id="example-requests-POSTapi-register">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/api/register" \
    --header "Content-Type: multipart/form-data" \
    --header "Accept: application/json" \
    --form "first_name=vmq"\
    --form "last_name=eop"\
    --form "email=russel.bert@example.net"\
    --form "password=dl4m{o,+"\
    --form "phone=+963999999999"\
    --form "date_of_birth=2004-06-14"\
    --form "gender="\
    --form "username=hdtqtqxbajwbpilpm"\
    --form "password_confirmation=consequatur"\
    --form "photo=@C:\Users\USER\AppData\Local\Temp\phpA814.tmp" </code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/register"
);

const headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
};

const body = new FormData();
body.append('first_name', 'vmq');
body.append('last_name', 'eop');
body.append('email', 'russel.bert@example.net');
body.append('password', 'dl4m{o,+');
body.append('phone', '+963999999999');
body.append('date_of_birth', '2004-06-14');
body.append('gender', '');
body.append('username', 'hdtqtqxbajwbpilpm');
body.append('password_confirmation', 'consequatur');
body.append('photo', document.querySelector('input[name="photo"]').files[0]);

fetch(url, {
    method: "POST",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-register">
            <blockquote>
            <p>Example response (201):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;result&quot;: &quot;success&quot;,
    &quot;message&quot;: &quot;OTP-Code was sent to tamrashryft2@gmail.com successfully, please check your inbox&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-register" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-register"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-register"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-register" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-register">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-register" data-method="POST"
      data-path="api/register"
      data-authed="0"
      data-hasfiles="1"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-register', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-register"
                    onclick="tryItOut('POSTapi-register');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-register"
                    onclick="cancelTryOut('POSTapi-register');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-register"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/register</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-register"
               value="multipart/form-data"
               data-component="header">
    <br>
<p>Example: <code>multipart/form-data</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-register"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>first_name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="first_name"                data-endpoint="POSTapi-register"
               value="vmq"
               data-component="body">
    <br>
<p>Must be between 2 and 50 characters. Example: <code>vmq</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>last_name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="last_name"                data-endpoint="POSTapi-register"
               value="eop"
               data-component="body">
    <br>
<p>Must be between 2 and 50 characters. Example: <code>eop</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTapi-register"
               value="russel.bert@example.net"
               data-component="body">
    <br>
<p>Must be a valid email address. Must not be greater than 75 characters. Example: <code>russel.bert@example.net</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="password"                data-endpoint="POSTapi-register"
               value="dl4m{o,+"
               data-component="body">
    <br>
<p>Must be at least 8 characters. Example: <code>dl4m{o,+</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>phone</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="phone"                data-endpoint="POSTapi-register"
               value="+963999999999"
               data-component="body">
    <br>
<p>Must be a valid phone number. Example: <code>+963999999999</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>date_of_birth</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="date_of_birth"                data-endpoint="POSTapi-register"
               value="2004-06-14"
               data-component="body">
    <br>
<p>Must be a valid date. Example: <code>2004-06-14</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>gender</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
 &nbsp;
 &nbsp;
                <label data-endpoint="POSTapi-register" style="display: none">
            <input type="radio" name="gender"
                   value="true"
                   data-endpoint="POSTapi-register"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="POSTapi-register" style="display: none">
            <input type="radio" name="gender"
                   value="false"
                   data-endpoint="POSTapi-register"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Example: <code>false</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>username</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="username"                data-endpoint="POSTapi-register"
               value="hdtqtqxbajwbpilpm"
               data-component="body">
    <br>
<p>Must not be greater than 20 characters. Example: <code>hdtqtqxbajwbpilpm</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>photo</code></b>&nbsp;&nbsp;
<small>file</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="file" style="display: none"
                              name="photo"                data-endpoint="POSTapi-register"
               value=""
               data-component="body">
    <br>
<p>Must be an image. Must not be greater than 2048 kilobytes. Example: <code>C:\Users\USER\AppData\Local\Temp\phpA814.tmp</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password_confirmation</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="password_confirmation"                data-endpoint="POSTapi-register"
               value="consequatur"
               data-component="body">
    <br>
<p>Must be as same as the entered password. Example: <code>consequatur</code></p>
        </div>
        </form>

                    <h2 id="authentication-apis-POSTapi-verifyOtp">Verify Sent OTP</h2>

<p>
</p>

<h3>For: Mobile (Patient - Doctor), Web</h3>

<span id="example-requests-POSTapi-verifyOtp">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/api/verifyOtp" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"email\": \"qkunze@example.com\",
    \"otp_code\": \"consequatur\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/verifyOtp"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "qkunze@example.com",
    "otp_code": "consequatur"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-verifyOtp">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;result&quot;: &quot;Success&quot;,
    &quot;message&quot;: &quot;Email verified successfully&quot;,
    &quot;token_or_reset_token&quot;: &quot;5|9cc4ues9eb6rAXxanCXiPxICZcUFK6PgMl7IxcXXf287c850&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;result&quot;: &quot;Success&quot;,
    &quot;message&quot;: &quot;OTP-Code verified successfully, you can now reset your password&quot;,
    &quot;token_or_reset_token&quot;: &quot;$2y$12$5MftcDSWXj5UTaxuYL3eTOI2iP6G6jSZ5Rv30Hvc6gh8OKvl.0j/K&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (400):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;result&quot;: &quot;Fail&quot;,
    &quot;message&quot;: &quot;Invalid OTP-Code&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (400):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;result&quot;: &quot;Fail&quot;,
    &quot;message&quot;: &quot;Sorry, this OTP-Code has expired, a new one was sent to your email, please check your inbox&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (400):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;result&quot;: &quot;Fail&quot;,
    &quot;message&quot;: &quot;Email is already verified, you can login&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-verifyOtp" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-verifyOtp"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-verifyOtp"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-verifyOtp" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-verifyOtp">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-verifyOtp" data-method="POST"
      data-path="api/verifyOtp"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-verifyOtp', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-verifyOtp"
                    onclick="tryItOut('POSTapi-verifyOtp');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-verifyOtp"
                    onclick="cancelTryOut('POSTapi-verifyOtp');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-verifyOtp"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/verifyOtp</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-verifyOtp"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-verifyOtp"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTapi-verifyOtp"
               value="qkunze@example.com"
               data-component="body">
    <br>
<p>Must be a valid email address. Must not be greater than 75 characters. Example: <code>qkunze@example.com</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>otp_code</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="otp_code"                data-endpoint="POSTapi-verifyOtp"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
        </form>

                    <h2 id="authentication-apis-POSTapi-login">Login User</h2>

<p>
</p>

<h3>For: Mobile (Patient - Doctor), Web</h3>

<span id="example-requests-POSTapi-login">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/api/login" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"email_or_username\": \"vmqeopfuudtdsufvyvddq\",
    \"password\": \"OP&gt;@;4\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/login"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email_or_username": "vmqeopfuudtdsufvyvddq",
    "password": "OP&gt;@;4"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-login">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;result&quot;: &quot;Success&quot;,
    &quot;message&quot;: &quot;OTP-Code was sent to tamrashryft2@gmail.com successfully, please check your inbox&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (400):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;result&quot;: &quot;Fail&quot;,
    &quot;message&quot;: &quot;Wrong email or password; Or the email is not verified, OTP-Code was sent to your email, please check your inbox&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-login" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-login"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-login"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-login" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-login">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-login" data-method="POST"
      data-path="api/login"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-login', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-login"
                    onclick="tryItOut('POSTapi-login');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-login"
                    onclick="cancelTryOut('POSTapi-login');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-login"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/login</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-login"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-login"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email_or_username</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email_or_username"                data-endpoint="POSTapi-login"
               value="vmqeopfuudtdsufvyvddq"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>vmqeopfuudtdsufvyvddq</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="password"                data-endpoint="POSTapi-login"
               value="OP>@;4"
               data-component="body">
    <br>
<p>Must be at least 8 characters. Example: <code>OP&gt;@;4</code></p>
        </div>
        </form>

                    <h2 id="authentication-apis-POSTapi-forgotPassword">Forgot Password</h2>

<p>
</p>

<h3>For: Mobile (Patient - Doctor), Web</h3>

<span id="example-requests-POSTapi-forgotPassword">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/api/forgotPassword" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"email\": \"qkunze@example.com\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/forgotPassword"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "qkunze@example.com"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-forgotPassword">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;result&quot;: &quot;Success&quot;,
    &quot;message&quot;: &quot;If the email exists, an OTP-Code was sent to it successfully, please check your gmail&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-forgotPassword" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-forgotPassword"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-forgotPassword"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-forgotPassword" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-forgotPassword">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-forgotPassword" data-method="POST"
      data-path="api/forgotPassword"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-forgotPassword', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-forgotPassword"
                    onclick="tryItOut('POSTapi-forgotPassword');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-forgotPassword"
                    onclick="cancelTryOut('POSTapi-forgotPassword');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-forgotPassword"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/forgotPassword</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-forgotPassword"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-forgotPassword"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTapi-forgotPassword"
               value="qkunze@example.com"
               data-component="body">
    <br>
<p>Must be a valid email address. Must not be greater than 75 characters. Example: <code>qkunze@example.com</code></p>
        </div>
        </form>

                    <h2 id="authentication-apis-POSTapi-resetPassword">Reset Password</h2>

<p>
</p>

<h3>For: Mobile (Patient - Doctor), Web</h3>

<span id="example-requests-POSTapi-resetPassword">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/api/resetPassword" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"email\": \"qkunze@example.com\",
    \"reset_token\": \"consequatur\",
    \"new_password\": \"mqeopfuudtdsufvyvddqamniihfqcoynlazghdtqtqxbajwbpilpmufinllwloauydlsmsjuryv\",
    \"password_confirmation\": \"consequatur\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/resetPassword"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "qkunze@example.com",
    "reset_token": "consequatur",
    "new_password": "mqeopfuudtdsufvyvddqamniihfqcoynlazghdtqtqxbajwbpilpmufinllwloauydlsmsjuryv",
    "password_confirmation": "consequatur"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-resetPassword">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;result&quot;: &quot;Success&quot;,
    &quot;message&quot;: &quot;Your password was updated successfully&quot;,
    &quot;token&quot;: &quot;6|1rbJvOIdEoHxeSKIiT6L66vnQqvBrtXFIRaxDJApa25692ae&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (400):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;result&quot;: &quot;Fail&quot;,
    &quot;message&quot;: &quot;Invalid reset-token&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (400):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;result&quot;: &quot;Fail&quot;,
    &quot;message&quot;: &quot;Sorry, the reset-token has expired, a new OTP-Code was sent to your email, please check your inbox&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-resetPassword" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-resetPassword"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-resetPassword"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-resetPassword" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-resetPassword">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-resetPassword" data-method="POST"
      data-path="api/resetPassword"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-resetPassword', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-resetPassword"
                    onclick="tryItOut('POSTapi-resetPassword');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-resetPassword"
                    onclick="cancelTryOut('POSTapi-resetPassword');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-resetPassword"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/resetPassword</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-resetPassword"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-resetPassword"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTapi-resetPassword"
               value="qkunze@example.com"
               data-component="body">
    <br>
<p>Must be a valid email address. The <code>email</code> of an existing record in the users table. Must not be greater than 75 characters. Example: <code>qkunze@example.com</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>reset_token</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="reset_token"                data-endpoint="POSTapi-resetPassword"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>new_password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="new_password"                data-endpoint="POSTapi-resetPassword"
               value="mqeopfuudtdsufvyvddqamniihfqcoynlazghdtqtqxbajwbpilpmufinllwloauydlsmsjuryv"
               data-component="body">
    <br>
<p>Must be at least 8 characters. Example: <code>mqeopfuudtdsufvyvddqamniihfqcoynlazghdtqtqxbajwbpilpmufinllwloauydlsmsjuryv</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password_confirmation</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="password_confirmation"                data-endpoint="POSTapi-resetPassword"
               value="consequatur"
               data-component="body">
    <br>
<p>Must be as same as the entered password. Example: <code>consequatur</code></p>
        </div>
        </form>

                    <h2 id="authentication-apis-POSTapi-logout">Logout User</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<h3>For: Mobile (Patient - Doctor), Web</h3>

<span id="example-requests-POSTapi-logout">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/api/logout" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/logout"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-logout">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;result&quot;: &quot;Success&quot;,
    &quot;message&quot;: &quot;User logged-out successfully&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-logout" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-logout"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-logout"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-logout" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-logout">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-logout" data-method="POST"
      data-path="api/logout"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-logout', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-logout"
                    onclick="tryItOut('POSTapi-logout');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-logout"
                    onclick="cancelTryOut('POSTapi-logout');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-logout"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/logout</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-logout"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-logout"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-logout"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                <h1 id="patient-apis">Patient APIs</h1>

    

                                <h2 id="patient-apis-POSTapi-patients">Add New Patient</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<h3>For: Mobile (Patient), Web</h3>
<p>Only non-completed users, and admins are allowed to use this API.
(Non-completed users are the users who were created but without specifing their role)</p>
<h3>⚠ Important Info: The response's "data" field content would change based on the logged-in user role!</h3>

<span id="example-requests-POSTapi-patients">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/api/patients" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"user_id\": 17,
    \"blood_type_id\": 17,
    \"allergies\": \"consequatur\",
    \"chronic_diseases\": \"consequatur\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/patients"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "user_id": 17,
    "blood_type_id": 17,
    "allergies": "consequatur",
    "chronic_diseases": "consequatur"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-patients">
            <blockquote>
            <p>Example response (201):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;result&quot;: &quot;Success&quot;,
    &quot;message&quot;: {
        &quot;base_message&quot;: &quot;Patient added successfully&quot;
    },
    &quot;data&quot;: {
        &quot;id&quot;: 13,
        &quot;allergies&quot;: &quot;consequatur&quot;,
        &quot;chronic_diseases&quot;: &quot;consequatur&quot;,
        &quot;user&quot;: {
            &quot;id&quot;: 31,
            &quot;first_name&quot;: &quot;vmq&quot;,
            &quot;last_name&quot;: &quot;eop&quot;,
            &quot;email&quot;: &quot;tamrashryft2@gmail.com&quot;,
            &quot;phone&quot;: &quot;+963999999999&quot;,
            &quot;date_of_birth&quot;: &quot;2004-06-13T21:00:00.000000Z&quot;,
            &quot;gender&quot;: &quot;Male&quot;,
            &quot;photo&quot;: null,
            &quot;username&quot;: &quot;hdtqtqxbajwbpilpm&quot;
        },
        &quot;blood_type_id&quot;: {
            &quot;id&quot;: 4,
            &quot;name&quot;: &quot;A+&quot;
        }
    }
}

// ⚠ Important Info: in the previous example was for a patient adding himself, if an admin was adding the patient, the previous response&#039;s data would be like:
//{
//    &quot;result&quot;: &quot;Success&quot;,
//    &quot;message&quot;: {
//        &quot;base_message&quot;: &quot;Patient added successfully&quot;
//    },
//    &quot;data&quot;: {
//        &quot;id&quot;: 14,
//        &quot;allergies&quot;: &quot;consequatur&quot;,
//        &quot;chronic_diseases&quot;: &quot;consequatur&quot;,
//        &quot;user&quot;: {
//            &quot;id&quot;: 31,
//            &quot;first_name&quot;: &quot;vmq&quot;,
//            &quot;last_name&quot;: &quot;eop&quot;,
//            &quot;email&quot;: &quot;tamrashryft2@gmail.com&quot;,
//            &quot;phone&quot;: &quot;+963999999999&quot;,
//            &quot;date_of_birth&quot;: &quot;2004-06-13T21:00:00.000000Z&quot;,
//            &quot;gender&quot;: &quot;Male&quot;,
//            &quot;photo&quot;: null,
//            &quot;username&quot;: &quot;hdtqtqxbajwbpilpm&quot;,
//            &quot;role&quot;: &quot;patient&quot;,
//            &quot;email_verified_at&quot;: &quot;2026-06-05T21:12:22.000000Z&quot;,
//            &quot;created_at&quot;: &quot;2026-06-05T21:11:12.000000Z&quot;,
//            &quot;last_update_at&quot;: &quot;2026-06-06T16:46:19.000000Z&quot;
//        },
//        &quot;blood_type_id&quot;: {
//            &quot;id&quot;: 4,
//            &quot;name&quot;: &quot;A+&quot;
//        }
//    }
//}</code>
 </pre>
            <blockquote>
            <p>Example response (403):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">// This response be returned when:
// The logged-in user role is null (non-completed patient), OK, but he is trying to add a patient other than himself!

{
 &quot;result&quot;: &quot;Fail&quot;,
    &quot;message&quot;: {
        &quot;base_message&quot;: &quot;Patients can only add themselves&quot;
    },
}</code>
 </pre>
            <blockquote>
            <p>Example response (409):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">// This response be returned when:
// The user which being tried to add already has a role (PATIENT - ADMIN - DOCTOR).

{
    &quot;result&quot;: &quot;Fail&quot;,
    &quot;message&quot;: &quot;User is already a patient, it can\&#039;t be modified&quot;
}

// In the previous example the user-role was patient, so the response was &quot;already a patient&quot;, other cases are: &quot;already a patient&quot; - &quot;already a patient&quot;</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-patients" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-patients"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-patients"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-patients" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-patients">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-patients" data-method="POST"
      data-path="api/patients"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-patients', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-patients"
                    onclick="tryItOut('POSTapi-patients');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-patients"
                    onclick="cancelTryOut('POSTapi-patients');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-patients"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/patients</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-patients"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-patients"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-patients"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>user_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="user_id"                data-endpoint="POSTapi-patients"
               value="17"
               data-component="body">
    <br>
<p>The <code>id</code> of an existing record in the users table. Example: <code>17</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>blood_type_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="blood_type_id"                data-endpoint="POSTapi-patients"
               value="17"
               data-component="body">
    <br>
<p>The <code>id</code> of an existing record in the blood_types table. Example: <code>17</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>allergies</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="allergies"                data-endpoint="POSTapi-patients"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>chronic_diseases</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="chronic_diseases"                data-endpoint="POSTapi-patients"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
        </form>

                    <h2 id="patient-apis-GETapi-patients--per_page-">Show All Patients</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<h3>For: Web</h3>
<p>Only admins are allowed to use this API.</p>

<span id="example-requests-GETapi-patients--per_page-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/patients/17" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/patients/17"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-patients--per_page-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;result&quot;: &quot;Success&quot;,
    &quot;message&quot;: {
        &quot;result&quot;: &quot;Success&quot;,
        &quot;current_page_number&quot;: 1,
        &quot;last_page_number&quot;: 3,
        &quot;patients_per_page&quot;: 4,
        &quot;next_page_url&quot;: &quot;http://127.0.0.1:8000/api/patients/4?page=2&quot;,
        &quot;previous_page_url&quot;: null,
        &quot;first_page_url&quot;: &quot;http://127.0.0.1:8000/api/patients/4?page=1&quot;,
        &quot;last_page_url&quot;: &quot;http://127.0.0.1:8000/api/patients/4?page=3&quot;,
        &quot;total_patients_number&quot;: 11
    },
    &quot;data&quot;: [
        {
            &quot;id&quot;: 14,
            &quot;allergies&quot;: &quot;consequatur&quot;,
            &quot;chronic_diseases&quot;: &quot;consequatur&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 31,
                &quot;first_name&quot;: &quot;vmq&quot;,
                &quot;last_name&quot;: &quot;eop&quot;,
                &quot;email&quot;: &quot;tamrashryft2@gmail.com&quot;,
                &quot;phone&quot;: &quot;+963999999999&quot;,
                &quot;date_of_birth&quot;: &quot;2004-06-13T21:00:00.000000Z&quot;,
                &quot;gender&quot;: &quot;Male&quot;,
                &quot;photo&quot;: null,
                &quot;username&quot;: &quot;hdtqtqxbajwbpilpm&quot;,
                &quot;role&quot;: &quot;patient&quot;,
                &quot;email_verified_at&quot;: &quot;2026-06-05T21:12:22.000000Z&quot;,
                &quot;created_at&quot;: &quot;2026-06-05T21:11:12.000000Z&quot;,
                &quot;last_update_at&quot;: &quot;2026-06-06T16:46:19.000000Z&quot;
            },
            &quot;blood_type_id&quot;: {
                &quot;id&quot;: 4,
                &quot;name&quot;: &quot;A+&quot;
            }
        },
        {
            &quot;id&quot;: 1,
            &quot;allergies&quot;: null,
            &quot;chronic_diseases&quot;: null,
            &quot;user&quot;: {
                &quot;id&quot;: 16,
                &quot;first_name&quot;: &quot;Casey Marvin&quot;,
                &quot;last_name&quot;: &quot;Prof. Isabell Christiansen&quot;,
                &quot;email&quot;: &quot;miller.oconnell@example.org&quot;,
                &quot;phone&quot;: &quot;+1.678.499.5508&quot;,
                &quot;date_of_birth&quot;: &quot;1982-11-05T22:00:00.000000Z&quot;,
                &quot;gender&quot;: &quot;Male&quot;,
                &quot;photo&quot;: null,
                &quot;username&quot;: &quot;khickle&quot;,
                &quot;role&quot;: &quot;patient&quot;,
                &quot;email_verified_at&quot;: null,
                &quot;created_at&quot;: &quot;2026-06-05T21:11:01.000000Z&quot;,
                &quot;last_update_at&quot;: &quot;2026-06-05T21:11:04.000000Z&quot;
            },
            &quot;blood_type_id&quot;: {
                &quot;id&quot;: 4,
                &quot;name&quot;: &quot;A+&quot;
            }
        },
        {
            &quot;id&quot;: 2,
            &quot;allergies&quot;: null,
            &quot;chronic_diseases&quot;: null,
            &quot;user&quot;: {
                &quot;id&quot;: 17,
                &quot;first_name&quot;: &quot;Miss Elsie Volkman MD&quot;,
                &quot;last_name&quot;: &quot;Prof. Jarred Nolan Jr.&quot;,
                &quot;email&quot;: &quot;dickens.misael@example.org&quot;,
                &quot;phone&quot;: &quot;(830) 299-4184&quot;,
                &quot;date_of_birth&quot;: &quot;2005-08-05T21:00:00.000000Z&quot;,
                &quot;gender&quot;: &quot;Female&quot;,
                &quot;photo&quot;: null,
                &quot;username&quot;: &quot;uconn&quot;,
                &quot;role&quot;: &quot;patient&quot;,
                &quot;email_verified_at&quot;: null,
                &quot;created_at&quot;: &quot;2026-06-05T21:11:01.000000Z&quot;,
                &quot;last_update_at&quot;: &quot;2026-06-05T21:11:04.000000Z&quot;
            },
            &quot;blood_type_id&quot;: {
                &quot;id&quot;: 8,
                &quot;name&quot;: &quot;AB+&quot;
            }
        },
        {
            &quot;id&quot;: 3,
            &quot;allergies&quot;: null,
            &quot;chronic_diseases&quot;: null,
            &quot;user&quot;: {
                &quot;id&quot;: 18,
                &quot;first_name&quot;: &quot;Flossie Herzog I&quot;,
                &quot;last_name&quot;: &quot;Estella Schaefer&quot;,
                &quot;email&quot;: &quot;kunze.giovanna@example.com&quot;,
                &quot;phone&quot;: &quot;1-862-842-2212&quot;,
                &quot;date_of_birth&quot;: &quot;1993-06-19T21:00:00.000000Z&quot;,
                &quot;gender&quot;: &quot;Male&quot;,
                &quot;photo&quot;: null,
                &quot;username&quot;: &quot;goodwin.rosie&quot;,
                &quot;role&quot;: &quot;patient&quot;,
                &quot;email_verified_at&quot;: null,
                &quot;created_at&quot;: &quot;2026-06-05T21:11:01.000000Z&quot;,
                &quot;last_update_at&quot;: &quot;2026-06-05T21:11:04.000000Z&quot;
            },
            &quot;blood_type_id&quot;: {
                &quot;id&quot;: 4,
                &quot;name&quot;: &quot;A+&quot;
            }
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-patients--per_page-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-patients--per_page-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-patients--per_page-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-patients--per_page-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-patients--per_page-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-patients--per_page-" data-method="GET"
      data-path="api/patients/{per_page}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-patients--per_page-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-patients--per_page-"
                    onclick="tryItOut('GETapi-patients--per_page-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-patients--per_page-"
                    onclick="cancelTryOut('GETapi-patients--per_page-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-patients--per_page-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/patients/{per_page}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-patients--per_page-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-patients--per_page-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-patients--per_page-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>per_page</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="per_page"                data-endpoint="GETapi-patients--per_page-"
               value="17"
               data-component="url">
    <br>
<p>The number of patients shown in each page. Defaults to 10. Example: <code>17</code></p>
            </div>
                    </form>

                    <h2 id="patient-apis-GETapi-patients-show--patientId-">Show Specified Patient</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<h3>For: Mobile (Patient, Doctor), Web</h3>
<p>Everyone in the system can use this API, but patients can only see their own information</p>
<h3>⚠ Important Info: The response's "data" field content would change based on the logged-in user role!</h3>

<span id="example-requests-GETapi-patients-show--patientId-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/patients/show/17" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/patients/show/17"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-patients-show--patientId-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;result&quot;: &quot;Success&quot;,
    &quot;data&quot;: {
        &quot;id&quot;: 14,
        &quot;allergies&quot;: &quot;consequatur&quot;,
        &quot;chronic_diseases&quot;: &quot;consequatur&quot;,
        &quot;user&quot;: {
            &quot;id&quot;: 31,
            &quot;first_name&quot;: &quot;vmq&quot;,
            &quot;last_name&quot;: &quot;eop&quot;,
            &quot;email&quot;: &quot;tamrashryft2@gmail.com&quot;,
            &quot;phone&quot;: &quot;+963999999999&quot;,
            &quot;date_of_birth&quot;: &quot;2004-06-13T21:00:00.000000Z&quot;,
            &quot;gender&quot;: &quot;Male&quot;,
            &quot;photo&quot;: null,
            &quot;username&quot;: &quot;hdtqtqxbajwbpilpm&quot;,
            &quot;role&quot;: &quot;patient&quot;,
            &quot;email_verified_at&quot;: &quot;2026-06-05T21:12:22.000000Z&quot;,
            &quot;created_at&quot;: &quot;2026-06-05T21:11:12.000000Z&quot;,
            &quot;last_update_at&quot;: &quot;2026-06-06T16:46:19.000000Z&quot;
        },
        &quot;blood_type_id&quot;: {
            &quot;id&quot;: 4,
            &quot;name&quot;: &quot;A+&quot;
        }
    }
}

// ⚠ Important info: The response&#039;s &quot;data&quot; field content would change based on the logged-in user role! the previous example logged-in user role was ADMIN.</code>
 </pre>
            <blockquote>
            <p>Example response (403):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;result&quot;: &quot;Fail&quot;,
    &quot;message&quot;: &quot;Patients can&#039;t see other patients information&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;result&quot;: &quot;Fail&quot;,
    &quot;data&quot;: &quot;Patient not found&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-patients-show--patientId-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-patients-show--patientId-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-patients-show--patientId-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-patients-show--patientId-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-patients-show--patientId-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-patients-show--patientId-" data-method="GET"
      data-path="api/patients/show/{patientId}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-patients-show--patientId-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-patients-show--patientId-"
                    onclick="tryItOut('GETapi-patients-show--patientId-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-patients-show--patientId-"
                    onclick="cancelTryOut('GETapi-patients-show--patientId-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-patients-show--patientId-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/patients/show/{patientId}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-patients-show--patientId-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-patients-show--patientId-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-patients-show--patientId-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>patientId</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="patientId"                data-endpoint="GETapi-patients-show--patientId-"
               value="17"
               data-component="url">
    <br>
<p>min:1 Example: <code>17</code></p>
            </div>
                    </form>

                    <h2 id="patient-apis-PUTapi-patients--patientId-">Update Patient</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<h3>For: Mobile (Patient), Web</h3>
<p>Only patients are allowed to use this API.</p>
<h3>⚠ Important Info: The response's "data" field content would change based on the logged-in user role!</h3>

<span id="example-requests-PUTapi-patients--patientId-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://127.0.0.1:8000/api/patients/17" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"blood_type_id\": 17,
    \"allergies\": \"consequatur\",
    \"chronic_diseases\": \"consequatur\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/patients/17"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "blood_type_id": 17,
    "allergies": "consequatur",
    "chronic_diseases": "consequatur"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-patients--patientId-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;result&quot;: &quot;Success&quot;,
    &quot;data&quot;: &quot;No changes detected&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
  &quot;result&quot;: &quot;Success&quot;,
  &quot;message&quot;: {
    &quot;base_message&quot;: &quot;Patient updated successfully&quot;
  },
  &quot;data&quot;: {
    &quot;id&quot;: 14,
    &quot;allergies&quot;: &quot;dasf&quot;,
    &quot;chronic_diseases&quot;: &quot;dddddddddd&quot;,
    &quot;user&quot;: {
      &quot;id&quot;: 31,
      &quot;first_name&quot;: &quot;vmq&quot;,
      &quot;last_name&quot;: &quot;eop&quot;,
      &quot;email&quot;: &quot;tamrashryft2@gmail.com&quot;,
      &quot;phone&quot;: &quot;+963999999999&quot;,
      &quot;date_of_birth&quot;: &quot;2004-06-13T21:00:00.000000Z&quot;,
      &quot;gender&quot;: &quot;Male&quot;,
      &quot;photo&quot;: null,
      &quot;username&quot;: &quot;hdtqtqxbajwbpilpm&quot;,
      &quot;role&quot;: &quot;patient&quot;,
      &quot;email_verified_at&quot;: &quot;2026-06-05T21:12:22.000000Z&quot;,
      &quot;created_at&quot;: &quot;2026-06-05T21:11:12.000000Z&quot;,
      &quot;last_update_at&quot;: &quot;2026-06-06T16:46:19.000000Z&quot;
    },
    &quot;blood_type_id&quot;: {
      &quot;id&quot;: 1,
      &quot;name&quot;: &quot;Not_Determined&quot;
    }
  }
}

// ⚠ Important Info: The response&#039;s &quot;data&quot; field content would change based on the logged-in user role!, The previous example logged-in user role was ADMIN</code>
 </pre>
            <blockquote>
            <p>Example response (403):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;result&quot;: &quot;Fail&quot;,
    &quot;message&quot;: &quot;Patients can&#039;t update other patients information&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;result&quot;: &quot;Fail&quot;,
    &quot;data&quot;: &quot;Patient not found&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-PUTapi-patients--patientId-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-patients--patientId-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-patients--patientId-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-patients--patientId-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-patients--patientId-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-patients--patientId-" data-method="PUT"
      data-path="api/patients/{patientId}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-patients--patientId-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-patients--patientId-"
                    onclick="tryItOut('PUTapi-patients--patientId-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-patients--patientId-"
                    onclick="cancelTryOut('PUTapi-patients--patientId-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-patients--patientId-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/patients/{patientId}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="PUTapi-patients--patientId-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-patients--patientId-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-patients--patientId-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>patientId</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="patientId"                data-endpoint="PUTapi-patients--patientId-"
               value="17"
               data-component="url">
    <br>
<p>min:1 Example: <code>17</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>blood_type_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="blood_type_id"                data-endpoint="PUTapi-patients--patientId-"
               value="17"
               data-component="body">
    <br>
<p>The <code>id</code> of an existing record in the blood_types table. Example: <code>17</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>allergies</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="allergies"                data-endpoint="PUTapi-patients--patientId-"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>chronic_diseases</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="chronic_diseases"                data-endpoint="PUTapi-patients--patientId-"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
        </form>

                    <h2 id="patient-apis-DELETEapi-patients--patientId-">Delete Patient</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<h3>For: Web</h3>
<p>Only admins are allowed to use this API.</p>

<span id="example-requests-DELETEapi-patients--patientId-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://127.0.0.1:8000/api/patients/17" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/patients/17"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-patients--patientId-">
            <blockquote>
            <p>Example response (204):</p>
        </blockquote>
                <pre>
<code>Empty response</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;result&quot;: &quot;Fail&quot;,
    &quot;data&quot;: &quot;Patient not found&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-DELETEapi-patients--patientId-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-patients--patientId-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-patients--patientId-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-patients--patientId-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-patients--patientId-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-patients--patientId-" data-method="DELETE"
      data-path="api/patients/{patientId}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-patients--patientId-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-patients--patientId-"
                    onclick="tryItOut('DELETEapi-patients--patientId-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-patients--patientId-"
                    onclick="cancelTryOut('DELETEapi-patients--patientId-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-patients--patientId-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/patients/{patientId}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="DELETEapi-patients--patientId-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-patients--patientId-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-patients--patientId-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>patientId</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="patientId"                data-endpoint="DELETEapi-patients--patientId-"
               value="17"
               data-component="url">
    <br>
<p>min:1 Example: <code>17</code></p>
            </div>
                    </form>

                <h1 id="room-apis">Room APIs</h1>

    

                                <h2 id="room-apis-POSTapi-rooms">Add New Room</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<h3>For: Web</h3>
<p>Only admins are allowed to use this API.</p>

<span id="example-requests-POSTapi-rooms">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/api/rooms" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"vmqeopfuudtdsufvy\",
    \"monthly_rent\": 76
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/rooms"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "vmqeopfuudtdsufvy",
    "monthly_rent": 76
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-rooms">
            <blockquote>
            <p>Example response (201):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;result&quot;: &quot;Success&quot;,
    &quot;message&quot;: {
        &quot;base_message&quot;: &quot;Room added successfully&quot;
    },
    &quot;data&quot;: {
        &quot;id&quot;: 31,
        &quot;name&quot;: &quot;AB2678&quot;,
        &quot;monthly_rent&quot;: 250,
        &quot;last_update_by_admin&quot;: {
            &quot;id&quot;: 1,
            &quot;user&quot;: {
                &quot;id&quot;: 1,
                &quot;first_name&quot;: &quot;Tamer&quot;,
                &quot;last_name&quot;: &quot;Ashrifa&quot;,
                &quot;email&quot;: &quot;tamrashryft@gmail.com&quot;,
                &quot;phone&quot;: &quot;0988138665&quot;,
                &quot;date_of_birth&quot;: &quot;2004-06-11T21:00:00.000000Z&quot;,
                &quot;gender&quot;: &quot;Male&quot;,
                &quot;photo&quot;: null,
                &quot;username&quot;: &quot;TamerAshrifa&quot;,
                &quot;role&quot;: &quot;admin&quot;,
                &quot;email_verified_at&quot;: &quot;2026-06-05T21:10:58.000000Z&quot;,
                &quot;created_at&quot;: &quot;2026-06-05T21:10:58.000000Z&quot;,
                &quot;last_update_at&quot;: &quot;2026-06-05T21:11:04.000000Z&quot;
            },
            &quot;added_by_admin_id&quot;: null
        }
    }
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-rooms" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-rooms"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-rooms"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-rooms" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-rooms">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-rooms" data-method="POST"
      data-path="api/rooms"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-rooms', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-rooms"
                    onclick="tryItOut('POSTapi-rooms');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-rooms"
                    onclick="cancelTryOut('POSTapi-rooms');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-rooms"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/rooms</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-rooms"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-rooms"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-rooms"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTapi-rooms"
               value="vmqeopfuudtdsufvy"
               data-component="body">
    <br>
<p>Must not be greater than 20 characters. Example: <code>vmqeopfuudtdsufvy</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>monthly_rent</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="monthly_rent"                data-endpoint="POSTapi-rooms"
               value="76"
               data-component="body">
    <br>
<p>Must be at least 0. Example: <code>76</code></p>
        </div>
        </form>

                    <h2 id="room-apis-GETapi-rooms--per_page-">View All Rooms</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<h3>For: Web</h3>
<p>Only admins are allowed to use this API.</p>

<span id="example-requests-GETapi-rooms--per_page-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/rooms/17" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/rooms/17"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-rooms--per_page-">
            <blockquote>
            <p>Example response (201):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;result&quot;: &quot;Success&quot;,
    &quot;message&quot;: {
        &quot;result&quot;: &quot;Success&quot;,
        &quot;current_page_number&quot;: 1,
        &quot;last_page_number&quot;: 8,
        &quot;rooms_per_page&quot;: 4,
        &quot;next_page_url&quot;: &quot;http://127.0.0.1:8000/api/rooms/4?page=2&quot;,
        &quot;previous_page_url&quot;: null,
        &quot;first_page_url&quot;: &quot;http://127.0.0.1:8000/api/rooms/4?page=1&quot;,
        &quot;last_page_url&quot;: &quot;http://127.0.0.1:8000/api/rooms/4?page=8&quot;,
        &quot;total_rooms_number&quot;: 31
    },
    &quot;data&quot;: [
        {
            &quot;id&quot;: 31,
            &quot;name&quot;: &quot;AB2678&quot;,
            &quot;monthly_rent&quot;: &quot;250.00&quot;,
            &quot;last_update_by_admin&quot;: {
                &quot;id&quot;: 1,
                &quot;user&quot;: {
                    &quot;id&quot;: 1,
                    &quot;first_name&quot;: &quot;Tamer&quot;,
                    &quot;last_name&quot;: &quot;Ashrifa&quot;,
                    &quot;email&quot;: &quot;tamrashryft@gmail.com&quot;,
                    &quot;phone&quot;: &quot;0988138665&quot;,
                    &quot;date_of_birth&quot;: &quot;2004-06-11T21:00:00.000000Z&quot;,
                    &quot;gender&quot;: &quot;Male&quot;,
                    &quot;photo&quot;: null,
                    &quot;username&quot;: &quot;TamerAshrifa&quot;,
                    &quot;role&quot;: &quot;admin&quot;,
                    &quot;email_verified_at&quot;: &quot;2026-06-05T21:10:58.000000Z&quot;,
                    &quot;created_at&quot;: &quot;2026-06-05T21:10:58.000000Z&quot;,
                    &quot;last_update_at&quot;: &quot;2026-06-05T21:11:04.000000Z&quot;
                },
                &quot;added_by_admin_id&quot;: null
            }
        },
        {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;Room 1&quot;,
            &quot;monthly_rent&quot;: &quot;1479.00&quot;,
            &quot;last_update_by_admin&quot;: {
                &quot;id&quot;: 1,
                &quot;user&quot;: {
                    &quot;id&quot;: 1,
                    &quot;first_name&quot;: &quot;Tamer&quot;,
                    &quot;last_name&quot;: &quot;Ashrifa&quot;,
                    &quot;email&quot;: &quot;tamrashryft@gmail.com&quot;,
                    &quot;phone&quot;: &quot;0988138665&quot;,
                    &quot;date_of_birth&quot;: &quot;2004-06-11T21:00:00.000000Z&quot;,
                    &quot;gender&quot;: &quot;Male&quot;,
                    &quot;photo&quot;: null,
                    &quot;username&quot;: &quot;TamerAshrifa&quot;,
                    &quot;role&quot;: &quot;admin&quot;,
                    &quot;email_verified_at&quot;: &quot;2026-06-05T21:10:58.000000Z&quot;,
                    &quot;created_at&quot;: &quot;2026-06-05T21:10:58.000000Z&quot;,
                    &quot;last_update_at&quot;: &quot;2026-06-05T21:11:04.000000Z&quot;
                },
                &quot;added_by_admin_id&quot;: null
            }
        },
        {
            &quot;id&quot;: 2,
            &quot;name&quot;: &quot;Room 2&quot;,
            &quot;monthly_rent&quot;: &quot;1154.00&quot;,
            &quot;last_update_by_admin&quot;: {
                &quot;id&quot;: 1,
                &quot;user&quot;: {
                    &quot;id&quot;: 1,
                    &quot;first_name&quot;: &quot;Tamer&quot;,
                    &quot;last_name&quot;: &quot;Ashrifa&quot;,
                    &quot;email&quot;: &quot;tamrashryft@gmail.com&quot;,
                    &quot;phone&quot;: &quot;0988138665&quot;,
                    &quot;date_of_birth&quot;: &quot;2004-06-11T21:00:00.000000Z&quot;,
                    &quot;gender&quot;: &quot;Male&quot;,
                    &quot;photo&quot;: null,
                    &quot;username&quot;: &quot;TamerAshrifa&quot;,
                    &quot;role&quot;: &quot;admin&quot;,
                    &quot;email_verified_at&quot;: &quot;2026-06-05T21:10:58.000000Z&quot;,
                    &quot;created_at&quot;: &quot;2026-06-05T21:10:58.000000Z&quot;,
                    &quot;last_update_at&quot;: &quot;2026-06-05T21:11:04.000000Z&quot;
                },
                &quot;added_by_admin_id&quot;: null
            }
        },
        {
            &quot;id&quot;: 3,
            &quot;name&quot;: &quot;Room 3&quot;,
            &quot;monthly_rent&quot;: &quot;1931.00&quot;,
            &quot;last_update_by_admin&quot;: {
                &quot;id&quot;: 1,
                &quot;user&quot;: {
                    &quot;id&quot;: 1,
                    &quot;first_name&quot;: &quot;Tamer&quot;,
                    &quot;last_name&quot;: &quot;Ashrifa&quot;,
                    &quot;email&quot;: &quot;tamrashryft@gmail.com&quot;,
                    &quot;phone&quot;: &quot;0988138665&quot;,
                    &quot;date_of_birth&quot;: &quot;2004-06-11T21:00:00.000000Z&quot;,
                    &quot;gender&quot;: &quot;Male&quot;,
                    &quot;photo&quot;: null,
                    &quot;username&quot;: &quot;TamerAshrifa&quot;,
                    &quot;role&quot;: &quot;admin&quot;,
                    &quot;email_verified_at&quot;: &quot;2026-06-05T21:10:58.000000Z&quot;,
                    &quot;created_at&quot;: &quot;2026-06-05T21:10:58.000000Z&quot;,
                    &quot;last_update_at&quot;: &quot;2026-06-05T21:11:04.000000Z&quot;
                },
                &quot;added_by_admin_id&quot;: null
            }
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-rooms--per_page-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-rooms--per_page-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-rooms--per_page-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-rooms--per_page-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-rooms--per_page-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-rooms--per_page-" data-method="GET"
      data-path="api/rooms/{per_page}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-rooms--per_page-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-rooms--per_page-"
                    onclick="tryItOut('GETapi-rooms--per_page-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-rooms--per_page-"
                    onclick="cancelTryOut('GETapi-rooms--per_page-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-rooms--per_page-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/rooms/{per_page}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-rooms--per_page-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-rooms--per_page-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-rooms--per_page-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>per_page</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="per_page"                data-endpoint="GETapi-rooms--per_page-"
               value="17"
               data-component="url">
    <br>
<p>The number of rooms shown in each page. Defaults to 10. Example: <code>17</code></p>
            </div>
                    </form>

                    <h2 id="room-apis-GETapi-rooms-show--roomId-">View a Specified Room</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<h3>For: Mobile(Patient - Doctor), Web</h3>
<p>Everyone in the system is allowed to use this API.</p>
<h3>⚠ Important Info: The response's "data" field content would change based on the logged-in user role!</h3>

<span id="example-requests-GETapi-rooms-show--roomId-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/rooms/show/17" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/rooms/show/17"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-rooms-show--roomId-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;result&quot;: &quot;Success&quot;,
    &quot;data&quot;: {
        &quot;id&quot;: 3,
        &quot;name&quot;: &quot;Room 3&quot;
    }
}

// ⚠ Important Info: The previous example was for a patient logged-in, if an admin was logged-in, the previous response&#039;s data would be like:
//{
//    &quot;result&quot;: &quot;Success&quot;,
//    &quot;data&quot;: {
//        &quot;id&quot;: 3,
//        &quot;name&quot;: &quot;Room 3&quot;,
//        &quot;monthly_rent&quot;: &quot;1931.00&quot;,
//        &quot;last_update_by_admin&quot;: {
//            &quot;id&quot;: 1,
//            &quot;user&quot;: {
//                &quot;id&quot;: 1,
//                &quot;first_name&quot;: &quot;Tamer&quot;,
//                &quot;last_name&quot;: &quot;Ashrifa&quot;,
//                &quot;email&quot;: &quot;tamrashryft@gmail.com&quot;,
//                &quot;phone&quot;: &quot;0988138665&quot;,
//                &quot;date_of_birth&quot;: &quot;2004-06-11T21:00:00.000000Z&quot;,
//                &quot;gender&quot;: &quot;Male&quot;,
//                &quot;photo&quot;: null,
//                &quot;username&quot;: &quot;TamerAshrifa&quot;,
//                &quot;role&quot;: &quot;admin&quot;,
//                &quot;email_verified_at&quot;: &quot;2026-06-05T21:10:58.000000Z&quot;,
//                &quot;created_at&quot;: &quot;2026-06-05T21:10:58.000000Z&quot;,
//                &quot;last_update_at&quot;: &quot;2026-06-05T21:11:04.000000Z&quot;
//            },
//            &quot;added_by_admin_id&quot;: null
//        }
//    }
//}</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;result&quot;: &quot;Fail&quot;,
    &quot;message&quot;: {
        &quot;base_message&quot;: &quot;Room not found&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-rooms-show--roomId-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-rooms-show--roomId-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-rooms-show--roomId-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-rooms-show--roomId-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-rooms-show--roomId-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-rooms-show--roomId-" data-method="GET"
      data-path="api/rooms/show/{roomId}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-rooms-show--roomId-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-rooms-show--roomId-"
                    onclick="tryItOut('GETapi-rooms-show--roomId-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-rooms-show--roomId-"
                    onclick="cancelTryOut('GETapi-rooms-show--roomId-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-rooms-show--roomId-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/rooms/show/{roomId}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-rooms-show--roomId-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-rooms-show--roomId-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-rooms-show--roomId-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>roomId</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="roomId"                data-endpoint="GETapi-rooms-show--roomId-"
               value="17"
               data-component="url">
    <br>
<p>min:1 Example: <code>17</code></p>
            </div>
                    </form>

                    <h2 id="room-apis-PUTapi-rooms--roomId-">Update Room</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<h3>For: Web</h3>
<p>Only admins are allowed to use this API.</p>

<span id="example-requests-PUTapi-rooms--roomId-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://127.0.0.1:8000/api/rooms/17" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"vmqeopfuudtdsufvy\",
    \"monthly_rent\": 76
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/rooms/17"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "vmqeopfuudtdsufvy",
    "monthly_rent": 76
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-rooms--roomId-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;result&quot;: &quot;Success&quot;,
    &quot;message&quot;: {
        &quot;base_message&quot;: &quot;No changes detected&quot;
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;result&quot;: &quot;Success&quot;,
    &quot;message&quot;: {
        &quot;base_message&quot;: &quot;Room updated successfully&quot;
    },
    &quot;data&quot;: {
        &quot;id&quot;: 7,
        &quot;name&quot;: &quot;yyyy&quot;,
        &quot;monthly_rent&quot;: 2345,
        &quot;last_update_by_admin&quot;: {
            &quot;id&quot;: 1,
            &quot;user&quot;: {
                &quot;id&quot;: 1,
                &quot;first_name&quot;: &quot;Tamer&quot;,
                &quot;last_name&quot;: &quot;Ashrifa&quot;,
                &quot;email&quot;: &quot;tamrashryft@gmail.com&quot;,
                &quot;phone&quot;: &quot;0988138665&quot;,
                &quot;date_of_birth&quot;: &quot;2004-06-11T21:00:00.000000Z&quot;,
                &quot;gender&quot;: &quot;Male&quot;,
                &quot;photo&quot;: null,
                &quot;username&quot;: &quot;TamerAshrifa&quot;,
                &quot;role&quot;: &quot;admin&quot;,
                &quot;email_verified_at&quot;: &quot;2026-06-05T21:10:58.000000Z&quot;,
                &quot;created_at&quot;: &quot;2026-06-05T21:10:58.000000Z&quot;,
                &quot;last_update_at&quot;: &quot;2026-06-05T21:11:04.000000Z&quot;
            },
            &quot;added_by_admin_id&quot;: null
        }
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;result&quot;: &quot;Fail&quot;,
    &quot;message&quot;: {
        &quot;base_message&quot;: &quot;Room not found&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-PUTapi-rooms--roomId-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-rooms--roomId-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-rooms--roomId-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-rooms--roomId-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-rooms--roomId-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-rooms--roomId-" data-method="PUT"
      data-path="api/rooms/{roomId}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-rooms--roomId-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-rooms--roomId-"
                    onclick="tryItOut('PUTapi-rooms--roomId-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-rooms--roomId-"
                    onclick="cancelTryOut('PUTapi-rooms--roomId-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-rooms--roomId-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/rooms/{roomId}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="PUTapi-rooms--roomId-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-rooms--roomId-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-rooms--roomId-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>roomId</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="roomId"                data-endpoint="PUTapi-rooms--roomId-"
               value="17"
               data-component="url">
    <br>
<p>min:1 Example: <code>17</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="PUTapi-rooms--roomId-"
               value="vmqeopfuudtdsufvy"
               data-component="body">
    <br>
<p>Must not be greater than 20 characters. Example: <code>vmqeopfuudtdsufvy</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>monthly_rent</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="monthly_rent"                data-endpoint="PUTapi-rooms--roomId-"
               value="76"
               data-component="body">
    <br>
<p>Must be at least 0. Example: <code>76</code></p>
        </div>
        </form>

                    <h2 id="room-apis-DELETEapi-rooms--roomId-">Delete Room</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<h3>For: Web</h3>
<p>Only admins are allowed to use this API.</p>

<span id="example-requests-DELETEapi-rooms--roomId-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://127.0.0.1:8000/api/rooms/17" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/rooms/17"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-rooms--roomId-">
            <blockquote>
            <p>Example response (204):</p>
        </blockquote>
                <pre>
<code>Empty response</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;result&quot;: &quot;Fail&quot;,
    &quot;message&quot;: {
        &quot;base_message&quot;: &quot;Room not found&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-DELETEapi-rooms--roomId-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-rooms--roomId-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-rooms--roomId-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-rooms--roomId-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-rooms--roomId-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-rooms--roomId-" data-method="DELETE"
      data-path="api/rooms/{roomId}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-rooms--roomId-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-rooms--roomId-"
                    onclick="tryItOut('DELETEapi-rooms--roomId-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-rooms--roomId-"
                    onclick="cancelTryOut('DELETEapi-rooms--roomId-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-rooms--roomId-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/rooms/{roomId}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="DELETEapi-rooms--roomId-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-rooms--roomId-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-rooms--roomId-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>roomId</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="roomId"                data-endpoint="DELETEapi-rooms--roomId-"
               value="17"
               data-component="url">
    <br>
<p>min:1 Example: <code>17</code></p>
            </div>
                    </form>

                <h1 id="doctor-apis">Doctor APIs</h1>

    

                                <h2 id="doctor-apis-POSTapi-doctors">Add New Doctor</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<h3>For: Web</h3>
<p>Only admins are allowed to use this API.</p>

<span id="example-requests-POSTapi-doctors">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/api/doctors" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"user_id\": 17,
    \"room_id\": 17,
    \"appointment_duration\": 45
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/doctors"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "user_id": 17,
    "room_id": 17,
    "appointment_duration": 45
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-doctors">
            <blockquote>
            <p>Example response (201):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;result&quot;: &quot;Success&quot;,
    &quot;message&quot;: {
        &quot;base_message&quot;: &quot;Doctor added successfully&quot;
    },
    &quot;data&quot;: {
        &quot;id&quot;: 11,
        &quot;user&quot;: {
            &quot;id&quot;: 29,
            &quot;first_name&quot;: &quot;Miss Serenity Labadie III&quot;,
            &quot;last_name&quot;: &quot;Stephanie Botsford&quot;,
            &quot;email&quot;: &quot;heaney.emile@example.org&quot;,
            &quot;phone&quot;: &quot;1-906-843-2633&quot;,
            &quot;date_of_birth&quot;: &quot;1977-02-26T22:00:00.000000Z&quot;,
            &quot;gender&quot;: &quot;Female&quot;,
            &quot;photo&quot;: null,
            &quot;username&quot;: &quot;cbuckridge&quot;,
            &quot;role&quot;: &quot;doctor&quot;,
            &quot;email_verified_at&quot;: null,
            &quot;created_at&quot;: &quot;2026-06-05T21:11:03.000000Z&quot;,
            &quot;last_update_at&quot;: &quot;2026-06-06T21:07:13.000000Z&quot;
        },
        &quot;appointment_duration&quot;: 45,
        &quot;room&quot;: {
            &quot;id&quot;: 17,
            &quot;name&quot;: &quot;Room 17&quot;,
            &quot;monthly_rent&quot;: &quot;1671.00&quot;,
            &quot;last_update_by_admin&quot;: {
                &quot;id&quot;: 1,
                &quot;user&quot;: {
                    &quot;id&quot;: 1,
                    &quot;first_name&quot;: &quot;Tamer&quot;,
                    &quot;last_name&quot;: &quot;Ashrifa&quot;,
                    &quot;email&quot;: &quot;tamrashryft@gmail.com&quot;,
                    &quot;phone&quot;: &quot;0988138665&quot;,
                    &quot;date_of_birth&quot;: &quot;2004-06-11T21:00:00.000000Z&quot;,
                    &quot;gender&quot;: &quot;Male&quot;,
                    &quot;photo&quot;: null,
                    &quot;username&quot;: &quot;TamerAshrifa&quot;,
                    &quot;role&quot;: &quot;admin&quot;,
                    &quot;email_verified_at&quot;: &quot;2026-06-05T21:10:58.000000Z&quot;,
                    &quot;created_at&quot;: &quot;2026-06-05T21:10:58.000000Z&quot;,
                    &quot;last_update_at&quot;: &quot;2026-06-05T21:11:04.000000Z&quot;
                },
                &quot;added_by_admin_id&quot;: null
            }
        },
        &quot;added_by_admin&quot;: {
            &quot;id&quot;: 1,
            &quot;user&quot;: {
                &quot;id&quot;: 1,
                &quot;first_name&quot;: &quot;Tamer&quot;,
                &quot;last_name&quot;: &quot;Ashrifa&quot;,
                &quot;email&quot;: &quot;tamrashryft@gmail.com&quot;,
                &quot;phone&quot;: &quot;0988138665&quot;,
                &quot;date_of_birth&quot;: &quot;2004-06-11T21:00:00.000000Z&quot;,
                &quot;gender&quot;: &quot;Male&quot;,
                &quot;photo&quot;: null,
                &quot;username&quot;: &quot;TamerAshrifa&quot;,
                &quot;role&quot;: &quot;admin&quot;,
                &quot;email_verified_at&quot;: &quot;2026-06-05T21:10:58.000000Z&quot;,
                &quot;created_at&quot;: &quot;2026-06-05T21:10:58.000000Z&quot;,
                &quot;last_update_at&quot;: &quot;2026-06-05T21:11:04.000000Z&quot;
            },
            &quot;added_by_admin_id&quot;: null
        }
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (409):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">// This response be returned when:
// The user which being tried to add already has a role.

{
    &quot;result&quot;: &quot;Fail&quot;,
    &quot;message&quot;: &quot;User is already a patient, it can\&#039;t be modified&quot;
}

// In the previous example the user-role was patient, so the response was &quot;already a patient&quot;, other cases are: &quot;already a patient&quot; - &quot;already a patient&quot;</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-doctors" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-doctors"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-doctors"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-doctors" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-doctors">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-doctors" data-method="POST"
      data-path="api/doctors"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-doctors', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-doctors"
                    onclick="tryItOut('POSTapi-doctors');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-doctors"
                    onclick="cancelTryOut('POSTapi-doctors');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-doctors"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/doctors</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-doctors"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-doctors"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-doctors"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>user_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="user_id"                data-endpoint="POSTapi-doctors"
               value="17"
               data-component="body">
    <br>
<p>The <code>id</code> of an existing record in the users table. Example: <code>17</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>room_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="room_id"                data-endpoint="POSTapi-doctors"
               value="17"
               data-component="body">
    <br>
<p>The <code>id</code> of an existing record in the rooms table. Example: <code>17</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>appointment_duration</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="appointment_duration"                data-endpoint="POSTapi-doctors"
               value="45"
               data-component="body">
    <br>
<p>Must be at least 1. Example: <code>45</code></p>
        </div>
        </form>

                    <h2 id="doctor-apis-GETapi-doctors--per_page-">View All Doctors</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<h3>For: Mobile(Patient - Doctor), Web</h3>
<p>Everyone in the system is allowed to use this API.</p>
<h3>⚠ Important Info: The response's "data" field content would change based on the logged-in user role!</h3>

<span id="example-requests-GETapi-doctors--per_page-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/doctors/17" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/doctors/17"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-doctors--per_page-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;result&quot;: &quot;Success&quot;,
    &quot;message&quot;: {
        &quot;result&quot;: &quot;Success&quot;,
        &quot;current_page_number&quot;: 1,
        &quot;last_page_number&quot;: 3,
        &quot;doctors_per_page&quot;: 4,
        &quot;next_page_url&quot;: &quot;http://127.0.0.1:8000/api/doctors/4?page=2&quot;,
        &quot;previous_page_url&quot;: null,
        &quot;first_page_url&quot;: &quot;http://127.0.0.1:8000/api/doctors/4?page=1&quot;,
        &quot;last_page_url&quot;: &quot;http://127.0.0.1:8000/api/doctors/4?page=3&quot;,
        &quot;total_doctors_number&quot;: 11
    },
    &quot;data&quot;: [
        {
            &quot;id&quot;: 11,
            &quot;user&quot;: {
                &quot;id&quot;: 29,
                &quot;first_name&quot;: &quot;Miss Serenity Labadie III&quot;,
                &quot;last_name&quot;: &quot;Stephanie Botsford&quot;,
                &quot;email&quot;: &quot;heaney.emile@example.org&quot;,
                &quot;phone&quot;: &quot;1-906-843-2633&quot;,
                &quot;date_of_birth&quot;: &quot;1977-02-26T22:00:00.000000Z&quot;,
                &quot;gender&quot;: &quot;Female&quot;,
                &quot;photo&quot;: null,
                &quot;username&quot;: &quot;cbuckridge&quot;,
                &quot;role&quot;: &quot;doctor&quot;,
                &quot;email_verified_at&quot;: null,
                &quot;created_at&quot;: &quot;2026-06-05T21:11:03.000000Z&quot;,
                &quot;last_update_at&quot;: &quot;2026-06-06T21:07:13.000000Z&quot;
            },
            &quot;appointment_duration&quot;: 45,
            &quot;room&quot;: {
                &quot;id&quot;: 17,
                &quot;name&quot;: &quot;Room 17&quot;,
                &quot;monthly_rent&quot;: &quot;1671.00&quot;,
                &quot;last_update_by_admin&quot;: {
                    &quot;id&quot;: 1,
                    &quot;user&quot;: {
                        &quot;id&quot;: 1,
                        &quot;first_name&quot;: &quot;Tamer&quot;,
                        &quot;last_name&quot;: &quot;Ashrifa&quot;,
                        &quot;email&quot;: &quot;tamrashryft@gmail.com&quot;,
                        &quot;phone&quot;: &quot;0988138665&quot;,
                        &quot;date_of_birth&quot;: &quot;2004-06-11T21:00:00.000000Z&quot;,
                        &quot;gender&quot;: &quot;Male&quot;,
                        &quot;photo&quot;: null,
                        &quot;username&quot;: &quot;TamerAshrifa&quot;,
                        &quot;role&quot;: &quot;admin&quot;,
                        &quot;email_verified_at&quot;: &quot;2026-06-05T21:10:58.000000Z&quot;,
                        &quot;created_at&quot;: &quot;2026-06-05T21:10:58.000000Z&quot;,
                        &quot;last_update_at&quot;: &quot;2026-06-05T21:11:04.000000Z&quot;
                    },
                    &quot;added_by_admin_id&quot;: null
                }
            },
            &quot;added_by_admin&quot;: {
                &quot;id&quot;: 1,
                &quot;user&quot;: {
                    &quot;id&quot;: 1,
                    &quot;first_name&quot;: &quot;Tamer&quot;,
                    &quot;last_name&quot;: &quot;Ashrifa&quot;,
                    &quot;email&quot;: &quot;tamrashryft@gmail.com&quot;,
                    &quot;phone&quot;: &quot;0988138665&quot;,
                    &quot;date_of_birth&quot;: &quot;2004-06-11T21:00:00.000000Z&quot;,
                    &quot;gender&quot;: &quot;Male&quot;,
                    &quot;photo&quot;: null,
                    &quot;username&quot;: &quot;TamerAshrifa&quot;,
                    &quot;role&quot;: &quot;admin&quot;,
                    &quot;email_verified_at&quot;: &quot;2026-06-05T21:10:58.000000Z&quot;,
                    &quot;created_at&quot;: &quot;2026-06-05T21:10:58.000000Z&quot;,
                    &quot;last_update_at&quot;: &quot;2026-06-05T21:11:04.000000Z&quot;
                },
                &quot;added_by_admin_id&quot;: null
            }
        },
        {
            &quot;id&quot;: 2,
            &quot;user&quot;: {
                &quot;id&quot;: 7,
                &quot;first_name&quot;: &quot;Domenic Corkery&quot;,
                &quot;last_name&quot;: &quot;Tomasa Schimmel&quot;,
                &quot;email&quot;: &quot;thiel.kiel@example.com&quot;,
                &quot;phone&quot;: &quot;+14807960787&quot;,
                &quot;date_of_birth&quot;: &quot;2019-08-11T21:00:00.000000Z&quot;,
                &quot;gender&quot;: &quot;Male&quot;,
                &quot;photo&quot;: null,
                &quot;username&quot;: &quot;azboncak&quot;,
                &quot;role&quot;: &quot;doctor&quot;,
                &quot;email_verified_at&quot;: null,
                &quot;created_at&quot;: &quot;2026-06-05T21:10:59.000000Z&quot;,
                &quot;last_update_at&quot;: &quot;2026-06-05T21:11:04.000000Z&quot;
            },
            &quot;appointment_duration&quot;: 15,
            &quot;room&quot;: {
                &quot;id&quot;: 2,
                &quot;name&quot;: &quot;Room 2&quot;,
                &quot;monthly_rent&quot;: &quot;1154.00&quot;,
                &quot;last_update_by_admin&quot;: {
                    &quot;id&quot;: 1,
                    &quot;user&quot;: {
                        &quot;id&quot;: 1,
                        &quot;first_name&quot;: &quot;Tamer&quot;,
                        &quot;last_name&quot;: &quot;Ashrifa&quot;,
                        &quot;email&quot;: &quot;tamrashryft@gmail.com&quot;,
                        &quot;phone&quot;: &quot;0988138665&quot;,
                        &quot;date_of_birth&quot;: &quot;2004-06-11T21:00:00.000000Z&quot;,
                        &quot;gender&quot;: &quot;Male&quot;,
                        &quot;photo&quot;: null,
                        &quot;username&quot;: &quot;TamerAshrifa&quot;,
                        &quot;role&quot;: &quot;admin&quot;,
                        &quot;email_verified_at&quot;: &quot;2026-06-05T21:10:58.000000Z&quot;,
                        &quot;created_at&quot;: &quot;2026-06-05T21:10:58.000000Z&quot;,
                        &quot;last_update_at&quot;: &quot;2026-06-05T21:11:04.000000Z&quot;
                    },
                    &quot;added_by_admin_id&quot;: null
                }
            },
            &quot;added_by_admin&quot;: {
                &quot;id&quot;: 1,
                &quot;user&quot;: {
                    &quot;id&quot;: 1,
                    &quot;first_name&quot;: &quot;Tamer&quot;,
                    &quot;last_name&quot;: &quot;Ashrifa&quot;,
                    &quot;email&quot;: &quot;tamrashryft@gmail.com&quot;,
                    &quot;phone&quot;: &quot;0988138665&quot;,
                    &quot;date_of_birth&quot;: &quot;2004-06-11T21:00:00.000000Z&quot;,
                    &quot;gender&quot;: &quot;Male&quot;,
                    &quot;photo&quot;: null,
                    &quot;username&quot;: &quot;TamerAshrifa&quot;,
                    &quot;role&quot;: &quot;admin&quot;,
                    &quot;email_verified_at&quot;: &quot;2026-06-05T21:10:58.000000Z&quot;,
                    &quot;created_at&quot;: &quot;2026-06-05T21:10:58.000000Z&quot;,
                    &quot;last_update_at&quot;: &quot;2026-06-05T21:11:04.000000Z&quot;
                },
                &quot;added_by_admin_id&quot;: null
            }
        },
        {
            &quot;id&quot;: 3,
            &quot;user&quot;: {
                &quot;id&quot;: 8,
                &quot;first_name&quot;: &quot;Miss Loma Wehner PhD&quot;,
                &quot;last_name&quot;: &quot;Prof. Thaddeus Greenholt I&quot;,
                &quot;email&quot;: &quot;salvatore.anderson@example.org&quot;,
                &quot;phone&quot;: &quot;848.496.2757&quot;,
                &quot;date_of_birth&quot;: &quot;2008-12-25T22:00:00.000000Z&quot;,
                &quot;gender&quot;: &quot;Female&quot;,
                &quot;photo&quot;: null,
                &quot;username&quot;: &quot;oupton&quot;,
                &quot;role&quot;: &quot;doctor&quot;,
                &quot;email_verified_at&quot;: null,
                &quot;created_at&quot;: &quot;2026-06-05T21:10:59.000000Z&quot;,
                &quot;last_update_at&quot;: &quot;2026-06-05T21:11:04.000000Z&quot;
            },
            &quot;appointment_duration&quot;: 15,
            &quot;room&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Room 3&quot;,
                &quot;monthly_rent&quot;: &quot;1931.00&quot;,
                &quot;last_update_by_admin&quot;: {
                    &quot;id&quot;: 1,
                    &quot;user&quot;: {
                        &quot;id&quot;: 1,
                        &quot;first_name&quot;: &quot;Tamer&quot;,
                        &quot;last_name&quot;: &quot;Ashrifa&quot;,
                        &quot;email&quot;: &quot;tamrashryft@gmail.com&quot;,
                        &quot;phone&quot;: &quot;0988138665&quot;,
                        &quot;date_of_birth&quot;: &quot;2004-06-11T21:00:00.000000Z&quot;,
                        &quot;gender&quot;: &quot;Male&quot;,
                        &quot;photo&quot;: null,
                        &quot;username&quot;: &quot;TamerAshrifa&quot;,
                        &quot;role&quot;: &quot;admin&quot;,
                        &quot;email_verified_at&quot;: &quot;2026-06-05T21:10:58.000000Z&quot;,
                        &quot;created_at&quot;: &quot;2026-06-05T21:10:58.000000Z&quot;,
                        &quot;last_update_at&quot;: &quot;2026-06-05T21:11:04.000000Z&quot;
                    },
                    &quot;added_by_admin_id&quot;: null
                }
            },
            &quot;added_by_admin&quot;: {
                &quot;id&quot;: 1,
                &quot;user&quot;: {
                    &quot;id&quot;: 1,
                    &quot;first_name&quot;: &quot;Tamer&quot;,
                    &quot;last_name&quot;: &quot;Ashrifa&quot;,
                    &quot;email&quot;: &quot;tamrashryft@gmail.com&quot;,
                    &quot;phone&quot;: &quot;0988138665&quot;,
                    &quot;date_of_birth&quot;: &quot;2004-06-11T21:00:00.000000Z&quot;,
                    &quot;gender&quot;: &quot;Male&quot;,
                    &quot;photo&quot;: null,
                    &quot;username&quot;: &quot;TamerAshrifa&quot;,
                    &quot;role&quot;: &quot;admin&quot;,
                    &quot;email_verified_at&quot;: &quot;2026-06-05T21:10:58.000000Z&quot;,
                    &quot;created_at&quot;: &quot;2026-06-05T21:10:58.000000Z&quot;,
                    &quot;last_update_at&quot;: &quot;2026-06-05T21:11:04.000000Z&quot;
                },
                &quot;added_by_admin_id&quot;: null
            }
        },
        {
            &quot;id&quot;: 4,
            &quot;user&quot;: {
                &quot;id&quot;: 9,
                &quot;first_name&quot;: &quot;Ruthie Donnelly&quot;,
                &quot;last_name&quot;: &quot;Sadie Bashirian&quot;,
                &quot;email&quot;: &quot;pacocha.luther@example.org&quot;,
                &quot;phone&quot;: &quot;+1 (220) 537-2299&quot;,
                &quot;date_of_birth&quot;: &quot;1989-06-10T21:00:00.000000Z&quot;,
                &quot;gender&quot;: &quot;Female&quot;,
                &quot;photo&quot;: null,
                &quot;username&quot;: &quot;meta.weimann&quot;,
                &quot;role&quot;: &quot;doctor&quot;,
                &quot;email_verified_at&quot;: null,
                &quot;created_at&quot;: &quot;2026-06-05T21:10:59.000000Z&quot;,
                &quot;last_update_at&quot;: &quot;2026-06-05T21:11:04.000000Z&quot;
            },
            &quot;appointment_duration&quot;: 15,
            &quot;room&quot;: {
                &quot;id&quot;: 4,
                &quot;name&quot;: &quot;Room 4&quot;,
                &quot;monthly_rent&quot;: &quot;1580.00&quot;,
                &quot;last_update_by_admin&quot;: {
                    &quot;id&quot;: 1,
                    &quot;user&quot;: {
                        &quot;id&quot;: 1,
                        &quot;first_name&quot;: &quot;Tamer&quot;,
                        &quot;last_name&quot;: &quot;Ashrifa&quot;,
                        &quot;email&quot;: &quot;tamrashryft@gmail.com&quot;,
                        &quot;phone&quot;: &quot;0988138665&quot;,
                        &quot;date_of_birth&quot;: &quot;2004-06-11T21:00:00.000000Z&quot;,
                        &quot;gender&quot;: &quot;Male&quot;,
                        &quot;photo&quot;: null,
                        &quot;username&quot;: &quot;TamerAshrifa&quot;,
                        &quot;role&quot;: &quot;admin&quot;,
                        &quot;email_verified_at&quot;: &quot;2026-06-05T21:10:58.000000Z&quot;,
                        &quot;created_at&quot;: &quot;2026-06-05T21:10:58.000000Z&quot;,
                        &quot;last_update_at&quot;: &quot;2026-06-05T21:11:04.000000Z&quot;
                    },
                    &quot;added_by_admin_id&quot;: null
                }
            },
            &quot;added_by_admin&quot;: {
                &quot;id&quot;: 1,
                &quot;user&quot;: {
                    &quot;id&quot;: 1,
                    &quot;first_name&quot;: &quot;Tamer&quot;,
                    &quot;last_name&quot;: &quot;Ashrifa&quot;,
                    &quot;email&quot;: &quot;tamrashryft@gmail.com&quot;,
                    &quot;phone&quot;: &quot;0988138665&quot;,
                    &quot;date_of_birth&quot;: &quot;2004-06-11T21:00:00.000000Z&quot;,
                    &quot;gender&quot;: &quot;Male&quot;,
                    &quot;photo&quot;: null,
                    &quot;username&quot;: &quot;TamerAshrifa&quot;,
                    &quot;role&quot;: &quot;admin&quot;,
                    &quot;email_verified_at&quot;: &quot;2026-06-05T21:10:58.000000Z&quot;,
                    &quot;created_at&quot;: &quot;2026-06-05T21:10:58.000000Z&quot;,
                    &quot;last_update_at&quot;: &quot;2026-06-05T21:11:04.000000Z&quot;
                },
                &quot;added_by_admin_id&quot;: null
            }
        }
    ]
}

// ⚠ Important Info: The response&#039;s &quot;data&quot; field content would change based on the logged-in user role!
</code>
 </pre>
    </span>
<span id="execution-results-GETapi-doctors--per_page-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-doctors--per_page-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-doctors--per_page-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-doctors--per_page-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-doctors--per_page-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-doctors--per_page-" data-method="GET"
      data-path="api/doctors/{per_page}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-doctors--per_page-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-doctors--per_page-"
                    onclick="tryItOut('GETapi-doctors--per_page-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-doctors--per_page-"
                    onclick="cancelTryOut('GETapi-doctors--per_page-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-doctors--per_page-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/doctors/{per_page}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-doctors--per_page-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-doctors--per_page-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-doctors--per_page-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>per_page</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="per_page"                data-endpoint="GETapi-doctors--per_page-"
               value="17"
               data-component="url">
    <br>
<p>The number of doctors shown in each page. Defaults to 10. Example: <code>17</code></p>
            </div>
                    </form>

                    <h2 id="doctor-apis-GETapi-doctors-show--doctorId-">View a Specified Doctor</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<h3>For: Mobile(Patient - Doctor), Web</h3>
<p>Everyone in the system is allowed to use this API.</p>
<h3>⚠ Important Info: The response's "data" field content would change based on the logged-in user role!</h3>

<span id="example-requests-GETapi-doctors-show--doctorId-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/doctors/show/17" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/doctors/show/17"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-doctors-show--doctorId-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;result&quot;: &quot;Success&quot;,
    &quot;data&quot;: {
        &quot;id&quot;: 5,
        &quot;user&quot;: {
            &quot;id&quot;: 10,
            &quot;first_name&quot;: &quot;Abagail Steuber&quot;,
            &quot;last_name&quot;: &quot;Etha Reynolds&quot;,
            &quot;email&quot;: &quot;demario.schaefer@example.net&quot;,
            &quot;phone&quot;: &quot;(956) 585-9365&quot;,
            &quot;date_of_birth&quot;: &quot;2025-08-16T21:00:00.000000Z&quot;,
            &quot;gender&quot;: &quot;Male&quot;,
            &quot;photo&quot;: null,
            &quot;username&quot;: &quot;considine.clyde&quot;,
            &quot;role&quot;: &quot;doctor&quot;,
            &quot;email_verified_at&quot;: null,
            &quot;created_at&quot;: &quot;2026-06-05T21:11:00.000000Z&quot;,
            &quot;last_update_at&quot;: &quot;2026-06-05T21:11:04.000000Z&quot;
        },
        &quot;appointment_duration&quot;: 15,
        &quot;room&quot;: {
            &quot;id&quot;: 5,
            &quot;name&quot;: &quot;Room 5&quot;,
            &quot;monthly_rent&quot;: &quot;1884.00&quot;,
            &quot;last_update_by_admin&quot;: {
                &quot;id&quot;: 1,
                &quot;user&quot;: {
                    &quot;id&quot;: 1,
                    &quot;first_name&quot;: &quot;Tamer&quot;,
                    &quot;last_name&quot;: &quot;Ashrifa&quot;,
                    &quot;email&quot;: &quot;tamrashryft@gmail.com&quot;,
                    &quot;phone&quot;: &quot;0988138665&quot;,
                    &quot;date_of_birth&quot;: &quot;2004-06-11T21:00:00.000000Z&quot;,
                    &quot;gender&quot;: &quot;Male&quot;,
                    &quot;photo&quot;: null,
                    &quot;username&quot;: &quot;TamerAshrifa&quot;,
                    &quot;role&quot;: &quot;admin&quot;,
                    &quot;email_verified_at&quot;: &quot;2026-06-05T21:10:58.000000Z&quot;,
                    &quot;created_at&quot;: &quot;2026-06-05T21:10:58.000000Z&quot;,
                    &quot;last_update_at&quot;: &quot;2026-06-05T21:11:04.000000Z&quot;
                },
                &quot;added_by_admin_id&quot;: null
            }
        },
        &quot;added_by_admin&quot;: {
            &quot;id&quot;: 1,
            &quot;user&quot;: {
                &quot;id&quot;: 1,
                &quot;first_name&quot;: &quot;Tamer&quot;,
                &quot;last_name&quot;: &quot;Ashrifa&quot;,
                &quot;email&quot;: &quot;tamrashryft@gmail.com&quot;,
                &quot;phone&quot;: &quot;0988138665&quot;,
                &quot;date_of_birth&quot;: &quot;2004-06-11T21:00:00.000000Z&quot;,
                &quot;gender&quot;: &quot;Male&quot;,
                &quot;photo&quot;: null,
                &quot;username&quot;: &quot;TamerAshrifa&quot;,
                &quot;role&quot;: &quot;admin&quot;,
                &quot;email_verified_at&quot;: &quot;2026-06-05T21:10:58.000000Z&quot;,
                &quot;created_at&quot;: &quot;2026-06-05T21:10:58.000000Z&quot;,
                &quot;last_update_at&quot;: &quot;2026-06-05T21:11:04.000000Z&quot;
            },
            &quot;added_by_admin_id&quot;: null
        }
    }
}

// ⚠ Important Info: the previous example was for a patient logged-in, the response&#039;s data be changed based on logged-in user role</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;result&quot;: &quot;Fail&quot;,
    &quot;message&quot;: {
        &quot;base_message&quot;: &quot;Doctor not found&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-doctors-show--doctorId-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-doctors-show--doctorId-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-doctors-show--doctorId-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-doctors-show--doctorId-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-doctors-show--doctorId-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-doctors-show--doctorId-" data-method="GET"
      data-path="api/doctors/show/{doctorId}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-doctors-show--doctorId-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-doctors-show--doctorId-"
                    onclick="tryItOut('GETapi-doctors-show--doctorId-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-doctors-show--doctorId-"
                    onclick="cancelTryOut('GETapi-doctors-show--doctorId-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-doctors-show--doctorId-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/doctors/show/{doctorId}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-doctors-show--doctorId-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-doctors-show--doctorId-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-doctors-show--doctorId-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>doctorId</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="doctorId"                data-endpoint="GETapi-doctors-show--doctorId-"
               value="17"
               data-component="url">
    <br>
<p>min:1 Example: <code>17</code></p>
            </div>
                    </form>

                    <h2 id="doctor-apis-PUTapi-doctors--doctorId-">Update a Doctor</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<h3>For: Mobile(Doctor)</h3>
<p>Only doctors are allowed to use this API.</p>

<span id="example-requests-PUTapi-doctors--doctorId-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://127.0.0.1:8000/api/doctors/17" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"room_id\": 17,
    \"appointment_duration\": 45
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/doctors/17"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "room_id": 17,
    "appointment_duration": 45
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-doctors--doctorId-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;result&quot;: &quot;Success&quot;,
    &quot;data&quot;: &quot;No changes detected&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;result&quot;: &quot;Success&quot;,
    &quot;message&quot;: {
        &quot;base_message&quot;: &quot;Doctor updated successfully&quot;
    },
    &quot;data&quot;: {
        &quot;id&quot;: 12,
        &quot;user&quot;: {
            &quot;id&quot;: 32,
            &quot;first_name&quot;: &quot;vmq&quot;,
            &quot;last_name&quot;: &quot;eop&quot;,
            &quot;email&quot;: &quot;tamerashrifachat@gmail.com&quot;,
            &quot;phone&quot;: &quot;+963999999&quot;,
            &quot;date_of_birth&quot;: &quot;2004-06-13T21:00:00.000000Z&quot;,
            &quot;gender&quot;: &quot;Male&quot;,
            &quot;photo&quot;: null,
            &quot;username&quot;: &quot;hbajwbpilpm&quot;
        },
        &quot;appointment_duration&quot;: 37,
        &quot;room&quot;: {
            &quot;id&quot;: 13,
            &quot;name&quot;: &quot;Room 13&quot;,
            &quot;monthly_rent&quot;: &quot;1644.00&quot;
        }
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (403):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;result&quot;: &quot;Fail&quot;,
    &quot;message&quot;: &quot;Doctors can&#039;t update other doctors information&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;result&quot;: &quot;Fail&quot;,
    &quot;data&quot;: &quot;Doctor not found&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-PUTapi-doctors--doctorId-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-doctors--doctorId-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-doctors--doctorId-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-doctors--doctorId-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-doctors--doctorId-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-doctors--doctorId-" data-method="PUT"
      data-path="api/doctors/{doctorId}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-doctors--doctorId-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-doctors--doctorId-"
                    onclick="tryItOut('PUTapi-doctors--doctorId-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-doctors--doctorId-"
                    onclick="cancelTryOut('PUTapi-doctors--doctorId-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-doctors--doctorId-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/doctors/{doctorId}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="PUTapi-doctors--doctorId-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-doctors--doctorId-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-doctors--doctorId-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>doctorId</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="doctorId"                data-endpoint="PUTapi-doctors--doctorId-"
               value="17"
               data-component="url">
    <br>
<p>min:1 Example: <code>17</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>room_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="room_id"                data-endpoint="PUTapi-doctors--doctorId-"
               value="17"
               data-component="body">
    <br>
<p>The <code>id</code> of an existing record in the rooms table. Example: <code>17</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>appointment_duration</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="appointment_duration"                data-endpoint="PUTapi-doctors--doctorId-"
               value="45"
               data-component="body">
    <br>
<p>Must be at least 1. Example: <code>45</code></p>
        </div>
        </form>

                    <h2 id="doctor-apis-DELETEapi-doctors--doctorId-">Delete a Doctor</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<h3>For: Web</h3>
<p>Only admins are allowed to use this API.</p>

<span id="example-requests-DELETEapi-doctors--doctorId-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://127.0.0.1:8000/api/doctors/17" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/doctors/17"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-doctors--doctorId-">
            <blockquote>
            <p>Example response (204):</p>
        </blockquote>
                <pre>
<code>Empty response</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;result&quot;: &quot;Fail&quot;,
    &quot;data&quot;: &quot;Doctor not found&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-DELETEapi-doctors--doctorId-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-doctors--doctorId-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-doctors--doctorId-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-doctors--doctorId-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-doctors--doctorId-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-doctors--doctorId-" data-method="DELETE"
      data-path="api/doctors/{doctorId}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-doctors--doctorId-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-doctors--doctorId-"
                    onclick="tryItOut('DELETEapi-doctors--doctorId-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-doctors--doctorId-"
                    onclick="cancelTryOut('DELETEapi-doctors--doctorId-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-doctors--doctorId-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/doctors/{doctorId}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="DELETEapi-doctors--doctorId-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-doctors--doctorId-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-doctors--doctorId-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>doctorId</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="doctorId"                data-endpoint="DELETEapi-doctors--doctorId-"
               value="17"
               data-component="url">
    <br>
<p>min:1 Example: <code>17</code></p>
            </div>
                    </form>

                <h1 id="speciality-apis">Speciality APIs</h1>

    

                                <h2 id="speciality-apis-POSTapi-specialities">Add New Speciality</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<h3>For: Web</h3>
<p>Only admins are allowed to use this API.</p>

<span id="example-requests-POSTapi-specialities">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/api/specialities" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"vmq\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/specialities"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "vmq"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-specialities">
            <blockquote>
            <p>Example response (201):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;result&quot;: &quot;Success&quot;,
    &quot;message&quot;: {
        &quot;base_message&quot;: &quot;Speciality added successfully&quot;
    },
    &quot;data&quot;: {
        &quot;id&quot;: 37,
        &quot;name&quot;: &quot;kkk&quot;,
        &quot;added_by_admin&quot;: {
            &quot;id&quot;: 1,
            &quot;user&quot;: {
                &quot;id&quot;: 1,
                &quot;first_name&quot;: &quot;Tamer&quot;,
                &quot;last_name&quot;: &quot;Ashrifa&quot;,
                &quot;email&quot;: &quot;tamrashryft@gmail.com&quot;,
                &quot;phone&quot;: &quot;0988138665&quot;,
                &quot;date_of_birth&quot;: &quot;2004-06-11T21:00:00.000000Z&quot;,
                &quot;gender&quot;: &quot;Male&quot;,
                &quot;photo&quot;: null,
                &quot;username&quot;: &quot;TamerAshrifa&quot;,
                &quot;role&quot;: &quot;admin&quot;,
                &quot;email_verified_at&quot;: &quot;2026-06-05T21:10:58.000000Z&quot;,
                &quot;created_at&quot;: &quot;2026-06-05T21:10:58.000000Z&quot;,
                &quot;last_update_at&quot;: &quot;2026-06-05T21:11:04.000000Z&quot;
            },
            &quot;added_by_admin_id&quot;: null
        }
    }
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-specialities" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-specialities"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-specialities"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-specialities" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-specialities">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-specialities" data-method="POST"
      data-path="api/specialities"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-specialities', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-specialities"
                    onclick="tryItOut('POSTapi-specialities');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-specialities"
                    onclick="cancelTryOut('POSTapi-specialities');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-specialities"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/specialities</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-specialities"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-specialities"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-specialities"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTapi-specialities"
               value="vmq"
               data-component="body">
    <br>
<p>Must be between 2 and 30 characters. Example: <code>vmq</code></p>
        </div>
        </form>

                    <h2 id="speciality-apis-GETapi-specialities--per_page-">View All Specialities</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<h3>For: Mobile(Patient - Doctor), Web</h3>
<p>Everyone in the system is allowed to use this API.</p>
<h3>⚠ Important Info: The response's "data" field content would change based on the logged-in user role!</h3>

<span id="example-requests-GETapi-specialities--per_page-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/specialities/17" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/specialities/17"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-specialities--per_page-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;result&quot;: &quot;Success&quot;,
    &quot;message&quot;: {
        &quot;result&quot;: &quot;Success&quot;,
        &quot;current_page_number&quot;: 1,
        &quot;last_page_number&quot;: 10,
        &quot;specialities_per_page&quot;: 4,
        &quot;next_page_url&quot;: &quot;http://127.0.0.1:8000/api/specialities/4?page=2&quot;,
        &quot;previous_page_url&quot;: null,
        &quot;first_page_url&quot;: &quot;http://127.0.0.1:8000/api/specialities/4?page=1&quot;,
        &quot;last_page_url&quot;: &quot;http://127.0.0.1:8000/api/specialities/4?page=10&quot;,
        &quot;total_specialities_number&quot;: 37
    },
    &quot;data&quot;: [
        {
            &quot;id&quot;: 37,
            &quot;name&quot;: &quot;kkk&quot;,
            &quot;added_by_admin&quot;: {
                &quot;id&quot;: 1,
                &quot;user&quot;: {
                    &quot;id&quot;: 1,
                    &quot;first_name&quot;: &quot;Tamer&quot;,
                    &quot;last_name&quot;: &quot;Ashrifa&quot;,
                    &quot;email&quot;: &quot;tamrashryft@gmail.com&quot;,
                    &quot;phone&quot;: &quot;0988138665&quot;,
                    &quot;date_of_birth&quot;: &quot;2004-06-11T21:00:00.000000Z&quot;,
                    &quot;gender&quot;: &quot;Male&quot;,
                    &quot;photo&quot;: null,
                    &quot;username&quot;: &quot;TamerAshrifa&quot;,
                    &quot;role&quot;: &quot;admin&quot;,
                    &quot;email_verified_at&quot;: &quot;2026-06-05T21:10:58.000000Z&quot;,
                    &quot;created_at&quot;: &quot;2026-06-05T21:10:58.000000Z&quot;,
                    &quot;last_update_at&quot;: &quot;2026-06-05T21:11:04.000000Z&quot;
                },
                &quot;added_by_admin_id&quot;: null
            },
            &quot;doctors&quot;: []
        },
        {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;Cardiology&quot;,
            &quot;added_by_admin&quot;: {
                &quot;id&quot;: 1,
                &quot;user&quot;: {
                    &quot;id&quot;: 1,
                    &quot;first_name&quot;: &quot;Tamer&quot;,
                    &quot;last_name&quot;: &quot;Ashrifa&quot;,
                    &quot;email&quot;: &quot;tamrashryft@gmail.com&quot;,
                    &quot;phone&quot;: &quot;0988138665&quot;,
                    &quot;date_of_birth&quot;: &quot;2004-06-11T21:00:00.000000Z&quot;,
                    &quot;gender&quot;: &quot;Male&quot;,
                    &quot;photo&quot;: null,
                    &quot;username&quot;: &quot;TamerAshrifa&quot;,
                    &quot;role&quot;: &quot;admin&quot;,
                    &quot;email_verified_at&quot;: &quot;2026-06-05T21:10:58.000000Z&quot;,
                    &quot;created_at&quot;: &quot;2026-06-05T21:10:58.000000Z&quot;,
                    &quot;last_update_at&quot;: &quot;2026-06-05T21:11:04.000000Z&quot;
                },
                &quot;added_by_admin_id&quot;: null
            },
            &quot;doctors&quot;: [
                {
                    &quot;id&quot;: 6,
                    &quot;user&quot;: {
                        &quot;id&quot;: 11,
                        &quot;first_name&quot;: &quot;Prof. Victor Ratke&quot;,
                        &quot;last_name&quot;: &quot;Nelle Becker&quot;,
                        &quot;email&quot;: &quot;justus.bartoletti@example.com&quot;,
                        &quot;phone&quot;: &quot;347-343-7723&quot;,
                        &quot;date_of_birth&quot;: &quot;1986-04-30T21:00:00.000000Z&quot;,
                        &quot;gender&quot;: &quot;Female&quot;,
                        &quot;photo&quot;: null,
                        &quot;username&quot;: &quot;emma.douglas&quot;,
                        &quot;role&quot;: &quot;doctor&quot;,
                        &quot;email_verified_at&quot;: null,
                        &quot;created_at&quot;: &quot;2026-06-05T21:11:00.000000Z&quot;,
                        &quot;last_update_at&quot;: &quot;2026-06-05T21:11:04.000000Z&quot;
                    },
                    &quot;appointment_duration&quot;: 15,
                    &quot;room&quot;: {
                        &quot;id&quot;: 6,
                        &quot;name&quot;: &quot;Room 6&quot;,
                        &quot;monthly_rent&quot;: &quot;1982.00&quot;,
                        &quot;last_update_by_admin&quot;: {
                            &quot;id&quot;: 1,
                            &quot;user&quot;: {
                                &quot;id&quot;: 1,
                                &quot;first_name&quot;: &quot;Tamer&quot;,
                                &quot;last_name&quot;: &quot;Ashrifa&quot;,
                                &quot;email&quot;: &quot;tamrashryft@gmail.com&quot;,
                                &quot;phone&quot;: &quot;0988138665&quot;,
                                &quot;date_of_birth&quot;: &quot;2004-06-11T21:00:00.000000Z&quot;,
                                &quot;gender&quot;: &quot;Male&quot;,
                                &quot;photo&quot;: null,
                                &quot;username&quot;: &quot;TamerAshrifa&quot;,
                                &quot;role&quot;: &quot;admin&quot;,
                                &quot;email_verified_at&quot;: &quot;2026-06-05T21:10:58.000000Z&quot;,
                                &quot;created_at&quot;: &quot;2026-06-05T21:10:58.000000Z&quot;,
                                &quot;last_update_at&quot;: &quot;2026-06-05T21:11:04.000000Z&quot;
                            },
                            &quot;added_by_admin_id&quot;: null
                        }
                    },
                    &quot;added_by_admin&quot;: {
                        &quot;id&quot;: 1,
                        &quot;user&quot;: {
                            &quot;id&quot;: 1,
                            &quot;first_name&quot;: &quot;Tamer&quot;,
                            &quot;last_name&quot;: &quot;Ashrifa&quot;,
                            &quot;email&quot;: &quot;tamrashryft@gmail.com&quot;,
                            &quot;phone&quot;: &quot;0988138665&quot;,
                            &quot;date_of_birth&quot;: &quot;2004-06-11T21:00:00.000000Z&quot;,
                            &quot;gender&quot;: &quot;Male&quot;,
                            &quot;photo&quot;: null,
                            &quot;username&quot;: &quot;TamerAshrifa&quot;,
                            &quot;role&quot;: &quot;admin&quot;,
                            &quot;email_verified_at&quot;: &quot;2026-06-05T21:10:58.000000Z&quot;,
                            &quot;created_at&quot;: &quot;2026-06-05T21:10:58.000000Z&quot;,
                            &quot;last_update_at&quot;: &quot;2026-06-05T21:11:04.000000Z&quot;
                        },
                        &quot;added_by_admin_id&quot;: null
                    }
                },
                {
                    &quot;id&quot;: 5,
                    &quot;user&quot;: {
                        &quot;id&quot;: 10,
                        &quot;first_name&quot;: &quot;Abagail Steuber&quot;,
                        &quot;last_name&quot;: &quot;Etha Reynolds&quot;,
                        &quot;email&quot;: &quot;demario.schaefer@example.net&quot;,
                        &quot;phone&quot;: &quot;(956) 585-9365&quot;,
                        &quot;date_of_birth&quot;: &quot;2025-08-16T21:00:00.000000Z&quot;,
                        &quot;gender&quot;: &quot;Male&quot;,
                        &quot;photo&quot;: null,
                        &quot;username&quot;: &quot;considine.clyde&quot;,
                        &quot;role&quot;: &quot;doctor&quot;,
                        &quot;email_verified_at&quot;: null,
                        &quot;created_at&quot;: &quot;2026-06-05T21:11:00.000000Z&quot;,
                        &quot;last_update_at&quot;: &quot;2026-06-05T21:11:04.000000Z&quot;
                    },
                    &quot;appointment_duration&quot;: 15,
                    &quot;room&quot;: {
                        &quot;id&quot;: 5,
                        &quot;name&quot;: &quot;Room 5&quot;,
                        &quot;monthly_rent&quot;: &quot;1884.00&quot;,
                        &quot;last_update_by_admin&quot;: {
                            &quot;id&quot;: 1,
                            &quot;user&quot;: {
                                &quot;id&quot;: 1,
                                &quot;first_name&quot;: &quot;Tamer&quot;,
                                &quot;last_name&quot;: &quot;Ashrifa&quot;,
                                &quot;email&quot;: &quot;tamrashryft@gmail.com&quot;,
                                &quot;phone&quot;: &quot;0988138665&quot;,
                                &quot;date_of_birth&quot;: &quot;2004-06-11T21:00:00.000000Z&quot;,
                                &quot;gender&quot;: &quot;Male&quot;,
                                &quot;photo&quot;: null,
                                &quot;username&quot;: &quot;TamerAshrifa&quot;,
                                &quot;role&quot;: &quot;admin&quot;,
                                &quot;email_verified_at&quot;: &quot;2026-06-05T21:10:58.000000Z&quot;,
                                &quot;created_at&quot;: &quot;2026-06-05T21:10:58.000000Z&quot;,
                                &quot;last_update_at&quot;: &quot;2026-06-05T21:11:04.000000Z&quot;
                            },
                            &quot;added_by_admin_id&quot;: null
                        }
                    },
                    &quot;added_by_admin&quot;: {
                        &quot;id&quot;: 1,
                        &quot;user&quot;: {
                            &quot;id&quot;: 1,
                            &quot;first_name&quot;: &quot;Tamer&quot;,
                            &quot;last_name&quot;: &quot;Ashrifa&quot;,
                            &quot;email&quot;: &quot;tamrashryft@gmail.com&quot;,
                            &quot;phone&quot;: &quot;0988138665&quot;,
                            &quot;date_of_birth&quot;: &quot;2004-06-11T21:00:00.000000Z&quot;,
                            &quot;gender&quot;: &quot;Male&quot;,
                            &quot;photo&quot;: null,
                            &quot;username&quot;: &quot;TamerAshrifa&quot;,
                            &quot;role&quot;: &quot;admin&quot;,
                            &quot;email_verified_at&quot;: &quot;2026-06-05T21:10:58.000000Z&quot;,
                            &quot;created_at&quot;: &quot;2026-06-05T21:10:58.000000Z&quot;,
                            &quot;last_update_at&quot;: &quot;2026-06-05T21:11:04.000000Z&quot;
                        },
                        &quot;added_by_admin_id&quot;: null
                    }
                }
            ]
        },
        {
            &quot;id&quot;: 2,
            &quot;name&quot;: &quot;Dermatology&quot;,
            &quot;added_by_admin&quot;: {
                &quot;id&quot;: 1,
                &quot;user&quot;: {
                    &quot;id&quot;: 1,
                    &quot;first_name&quot;: &quot;Tamer&quot;,
                    &quot;last_name&quot;: &quot;Ashrifa&quot;,
                    &quot;email&quot;: &quot;tamrashryft@gmail.com&quot;,
                    &quot;phone&quot;: &quot;0988138665&quot;,
                    &quot;date_of_birth&quot;: &quot;2004-06-11T21:00:00.000000Z&quot;,
                    &quot;gender&quot;: &quot;Male&quot;,
                    &quot;photo&quot;: null,
                    &quot;username&quot;: &quot;TamerAshrifa&quot;,
                    &quot;role&quot;: &quot;admin&quot;,
                    &quot;email_verified_at&quot;: &quot;2026-06-05T21:10:58.000000Z&quot;,
                    &quot;created_at&quot;: &quot;2026-06-05T21:10:58.000000Z&quot;,
                    &quot;last_update_at&quot;: &quot;2026-06-05T21:11:04.000000Z&quot;
                },
                &quot;added_by_admin_id&quot;: null
            },
            &quot;doctors&quot;: []
        },
        {
            &quot;id&quot;: 3,
            &quot;name&quot;: &quot;Endocrinology&quot;,
            &quot;added_by_admin&quot;: {
                &quot;id&quot;: 1,
                &quot;user&quot;: {
                    &quot;id&quot;: 1,
                    &quot;first_name&quot;: &quot;Tamer&quot;,
                    &quot;last_name&quot;: &quot;Ashrifa&quot;,
                    &quot;email&quot;: &quot;tamrashryft@gmail.com&quot;,
                    &quot;phone&quot;: &quot;0988138665&quot;,
                    &quot;date_of_birth&quot;: &quot;2004-06-11T21:00:00.000000Z&quot;,
                    &quot;gender&quot;: &quot;Male&quot;,
                    &quot;photo&quot;: null,
                    &quot;username&quot;: &quot;TamerAshrifa&quot;,
                    &quot;role&quot;: &quot;admin&quot;,
                    &quot;email_verified_at&quot;: &quot;2026-06-05T21:10:58.000000Z&quot;,
                    &quot;created_at&quot;: &quot;2026-06-05T21:10:58.000000Z&quot;,
                    &quot;last_update_at&quot;: &quot;2026-06-05T21:11:04.000000Z&quot;
                },
                &quot;added_by_admin_id&quot;: null
            },
            &quot;doctors&quot;: [
                {
                    &quot;id&quot;: 10,
                    &quot;user&quot;: {
                        &quot;id&quot;: 15,
                        &quot;first_name&quot;: &quot;Opal Volkman&quot;,
                        &quot;last_name&quot;: &quot;Isaias Hahn&quot;,
                        &quot;email&quot;: &quot;virgie76@example.net&quot;,
                        &quot;phone&quot;: &quot;+1.804.782.6795&quot;,
                        &quot;date_of_birth&quot;: &quot;2020-03-11T22:00:00.000000Z&quot;,
                        &quot;gender&quot;: &quot;Female&quot;,
                        &quot;photo&quot;: null,
                        &quot;username&quot;: &quot;gwisoky&quot;,
                        &quot;role&quot;: &quot;doctor&quot;,
                        &quot;email_verified_at&quot;: null,
                        &quot;created_at&quot;: &quot;2026-06-05T21:11:00.000000Z&quot;,
                        &quot;last_update_at&quot;: &quot;2026-06-05T21:11:04.000000Z&quot;
                    },
                    &quot;appointment_duration&quot;: 15,
                    &quot;room&quot;: {
                        &quot;id&quot;: 10,
                        &quot;name&quot;: &quot;Room 10&quot;,
                        &quot;monthly_rent&quot;: &quot;970.00&quot;,
                        &quot;last_update_by_admin&quot;: {
                            &quot;id&quot;: 1,
                            &quot;user&quot;: {
                                &quot;id&quot;: 1,
                                &quot;first_name&quot;: &quot;Tamer&quot;,
                                &quot;last_name&quot;: &quot;Ashrifa&quot;,
                                &quot;email&quot;: &quot;tamrashryft@gmail.com&quot;,
                                &quot;phone&quot;: &quot;0988138665&quot;,
                                &quot;date_of_birth&quot;: &quot;2004-06-11T21:00:00.000000Z&quot;,
                                &quot;gender&quot;: &quot;Male&quot;,
                                &quot;photo&quot;: null,
                                &quot;username&quot;: &quot;TamerAshrifa&quot;,
                                &quot;role&quot;: &quot;admin&quot;,
                                &quot;email_verified_at&quot;: &quot;2026-06-05T21:10:58.000000Z&quot;,
                                &quot;created_at&quot;: &quot;2026-06-05T21:10:58.000000Z&quot;,
                                &quot;last_update_at&quot;: &quot;2026-06-05T21:11:04.000000Z&quot;
                            },
                            &quot;added_by_admin_id&quot;: null
                        }
                    },
                    &quot;added_by_admin&quot;: {
                        &quot;id&quot;: 1,
                        &quot;user&quot;: {
                            &quot;id&quot;: 1,
                            &quot;first_name&quot;: &quot;Tamer&quot;,
                            &quot;last_name&quot;: &quot;Ashrifa&quot;,
                            &quot;email&quot;: &quot;tamrashryft@gmail.com&quot;,
                            &quot;phone&quot;: &quot;0988138665&quot;,
                            &quot;date_of_birth&quot;: &quot;2004-06-11T21:00:00.000000Z&quot;,
                            &quot;gender&quot;: &quot;Male&quot;,
                            &quot;photo&quot;: null,
                            &quot;username&quot;: &quot;TamerAshrifa&quot;,
                            &quot;role&quot;: &quot;admin&quot;,
                            &quot;email_verified_at&quot;: &quot;2026-06-05T21:10:58.000000Z&quot;,
                            &quot;created_at&quot;: &quot;2026-06-05T21:10:58.000000Z&quot;,
                            &quot;last_update_at&quot;: &quot;2026-06-05T21:11:04.000000Z&quot;
                        },
                        &quot;added_by_admin_id&quot;: null
                    }
                },
                {
                    &quot;id&quot;: 5,
                    &quot;user&quot;: {
                        &quot;id&quot;: 10,
                        &quot;first_name&quot;: &quot;Abagail Steuber&quot;,
                        &quot;last_name&quot;: &quot;Etha Reynolds&quot;,
                        &quot;email&quot;: &quot;demario.schaefer@example.net&quot;,
                        &quot;phone&quot;: &quot;(956) 585-9365&quot;,
                        &quot;date_of_birth&quot;: &quot;2025-08-16T21:00:00.000000Z&quot;,
                        &quot;gender&quot;: &quot;Male&quot;,
                        &quot;photo&quot;: null,
                        &quot;username&quot;: &quot;considine.clyde&quot;,
                        &quot;role&quot;: &quot;doctor&quot;,
                        &quot;email_verified_at&quot;: null,
                        &quot;created_at&quot;: &quot;2026-06-05T21:11:00.000000Z&quot;,
                        &quot;last_update_at&quot;: &quot;2026-06-05T21:11:04.000000Z&quot;
                    },
                    &quot;appointment_duration&quot;: 15,
                    &quot;room&quot;: {
                        &quot;id&quot;: 5,
                        &quot;name&quot;: &quot;Room 5&quot;,
                        &quot;monthly_rent&quot;: &quot;1884.00&quot;,
                        &quot;last_update_by_admin&quot;: {
                            &quot;id&quot;: 1,
                            &quot;user&quot;: {
                                &quot;id&quot;: 1,
                                &quot;first_name&quot;: &quot;Tamer&quot;,
                                &quot;last_name&quot;: &quot;Ashrifa&quot;,
                                &quot;email&quot;: &quot;tamrashryft@gmail.com&quot;,
                                &quot;phone&quot;: &quot;0988138665&quot;,
                                &quot;date_of_birth&quot;: &quot;2004-06-11T21:00:00.000000Z&quot;,
                                &quot;gender&quot;: &quot;Male&quot;,
                                &quot;photo&quot;: null,
                                &quot;username&quot;: &quot;TamerAshrifa&quot;,
                                &quot;role&quot;: &quot;admin&quot;,
                                &quot;email_verified_at&quot;: &quot;2026-06-05T21:10:58.000000Z&quot;,
                                &quot;created_at&quot;: &quot;2026-06-05T21:10:58.000000Z&quot;,
                                &quot;last_update_at&quot;: &quot;2026-06-05T21:11:04.000000Z&quot;
                            },
                            &quot;added_by_admin_id&quot;: null
                        }
                    },
                    &quot;added_by_admin&quot;: {
                        &quot;id&quot;: 1,
                        &quot;user&quot;: {
                            &quot;id&quot;: 1,
                            &quot;first_name&quot;: &quot;Tamer&quot;,
                            &quot;last_name&quot;: &quot;Ashrifa&quot;,
                            &quot;email&quot;: &quot;tamrashryft@gmail.com&quot;,
                            &quot;phone&quot;: &quot;0988138665&quot;,
                            &quot;date_of_birth&quot;: &quot;2004-06-11T21:00:00.000000Z&quot;,
                            &quot;gender&quot;: &quot;Male&quot;,
                            &quot;photo&quot;: null,
                            &quot;username&quot;: &quot;TamerAshrifa&quot;,
                            &quot;role&quot;: &quot;admin&quot;,
                            &quot;email_verified_at&quot;: &quot;2026-06-05T21:10:58.000000Z&quot;,
                            &quot;created_at&quot;: &quot;2026-06-05T21:10:58.000000Z&quot;,
                            &quot;last_update_at&quot;: &quot;2026-06-05T21:11:04.000000Z&quot;
                        },
                        &quot;added_by_admin_id&quot;: null
                    }
                }
            ]
        }
    ]
}

// ⚠ Important Info: The response&#039;s &quot;data&quot; field content would change based on the logged-in user role!
</code>
 </pre>
    </span>
<span id="execution-results-GETapi-specialities--per_page-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-specialities--per_page-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-specialities--per_page-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-specialities--per_page-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-specialities--per_page-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-specialities--per_page-" data-method="GET"
      data-path="api/specialities/{per_page}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-specialities--per_page-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-specialities--per_page-"
                    onclick="tryItOut('GETapi-specialities--per_page-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-specialities--per_page-"
                    onclick="cancelTryOut('GETapi-specialities--per_page-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-specialities--per_page-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/specialities/{per_page}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-specialities--per_page-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-specialities--per_page-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-specialities--per_page-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>per_page</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="per_page"                data-endpoint="GETapi-specialities--per_page-"
               value="17"
               data-component="url">
    <br>
<p>The number of specialities shown in each page. Defaults to 10. Example: <code>17</code></p>
            </div>
                    </form>

                    <h2 id="speciality-apis-GETapi-specialities-show--specialityId-">View a Specified Speciality</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<h3>For: Mobile(Patient - Doctor), Web</h3>
<p>Everyone in the system is allowed to use this API.</p>
<h3>⚠ Important Info: The response's "data" field content would change based on the logged-in user role!</h3>

<span id="example-requests-GETapi-specialities-show--specialityId-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/specialities/show/17" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/specialities/show/17"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-specialities-show--specialityId-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;result&quot;: &quot;Success&quot;,
    &quot;data&quot;: {
        &quot;id&quot;: 17,
        &quot;name&quot;: &quot;Urology&quot;,
        &quot;added_by_admin&quot;: {
            &quot;id&quot;: 1,
            &quot;user&quot;: {
                &quot;id&quot;: 1,
                &quot;first_name&quot;: &quot;Tamer&quot;,
                &quot;last_name&quot;: &quot;Ashrifa&quot;,
                &quot;email&quot;: &quot;tamrashryft@gmail.com&quot;,
                &quot;phone&quot;: &quot;0988138665&quot;,
                &quot;date_of_birth&quot;: &quot;2004-06-11T21:00:00.000000Z&quot;,
                &quot;gender&quot;: &quot;Male&quot;,
                &quot;photo&quot;: null,
                &quot;username&quot;: &quot;TamerAshrifa&quot;,
                &quot;role&quot;: &quot;admin&quot;,
                &quot;email_verified_at&quot;: &quot;2026-06-05T21:10:58.000000Z&quot;,
                &quot;created_at&quot;: &quot;2026-06-05T21:10:58.000000Z&quot;,
                &quot;last_update_at&quot;: &quot;2026-06-05T21:11:04.000000Z&quot;
            },
            &quot;added_by_admin_id&quot;: null
        },
        &quot;doctors&quot;: [
            {
                &quot;id&quot;: 2,
                &quot;user&quot;: {
                    &quot;id&quot;: 7,
                    &quot;first_name&quot;: &quot;Domenic Corkery&quot;,
                    &quot;last_name&quot;: &quot;Tomasa Schimmel&quot;,
                    &quot;email&quot;: &quot;thiel.kiel@example.com&quot;,
                    &quot;phone&quot;: &quot;+14807960787&quot;,
                    &quot;date_of_birth&quot;: &quot;2019-08-11T21:00:00.000000Z&quot;,
                    &quot;gender&quot;: &quot;Male&quot;,
                    &quot;photo&quot;: null,
                    &quot;username&quot;: &quot;azboncak&quot;,
                    &quot;role&quot;: &quot;doctor&quot;,
                    &quot;email_verified_at&quot;: null,
                    &quot;created_at&quot;: &quot;2026-06-05T21:10:59.000000Z&quot;,
                    &quot;last_update_at&quot;: &quot;2026-06-05T21:11:04.000000Z&quot;
                },
                &quot;appointment_duration&quot;: 15,
                &quot;room&quot;: {
                    &quot;id&quot;: 2,
                    &quot;name&quot;: &quot;Room 2&quot;,
                    &quot;monthly_rent&quot;: &quot;1154.00&quot;,
                    &quot;last_update_by_admin&quot;: {
                        &quot;id&quot;: 1,
                        &quot;user&quot;: {
                            &quot;id&quot;: 1,
                            &quot;first_name&quot;: &quot;Tamer&quot;,
                            &quot;last_name&quot;: &quot;Ashrifa&quot;,
                            &quot;email&quot;: &quot;tamrashryft@gmail.com&quot;,
                            &quot;phone&quot;: &quot;0988138665&quot;,
                            &quot;date_of_birth&quot;: &quot;2004-06-11T21:00:00.000000Z&quot;,
                            &quot;gender&quot;: &quot;Male&quot;,
                            &quot;photo&quot;: null,
                            &quot;username&quot;: &quot;TamerAshrifa&quot;,
                            &quot;role&quot;: &quot;admin&quot;,
                            &quot;email_verified_at&quot;: &quot;2026-06-05T21:10:58.000000Z&quot;,
                            &quot;created_at&quot;: &quot;2026-06-05T21:10:58.000000Z&quot;,
                            &quot;last_update_at&quot;: &quot;2026-06-05T21:11:04.000000Z&quot;
                        },
                        &quot;added_by_admin_id&quot;: null
                    }
                },
                &quot;added_by_admin&quot;: {
                    &quot;id&quot;: 1,
                    &quot;user&quot;: {
                        &quot;id&quot;: 1,
                        &quot;first_name&quot;: &quot;Tamer&quot;,
                        &quot;last_name&quot;: &quot;Ashrifa&quot;,
                        &quot;email&quot;: &quot;tamrashryft@gmail.com&quot;,
                        &quot;phone&quot;: &quot;0988138665&quot;,
                        &quot;date_of_birth&quot;: &quot;2004-06-11T21:00:00.000000Z&quot;,
                        &quot;gender&quot;: &quot;Male&quot;,
                        &quot;photo&quot;: null,
                        &quot;username&quot;: &quot;TamerAshrifa&quot;,
                        &quot;role&quot;: &quot;admin&quot;,
                        &quot;email_verified_at&quot;: &quot;2026-06-05T21:10:58.000000Z&quot;,
                        &quot;created_at&quot;: &quot;2026-06-05T21:10:58.000000Z&quot;,
                        &quot;last_update_at&quot;: &quot;2026-06-05T21:11:04.000000Z&quot;
                    },
                    &quot;added_by_admin_id&quot;: null
                }
            },
            {
                &quot;id&quot;: 5,
                &quot;user&quot;: {
                    &quot;id&quot;: 10,
                    &quot;first_name&quot;: &quot;Abagail Steuber&quot;,
                    &quot;last_name&quot;: &quot;Etha Reynolds&quot;,
                    &quot;email&quot;: &quot;demario.schaefer@example.net&quot;,
                    &quot;phone&quot;: &quot;(956) 585-9365&quot;,
                    &quot;date_of_birth&quot;: &quot;2025-08-16T21:00:00.000000Z&quot;,
                    &quot;gender&quot;: &quot;Male&quot;,
                    &quot;photo&quot;: null,
                    &quot;username&quot;: &quot;considine.clyde&quot;,
                    &quot;role&quot;: &quot;doctor&quot;,
                    &quot;email_verified_at&quot;: null,
                    &quot;created_at&quot;: &quot;2026-06-05T21:11:00.000000Z&quot;,
                    &quot;last_update_at&quot;: &quot;2026-06-05T21:11:04.000000Z&quot;
                },
                &quot;appointment_duration&quot;: 15,
                &quot;room&quot;: {
                    &quot;id&quot;: 5,
                    &quot;name&quot;: &quot;Room 5&quot;,
                    &quot;monthly_rent&quot;: &quot;1884.00&quot;,
                    &quot;last_update_by_admin&quot;: {
                        &quot;id&quot;: 1,
                        &quot;user&quot;: {
                            &quot;id&quot;: 1,
                            &quot;first_name&quot;: &quot;Tamer&quot;,
                            &quot;last_name&quot;: &quot;Ashrifa&quot;,
                            &quot;email&quot;: &quot;tamrashryft@gmail.com&quot;,
                            &quot;phone&quot;: &quot;0988138665&quot;,
                            &quot;date_of_birth&quot;: &quot;2004-06-11T21:00:00.000000Z&quot;,
                            &quot;gender&quot;: &quot;Male&quot;,
                            &quot;photo&quot;: null,
                            &quot;username&quot;: &quot;TamerAshrifa&quot;,
                            &quot;role&quot;: &quot;admin&quot;,
                            &quot;email_verified_at&quot;: &quot;2026-06-05T21:10:58.000000Z&quot;,
                            &quot;created_at&quot;: &quot;2026-06-05T21:10:58.000000Z&quot;,
                            &quot;last_update_at&quot;: &quot;2026-06-05T21:11:04.000000Z&quot;
                        },
                        &quot;added_by_admin_id&quot;: null
                    }
                },
                &quot;added_by_admin&quot;: {
                    &quot;id&quot;: 1,
                    &quot;user&quot;: {
                        &quot;id&quot;: 1,
                        &quot;first_name&quot;: &quot;Tamer&quot;,
                        &quot;last_name&quot;: &quot;Ashrifa&quot;,
                        &quot;email&quot;: &quot;tamrashryft@gmail.com&quot;,
                        &quot;phone&quot;: &quot;0988138665&quot;,
                        &quot;date_of_birth&quot;: &quot;2004-06-11T21:00:00.000000Z&quot;,
                        &quot;gender&quot;: &quot;Male&quot;,
                        &quot;photo&quot;: null,
                        &quot;username&quot;: &quot;TamerAshrifa&quot;,
                        &quot;role&quot;: &quot;admin&quot;,
                        &quot;email_verified_at&quot;: &quot;2026-06-05T21:10:58.000000Z&quot;,
                        &quot;created_at&quot;: &quot;2026-06-05T21:10:58.000000Z&quot;,
                        &quot;last_update_at&quot;: &quot;2026-06-05T21:11:04.000000Z&quot;
                    },
                    &quot;added_by_admin_id&quot;: null
                }
            }
        ]
    }
}

// ⚠ Important Info: The response&#039;s &quot;data&quot; field content would change based on the logged-in user role!</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;result&quot;: &quot;Fail&quot;,
    &quot;message&quot;: {
        &quot;base_message&quot;: &quot;Speciality not found&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-specialities-show--specialityId-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-specialities-show--specialityId-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-specialities-show--specialityId-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-specialities-show--specialityId-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-specialities-show--specialityId-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-specialities-show--specialityId-" data-method="GET"
      data-path="api/specialities/show/{specialityId}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-specialities-show--specialityId-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-specialities-show--specialityId-"
                    onclick="tryItOut('GETapi-specialities-show--specialityId-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-specialities-show--specialityId-"
                    onclick="cancelTryOut('GETapi-specialities-show--specialityId-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-specialities-show--specialityId-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/specialities/show/{specialityId}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-specialities-show--specialityId-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-specialities-show--specialityId-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-specialities-show--specialityId-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>specialityId</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="specialityId"                data-endpoint="GETapi-specialities-show--specialityId-"
               value="17"
               data-component="url">
    <br>
<p>min:1 Example: <code>17</code></p>
            </div>
                    </form>

                    <h2 id="speciality-apis-PUTapi-specialities--specialityId-">Update a Speciality</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<h3>For: Web</h3>
<p>Only admins are allowed to use this API.</p>

<span id="example-requests-PUTapi-specialities--specialityId-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://127.0.0.1:8000/api/specialities/17" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"vmq\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/specialities/17"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "vmq"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-specialities--specialityId-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;result&quot;: &quot;Success&quot;,
    &quot;message&quot;: {
        &quot;base_message&quot;: &quot;No changes detected&quot;
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;result&quot;: &quot;Success&quot;,
    &quot;message&quot;: {
        &quot;base_message&quot;: &quot;Speciality updated successfully&quot;
    },
    &quot;data&quot;: {
        &quot;id&quot;: 17,
        &quot;name&quot;: &quot;ttttooootototott&quot;,
        &quot;added_by_admin&quot;: {
            &quot;id&quot;: 1,
            &quot;user&quot;: {
                &quot;id&quot;: 1,
                &quot;first_name&quot;: &quot;Tamer&quot;,
                &quot;last_name&quot;: &quot;Ashrifa&quot;,
                &quot;email&quot;: &quot;tamrashryft@gmail.com&quot;,
                &quot;phone&quot;: &quot;0988138665&quot;,
                &quot;date_of_birth&quot;: &quot;2004-06-11T21:00:00.000000Z&quot;,
                &quot;gender&quot;: &quot;Male&quot;,
                &quot;photo&quot;: null,
                &quot;username&quot;: &quot;TamerAshrifa&quot;,
                &quot;role&quot;: &quot;admin&quot;,
                &quot;email_verified_at&quot;: &quot;2026-06-05T21:10:58.000000Z&quot;,
                &quot;created_at&quot;: &quot;2026-06-05T21:10:58.000000Z&quot;,
                &quot;last_update_at&quot;: &quot;2026-06-05T21:11:04.000000Z&quot;
            },
            &quot;added_by_admin_id&quot;: null
        }
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;result&quot;: &quot;Fail&quot;,
    &quot;message&quot;: {
        &quot;base_message&quot;: &quot;Speciality not found&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-PUTapi-specialities--specialityId-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-specialities--specialityId-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-specialities--specialityId-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-specialities--specialityId-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-specialities--specialityId-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-specialities--specialityId-" data-method="PUT"
      data-path="api/specialities/{specialityId}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-specialities--specialityId-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-specialities--specialityId-"
                    onclick="tryItOut('PUTapi-specialities--specialityId-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-specialities--specialityId-"
                    onclick="cancelTryOut('PUTapi-specialities--specialityId-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-specialities--specialityId-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/specialities/{specialityId}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="PUTapi-specialities--specialityId-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-specialities--specialityId-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-specialities--specialityId-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>specialityId</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="specialityId"                data-endpoint="PUTapi-specialities--specialityId-"
               value="17"
               data-component="url">
    <br>
<p>min:1 Example: <code>17</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="PUTapi-specialities--specialityId-"
               value="vmq"
               data-component="body">
    <br>
<p>Must be between 2 and 30 characters. Example: <code>vmq</code></p>
        </div>
        </form>

                    <h2 id="speciality-apis-DELETEapi-specialities--specialityId-">Delete a Speciality</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<h3>For: Web</h3>
<p>Only admins are allowed to use this API.</p>

<span id="example-requests-DELETEapi-specialities--specialityId-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://127.0.0.1:8000/api/specialities/17" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/specialities/17"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-specialities--specialityId-">
            <blockquote>
            <p>Example response (204):</p>
        </blockquote>
                <pre>
<code>Empty response</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;result&quot;: &quot;Fail&quot;,
    &quot;message&quot;: {
        &quot;base_message&quot;: &quot;Speciality not found&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-DELETEapi-specialities--specialityId-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-specialities--specialityId-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-specialities--specialityId-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-specialities--specialityId-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-specialities--specialityId-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-specialities--specialityId-" data-method="DELETE"
      data-path="api/specialities/{specialityId}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-specialities--specialityId-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-specialities--specialityId-"
                    onclick="tryItOut('DELETEapi-specialities--specialityId-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-specialities--specialityId-"
                    onclick="cancelTryOut('DELETEapi-specialities--specialityId-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-specialities--specialityId-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/specialities/{specialityId}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="DELETEapi-specialities--specialityId-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-specialities--specialityId-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-specialities--specialityId-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>specialityId</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="specialityId"                data-endpoint="DELETEapi-specialities--specialityId-"
               value="17"
               data-component="url">
    <br>
<p>min:1 Example: <code>17</code></p>
            </div>
                    </form>

            

        
    </div>
    <div class="dark-box">
                    <div class="lang-selector">
                                                        <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                                        <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                            </div>
            </div>
</div>
</body>
</html>
