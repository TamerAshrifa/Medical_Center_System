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
                                                    <li class="tocify-item level-2" data-unique="authentication-apis-POSTapi-r">
                                <a href="#authentication-apis-POSTapi-r">Register New User</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="authentication-apis-POSTapi-v">
                                <a href="#authentication-apis-POSTapi-v">Verify Sent OTP</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="authentication-apis-POSTapi-l">
                                <a href="#authentication-apis-POSTapi-l">Login User</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="authentication-apis-POSTapi-f">
                                <a href="#authentication-apis-POSTapi-f">Forgot Password</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="authentication-apis-POSTapi-re">
                                <a href="#authentication-apis-POSTapi-re">Reset Password</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="authentication-apis-POSTapi-logout">
                                <a href="#authentication-apis-POSTapi-logout">Logout User</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-user-apis" class="tocify-header">
                <li class="tocify-item level-1" data-unique="user-apis">
                    <a href="#user-apis">User APIs</a>
                </li>
                                    <ul id="tocify-subheader-user-apis" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="user-apis-POSTapi-users">
                                <a href="#user-apis-POSTapi-users">Add New User</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="user-apis-GETapi-users--per_page-">
                                <a href="#user-apis-GETapi-users--per_page-">View All Users</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="user-apis-GETapi-users-s--id-">
                                <a href="#user-apis-GETapi-users-s--id-">View a Specified User</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="user-apis-GETapi-users-se--search_word-">
                                <a href="#user-apis-GETapi-users-se--search_word-">Search for a non-roled user
###For: Web
Only admins are allowed to use this API.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="user-apis-PUTapi-users--id-">
                                <a href="#user-apis-PUTapi-users--id-">Update a User</a>
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
                                                                                <li class="tocify-item level-2" data-unique="patient-apis-GETapi-patients-s--id-">
                                <a href="#patient-apis-GETapi-patients-s--id-">Show Specified Patient</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="patient-apis-GETapi-patients-se--search_word-">
                                <a href="#patient-apis-GETapi-patients-se--search_word-">Search for a Patient</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="patient-apis-PUTapi-patients--id-">
                                <a href="#patient-apis-PUTapi-patients--id-">Update Patient</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="patient-apis-DELETEapi-patients--id-">
                                <a href="#patient-apis-DELETEapi-patients--id-">Delete Patient</a>
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
                                                                                <li class="tocify-item level-2" data-unique="room-apis-GETapi-rooms-s--roomId-">
                                <a href="#room-apis-GETapi-rooms-s--roomId-">View a Specified Room</a>
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
                                                                                <li class="tocify-item level-2" data-unique="doctor-apis-GETapi-doctors-s--doctor_id-">
                                <a href="#doctor-apis-GETapi-doctors-s--doctor_id-">View a Specified Doctor</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="doctor-apis-GETapi-doctors-se--search_word-">
                                <a href="#doctor-apis-GETapi-doctors-se--search_word-">Search for a Doctor</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="doctor-apis-PUTapi-doctors--doctor_id-">
                                <a href="#doctor-apis-PUTapi-doctors--doctor_id-">Update a Doctor</a>
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
                                                                                <li class="tocify-item level-2" data-unique="speciality-apis-GETapi-specialities-s--specialityId-">
                                <a href="#speciality-apis-GETapi-specialities-s--specialityId-">View a Specified Speciality</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="speciality-apis-PUTapi-specialities--specialityId-">
                                <a href="#speciality-apis-PUTapi-specialities--specialityId-">Update a Speciality</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="speciality-apis-DELETEapi-specialities--specialityId-">
                                <a href="#speciality-apis-DELETEapi-specialities--specialityId-">Delete a Speciality</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-scheduling-apis" class="tocify-header">
                <li class="tocify-item level-1" data-unique="scheduling-apis">
                    <a href="#scheduling-apis">Scheduling APIs</a>
                </li>
                                    <ul id="tocify-subheader-scheduling-apis" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="scheduling-apis-POSTapi-schedules">
                                <a href="#scheduling-apis-POSTapi-schedules">Creating a Work Scheduling</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="scheduling-apis-GETapi-schedules-WDs">
                                <a href="#scheduling-apis-GETapi-schedules-WDs">View all days of week</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="scheduling-apis-GETapi-schedules-DsWS--with_expired---per_page-">
                                <a href="#scheduling-apis-GETapi-schedules-DsWS--with_expired---per_page-">View all work schedules of all doctors</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="scheduling-apis-GETapi-schedules-MCWS--with_expired---per_page-">
                                <a href="#scheduling-apis-GETapi-schedules-MCWS--with_expired---per_page-">View all work schedules of the medical center</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="scheduling-apis-GETapi-schedules-DWS--doctor_id---with_expired---per_page-">
                                <a href="#scheduling-apis-GETapi-schedules-DWS--doctor_id---with_expired---per_page-">View all work schedules of a specified doctor</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-appointment-apis" class="tocify-header">
                <li class="tocify-item level-1" data-unique="appointment-apis">
                    <a href="#appointment-apis">Appointment APIs</a>
                </li>
                                    <ul id="tocify-subheader-appointment-apis" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="appointment-apis-POSTapi-appointments--doctor_id-">
                                <a href="#appointment-apis-POSTapi-appointments--doctor_id-">View Available Times to book</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="appointment-apis-POSTapi-appointments-s--doctor_id-">
                                <a href="#appointment-apis-POSTapi-appointments-s--doctor_id-">Make Appointment</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="appointment-apis-GETapi-appointments--status---with_expired---per_page-">
                                <a href="#appointment-apis-GETapi-appointments--status---with_expired---per_page-">View all appointments in the system</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="appointment-apis-GETapi-appointments-DA--status---with_expired---per_page---doctor_id-">
                                <a href="#appointment-apis-GETapi-appointments-DA--status---with_expired---per_page---doctor_id-">View all appointments of a specified doctor</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="appointment-apis-GETapi-appointments-PA--status---with_expired---per_page---patient_id-">
                                <a href="#appointment-apis-GETapi-appointments-PA--status---with_expired---per_page---patient_id-">View all appointments of a specified patoent</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="appointment-apis-GETapi-appointments--id-">
                                <a href="#appointment-apis-GETapi-appointments--id-">View a specified appointment</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="appointment-apis-POSTapi-appointments-cA--id-">
                                <a href="#appointment-apis-POSTapi-appointments-cA--id-">Cancel an appointment</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="appointment-apis-POSTapi-appointments-mA--id-">
                                <a href="#appointment-apis-POSTapi-appointments-mA--id-">Make an appointment missed</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="appointment-apis-POSTapi-appointments-aA--id-">
                                <a href="#appointment-apis-POSTapi-appointments-aA--id-">Make an appointment attended</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-visit-apis" class="tocify-header">
                <li class="tocify-item level-1" data-unique="visit-apis">
                    <a href="#visit-apis">Visit APIs</a>
                </li>
                                    <ul id="tocify-subheader-visit-apis" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="visit-apis-GETapi-visits--per_page-">
                                <a href="#visit-apis-GETapi-visits--per_page-">View all visits in the system</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="visit-apis-GETapi-visits-DV--per_page---doctor_id-">
                                <a href="#visit-apis-GETapi-visits-DV--per_page---doctor_id-">View all visits of a specified doctor</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="visit-apis-GETapi-visits-PV--per_page---patient_id-">
                                <a href="#visit-apis-GETapi-visits-PV--per_page---patient_id-">View all visits of a specified patient</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="visit-apis-GETapi-visits-s--id-">
                                <a href="#visit-apis-GETapi-visits-s--id-">View a specified visit</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="visit-apis-POSTapi-visits--id-">
                                <a href="#visit-apis-POSTapi-visits--id-">Update a specified visit</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-medical-record-access-apis-access-permission-apis" class="tocify-header">
                <li class="tocify-item level-1" data-unique="medical-record-access-apis-access-permission-apis">
                    <a href="#medical-record-access-apis-access-permission-apis">Medical Record Access APIs (Access Permission APIs)</a>
                </li>
                                    <ul id="tocify-subheader-medical-record-access-apis-access-permission-apis" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="medical-record-access-apis-access-permission-apis-POSTapi-access--doctor_id---visit_id-">
                                <a href="#medical-record-access-apis-access-permission-apis-POSTapi-access--doctor_id---visit_id-">Grant a new access permission</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="medical-record-access-apis-access-permission-apis-GETapi-access-DA--per_page---with_unactive---doctor_id-">
                                <a href="#medical-record-access-apis-access-permission-apis-GETapi-access-DA--per_page---with_unactive---doctor_id-">View all permission accesses given to a specified doctor</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="medical-record-access-apis-access-permission-apis-GETapi-access-PA--per_page---with_unactive---patient_id-">
                                <a href="#medical-record-access-apis-access-permission-apis-GETapi-access-PA--per_page---with_unactive---patient_id-">View all permission accesses given by a specified patient</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="medical-record-access-apis-access-permission-apis-GETapi-access-VA--per_page---with_unactive---visit_id-">
                                <a href="#medical-record-access-apis-access-permission-apis-GETapi-access-VA--per_page---with_unactive---visit_id-">View all permission accesses to a specified visit</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="medical-record-access-apis-access-permission-apis-POSTapi-access--id-">
                                <a href="#medical-record-access-apis-access-permission-apis-POSTapi-access--id-">Revoke an access permission</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-patient-complaint-apis" class="tocify-header">
                <li class="tocify-item level-1" data-unique="patient-complaint-apis">
                    <a href="#patient-complaint-apis">Patient Complaint APIs</a>
                </li>
                                    <ul id="tocify-subheader-patient-complaint-apis" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="patient-complaint-apis-POSTapi-complaint">
                                <a href="#patient-complaint-apis-POSTapi-complaint">Make a Complaint</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="patient-complaint-apis-GETapi-complaint--patient_id-">
                                <a href="#patient-complaint-apis-GETapi-complaint--patient_id-">View all complaints made by a specified patient</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="patient-complaint-apis-GETapi-complaint-s--id-">
                                <a href="#patient-complaint-apis-GETapi-complaint-s--id-">Show a Patient-Complaint</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="patient-complaint-apis-GETapi-complaint--per_page---with_reviewed-">
                                <a href="#patient-complaint-apis-GETapi-complaint--per_page---with_reviewed-">View all Patients' Complaints</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="patient-complaint-apis-POSTapi-complaint--reply---id-">
                                <a href="#patient-complaint-apis-POSTapi-complaint--reply---id-">Make a Patient-Complaint Reviewed</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-transfer-apis" class="tocify-header">
                <li class="tocify-item level-1" data-unique="transfer-apis">
                    <a href="#transfer-apis">Transfer APIs</a>
                </li>
                                    <ul id="tocify-subheader-transfer-apis" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="transfer-apis-POSTapi-transfer--transfer_id-">
                                <a href="#transfer-apis-POSTapi-transfer--transfer_id-">Make an appointment for a specified transfer</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="transfer-apis-POSTapi-transfer-ch--transfer_id-">
                                <a href="#transfer-apis-POSTapi-transfer-ch--transfer_id-">Make another appointment instead of previous-one for a specified transfer</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="transfer-apis-POSTapi-transfer--patient_id---receiving_doctor_id-">
                                <a href="#transfer-apis-POSTapi-transfer--patient_id---receiving_doctor_id-">Transfer a patient to another doctor</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="transfer-apis-GETapi-transfer-s--id-">
                                <a href="#transfer-apis-GETapi-transfer-s--id-">Show a specified transfer</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="transfer-apis-GETapi-transfer--per_page---with_attended-">
                                <a href="#transfer-apis-GETapi-transfer--per_page---with_attended-">Paginate transfers in the system</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="transfer-apis-GETapi-transfer-aP--with_attended---patient_id-">
                                <a href="#transfer-apis-GETapi-transfer-aP--with_attended---patient_id-">View all transfers of a specified patient</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="transfer-apis-GETapi-transfer-pRef--per_page---with_attended---doctor_id-">
                                <a href="#transfer-apis-GETapi-transfer-pRef--per_page---with_attended---doctor_id-">Paginate transfers sent by a specified doctor</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="transfer-apis-GETapi-transfer-pRec--per_page---with_attended---doctor_id-">
                                <a href="#transfer-apis-GETapi-transfer-pRec--per_page---with_attended---doctor_id-">Paginate received transfers of a specified doctor</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-unavailability-apis" class="tocify-header">
                <li class="tocify-item level-1" data-unique="unavailability-apis">
                    <a href="#unavailability-apis">Unavailability APIs</a>
                </li>
                                    <ul id="tocify-subheader-unavailability-apis" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="unavailability-apis-POSTapi-unavailability">
                                <a href="#unavailability-apis-POSTapi-unavailability">Create an unavailability</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="unavailability-apis-GETapi-unavailability--with_passed---per_page-">
                                <a href="#unavailability-apis-GETapi-unavailability--with_passed---per_page-">Paginate unavailabilities of all doctors</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="unavailability-apis-GETapi-unavailability--with_passed---per_page---doctor_id-">
                                <a href="#unavailability-apis-GETapi-unavailability--with_passed---per_page---doctor_id-">Paginate unavailabilities of a specified doctor</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="unavailability-apis-GETapi-unavailability-m--with_passed---per_page-">
                                <a href="#unavailability-apis-GETapi-unavailability-m--with_passed---per_page-">Paginate unavailabilities of the medical center</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-doctor-speciality-apis" class="tocify-header">
                <li class="tocify-item level-1" data-unique="doctor-speciality-apis">
                    <a href="#doctor-speciality-apis">Doctor_Speciality APIs</a>
                </li>
                                    <ul id="tocify-subheader-doctor-speciality-apis" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="doctor-speciality-apis-POSTapi-dSpecialities">
                                <a href="#doctor-speciality-apis-POSTapi-dSpecialities">Add New Speciality to a Doctor</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="doctor-speciality-apis-GETapi-dSpecialities--per_page-">
                                <a href="#doctor-speciality-apis-GETapi-dSpecialities--per_page-">Paginate Doctors' Specialities</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="doctor-speciality-apis-GETapi-dSpecialities-IFD--doctor_id-">
                                <a href="#doctor-speciality-apis-GETapi-dSpecialities-IFD--doctor_id-">All Specialities of a Doctor</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="doctor-speciality-apis-GETapi-dSpecialities-IFS--speciality_id-">
                                <a href="#doctor-speciality-apis-GETapi-dSpecialities-IFS--speciality_id-">All Doctors of a Speciality</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="doctor-speciality-apis-GETapi-dSpecialities-s--id-">
                                <a href="#doctor-speciality-apis-GETapi-dSpecialities-s--id-">View a Specified Doctor-Speciality</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="doctor-speciality-apis-PUTapi-dSpecialities--id-">
                                <a href="#doctor-speciality-apis-PUTapi-dSpecialities--id-">Update a Speciality of a Doctor</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="doctor-speciality-apis-DELETEapi-dSpecialities--id-">
                                <a href="#doctor-speciality-apis-DELETEapi-dSpecialities--id-">Delete a Speciality from a Doctor Specialities</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-endpoints" class="tocify-header">
                <li class="tocify-item level-1" data-unique="endpoints">
                    <a href="#endpoints">Endpoints</a>
                </li>
                                    <ul id="tocify-subheader-endpoints" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="endpoints-GETapi-admins--search_word-">
                                <a href="#endpoints-GETapi-admins--search_word-">Search for a admin</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-admins--user_id-">
                                <a href="#endpoints-POSTapi-admins--user_id-">Add New admin</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-admins-u--id-">
                                <a href="#endpoints-POSTapi-admins-u--id-">Unactive an admin</a>
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
        <li>Last updated: July 5, 2026</li>
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

                                <h2 id="authentication-apis-POSTapi-r">Register New User</h2>

<p>
</p>

<h3>For: Mobile (Patient)</h3>

<span id="example-requests-POSTapi-r">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/api/r" \
    --header "Content-Type: multipart/form-data" \
    --header "Accept: application/json" \
    --form "first_name=vmq"\
    --form "last_name=eop"\
    --form "email=russel.bert@example.net"\
    --form "password=dl4m{o,+"\
    --form "phone=+963999999999"\
    --form "date_of_birth=2004-06-14"\
    --form "gender="\
    --form "username=mqeopfuudtdsufvyv"\
    --form "password_confirmation=consequatur"\
    --form "photo=@C:\Users\USER\AppData\Local\Temp\phpD1FD.tmp" </code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/r"
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
body.append('username', 'mqeopfuudtdsufvyv');
body.append('password_confirmation', 'consequatur');
body.append('photo', document.querySelector('input[name="photo"]').files[0]);

fetch(url, {
    method: "POST",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-r">
            <blockquote>
            <p>Example response (201):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;did_succeed&quot;: true,
    &quot;message&quot;: &quot;OTP-Code was sent to tamrashryft2@gmail.com successfully, please check your inbox&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-r" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-r"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-r"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-r" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-r">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-r" data-method="POST"
      data-path="api/r"
      data-authed="0"
      data-hasfiles="1"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-r', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-r"
                    onclick="tryItOut('POSTapi-r');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-r"
                    onclick="cancelTryOut('POSTapi-r');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-r"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/r</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-r"
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
                              name="Accept"                data-endpoint="POSTapi-r"
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
                              name="first_name"                data-endpoint="POSTapi-r"
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
                              name="last_name"                data-endpoint="POSTapi-r"
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
                              name="email"                data-endpoint="POSTapi-r"
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
                              name="password"                data-endpoint="POSTapi-r"
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
                              name="phone"                data-endpoint="POSTapi-r"
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
                              name="date_of_birth"                data-endpoint="POSTapi-r"
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
                <label data-endpoint="POSTapi-r" style="display: none">
            <input type="radio" name="gender"
                   value="true"
                   data-endpoint="POSTapi-r"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="POSTapi-r" style="display: none">
            <input type="radio" name="gender"
                   value="false"
                   data-endpoint="POSTapi-r"
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
                              name="username"                data-endpoint="POSTapi-r"
               value="mqeopfuudtdsufvyv"
               data-component="body">
    <br>
<p>Must not be greater than 20 characters. Example: <code>mqeopfuudtdsufvyv</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>photo</code></b>&nbsp;&nbsp;
<small>file</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="file" style="display: none"
                              name="photo"                data-endpoint="POSTapi-r"
               value=""
               data-component="body">
    <br>
<p>Must be an image. Must not be greater than 2048 kilobytes. Example: <code>C:\Users\USER\AppData\Local\Temp\phpD1FD.tmp</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password_confirmation</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="password_confirmation"                data-endpoint="POSTapi-r"
               value="consequatur"
               data-component="body">
    <br>
<p>Must be as same as the entered password. Example: <code>consequatur</code></p>
        </div>
        </form>

                    <h2 id="authentication-apis-POSTapi-v">Verify Sent OTP</h2>

<p>
</p>

<h3>For: Mobile (Patient - Doctor), Web</h3>

<span id="example-requests-POSTapi-v">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/api/v" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"email\": \"qkunze@example.com\",
    \"otp_code\": 17
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/v"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "qkunze@example.com",
    "otp_code": 17
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-v">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;did_succeed&quot;: true,
    &quot;message&quot;: &quot;Email verified successfully&quot;,
    &quot;token_or_reset_token&quot;: &quot;5|9cc4ues9eb6rAXxanCXiPxICZcUFK6PgMl7IxcXXf287c850&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;did_succeed&quot;: true,
    &quot;message&quot;: &quot;OTP-Code verified successfully, you can now reset your password&quot;,
    &quot;token_or_reset_token&quot;: &quot;$2y$12$5MftcDSWXj5UTaxuYL3eTOI2iP6G6jSZ5Rv30Hvc6gh8OKvl.0j/K&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (400):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;did_succeed&quot;: false,
    &quot;message&quot;: &quot;Invalid OTP-Code&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (400):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;did_succeed&quot;: false,
    &quot;message&quot;: &quot;Sorry, this OTP-Code has expired, a new one was sent to your email, please check your inbox&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (400):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;did_succeed&quot;: false,
    &quot;message&quot;: &quot;Email is already verified, you can login&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-v" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v" data-method="POST"
      data-path="api/v"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v"
                    onclick="tryItOut('POSTapi-v');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v"
                    onclick="cancelTryOut('POSTapi-v');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-v"
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
                              name="Accept"                data-endpoint="POSTapi-v"
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
                              name="email"                data-endpoint="POSTapi-v"
               value="qkunze@example.com"
               data-component="body">
    <br>
<p>Must be a valid email address. Must not be greater than 75 characters. Example: <code>qkunze@example.com</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>otp_code</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="otp_code"                data-endpoint="POSTapi-v"
               value="17"
               data-component="body">
    <br>
<p>Example: <code>17</code></p>
        </div>
        </form>

                    <h2 id="authentication-apis-POSTapi-l">Login User</h2>

<p>
</p>

<h3>For: Mobile (Patient - Doctor), Web</h3>

<span id="example-requests-POSTapi-l">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/api/l" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"email_or_username\": \"vmqeopfuudtdsufvyvddq\",
    \"password\": \"OP&gt;@;4\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/l"
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

<span id="example-responses-POSTapi-l">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;did_succeed&quot;: true,
    &quot;message&quot;: &quot;OTP-Code was sent to tamrashryft2@gmail.com successfully, please check your inbox&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (400):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;did_succeed&quot;: false,
    &quot;message&quot;: &quot;Wrong email or password; Or the email is not verified, OTP-Code was sent to your email, please check your inbox&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-l" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-l"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-l"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-l" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-l">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-l" data-method="POST"
      data-path="api/l"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-l', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-l"
                    onclick="tryItOut('POSTapi-l');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-l"
                    onclick="cancelTryOut('POSTapi-l');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-l"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/l</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-l"
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
                              name="Accept"                data-endpoint="POSTapi-l"
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
                              name="email_or_username"                data-endpoint="POSTapi-l"
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
                              name="password"                data-endpoint="POSTapi-l"
               value="OP>@;4"
               data-component="body">
    <br>
<p>Must be at least 8 characters. Example: <code>OP&gt;@;4</code></p>
        </div>
        </form>

                    <h2 id="authentication-apis-POSTapi-f">Forgot Password</h2>

<p>
</p>

<h3>For: Mobile (Patient - Doctor), Web</h3>

<span id="example-requests-POSTapi-f">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/api/f" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"email\": \"qkunze@example.com\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/f"
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

<span id="example-responses-POSTapi-f">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;did_succeed&quot;: true,
    &quot;message&quot;: &quot;If the email exists, an OTP-Code was sent to it successfully, please check your gmail&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-f" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-f"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-f"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-f" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-f">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-f" data-method="POST"
      data-path="api/f"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-f', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-f"
                    onclick="tryItOut('POSTapi-f');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-f"
                    onclick="cancelTryOut('POSTapi-f');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-f"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/f</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-f"
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
                              name="Accept"                data-endpoint="POSTapi-f"
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
                              name="email"                data-endpoint="POSTapi-f"
               value="qkunze@example.com"
               data-component="body">
    <br>
<p>Must be a valid email address. Must not be greater than 75 characters. Example: <code>qkunze@example.com</code></p>
        </div>
        </form>

                    <h2 id="authentication-apis-POSTapi-re">Reset Password</h2>

<p>
</p>

<h3>For: Mobile (Patient - Doctor), Web</h3>

<span id="example-requests-POSTapi-re">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/api/re" \
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
    "http://127.0.0.1:8000/api/re"
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

<span id="example-responses-POSTapi-re">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;did_succeed&quot;: true,
    &quot;message&quot;: &quot;Your password was updated successfully&quot;,
    &quot;token&quot;: &quot;6|1rbJvOIdEoHxeSKIiT6L66vnQqvBrtXFIRaxDJApa25692ae&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (400):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;did_succeed&quot;: false,
    &quot;message&quot;: &quot;Invalid reset-token&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (400):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;did_succeed&quot;: false,
    &quot;message&quot;: &quot;Sorry, the reset-token has expired, a new OTP-Code was sent to your email, please check your inbox&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-re" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-re"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-re"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-re" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-re">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-re" data-method="POST"
      data-path="api/re"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-re', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-re"
                    onclick="tryItOut('POSTapi-re');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-re"
                    onclick="cancelTryOut('POSTapi-re');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-re"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/re</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-re"
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
                              name="Accept"                data-endpoint="POSTapi-re"
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
                              name="email"                data-endpoint="POSTapi-re"
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
                              name="reset_token"                data-endpoint="POSTapi-re"
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
                              name="new_password"                data-endpoint="POSTapi-re"
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
                              name="password_confirmation"                data-endpoint="POSTapi-re"
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
    &quot;did_succeed&quot;: true,
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

                <h1 id="user-apis">User APIs</h1>

    

                                <h2 id="user-apis-POSTapi-users">Add New User</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<h3>For: Web</h3>
<p>Only admins are allowed to use this API. There is a middleware CheckAdmin on this API route</p>

<span id="example-requests-POSTapi-users">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/api/users" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: multipart/form-data" \
    --header "Accept: application/json" \
    --form "first_name=vmq"\
    --form "last_name=eop"\
    --form "email=russel.bert@example.net"\
    --form "password=dl4m{o,+"\
    --form "phone=qamniihfqcoynlazg"\
    --form "date_of_birth=2020-10-30"\
    --form "gender=1"\
    --form "username=mqeopfuudtdsufvyv"\
    --form "photo=@C:\Users\USER\AppData\Local\Temp\phpD4CD.tmp" </code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/users"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
};

const body = new FormData();
body.append('first_name', 'vmq');
body.append('last_name', 'eop');
body.append('email', 'russel.bert@example.net');
body.append('password', 'dl4m{o,+');
body.append('phone', 'qamniihfqcoynlazg');
body.append('date_of_birth', '2020-10-30');
body.append('gender', '1');
body.append('username', 'mqeopfuudtdsufvyv');
body.append('photo', document.querySelector('input[name="photo"]').files[0]);

fetch(url, {
    method: "POST",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-users">
</span>
<span id="execution-results-POSTapi-users" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-users"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-users"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-users" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-users">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-users" data-method="POST"
      data-path="api/users"
      data-authed="1"
      data-hasfiles="1"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-users', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-users"
                    onclick="tryItOut('POSTapi-users');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-users"
                    onclick="cancelTryOut('POSTapi-users');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-users"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/users</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-users"
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
                              name="Content-Type"                data-endpoint="POSTapi-users"
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
                              name="Accept"                data-endpoint="POSTapi-users"
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
                              name="first_name"                data-endpoint="POSTapi-users"
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
                              name="last_name"                data-endpoint="POSTapi-users"
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
                              name="email"                data-endpoint="POSTapi-users"
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
                              name="password"                data-endpoint="POSTapi-users"
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
                              name="phone"                data-endpoint="POSTapi-users"
               value="qamniihfqcoynlazg"
               data-component="body">
    <br>
<p>Must not be greater than 20 characters. Example: <code>qamniihfqcoynlazg</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>date_of_birth</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="date_of_birth"                data-endpoint="POSTapi-users"
               value="2020-10-30"
               data-component="body">
    <br>
<p>Must be a valid date in the format <code>Y-m-d</code>. Must be a date before <code>2026-07-05</code>. Example: <code>2020-10-30</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>gender</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
 &nbsp;
 &nbsp;
                <label data-endpoint="POSTapi-users" style="display: none">
            <input type="radio" name="gender"
                   value="true"
                   data-endpoint="POSTapi-users"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="POSTapi-users" style="display: none">
            <input type="radio" name="gender"
                   value="false"
                   data-endpoint="POSTapi-users"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Example: <code>true</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>username</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="username"                data-endpoint="POSTapi-users"
               value="mqeopfuudtdsufvyv"
               data-component="body">
    <br>
<p>Must not be greater than 20 characters. Example: <code>mqeopfuudtdsufvyv</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>photo</code></b>&nbsp;&nbsp;
<small>file</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="file" style="display: none"
                              name="photo"                data-endpoint="POSTapi-users"
               value=""
               data-component="body">
    <br>
<p>Must be an image. Must not be greater than 2048 kilobytes. Example: <code>C:\Users\USER\AppData\Local\Temp\phpD4CD.tmp</code></p>
        </div>
        </form>

                    <h2 id="user-apis-GETapi-users--per_page-">View All Users</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<h3>For: Web</h3>
<p>Only admins are allowed to use this API. There is a middleware CheckAdmin on this API route</p>

<span id="example-requests-GETapi-users--per_page-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/users/17" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/users/17"
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

<span id="example-responses-GETapi-users--per_page-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;did_succeed&quot;: false,
    &quot;message&quot;: {
        &quot;base_message&quot;: &quot;Unauthenticated; A valid token is required&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-users--per_page-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-users--per_page-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-users--per_page-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-users--per_page-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-users--per_page-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-users--per_page-" data-method="GET"
      data-path="api/users/{per_page}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-users--per_page-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-users--per_page-"
                    onclick="tryItOut('GETapi-users--per_page-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-users--per_page-"
                    onclick="cancelTryOut('GETapi-users--per_page-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-users--per_page-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/users/{per_page}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-users--per_page-"
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
                              name="Content-Type"                data-endpoint="GETapi-users--per_page-"
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
                              name="Accept"                data-endpoint="GETapi-users--per_page-"
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
               step="any"               name="per_page"                data-endpoint="GETapi-users--per_page-"
               value="17"
               data-component="url">
    <br>
<p>The number of rooms shown in each page. Defaults to 10. Example: <code>17</code></p>
            </div>
                    </form>

                    <h2 id="user-apis-GETapi-users-s--id-">View a Specified User</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<h3>For: Mobile(Patient - Doctor), Web</h3>
<p>Everyone in the system is allowed to use this API.</p>
<h3>⚠ Important Info: The response's "data" field content would change based on the logged-in user role!</h3>

<span id="example-requests-GETapi-users-s--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/users/s/17" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/users/s/17"
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

<span id="example-responses-GETapi-users-s--id-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;did_succeed&quot;: false,
    &quot;message&quot;: {
        &quot;base_message&quot;: &quot;Unauthenticated; A valid token is required&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-users-s--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-users-s--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-users-s--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-users-s--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-users-s--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-users-s--id-" data-method="GET"
      data-path="api/users/s/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-users-s--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-users-s--id-"
                    onclick="tryItOut('GETapi-users-s--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-users-s--id-"
                    onclick="cancelTryOut('GETapi-users-s--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-users-s--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/users/s/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-users-s--id-"
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
                              name="Content-Type"                data-endpoint="GETapi-users-s--id-"
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
                              name="Accept"                data-endpoint="GETapi-users-s--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-users-s--id-"
               value="17"
               data-component="url">
    <br>
<p>min:1 Example: <code>17</code></p>
            </div>
                    </form>

                    <h2 id="user-apis-GETapi-users-se--search_word-">Search for a non-roled user
###For: Web
Only admins are allowed to use this API.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>This API is to search for a non-roled user by first_name, returns a collection of non-roled users have similar first_name; This API is used when adding a (Patient - Doctor - Admin) to link them with a specified non-roled user</p>

<span id="example-requests-GETapi-users-se--search_word-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/users/se/consequatur" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/users/se/consequatur"
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

<span id="example-responses-GETapi-users-se--search_word-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;did_succeed&quot;: false,
    &quot;message&quot;: {
        &quot;base_message&quot;: &quot;Unauthenticated; A valid token is required&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-users-se--search_word-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-users-se--search_word-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-users-se--search_word-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-users-se--search_word-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-users-se--search_word-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-users-se--search_word-" data-method="GET"
      data-path="api/users/se/{search_word}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-users-se--search_word-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-users-se--search_word-"
                    onclick="tryItOut('GETapi-users-se--search_word-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-users-se--search_word-"
                    onclick="cancelTryOut('GETapi-users-se--search_word-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-users-se--search_word-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/users/se/{search_word}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-users-se--search_word-"
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
                              name="Content-Type"                data-endpoint="GETapi-users-se--search_word-"
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
                              name="Accept"                data-endpoint="GETapi-users-se--search_word-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>search_word</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="search_word"                data-endpoint="GETapi-users-se--search_word-"
               value="consequatur"
               data-component="url">
    <br>
<p>Example: <code>consequatur</code></p>
            </div>
                    </form>

                    <h2 id="user-apis-PUTapi-users--id-">Update a User</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<h3>For: Mobile(Patient - Doctor), Web</h3>
<p>Everyone in the system is allowed to use this API.</p>

<span id="example-requests-PUTapi-users--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://127.0.0.1:8000/api/users/17" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: multipart/form-data" \
    --header "Accept: application/json" \
    --form "first_name=vmq"\
    --form "last_name=eop"\
    --form "phone=fuudtdsufvyvddqam"\
    --form "date_of_birth=2026-07-05"\
    --form "gender="\
    --form "username=niihfqcoynlazghdt"\
    --form "photo=@C:\Users\USER\AppData\Local\Temp\phpDA0D.tmp" </code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/users/17"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
};

const body = new FormData();
body.append('first_name', 'vmq');
body.append('last_name', 'eop');
body.append('phone', 'fuudtdsufvyvddqam');
body.append('date_of_birth', '2026-07-05');
body.append('gender', '');
body.append('username', 'niihfqcoynlazghdt');
body.append('photo', document.querySelector('input[name="photo"]').files[0]);

fetch(url, {
    method: "PUT",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-users--id-">
</span>
<span id="execution-results-PUTapi-users--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-users--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-users--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-users--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-users--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-users--id-" data-method="PUT"
      data-path="api/users/{id}"
      data-authed="1"
      data-hasfiles="1"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-users--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-users--id-"
                    onclick="tryItOut('PUTapi-users--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-users--id-"
                    onclick="cancelTryOut('PUTapi-users--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-users--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/users/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="PUTapi-users--id-"
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
                              name="Content-Type"                data-endpoint="PUTapi-users--id-"
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
                              name="Accept"                data-endpoint="PUTapi-users--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PUTapi-users--id-"
               value="17"
               data-component="url">
    <br>
<p>min:1 Example: <code>17</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>first_name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="first_name"                data-endpoint="PUTapi-users--id-"
               value="vmq"
               data-component="body">
    <br>
<p>Must be between 2 and 50 characters. Example: <code>vmq</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>last_name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="last_name"                data-endpoint="PUTapi-users--id-"
               value="eop"
               data-component="body">
    <br>
<p>Must be between 2 and 50 characters. Example: <code>eop</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>phone</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="phone"                data-endpoint="PUTapi-users--id-"
               value="fuudtdsufvyvddqam"
               data-component="body">
    <br>
<p>Must not be greater than 20 characters. Example: <code>fuudtdsufvyvddqam</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>date_of_birth</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="date_of_birth"                data-endpoint="PUTapi-users--id-"
               value="2026-07-05"
               data-component="body">
    <br>
<p>Must be a valid date in the format <code>Y-m-d</code>. Example: <code>2026-07-05</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>gender</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <label data-endpoint="PUTapi-users--id-" style="display: none">
            <input type="radio" name="gender"
                   value="true"
                   data-endpoint="PUTapi-users--id-"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="PUTapi-users--id-" style="display: none">
            <input type="radio" name="gender"
                   value="false"
                   data-endpoint="PUTapi-users--id-"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Example: <code>false</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>username</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="username"                data-endpoint="PUTapi-users--id-"
               value="niihfqcoynlazghdt"
               data-component="body">
    <br>
<p>Must not be greater than 20 characters. Example: <code>niihfqcoynlazghdt</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>photo</code></b>&nbsp;&nbsp;
<small>file</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="file" style="display: none"
                              name="photo"                data-endpoint="PUTapi-users--id-"
               value=""
               data-component="body">
    <br>
<p>Must be an image. Must not be greater than 2048 kilobytes. Example: <code>C:\Users\USER\AppData\Local\Temp\phpDA0D.tmp</code></p>
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
    &quot;did_succeed&quot;: true,
    &quot;message&quot;: {
        &quot;did_succeed&quot;: true,
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

                    <h2 id="patient-apis-GETapi-patients-s--id-">Show Specified Patient</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<h3>For: Mobile (Patient, Doctor), Web</h3>
<p>Everyone in the system can use this API, but patients can only see their own information</p>
<h3>⚠ Important Info: The response's "data" field content would change based on the logged-in user role!</h3>

<span id="example-requests-GETapi-patients-s--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/patients/s/17" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/patients/s/17"
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

<span id="example-responses-GETapi-patients-s--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;did_succeed&quot;: true,
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
    &quot;did_succeed&quot;: false,
    &quot;message&quot;: &quot;Patients can&#039;t see other patients information&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;did_succeed&quot;: false,
    &quot;data&quot;: &quot;Patient not found&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-patients-s--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-patients-s--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-patients-s--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-patients-s--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-patients-s--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-patients-s--id-" data-method="GET"
      data-path="api/patients/s/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-patients-s--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-patients-s--id-"
                    onclick="tryItOut('GETapi-patients-s--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-patients-s--id-"
                    onclick="cancelTryOut('GETapi-patients-s--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-patients-s--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/patients/s/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-patients-s--id-"
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
                              name="Content-Type"                data-endpoint="GETapi-patients-s--id-"
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
                              name="Accept"                data-endpoint="GETapi-patients-s--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-patients-s--id-"
               value="17"
               data-component="url">
    <br>
<p>min:1 Example: <code>17</code></p>
            </div>
                    </form>

                    <h2 id="patient-apis-GETapi-patients-se--search_word-">Search for a Patient</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<h3>For: Mobile(Doctor), Web</h3>
<p>Only Doctors and Admins are allowed to use this API.
This API is to search for a patient by first_name, returns a collection of patients have similar first_name</p>

<span id="example-requests-GETapi-patients-se--search_word-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/patients/se/consequatur" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/patients/se/consequatur"
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

<span id="example-responses-GETapi-patients-se--search_word-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;did_succeed&quot;: false,
    &quot;message&quot;: {
        &quot;base_message&quot;: &quot;Unauthenticated; A valid token is required&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-patients-se--search_word-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-patients-se--search_word-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-patients-se--search_word-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-patients-se--search_word-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-patients-se--search_word-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-patients-se--search_word-" data-method="GET"
      data-path="api/patients/se/{search_word}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-patients-se--search_word-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-patients-se--search_word-"
                    onclick="tryItOut('GETapi-patients-se--search_word-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-patients-se--search_word-"
                    onclick="cancelTryOut('GETapi-patients-se--search_word-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-patients-se--search_word-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/patients/se/{search_word}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-patients-se--search_word-"
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
                              name="Content-Type"                data-endpoint="GETapi-patients-se--search_word-"
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
                              name="Accept"                data-endpoint="GETapi-patients-se--search_word-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>search_word</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="search_word"                data-endpoint="GETapi-patients-se--search_word-"
               value="consequatur"
               data-component="url">
    <br>
<p>Example: <code>consequatur</code></p>
            </div>
                    </form>

                    <h2 id="patient-apis-PUTapi-patients--id-">Update Patient</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<h3>For: Mobile (Patient)</h3>
<p>Only patients are allowed to use this API.</p>

<span id="example-requests-PUTapi-patients--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://127.0.0.1:8000/api/patients/consequatur" \
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
    "http://127.0.0.1:8000/api/patients/consequatur"
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

<span id="example-responses-PUTapi-patients--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;did_succeed&quot;: true,
    &quot;data&quot;: &quot;No changes detected&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
  &quot;did_succeed&quot;: true,
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
    },
    &quot;blood_type_id&quot;: {
      &quot;id&quot;: 1,
      &quot;name&quot;: &quot;Not_Determined&quot;
    }
  }
}</code>
 </pre>
            <blockquote>
            <p>Example response (403):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;did_succeed&quot;: false,
    &quot;message&quot;: &quot;Patients can&#039;t update other patients information&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;did_succeed&quot;: false,
    &quot;data&quot;: &quot;Patient not found&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-PUTapi-patients--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-patients--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-patients--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-patients--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-patients--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-patients--id-" data-method="PUT"
      data-path="api/patients/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-patients--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-patients--id-"
                    onclick="tryItOut('PUTapi-patients--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-patients--id-"
                    onclick="cancelTryOut('PUTapi-patients--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-patients--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/patients/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="PUTapi-patients--id-"
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
                              name="Content-Type"                data-endpoint="PUTapi-patients--id-"
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
                              name="Accept"                data-endpoint="PUTapi-patients--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="PUTapi-patients--id-"
               value="consequatur"
               data-component="url">
    <br>
<p>The ID of the patient. Example: <code>consequatur</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>patientId</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="patientId"                data-endpoint="PUTapi-patients--id-"
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
               step="any"               name="blood_type_id"                data-endpoint="PUTapi-patients--id-"
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
                              name="allergies"                data-endpoint="PUTapi-patients--id-"
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
                              name="chronic_diseases"                data-endpoint="PUTapi-patients--id-"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
        </form>

                    <h2 id="patient-apis-DELETEapi-patients--id-">Delete Patient</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<h3>For: Web</h3>
<p>Only admins are allowed to use this API.</p>

<span id="example-requests-DELETEapi-patients--id-">
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

<span id="example-responses-DELETEapi-patients--id-">
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
    &quot;did_succeed&quot;: false,
    &quot;data&quot;: &quot;Patient not found&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-DELETEapi-patients--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-patients--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-patients--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-patients--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-patients--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-patients--id-" data-method="DELETE"
      data-path="api/patients/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-patients--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-patients--id-"
                    onclick="tryItOut('DELETEapi-patients--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-patients--id-"
                    onclick="cancelTryOut('DELETEapi-patients--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-patients--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/patients/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="DELETEapi-patients--id-"
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
                              name="Content-Type"                data-endpoint="DELETEapi-patients--id-"
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
                              name="Accept"                data-endpoint="DELETEapi-patients--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="DELETEapi-patients--id-"
               value="17"
               data-component="url">
    <br>
<p>Example: <code>17</code></p>
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
    &quot;did_succeed&quot;: true,
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
    &quot;did_succeed&quot;: true,
    &quot;message&quot;: {
        &quot;did_succeed&quot;: true,
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

                    <h2 id="room-apis-GETapi-rooms-s--roomId-">View a Specified Room</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<h3>For: Mobile(Patient - Doctor), Web</h3>
<p>Everyone in the system is allowed to use this API.</p>
<h3>⚠ Important Info: The response's "data" field content would change based on the logged-in user role!</h3>

<span id="example-requests-GETapi-rooms-s--roomId-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/rooms/s/17" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/rooms/s/17"
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

<span id="example-responses-GETapi-rooms-s--roomId-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;did_succeed&quot;: true,
    &quot;data&quot;: {
        &quot;id&quot;: 3,
        &quot;name&quot;: &quot;Room 3&quot;
    }
}

// ⚠ Important Info: The previous example was for a patient logged-in, if an admin was logged-in, the previous response&#039;s data would be like:
//{
//    &quot;did_succeed&quot;: true,
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
    &quot;did_succeed&quot;: false,
    &quot;message&quot;: {
        &quot;base_message&quot;: &quot;Room not found&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-rooms-s--roomId-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-rooms-s--roomId-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-rooms-s--roomId-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-rooms-s--roomId-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-rooms-s--roomId-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-rooms-s--roomId-" data-method="GET"
      data-path="api/rooms/s/{roomId}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-rooms-s--roomId-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-rooms-s--roomId-"
                    onclick="tryItOut('GETapi-rooms-s--roomId-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-rooms-s--roomId-"
                    onclick="cancelTryOut('GETapi-rooms-s--roomId-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-rooms-s--roomId-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/rooms/s/{roomId}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-rooms-s--roomId-"
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
                              name="Content-Type"                data-endpoint="GETapi-rooms-s--roomId-"
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
                              name="Accept"                data-endpoint="GETapi-rooms-s--roomId-"
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
               step="any"               name="roomId"                data-endpoint="GETapi-rooms-s--roomId-"
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
    &quot;did_succeed&quot;: true,
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
    &quot;did_succeed&quot;: true,
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
    &quot;did_succeed&quot;: false,
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
    &quot;did_succeed&quot;: false,
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
    &quot;did_succeed&quot;: true,
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
    &quot;did_succeed&quot;: false,
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
    &quot;did_succeed&quot;: true,
    &quot;message&quot;: {
        &quot;did_succeed&quot;: true,
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

                    <h2 id="doctor-apis-GETapi-doctors-s--doctor_id-">View a Specified Doctor</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<h3>For: Mobile(Patient - Doctor), Web</h3>
<p>Everyone in the system is allowed to use this API.</p>
<h3>⚠ Important Info: The response's "data" field content would change based on the logged-in user role!</h3>

<span id="example-requests-GETapi-doctors-s--doctor_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/doctors/s/17" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/doctors/s/17"
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

<span id="example-responses-GETapi-doctors-s--doctor_id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;did_succeed&quot;: true,
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
    &quot;did_succeed&quot;: false,
    &quot;message&quot;: {
        &quot;base_message&quot;: &quot;Doctor not found&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-doctors-s--doctor_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-doctors-s--doctor_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-doctors-s--doctor_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-doctors-s--doctor_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-doctors-s--doctor_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-doctors-s--doctor_id-" data-method="GET"
      data-path="api/doctors/s/{doctor_id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-doctors-s--doctor_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-doctors-s--doctor_id-"
                    onclick="tryItOut('GETapi-doctors-s--doctor_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-doctors-s--doctor_id-"
                    onclick="cancelTryOut('GETapi-doctors-s--doctor_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-doctors-s--doctor_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/doctors/s/{doctor_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-doctors-s--doctor_id-"
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
                              name="Content-Type"                data-endpoint="GETapi-doctors-s--doctor_id-"
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
                              name="Accept"                data-endpoint="GETapi-doctors-s--doctor_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>doctor_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="doctor_id"                data-endpoint="GETapi-doctors-s--doctor_id-"
               value="17"
               data-component="url">
    <br>
<p>Example: <code>17</code></p>
            </div>
                    </form>

                    <h2 id="doctor-apis-GETapi-doctors-se--search_word-">Search for a Doctor</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<h3>For: Mobile(Patient - Doctor), Web</h3>
<p>Everyone in the system is allowed to use this API.
This API is to search for a doctor by first_name, returns a collection of doctors have similar first_name</p>

<span id="example-requests-GETapi-doctors-se--search_word-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/doctors/se/consequatur" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/doctors/se/consequatur"
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

<span id="example-responses-GETapi-doctors-se--search_word-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;did_succeed&quot;: false,
    &quot;message&quot;: {
        &quot;base_message&quot;: &quot;Unauthenticated; A valid token is required&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-doctors-se--search_word-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-doctors-se--search_word-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-doctors-se--search_word-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-doctors-se--search_word-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-doctors-se--search_word-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-doctors-se--search_word-" data-method="GET"
      data-path="api/doctors/se/{search_word}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-doctors-se--search_word-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-doctors-se--search_word-"
                    onclick="tryItOut('GETapi-doctors-se--search_word-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-doctors-se--search_word-"
                    onclick="cancelTryOut('GETapi-doctors-se--search_word-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-doctors-se--search_word-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/doctors/se/{search_word}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-doctors-se--search_word-"
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
                              name="Content-Type"                data-endpoint="GETapi-doctors-se--search_word-"
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
                              name="Accept"                data-endpoint="GETapi-doctors-se--search_word-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>search_word</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="search_word"                data-endpoint="GETapi-doctors-se--search_word-"
               value="consequatur"
               data-component="url">
    <br>
<p>Example: <code>consequatur</code></p>
            </div>
                    </form>

                    <h2 id="doctor-apis-PUTapi-doctors--doctor_id-">Update a Doctor</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<h3>For: Mobile(Doctor)</h3>
<p>Only doctors are allowed to use this API.</p>

<span id="example-requests-PUTapi-doctors--doctor_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://127.0.0.1:8000/api/doctors/consequatur" \
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
    "http://127.0.0.1:8000/api/doctors/consequatur"
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

<span id="example-responses-PUTapi-doctors--doctor_id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;did_succeed&quot;: true,
    &quot;data&quot;: &quot;No changes detected&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;did_succeed&quot;: true,
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
    &quot;did_succeed&quot;: false,
    &quot;message&quot;: &quot;Doctors can&#039;t update other doctors information&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;did_succeed&quot;: false,
    &quot;data&quot;: &quot;Doctor not found&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-PUTapi-doctors--doctor_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-doctors--doctor_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-doctors--doctor_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-doctors--doctor_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-doctors--doctor_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-doctors--doctor_id-" data-method="PUT"
      data-path="api/doctors/{doctor_id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-doctors--doctor_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-doctors--doctor_id-"
                    onclick="tryItOut('PUTapi-doctors--doctor_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-doctors--doctor_id-"
                    onclick="cancelTryOut('PUTapi-doctors--doctor_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-doctors--doctor_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/doctors/{doctor_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="PUTapi-doctors--doctor_id-"
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
                              name="Content-Type"                data-endpoint="PUTapi-doctors--doctor_id-"
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
                              name="Accept"                data-endpoint="PUTapi-doctors--doctor_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>doctor_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="doctor_id"                data-endpoint="PUTapi-doctors--doctor_id-"
               value="consequatur"
               data-component="url">
    <br>
<p>The ID of the doctor. Example: <code>consequatur</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>doctorId</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="doctorId"                data-endpoint="PUTapi-doctors--doctor_id-"
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
               step="any"               name="room_id"                data-endpoint="PUTapi-doctors--doctor_id-"
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
               step="any"               name="appointment_duration"                data-endpoint="PUTapi-doctors--doctor_id-"
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
    &quot;did_succeed&quot;: false,
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
<p>Only admins are allowed to use this API. There is a middleware CheckAdmin on this API route</p>

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
    &quot;did_succeed&quot;: true,
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
    &quot;did_succeed&quot;: true,
    &quot;message&quot;: {
        &quot;did_succeed&quot;: true,
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

                    <h2 id="speciality-apis-GETapi-specialities-s--specialityId-">View a Specified Speciality</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<h3>For: Mobile(Patient - Doctor), Web</h3>
<p>Everyone in the system is allowed to use this API.</p>
<h3>⚠ Important Info: The response's "data" field content would change based on the logged-in user role!</h3>

<span id="example-requests-GETapi-specialities-s--specialityId-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/specialities/s/17" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/specialities/s/17"
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

<span id="example-responses-GETapi-specialities-s--specialityId-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;did_succeed&quot;: true,
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
    &quot;did_succeed&quot;: false,
    &quot;message&quot;: {
        &quot;base_message&quot;: &quot;Speciality not found&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-specialities-s--specialityId-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-specialities-s--specialityId-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-specialities-s--specialityId-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-specialities-s--specialityId-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-specialities-s--specialityId-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-specialities-s--specialityId-" data-method="GET"
      data-path="api/specialities/s/{specialityId}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-specialities-s--specialityId-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-specialities-s--specialityId-"
                    onclick="tryItOut('GETapi-specialities-s--specialityId-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-specialities-s--specialityId-"
                    onclick="cancelTryOut('GETapi-specialities-s--specialityId-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-specialities-s--specialityId-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/specialities/s/{specialityId}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-specialities-s--specialityId-"
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
                              name="Content-Type"                data-endpoint="GETapi-specialities-s--specialityId-"
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
                              name="Accept"                data-endpoint="GETapi-specialities-s--specialityId-"
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
               step="any"               name="specialityId"                data-endpoint="GETapi-specialities-s--specialityId-"
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
    &quot;did_succeed&quot;: true,
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
    &quot;did_succeed&quot;: true,
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
    &quot;did_succeed&quot;: false,
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
    &quot;did_succeed&quot;: false,
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

                <h1 id="scheduling-apis">Scheduling APIs</h1>

    

                                <h2 id="scheduling-apis-POSTapi-schedules">Creating a Work Scheduling</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<h3>For: Mobile(Doctor), Web</h3>
<p>Only admins and doctors are allowed to use this API
Creating a new Work Scheduling by a doctor or admin, the doctor can create his own work schedule,
and the admin can create work schedules for medical center.</p>

<span id="example-requests-POSTapi-schedules">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/api/schedules" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"effective_from_date\": \"2107-08-04\",
    \"days\": [
        {
            \"weekday_id\": 2,
            \"start_time\": \"11:37\",
            \"end_time\": \"11:37\"
        }
    ]
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/schedules"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "effective_from_date": "2107-08-04",
    "days": [
        {
            "weekday_id": 2,
            "start_time": "11:37",
            "end_time": "11:37"
        }
    ]
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-schedules">
</span>
<span id="execution-results-POSTapi-schedules" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-schedules"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-schedules"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-schedules" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-schedules">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-schedules" data-method="POST"
      data-path="api/schedules"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-schedules', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-schedules"
                    onclick="tryItOut('POSTapi-schedules');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-schedules"
                    onclick="cancelTryOut('POSTapi-schedules');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-schedules"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/schedules</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-schedules"
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
                              name="Content-Type"                data-endpoint="POSTapi-schedules"
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
                              name="Accept"                data-endpoint="POSTapi-schedules"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>effective_from_date</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="effective_from_date"                data-endpoint="POSTapi-schedules"
               value="2107-08-04"
               data-component="body">
    <br>
<p>Must be a valid date in the format <code>Y-m-d</code>. Must be a date after <code>2026-07-05</code>. Example: <code>2107-08-04</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
        <details>
            <summary style="padding-bottom: 10px;">
                <b style="line-height: 2;"><code>days</code></b>&nbsp;&nbsp;
<small>object[]</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Must have at least 1 items. Must not have more than 7 items.</p>
            </summary>
                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>weekday_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="days.0.weekday_id"                data-endpoint="POSTapi-schedules"
               value="2"
               data-component="body">
    <br>
<p>The <code>id</code> of an existing record in the week_days table. Must be between 1 and 7. Example: <code>2</code></p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>start_time</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="days.0.start_time"                data-endpoint="POSTapi-schedules"
               value="11:37"
               data-component="body">
    <br>
<p>Must be a valid date in the format <code>H:i</code>. Example: <code>11:37</code></p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>end_time</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="days.0.end_time"                data-endpoint="POSTapi-schedules"
               value="11:37"
               data-component="body">
    <br>
<p>Must be a valid date in the format <code>H:i</code>. Example: <code>11:37</code></p>
                    </div>
                                    </details>
        </div>
        </form>

                    <h2 id="scheduling-apis-GETapi-schedules-WDs">View all days of week</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<h3>For: Mobile(Patient, Doctor), Web</h3>
<p>Everyone in the system is allowed to use this API</p>

<span id="example-requests-GETapi-schedules-WDs">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/schedules/WDs" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/schedules/WDs"
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

<span id="example-responses-GETapi-schedules-WDs">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;did_succeed&quot;: false,
    &quot;message&quot;: {
        &quot;base_message&quot;: &quot;Unauthenticated; A valid token is required&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-schedules-WDs" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-schedules-WDs"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-schedules-WDs"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-schedules-WDs" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-schedules-WDs">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-schedules-WDs" data-method="GET"
      data-path="api/schedules/WDs"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-schedules-WDs', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-schedules-WDs"
                    onclick="tryItOut('GETapi-schedules-WDs');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-schedules-WDs"
                    onclick="cancelTryOut('GETapi-schedules-WDs');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-schedules-WDs"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/schedules/WDs</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-schedules-WDs"
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
                              name="Content-Type"                data-endpoint="GETapi-schedules-WDs"
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
                              name="Accept"                data-endpoint="GETapi-schedules-WDs"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="scheduling-apis-GETapi-schedules-DsWS--with_expired---per_page-">View all work schedules of all doctors</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<h3>For: Web</h3>
<p>Only admins are allowed to use this API</p>

<span id="example-requests-GETapi-schedules-DsWS--with_expired---per_page-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/schedules/DsWS/17/17" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/schedules/DsWS/17/17"
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

<span id="example-responses-GETapi-schedules-DsWS--with_expired---per_page-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;did_succeed&quot;: false,
    &quot;message&quot;: {
        &quot;base_message&quot;: &quot;Unauthenticated; A valid token is required&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-schedules-DsWS--with_expired---per_page-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-schedules-DsWS--with_expired---per_page-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-schedules-DsWS--with_expired---per_page-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-schedules-DsWS--with_expired---per_page-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-schedules-DsWS--with_expired---per_page-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-schedules-DsWS--with_expired---per_page-" data-method="GET"
      data-path="api/schedules/DsWS/{with_expired}/{per_page}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-schedules-DsWS--with_expired---per_page-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-schedules-DsWS--with_expired---per_page-"
                    onclick="tryItOut('GETapi-schedules-DsWS--with_expired---per_page-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-schedules-DsWS--with_expired---per_page-"
                    onclick="cancelTryOut('GETapi-schedules-DsWS--with_expired---per_page-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-schedules-DsWS--with_expired---per_page-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/schedules/DsWS/{with_expired}/{per_page}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-schedules-DsWS--with_expired---per_page-"
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
                              name="Content-Type"                data-endpoint="GETapi-schedules-DsWS--with_expired---per_page-"
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
                              name="Accept"                data-endpoint="GETapi-schedules-DsWS--with_expired---per_page-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>with_expired</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="with_expired"                data-endpoint="GETapi-schedules-DsWS--with_expired---per_page-"
               value="17"
               data-component="url">
    <br>
<p>Boolean value means does the user want all of schedules to be showen even with expired ones or only non-expired schedules? Example: <code>17</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>per_page</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="per_page"                data-endpoint="GETapi-schedules-DsWS--with_expired---per_page-"
               value="17"
               data-component="url">
    <br>
<p>min:1 The number of items shown in each page. Defaults to 10. Example: <code>17</code></p>
            </div>
                    </form>

                    <h2 id="scheduling-apis-GETapi-schedules-MCWS--with_expired---per_page-">View all work schedules of the medical center</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<h3>For: Web</h3>
<p>Only admins are allowed to use this API</p>

<span id="example-requests-GETapi-schedules-MCWS--with_expired---per_page-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/schedules/MCWS/17/17" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/schedules/MCWS/17/17"
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

<span id="example-responses-GETapi-schedules-MCWS--with_expired---per_page-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;did_succeed&quot;: false,
    &quot;message&quot;: {
        &quot;base_message&quot;: &quot;Unauthenticated; A valid token is required&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-schedules-MCWS--with_expired---per_page-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-schedules-MCWS--with_expired---per_page-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-schedules-MCWS--with_expired---per_page-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-schedules-MCWS--with_expired---per_page-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-schedules-MCWS--with_expired---per_page-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-schedules-MCWS--with_expired---per_page-" data-method="GET"
      data-path="api/schedules/MCWS/{with_expired}/{per_page}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-schedules-MCWS--with_expired---per_page-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-schedules-MCWS--with_expired---per_page-"
                    onclick="tryItOut('GETapi-schedules-MCWS--with_expired---per_page-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-schedules-MCWS--with_expired---per_page-"
                    onclick="cancelTryOut('GETapi-schedules-MCWS--with_expired---per_page-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-schedules-MCWS--with_expired---per_page-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/schedules/MCWS/{with_expired}/{per_page}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-schedules-MCWS--with_expired---per_page-"
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
                              name="Content-Type"                data-endpoint="GETapi-schedules-MCWS--with_expired---per_page-"
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
                              name="Accept"                data-endpoint="GETapi-schedules-MCWS--with_expired---per_page-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>with_expired</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="with_expired"                data-endpoint="GETapi-schedules-MCWS--with_expired---per_page-"
               value="17"
               data-component="url">
    <br>
<p>Boolean value means does the user want all of schedules to be showen even with expired ones or only non-expired schedules? Example: <code>17</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>per_page</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="per_page"                data-endpoint="GETapi-schedules-MCWS--with_expired---per_page-"
               value="17"
               data-component="url">
    <br>
<p>min:1 The number of items shown in each page. Defaults to 10. Example: <code>17</code></p>
            </div>
                    </form>

                    <h2 id="scheduling-apis-GETapi-schedules-DWS--doctor_id---with_expired---per_page-">View all work schedules of a specified doctor</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<h3>For: Web, Mobile(Doctor)</h3>
<p>Only admins and doctors are allowed to use this API</p>

<span id="example-requests-GETapi-schedules-DWS--doctor_id---with_expired---per_page-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/schedules/DWS/17/17/17" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/schedules/DWS/17/17/17"
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

<span id="example-responses-GETapi-schedules-DWS--doctor_id---with_expired---per_page-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;did_succeed&quot;: false,
    &quot;message&quot;: {
        &quot;base_message&quot;: &quot;Unauthenticated; A valid token is required&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-schedules-DWS--doctor_id---with_expired---per_page-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-schedules-DWS--doctor_id---with_expired---per_page-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-schedules-DWS--doctor_id---with_expired---per_page-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-schedules-DWS--doctor_id---with_expired---per_page-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-schedules-DWS--doctor_id---with_expired---per_page-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-schedules-DWS--doctor_id---with_expired---per_page-" data-method="GET"
      data-path="api/schedules/DWS/{doctor_id}/{with_expired}/{per_page}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-schedules-DWS--doctor_id---with_expired---per_page-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-schedules-DWS--doctor_id---with_expired---per_page-"
                    onclick="tryItOut('GETapi-schedules-DWS--doctor_id---with_expired---per_page-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-schedules-DWS--doctor_id---with_expired---per_page-"
                    onclick="cancelTryOut('GETapi-schedules-DWS--doctor_id---with_expired---per_page-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-schedules-DWS--doctor_id---with_expired---per_page-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/schedules/DWS/{doctor_id}/{with_expired}/{per_page}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-schedules-DWS--doctor_id---with_expired---per_page-"
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
                              name="Content-Type"                data-endpoint="GETapi-schedules-DWS--doctor_id---with_expired---per_page-"
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
                              name="Accept"                data-endpoint="GETapi-schedules-DWS--doctor_id---with_expired---per_page-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>doctor_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="doctor_id"                data-endpoint="GETapi-schedules-DWS--doctor_id---with_expired---per_page-"
               value="17"
               data-component="url">
    <br>
<p>min:1 The ID of the doctor to view his schedules Example: <code>17</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>with_expired</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="with_expired"                data-endpoint="GETapi-schedules-DWS--doctor_id---with_expired---per_page-"
               value="17"
               data-component="url">
    <br>
<p>Boolean value means does the user want all of schedules to be showen even with expired ones or only non-expired schedules? Example: <code>17</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>per_page</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="per_page"                data-endpoint="GETapi-schedules-DWS--doctor_id---with_expired---per_page-"
               value="17"
               data-component="url">
    <br>
<p>The number of items shown in each page. Defaults to 10. Example: <code>17</code></p>
            </div>
                    </form>

                <h1 id="appointment-apis">Appointment APIs</h1>

    

                                <h2 id="appointment-apis-POSTapi-appointments--doctor_id-">View Available Times to book</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<h3>For: Mobile(Patient)</h3>
<p>Only patients are allowed to use this API.
View all available times to book with a specific doctor</p>

<span id="example-requests-POSTapi-appointments--doctor_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/api/appointments/17" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"date_of_day\": \"2107-08-04\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/appointments/17"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "date_of_day": "2107-08-04"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-appointments--doctor_id-">
</span>
<span id="execution-results-POSTapi-appointments--doctor_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-appointments--doctor_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-appointments--doctor_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-appointments--doctor_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-appointments--doctor_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-appointments--doctor_id-" data-method="POST"
      data-path="api/appointments/{doctor_id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-appointments--doctor_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-appointments--doctor_id-"
                    onclick="tryItOut('POSTapi-appointments--doctor_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-appointments--doctor_id-"
                    onclick="cancelTryOut('POSTapi-appointments--doctor_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-appointments--doctor_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/appointments/{doctor_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-appointments--doctor_id-"
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
                              name="Content-Type"                data-endpoint="POSTapi-appointments--doctor_id-"
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
                              name="Accept"                data-endpoint="POSTapi-appointments--doctor_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>doctor_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="doctor_id"                data-endpoint="POSTapi-appointments--doctor_id-"
               value="17"
               data-component="url">
    <br>
<p>min:1 Example: <code>17</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>date_of_day</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="date_of_day"                data-endpoint="POSTapi-appointments--doctor_id-"
               value="2107-08-04"
               data-component="body">
    <br>
<p>Must be a valid date in the format <code>Y-m-d</code>. Must be a date after or equal to <code>2026-07-05</code>. Example: <code>2107-08-04</code></p>
        </div>
        </form>

                    <h2 id="appointment-apis-POSTapi-appointments-s--doctor_id-">Make Appointment</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<h3>For: Mobile(Patient)</h3>
<p>Only patients are allowed to use this API.
Firstly, the patient select a time to book in from "View Available Times" API, then he assigns it to this API with
the date of day he wanna book in</p>

<span id="example-requests-POSTapi-appointments-s--doctor_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/api/appointments/s/17" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"datetime\": \"2107-08-04\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/appointments/s/17"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "datetime": "2107-08-04"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-appointments-s--doctor_id-">
</span>
<span id="execution-results-POSTapi-appointments-s--doctor_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-appointments-s--doctor_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-appointments-s--doctor_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-appointments-s--doctor_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-appointments-s--doctor_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-appointments-s--doctor_id-" data-method="POST"
      data-path="api/appointments/s/{doctor_id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-appointments-s--doctor_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-appointments-s--doctor_id-"
                    onclick="tryItOut('POSTapi-appointments-s--doctor_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-appointments-s--doctor_id-"
                    onclick="cancelTryOut('POSTapi-appointments-s--doctor_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-appointments-s--doctor_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/appointments/s/{doctor_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-appointments-s--doctor_id-"
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
                              name="Content-Type"                data-endpoint="POSTapi-appointments-s--doctor_id-"
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
                              name="Accept"                data-endpoint="POSTapi-appointments-s--doctor_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>doctor_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="doctor_id"                data-endpoint="POSTapi-appointments-s--doctor_id-"
               value="17"
               data-component="url">
    <br>
<p>min:1 Example: <code>17</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>datetime</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="datetime"                data-endpoint="POSTapi-appointments-s--doctor_id-"
               value="2107-08-04"
               data-component="body">
    <br>
<p>Must be a valid date in the format <code>Y-m-d H:i</code>. Must be a date after or equal to <code>2026-07-05 11:37</code>. Example: <code>2107-08-04</code></p>
        </div>
        </form>

                    <h2 id="appointment-apis-GETapi-appointments--status---with_expired---per_page-">View all appointments in the system</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<h3>For: Web</h3>
<p>Only admins are allowed to use this API</p>

<span id="example-requests-GETapi-appointments--status---with_expired---per_page-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/appointments/consequatur/17/17" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/appointments/consequatur/17/17"
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

<span id="example-responses-GETapi-appointments--status---with_expired---per_page-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;did_succeed&quot;: false,
    &quot;message&quot;: {
        &quot;base_message&quot;: &quot;Unauthenticated; A valid token is required&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-appointments--status---with_expired---per_page-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-appointments--status---with_expired---per_page-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-appointments--status---with_expired---per_page-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-appointments--status---with_expired---per_page-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-appointments--status---with_expired---per_page-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-appointments--status---with_expired---per_page-" data-method="GET"
      data-path="api/appointments/{status}/{with_expired}/{per_page}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-appointments--status---with_expired---per_page-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-appointments--status---with_expired---per_page-"
                    onclick="tryItOut('GETapi-appointments--status---with_expired---per_page-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-appointments--status---with_expired---per_page-"
                    onclick="cancelTryOut('GETapi-appointments--status---with_expired---per_page-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-appointments--status---with_expired---per_page-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/appointments/{status}/{with_expired}/{per_page}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-appointments--status---with_expired---per_page-"
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
                              name="Content-Type"                data-endpoint="GETapi-appointments--status---with_expired---per_page-"
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
                              name="Accept"                data-endpoint="GETapi-appointments--status---with_expired---per_page-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="status"                data-endpoint="GETapi-appointments--status---with_expired---per_page-"
               value="consequatur"
               data-component="url">
    <br>
<p>Status should be null or one of [pending - cancelled - cancelled_by_doctor - cancelled_by_medical_center - missed - attended] Example: <code>consequatur</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>with_expired</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="with_expired"                data-endpoint="GETapi-appointments--status---with_expired---per_page-"
               value="17"
               data-component="url">
    <br>
<p>Boolean value means does the admin want all of appointments to be showen even with expired ones or only non-expired appointments? Example: <code>17</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>per_page</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="per_page"                data-endpoint="GETapi-appointments--status---with_expired---per_page-"
               value="17"
               data-component="url">
    <br>
<p>min:1 The number of items be shown in each page. Defaults to 10. Example: <code>17</code></p>
            </div>
                    </form>

                    <h2 id="appointment-apis-GETapi-appointments-DA--status---with_expired---per_page---doctor_id-">View all appointments of a specified doctor</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<h3>For: Web, Mobile(Doctor)</h3>
<p>Only admins and doctors are allowed to use this API</p>
<h3>⚠ Important Info: The response's "data" field content would change based on the logged-in user role!</h3>

<span id="example-requests-GETapi-appointments-DA--status---with_expired---per_page---doctor_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/appointments/DA/consequatur/17/17/17" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/appointments/DA/consequatur/17/17/17"
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

<span id="example-responses-GETapi-appointments-DA--status---with_expired---per_page---doctor_id-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;did_succeed&quot;: false,
    &quot;message&quot;: {
        &quot;base_message&quot;: &quot;Unauthenticated; A valid token is required&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-appointments-DA--status---with_expired---per_page---doctor_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-appointments-DA--status---with_expired---per_page---doctor_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-appointments-DA--status---with_expired---per_page---doctor_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-appointments-DA--status---with_expired---per_page---doctor_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-appointments-DA--status---with_expired---per_page---doctor_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-appointments-DA--status---with_expired---per_page---doctor_id-" data-method="GET"
      data-path="api/appointments/DA/{status}/{with_expired}/{per_page}/{doctor_id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-appointments-DA--status---with_expired---per_page---doctor_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-appointments-DA--status---with_expired---per_page---doctor_id-"
                    onclick="tryItOut('GETapi-appointments-DA--status---with_expired---per_page---doctor_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-appointments-DA--status---with_expired---per_page---doctor_id-"
                    onclick="cancelTryOut('GETapi-appointments-DA--status---with_expired---per_page---doctor_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-appointments-DA--status---with_expired---per_page---doctor_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/appointments/DA/{status}/{with_expired}/{per_page}/{doctor_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-appointments-DA--status---with_expired---per_page---doctor_id-"
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
                              name="Content-Type"                data-endpoint="GETapi-appointments-DA--status---with_expired---per_page---doctor_id-"
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
                              name="Accept"                data-endpoint="GETapi-appointments-DA--status---with_expired---per_page---doctor_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="status"                data-endpoint="GETapi-appointments-DA--status---with_expired---per_page---doctor_id-"
               value="consequatur"
               data-component="url">
    <br>
<p>Status should be null or one of [pending - cancelled - cancelled_by_doctor - cancelled_by_medical_center - missed - attended] Example: <code>consequatur</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>with_expired</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="with_expired"                data-endpoint="GETapi-appointments-DA--status---with_expired---per_page---doctor_id-"
               value="17"
               data-component="url">
    <br>
<p>Boolean value means does the admin want all of appointments to be showen even with expired ones or only non-expired appointments? Example: <code>17</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>per_page</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="per_page"                data-endpoint="GETapi-appointments-DA--status---with_expired---per_page---doctor_id-"
               value="17"
               data-component="url">
    <br>
<p>min:1 The number of items be shown in each page. Defaults to 10. Example: <code>17</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>doctor_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="doctor_id"                data-endpoint="GETapi-appointments-DA--status---with_expired---per_page---doctor_id-"
               value="17"
               data-component="url">
    <br>
<p>min:1 The ID number of doctor to view it's appointments Example: <code>17</code></p>
            </div>
                    </form>

                    <h2 id="appointment-apis-GETapi-appointments-PA--status---with_expired---per_page---patient_id-">View all appointments of a specified patoent</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<h3>For: Web, Mobile(Patient)</h3>
<p>Only admins and patoents are allowed to use this API</p>
<h3>⚠ Important Info: The response's "data" field content would change based on the logged-in user role!</h3>

<span id="example-requests-GETapi-appointments-PA--status---with_expired---per_page---patient_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/appointments/PA/consequatur/17/17/17" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/appointments/PA/consequatur/17/17/17"
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

<span id="example-responses-GETapi-appointments-PA--status---with_expired---per_page---patient_id-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;did_succeed&quot;: false,
    &quot;message&quot;: {
        &quot;base_message&quot;: &quot;Unauthenticated; A valid token is required&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-appointments-PA--status---with_expired---per_page---patient_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-appointments-PA--status---with_expired---per_page---patient_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-appointments-PA--status---with_expired---per_page---patient_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-appointments-PA--status---with_expired---per_page---patient_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-appointments-PA--status---with_expired---per_page---patient_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-appointments-PA--status---with_expired---per_page---patient_id-" data-method="GET"
      data-path="api/appointments/PA/{status}/{with_expired}/{per_page}/{patient_id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-appointments-PA--status---with_expired---per_page---patient_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-appointments-PA--status---with_expired---per_page---patient_id-"
                    onclick="tryItOut('GETapi-appointments-PA--status---with_expired---per_page---patient_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-appointments-PA--status---with_expired---per_page---patient_id-"
                    onclick="cancelTryOut('GETapi-appointments-PA--status---with_expired---per_page---patient_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-appointments-PA--status---with_expired---per_page---patient_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/appointments/PA/{status}/{with_expired}/{per_page}/{patient_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-appointments-PA--status---with_expired---per_page---patient_id-"
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
                              name="Content-Type"                data-endpoint="GETapi-appointments-PA--status---with_expired---per_page---patient_id-"
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
                              name="Accept"                data-endpoint="GETapi-appointments-PA--status---with_expired---per_page---patient_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="status"                data-endpoint="GETapi-appointments-PA--status---with_expired---per_page---patient_id-"
               value="consequatur"
               data-component="url">
    <br>
<p>Status should be null or one of [pending - cancelled - cancelled_by_doctor - cancelled_by_medical_center - missed - attended] Example: <code>consequatur</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>with_expired</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="with_expired"                data-endpoint="GETapi-appointments-PA--status---with_expired---per_page---patient_id-"
               value="17"
               data-component="url">
    <br>
<p>Boolean value means does the admin want all of appointments to be showen even with expired ones or only non-expired appointments? Example: <code>17</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>per_page</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="per_page"                data-endpoint="GETapi-appointments-PA--status---with_expired---per_page---patient_id-"
               value="17"
               data-component="url">
    <br>
<p>min:1 The number of items be shown in each page. Defaults to 10. Example: <code>17</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>patient_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="patient_id"                data-endpoint="GETapi-appointments-PA--status---with_expired---per_page---patient_id-"
               value="17"
               data-component="url">
    <br>
<p>min:1 The ID number of patient to view it's appointments Example: <code>17</code></p>
            </div>
                    </form>

                    <h2 id="appointment-apis-GETapi-appointments--id-">View a specified appointment</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<h3>For: Web, Mobile(Patient, Doctor)</h3>
<h3>⚠ Important Info: The response's "data" field content would change based on the logged-in user role!</h3>
<p>Everyone in the system is allowed to use this API</p>

<span id="example-requests-GETapi-appointments--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/appointments/17" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/appointments/17"
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

<span id="example-responses-GETapi-appointments--id-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;did_succeed&quot;: false,
    &quot;message&quot;: {
        &quot;base_message&quot;: &quot;Unauthenticated; A valid token is required&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-appointments--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-appointments--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-appointments--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-appointments--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-appointments--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-appointments--id-" data-method="GET"
      data-path="api/appointments/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-appointments--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-appointments--id-"
                    onclick="tryItOut('GETapi-appointments--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-appointments--id-"
                    onclick="cancelTryOut('GETapi-appointments--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-appointments--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/appointments/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-appointments--id-"
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
                              name="Content-Type"                data-endpoint="GETapi-appointments--id-"
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
                              name="Accept"                data-endpoint="GETapi-appointments--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-appointments--id-"
               value="17"
               data-component="url">
    <br>
<p>min:1 The ID number of appointment to be showen Example: <code>17</code></p>
            </div>
                    </form>

                    <h2 id="appointment-apis-POSTapi-appointments-cA--id-">Cancel an appointment</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<h3>For: Mobile(Patient)</h3>
<p>Only patients are allowed to use this API</p>

<span id="example-requests-POSTapi-appointments-cA--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/api/appointments/cA/17" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/appointments/cA/17"
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

<span id="example-responses-POSTapi-appointments-cA--id-">
</span>
<span id="execution-results-POSTapi-appointments-cA--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-appointments-cA--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-appointments-cA--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-appointments-cA--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-appointments-cA--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-appointments-cA--id-" data-method="POST"
      data-path="api/appointments/cA/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-appointments-cA--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-appointments-cA--id-"
                    onclick="tryItOut('POSTapi-appointments-cA--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-appointments-cA--id-"
                    onclick="cancelTryOut('POSTapi-appointments-cA--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-appointments-cA--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/appointments/cA/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-appointments-cA--id-"
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
                              name="Content-Type"                data-endpoint="POSTapi-appointments-cA--id-"
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
                              name="Accept"                data-endpoint="POSTapi-appointments-cA--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="POSTapi-appointments-cA--id-"
               value="17"
               data-component="url">
    <br>
<p>min:1 The ID number of appointment to be cancelled Example: <code>17</code></p>
            </div>
                    </form>

                    <h2 id="appointment-apis-POSTapi-appointments-mA--id-">Make an appointment missed</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<h3>For: Mobile(Doctor)</h3>
<p>Only doctors are allowed to use this API</p>

<span id="example-requests-POSTapi-appointments-mA--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/api/appointments/mA/17" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/appointments/mA/17"
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

<span id="example-responses-POSTapi-appointments-mA--id-">
</span>
<span id="execution-results-POSTapi-appointments-mA--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-appointments-mA--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-appointments-mA--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-appointments-mA--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-appointments-mA--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-appointments-mA--id-" data-method="POST"
      data-path="api/appointments/mA/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-appointments-mA--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-appointments-mA--id-"
                    onclick="tryItOut('POSTapi-appointments-mA--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-appointments-mA--id-"
                    onclick="cancelTryOut('POSTapi-appointments-mA--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-appointments-mA--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/appointments/mA/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-appointments-mA--id-"
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
                              name="Content-Type"                data-endpoint="POSTapi-appointments-mA--id-"
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
                              name="Accept"                data-endpoint="POSTapi-appointments-mA--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="POSTapi-appointments-mA--id-"
               value="17"
               data-component="url">
    <br>
<p>min:1 The ID number of appointment to be missed Example: <code>17</code></p>
            </div>
                    </form>

                    <h2 id="appointment-apis-POSTapi-appointments-aA--id-">Make an appointment attended</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<h3>For: Mobile(Doctor)</h3>
<p>Only doctors are allowed to use this API</p>

<span id="example-requests-POSTapi-appointments-aA--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/api/appointments/aA/17" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"actual_time\": \"2107-08-04\",
    \"medical_diagnosis\": \"mqeopfuudtdsufvyvddqa\",
    \"prescription\": \"mniihfqcoynlazghdtqtq\",
    \"notes\": \"xbajwbpilpmufinllwloa\",
    \"notes_for_other_doctors\": \"uydlsmsjuryvojcybzvrb\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/appointments/aA/17"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "actual_time": "2107-08-04",
    "medical_diagnosis": "mqeopfuudtdsufvyvddqa",
    "prescription": "mniihfqcoynlazghdtqtq",
    "notes": "xbajwbpilpmufinllwloa",
    "notes_for_other_doctors": "uydlsmsjuryvojcybzvrb"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-appointments-aA--id-">
</span>
<span id="execution-results-POSTapi-appointments-aA--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-appointments-aA--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-appointments-aA--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-appointments-aA--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-appointments-aA--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-appointments-aA--id-" data-method="POST"
      data-path="api/appointments/aA/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-appointments-aA--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-appointments-aA--id-"
                    onclick="tryItOut('POSTapi-appointments-aA--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-appointments-aA--id-"
                    onclick="cancelTryOut('POSTapi-appointments-aA--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-appointments-aA--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/appointments/aA/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-appointments-aA--id-"
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
                              name="Content-Type"                data-endpoint="POSTapi-appointments-aA--id-"
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
                              name="Accept"                data-endpoint="POSTapi-appointments-aA--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="POSTapi-appointments-aA--id-"
               value="17"
               data-component="url">
    <br>
<p>min:1 The ID number of appointment to be attended Example: <code>17</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>actual_time</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="actual_time"                data-endpoint="POSTapi-appointments-aA--id-"
               value="2107-08-04"
               data-component="body">
    <br>
<p>Must be a valid date in the format <code>Y-m-d H:i</code>. Must be a date after or equal to <code>2026-07-05 00:00:00</code>. Example: <code>2107-08-04</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>medical_diagnosis</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="medical_diagnosis"                data-endpoint="POSTapi-appointments-aA--id-"
               value="mqeopfuudtdsufvyvddqa"
               data-component="body">
    <br>
<p>Must not be greater than 500 characters. Example: <code>mqeopfuudtdsufvyvddqa</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>prescription</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="prescription"                data-endpoint="POSTapi-appointments-aA--id-"
               value="mniihfqcoynlazghdtqtq"
               data-component="body">
    <br>
<p>Must not be greater than 250 characters. Example: <code>mniihfqcoynlazghdtqtq</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>notes</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="notes"                data-endpoint="POSTapi-appointments-aA--id-"
               value="xbajwbpilpmufinllwloa"
               data-component="body">
    <br>
<p>Must not be greater than 1000 characters. Example: <code>xbajwbpilpmufinllwloa</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>notes_for_other_doctors</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="notes_for_other_doctors"                data-endpoint="POSTapi-appointments-aA--id-"
               value="uydlsmsjuryvojcybzvrb"
               data-component="body">
    <br>
<p>Must not be greater than 1000 characters. Example: <code>uydlsmsjuryvojcybzvrb</code></p>
        </div>
        </form>

                <h1 id="visit-apis">Visit APIs</h1>

    

                                <h2 id="visit-apis-GETapi-visits--per_page-">View all visits in the system</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<h3>For: Web</h3>
<p>Only admins are allowed to use this API</p>

<span id="example-requests-GETapi-visits--per_page-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/visits/17" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/visits/17"
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

<span id="example-responses-GETapi-visits--per_page-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;did_succeed&quot;: false,
    &quot;message&quot;: {
        &quot;base_message&quot;: &quot;Unauthenticated; A valid token is required&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-visits--per_page-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-visits--per_page-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-visits--per_page-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-visits--per_page-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-visits--per_page-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-visits--per_page-" data-method="GET"
      data-path="api/visits/{per_page}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-visits--per_page-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-visits--per_page-"
                    onclick="tryItOut('GETapi-visits--per_page-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-visits--per_page-"
                    onclick="cancelTryOut('GETapi-visits--per_page-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-visits--per_page-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/visits/{per_page}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-visits--per_page-"
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
                              name="Content-Type"                data-endpoint="GETapi-visits--per_page-"
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
                              name="Accept"                data-endpoint="GETapi-visits--per_page-"
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
               step="any"               name="per_page"                data-endpoint="GETapi-visits--per_page-"
               value="17"
               data-component="url">
    <br>
<p>min:1 The number of items be shown in each page. Defaults to 10. Example: <code>17</code></p>
            </div>
                    </form>

                    <h2 id="visit-apis-GETapi-visits-DV--per_page---doctor_id-">View all visits of a specified doctor</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<h3>For: Web, Mobile(Doctor)</h3>
<p>Only admins and doctors are allowed to use this API</p>
<h3>⚠ Important Info: The response's "data" field content would change based on the logged-in user role!</h3>

<span id="example-requests-GETapi-visits-DV--per_page---doctor_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/visits/DV/17/17" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/visits/DV/17/17"
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

<span id="example-responses-GETapi-visits-DV--per_page---doctor_id-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;did_succeed&quot;: false,
    &quot;message&quot;: {
        &quot;base_message&quot;: &quot;Unauthenticated; A valid token is required&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-visits-DV--per_page---doctor_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-visits-DV--per_page---doctor_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-visits-DV--per_page---doctor_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-visits-DV--per_page---doctor_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-visits-DV--per_page---doctor_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-visits-DV--per_page---doctor_id-" data-method="GET"
      data-path="api/visits/DV/{per_page}/{doctor_id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-visits-DV--per_page---doctor_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-visits-DV--per_page---doctor_id-"
                    onclick="tryItOut('GETapi-visits-DV--per_page---doctor_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-visits-DV--per_page---doctor_id-"
                    onclick="cancelTryOut('GETapi-visits-DV--per_page---doctor_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-visits-DV--per_page---doctor_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/visits/DV/{per_page}/{doctor_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-visits-DV--per_page---doctor_id-"
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
                              name="Content-Type"                data-endpoint="GETapi-visits-DV--per_page---doctor_id-"
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
                              name="Accept"                data-endpoint="GETapi-visits-DV--per_page---doctor_id-"
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
               step="any"               name="per_page"                data-endpoint="GETapi-visits-DV--per_page---doctor_id-"
               value="17"
               data-component="url">
    <br>
<p>min:1 The number of items be shown in each page. Defaults to 10. Example: <code>17</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>doctor_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="doctor_id"                data-endpoint="GETapi-visits-DV--per_page---doctor_id-"
               value="17"
               data-component="url">
    <br>
<p>min:1 The ID number of doctor to view it's visits Example: <code>17</code></p>
            </div>
                    </form>

                    <h2 id="visit-apis-GETapi-visits-PV--per_page---patient_id-">View all visits of a specified patient</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<h3>For: Web, Mobile(Patient)</h3>
<p>Only admins and patients are allowed to use this API</p>
<h3>⚠ Important Info: The response's "data" field content would change based on the logged-in user role!</h3>

<span id="example-requests-GETapi-visits-PV--per_page---patient_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/visits/PV/17/17" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/visits/PV/17/17"
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

<span id="example-responses-GETapi-visits-PV--per_page---patient_id-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;did_succeed&quot;: false,
    &quot;message&quot;: {
        &quot;base_message&quot;: &quot;Unauthenticated; A valid token is required&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-visits-PV--per_page---patient_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-visits-PV--per_page---patient_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-visits-PV--per_page---patient_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-visits-PV--per_page---patient_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-visits-PV--per_page---patient_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-visits-PV--per_page---patient_id-" data-method="GET"
      data-path="api/visits/PV/{per_page}/{patient_id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-visits-PV--per_page---patient_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-visits-PV--per_page---patient_id-"
                    onclick="tryItOut('GETapi-visits-PV--per_page---patient_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-visits-PV--per_page---patient_id-"
                    onclick="cancelTryOut('GETapi-visits-PV--per_page---patient_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-visits-PV--per_page---patient_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/visits/PV/{per_page}/{patient_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-visits-PV--per_page---patient_id-"
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
                              name="Content-Type"                data-endpoint="GETapi-visits-PV--per_page---patient_id-"
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
                              name="Accept"                data-endpoint="GETapi-visits-PV--per_page---patient_id-"
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
               step="any"               name="per_page"                data-endpoint="GETapi-visits-PV--per_page---patient_id-"
               value="17"
               data-component="url">
    <br>
<p>min:1 The number of items be shown in each page. Defaults to 10. Example: <code>17</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>patient_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="patient_id"                data-endpoint="GETapi-visits-PV--per_page---patient_id-"
               value="17"
               data-component="url">
    <br>
<p>min:1 The ID number of patient to view it's visits Example: <code>17</code></p>
            </div>
                    </form>

                    <h2 id="visit-apis-GETapi-visits-s--id-">View a specified visit</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<h3>For: Web, Mobile(Patient, Doctor)</h3>
<h3>⚠ Important Info: The response's "data" field content would change based on the logged-in user role!</h3>
<p>Everyone in the system is allowed to use this API</p>

<span id="example-requests-GETapi-visits-s--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/visits/s/17" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/visits/s/17"
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

<span id="example-responses-GETapi-visits-s--id-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;did_succeed&quot;: false,
    &quot;message&quot;: {
        &quot;base_message&quot;: &quot;Unauthenticated; A valid token is required&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-visits-s--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-visits-s--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-visits-s--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-visits-s--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-visits-s--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-visits-s--id-" data-method="GET"
      data-path="api/visits/s/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-visits-s--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-visits-s--id-"
                    onclick="tryItOut('GETapi-visits-s--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-visits-s--id-"
                    onclick="cancelTryOut('GETapi-visits-s--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-visits-s--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/visits/s/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-visits-s--id-"
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
                              name="Content-Type"                data-endpoint="GETapi-visits-s--id-"
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
                              name="Accept"                data-endpoint="GETapi-visits-s--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-visits-s--id-"
               value="17"
               data-component="url">
    <br>
<p>min:1 The ID number of visit to be showen Example: <code>17</code></p>
            </div>
                    </form>

                    <h2 id="visit-apis-POSTapi-visits--id-">Update a specified visit</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<h3>For: Mobile(Doctor)</h3>
<p>Only doctors are allowed to use this API</p>

<span id="example-requests-POSTapi-visits--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/api/visits/17" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"medical_diagnosis\": \"vmqeopfuudtdsufvyvddq\",
    \"prescription\": \"amniihfqcoynlazghdtqt\",
    \"notes\": \"qxbajwbpilpmufinllwlo\",
    \"notes_for_other_doctors\": \"auydlsmsjuryvojcybzvr\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/visits/17"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "medical_diagnosis": "vmqeopfuudtdsufvyvddq",
    "prescription": "amniihfqcoynlazghdtqt",
    "notes": "qxbajwbpilpmufinllwlo",
    "notes_for_other_doctors": "auydlsmsjuryvojcybzvr"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-visits--id-">
</span>
<span id="execution-results-POSTapi-visits--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-visits--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-visits--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-visits--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-visits--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-visits--id-" data-method="POST"
      data-path="api/visits/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-visits--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-visits--id-"
                    onclick="tryItOut('POSTapi-visits--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-visits--id-"
                    onclick="cancelTryOut('POSTapi-visits--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-visits--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/visits/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-visits--id-"
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
                              name="Content-Type"                data-endpoint="POSTapi-visits--id-"
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
                              name="Accept"                data-endpoint="POSTapi-visits--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="POSTapi-visits--id-"
               value="17"
               data-component="url">
    <br>
<p>min:1 The ID number of visit to be updated Example: <code>17</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>medical_diagnosis</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="medical_diagnosis"                data-endpoint="POSTapi-visits--id-"
               value="vmqeopfuudtdsufvyvddq"
               data-component="body">
    <br>
<p>Must not be greater than 500 characters. Example: <code>vmqeopfuudtdsufvyvddq</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>prescription</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="prescription"                data-endpoint="POSTapi-visits--id-"
               value="amniihfqcoynlazghdtqt"
               data-component="body">
    <br>
<p>Must not be greater than 250 characters. Example: <code>amniihfqcoynlazghdtqt</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>notes</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="notes"                data-endpoint="POSTapi-visits--id-"
               value="qxbajwbpilpmufinllwlo"
               data-component="body">
    <br>
<p>Must not be greater than 1000 characters. Example: <code>qxbajwbpilpmufinllwlo</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>notes_for_other_doctors</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="notes_for_other_doctors"                data-endpoint="POSTapi-visits--id-"
               value="auydlsmsjuryvojcybzvr"
               data-component="body">
    <br>
<p>Must not be greater than 1000 characters. Example: <code>auydlsmsjuryvojcybzvr</code></p>
        </div>
        </form>

                <h1 id="medical-record-access-apis-access-permission-apis">Medical Record Access APIs (Access Permission APIs)</h1>

    

                                <h2 id="medical-record-access-apis-access-permission-apis-POSTapi-access--doctor_id---visit_id-">Grant a new access permission</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<h3>For: Mobile(Patient)</h3>
<p>Only patients are allowed to use this API.</p>

<span id="example-requests-POSTapi-access--doctor_id---visit_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/api/access/17/17" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/access/17/17"
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

<span id="example-responses-POSTapi-access--doctor_id---visit_id-">
</span>
<span id="execution-results-POSTapi-access--doctor_id---visit_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-access--doctor_id---visit_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-access--doctor_id---visit_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-access--doctor_id---visit_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-access--doctor_id---visit_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-access--doctor_id---visit_id-" data-method="POST"
      data-path="api/access/{doctor_id}/{visit_id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-access--doctor_id---visit_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-access--doctor_id---visit_id-"
                    onclick="tryItOut('POSTapi-access--doctor_id---visit_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-access--doctor_id---visit_id-"
                    onclick="cancelTryOut('POSTapi-access--doctor_id---visit_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-access--doctor_id---visit_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/access/{doctor_id}/{visit_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-access--doctor_id---visit_id-"
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
                              name="Content-Type"                data-endpoint="POSTapi-access--doctor_id---visit_id-"
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
                              name="Accept"                data-endpoint="POSTapi-access--doctor_id---visit_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>doctor_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="doctor_id"                data-endpoint="POSTapi-access--doctor_id---visit_id-"
               value="17"
               data-component="url">
    <br>
<p>min:1 Example: <code>17</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>visit_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="visit_id"                data-endpoint="POSTapi-access--doctor_id---visit_id-"
               value="17"
               data-component="url">
    <br>
<p>min:1 Example: <code>17</code></p>
            </div>
                    </form>

                    <h2 id="medical-record-access-apis-access-permission-apis-GETapi-access-DA--per_page---with_unactive---doctor_id-">View all permission accesses given to a specified doctor</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<h3>For: Web, Mobile(Doctor)</h3>
<p>Only admins and doctors are allowed to use this API</p>
<h3>⚠ Important Info: The response's "data" field content would change based on the logged-in user role!</h3>

<span id="example-requests-GETapi-access-DA--per_page---with_unactive---doctor_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/access/DA/17/17/17" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/access/DA/17/17/17"
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

<span id="example-responses-GETapi-access-DA--per_page---with_unactive---doctor_id-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;did_succeed&quot;: false,
    &quot;message&quot;: {
        &quot;base_message&quot;: &quot;Unauthenticated; A valid token is required&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-access-DA--per_page---with_unactive---doctor_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-access-DA--per_page---with_unactive---doctor_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-access-DA--per_page---with_unactive---doctor_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-access-DA--per_page---with_unactive---doctor_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-access-DA--per_page---with_unactive---doctor_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-access-DA--per_page---with_unactive---doctor_id-" data-method="GET"
      data-path="api/access/DA/{per_page}/{with_unactive}/{doctor_id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-access-DA--per_page---with_unactive---doctor_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-access-DA--per_page---with_unactive---doctor_id-"
                    onclick="tryItOut('GETapi-access-DA--per_page---with_unactive---doctor_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-access-DA--per_page---with_unactive---doctor_id-"
                    onclick="cancelTryOut('GETapi-access-DA--per_page---with_unactive---doctor_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-access-DA--per_page---with_unactive---doctor_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/access/DA/{per_page}/{with_unactive}/{doctor_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-access-DA--per_page---with_unactive---doctor_id-"
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
                              name="Content-Type"                data-endpoint="GETapi-access-DA--per_page---with_unactive---doctor_id-"
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
                              name="Accept"                data-endpoint="GETapi-access-DA--per_page---with_unactive---doctor_id-"
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
               step="any"               name="per_page"                data-endpoint="GETapi-access-DA--per_page---with_unactive---doctor_id-"
               value="17"
               data-component="url">
    <br>
<p>min:1 The number of items be shown in each page. Defaults to 10. Example: <code>17</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>with_unactive</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="with_unactive"                data-endpoint="GETapi-access-DA--per_page---with_unactive---doctor_id-"
               value="17"
               data-component="url">
    <br>
<p>Boolean value means does the admin want all of permission accesses to be showen even with unactivated ones? Doctores only allowed to see with unactive ones. Example: <code>17</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>doctor_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="doctor_id"                data-endpoint="GETapi-access-DA--per_page---with_unactive---doctor_id-"
               value="17"
               data-component="url">
    <br>
<p>min:1 The ID number of doctor to view it's permission accesses Example: <code>17</code></p>
            </div>
                    </form>

                    <h2 id="medical-record-access-apis-access-permission-apis-GETapi-access-PA--per_page---with_unactive---patient_id-">View all permission accesses given by a specified patient</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<h3>For: Web, Mobile(Patient)</h3>
<p>Only admins and patients are allowed to use this API</p>
<h3>⚠ Important Info: The response's "data" field content would change based on the logged-in user role!</h3>

<span id="example-requests-GETapi-access-PA--per_page---with_unactive---patient_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/access/PA/17/17/17" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/access/PA/17/17/17"
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

<span id="example-responses-GETapi-access-PA--per_page---with_unactive---patient_id-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;did_succeed&quot;: false,
    &quot;message&quot;: {
        &quot;base_message&quot;: &quot;Unauthenticated; A valid token is required&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-access-PA--per_page---with_unactive---patient_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-access-PA--per_page---with_unactive---patient_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-access-PA--per_page---with_unactive---patient_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-access-PA--per_page---with_unactive---patient_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-access-PA--per_page---with_unactive---patient_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-access-PA--per_page---with_unactive---patient_id-" data-method="GET"
      data-path="api/access/PA/{per_page}/{with_unactive}/{patient_id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-access-PA--per_page---with_unactive---patient_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-access-PA--per_page---with_unactive---patient_id-"
                    onclick="tryItOut('GETapi-access-PA--per_page---with_unactive---patient_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-access-PA--per_page---with_unactive---patient_id-"
                    onclick="cancelTryOut('GETapi-access-PA--per_page---with_unactive---patient_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-access-PA--per_page---with_unactive---patient_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/access/PA/{per_page}/{with_unactive}/{patient_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-access-PA--per_page---with_unactive---patient_id-"
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
                              name="Content-Type"                data-endpoint="GETapi-access-PA--per_page---with_unactive---patient_id-"
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
                              name="Accept"                data-endpoint="GETapi-access-PA--per_page---with_unactive---patient_id-"
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
               step="any"               name="per_page"                data-endpoint="GETapi-access-PA--per_page---with_unactive---patient_id-"
               value="17"
               data-component="url">
    <br>
<p>min:1 The number of items be shown in each page. Defaults to 10. Example: <code>17</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>with_unactive</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="with_unactive"                data-endpoint="GETapi-access-PA--per_page---with_unactive---patient_id-"
               value="17"
               data-component="url">
    <br>
<p>Boolean value means does the user want all of permission accesses to be showen even with unactivated ones? Example: <code>17</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>patient_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="patient_id"                data-endpoint="GETapi-access-PA--per_page---with_unactive---patient_id-"
               value="17"
               data-component="url">
    <br>
<p>min:1 The ID number of patient to view all permissions given by him Example: <code>17</code></p>
            </div>
                    </form>

                    <h2 id="medical-record-access-apis-access-permission-apis-GETapi-access-VA--per_page---with_unactive---visit_id-">View all permission accesses to a specified visit</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<h3>For: Web, Mobile(Patient)</h3>
<p>Only admins and patients are allowed to use this API</p>
<h3>⚠ Important Info: The response's "data" field content would change based on the logged-in user role!</h3>

<span id="example-requests-GETapi-access-VA--per_page---with_unactive---visit_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/access/VA/17/17/17" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/access/VA/17/17/17"
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

<span id="example-responses-GETapi-access-VA--per_page---with_unactive---visit_id-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;did_succeed&quot;: false,
    &quot;message&quot;: {
        &quot;base_message&quot;: &quot;Unauthenticated; A valid token is required&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-access-VA--per_page---with_unactive---visit_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-access-VA--per_page---with_unactive---visit_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-access-VA--per_page---with_unactive---visit_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-access-VA--per_page---with_unactive---visit_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-access-VA--per_page---with_unactive---visit_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-access-VA--per_page---with_unactive---visit_id-" data-method="GET"
      data-path="api/access/VA/{per_page}/{with_unactive}/{visit_id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-access-VA--per_page---with_unactive---visit_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-access-VA--per_page---with_unactive---visit_id-"
                    onclick="tryItOut('GETapi-access-VA--per_page---with_unactive---visit_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-access-VA--per_page---with_unactive---visit_id-"
                    onclick="cancelTryOut('GETapi-access-VA--per_page---with_unactive---visit_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-access-VA--per_page---with_unactive---visit_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/access/VA/{per_page}/{with_unactive}/{visit_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-access-VA--per_page---with_unactive---visit_id-"
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
                              name="Content-Type"                data-endpoint="GETapi-access-VA--per_page---with_unactive---visit_id-"
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
                              name="Accept"                data-endpoint="GETapi-access-VA--per_page---with_unactive---visit_id-"
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
               step="any"               name="per_page"                data-endpoint="GETapi-access-VA--per_page---with_unactive---visit_id-"
               value="17"
               data-component="url">
    <br>
<p>min:1 The number of items be shown in each page. Defaults to 10. Example: <code>17</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>with_unactive</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="with_unactive"                data-endpoint="GETapi-access-VA--per_page---with_unactive---visit_id-"
               value="17"
               data-component="url">
    <br>
<p>Boolean value means does the user want all of permission accesses to be showen even with unactivated ones? Example: <code>17</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>visit_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="visit_id"                data-endpoint="GETapi-access-VA--per_page---with_unactive---visit_id-"
               value="17"
               data-component="url">
    <br>
<p>min:1 The ID number of visit to view who have access to it Example: <code>17</code></p>
            </div>
                    </form>

                    <h2 id="medical-record-access-apis-access-permission-apis-POSTapi-access--id-">Revoke an access permission</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<h3>For: Mobile(Patient)</h3>
<p>Only patients are allowed to use this API</p>

<span id="example-requests-POSTapi-access--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/api/access/17" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/access/17"
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

<span id="example-responses-POSTapi-access--id-">
</span>
<span id="execution-results-POSTapi-access--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-access--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-access--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-access--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-access--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-access--id-" data-method="POST"
      data-path="api/access/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-access--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-access--id-"
                    onclick="tryItOut('POSTapi-access--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-access--id-"
                    onclick="cancelTryOut('POSTapi-access--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-access--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/access/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-access--id-"
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
                              name="Content-Type"                data-endpoint="POSTapi-access--id-"
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
                              name="Accept"                data-endpoint="POSTapi-access--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="POSTapi-access--id-"
               value="17"
               data-component="url">
    <br>
<p>min:1 The ID number of medical access record to be revoked Example: <code>17</code></p>
            </div>
                    </form>

                <h1 id="patient-complaint-apis">Patient Complaint APIs</h1>

    

                                <h2 id="patient-complaint-apis-POSTapi-complaint">Make a Complaint</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<h3>For: Mobile(Patient)</h3>
<p>Only patients are allowed to use this API.</p>

<span id="example-requests-POSTapi-complaint">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/api/complaint" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"content\": \"vmqeopfuudtdsufvyvddq\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/complaint"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "content": "vmqeopfuudtdsufvyvddq"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-complaint">
</span>
<span id="execution-results-POSTapi-complaint" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-complaint"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-complaint"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-complaint" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-complaint">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-complaint" data-method="POST"
      data-path="api/complaint"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-complaint', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-complaint"
                    onclick="tryItOut('POSTapi-complaint');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-complaint"
                    onclick="cancelTryOut('POSTapi-complaint');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-complaint"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/complaint</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-complaint"
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
                              name="Content-Type"                data-endpoint="POSTapi-complaint"
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
                              name="Accept"                data-endpoint="POSTapi-complaint"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>content</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="content"                data-endpoint="POSTapi-complaint"
               value="vmqeopfuudtdsufvyvddq"
               data-component="body">
    <br>
<p>Must not be greater than 1000 characters. Example: <code>vmqeopfuudtdsufvyvddq</code></p>
        </div>
        </form>

                    <h2 id="patient-complaint-apis-GETapi-complaint--patient_id-">View all complaints made by a specified patient</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<h3>For: Web, Mobile(Patient)</h3>
<p>Only admins and patients are allowed to use this API</p>
<h3>⚠ Important Info: The response's "data" field content would change based on the logged-in user role!</h3>

<span id="example-requests-GETapi-complaint--patient_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/complaint/17" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/complaint/17"
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

<span id="example-responses-GETapi-complaint--patient_id-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;did_succeed&quot;: false,
    &quot;message&quot;: {
        &quot;base_message&quot;: &quot;Unauthenticated; A valid token is required&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-complaint--patient_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-complaint--patient_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-complaint--patient_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-complaint--patient_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-complaint--patient_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-complaint--patient_id-" data-method="GET"
      data-path="api/complaint/{patient_id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-complaint--patient_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-complaint--patient_id-"
                    onclick="tryItOut('GETapi-complaint--patient_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-complaint--patient_id-"
                    onclick="cancelTryOut('GETapi-complaint--patient_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-complaint--patient_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/complaint/{patient_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-complaint--patient_id-"
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
                              name="Content-Type"                data-endpoint="GETapi-complaint--patient_id-"
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
                              name="Accept"                data-endpoint="GETapi-complaint--patient_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>patient_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="patient_id"                data-endpoint="GETapi-complaint--patient_id-"
               value="17"
               data-component="url">
    <br>
<p>min:1 The ID number of patient to view all his Complaints Example: <code>17</code></p>
            </div>
                    </form>

                    <h2 id="patient-complaint-apis-GETapi-complaint-s--id-">Show a Patient-Complaint</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<h3>For: Web, Mobile(Patient)</h3>
<p>Only admins and patients are allowed to use this API</p>

<span id="example-requests-GETapi-complaint-s--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/complaint/s/17" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/complaint/s/17"
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

<span id="example-responses-GETapi-complaint-s--id-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;did_succeed&quot;: false,
    &quot;message&quot;: {
        &quot;base_message&quot;: &quot;Unauthenticated; A valid token is required&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-complaint-s--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-complaint-s--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-complaint-s--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-complaint-s--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-complaint-s--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-complaint-s--id-" data-method="GET"
      data-path="api/complaint/s/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-complaint-s--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-complaint-s--id-"
                    onclick="tryItOut('GETapi-complaint-s--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-complaint-s--id-"
                    onclick="cancelTryOut('GETapi-complaint-s--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-complaint-s--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/complaint/s/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-complaint-s--id-"
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
                              name="Content-Type"                data-endpoint="GETapi-complaint-s--id-"
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
                              name="Accept"                data-endpoint="GETapi-complaint-s--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-complaint-s--id-"
               value="17"
               data-component="url">
    <br>
<p>The ID number of medical access record to be shown Example: <code>17</code></p>
            </div>
                    </form>

                    <h2 id="patient-complaint-apis-GETapi-complaint--per_page---with_reviewed-">View all Patients&#039; Complaints</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<h3>For: Web</h3>
<p>Only admins are allowed to use this API</p>
<h3>⚠ Important Info: The response's "data" field content would change based on the logged-in user role!</h3>

<span id="example-requests-GETapi-complaint--per_page---with_reviewed-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/complaint/17/17" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/complaint/17/17"
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

<span id="example-responses-GETapi-complaint--per_page---with_reviewed-">
            <blockquote>
            <p>Example response (405):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;did_succeed&quot;: false,
    &quot;message&quot;: {
        &quot;base_message&quot;: &quot;HTTP request method not allowed, The GET method is not supported for route api/complaint/17/17. Supported methods: POST.&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-complaint--per_page---with_reviewed-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-complaint--per_page---with_reviewed-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-complaint--per_page---with_reviewed-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-complaint--per_page---with_reviewed-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-complaint--per_page---with_reviewed-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-complaint--per_page---with_reviewed-" data-method="GET"
      data-path="api/complaint/{per_page}/{with_reviewed}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-complaint--per_page---with_reviewed-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-complaint--per_page---with_reviewed-"
                    onclick="tryItOut('GETapi-complaint--per_page---with_reviewed-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-complaint--per_page---with_reviewed-"
                    onclick="cancelTryOut('GETapi-complaint--per_page---with_reviewed-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-complaint--per_page---with_reviewed-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/complaint/{per_page}/{with_reviewed}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-complaint--per_page---with_reviewed-"
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
                              name="Content-Type"                data-endpoint="GETapi-complaint--per_page---with_reviewed-"
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
                              name="Accept"                data-endpoint="GETapi-complaint--per_page---with_reviewed-"
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
               step="any"               name="per_page"                data-endpoint="GETapi-complaint--per_page---with_reviewed-"
               value="17"
               data-component="url">
    <br>
<p>min:1 The number of items be shown in each page. Defaults to 10. Example: <code>17</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>with_reviewed</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="with_reviewed"                data-endpoint="GETapi-complaint--per_page---with_reviewed-"
               value="17"
               data-component="url">
    <br>
<p>Boolean value means does the admin want all of the complaints to be showen even with reviewed ones? Example: <code>17</code></p>
            </div>
                    </form>

                    <h2 id="patient-complaint-apis-POSTapi-complaint--reply---id-">Make a Patient-Complaint Reviewed</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<h3>For: Web</h3>
<p>Only admins are allowed to use this API</p>

<span id="example-requests-POSTapi-complaint--reply---id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/api/complaint/consequatur/17" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/complaint/consequatur/17"
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

<span id="example-responses-POSTapi-complaint--reply---id-">
</span>
<span id="execution-results-POSTapi-complaint--reply---id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-complaint--reply---id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-complaint--reply---id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-complaint--reply---id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-complaint--reply---id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-complaint--reply---id-" data-method="POST"
      data-path="api/complaint/{reply}/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-complaint--reply---id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-complaint--reply---id-"
                    onclick="tryItOut('POSTapi-complaint--reply---id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-complaint--reply---id-"
                    onclick="cancelTryOut('POSTapi-complaint--reply---id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-complaint--reply---id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/complaint/{reply}/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-complaint--reply---id-"
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
                              name="Content-Type"                data-endpoint="POSTapi-complaint--reply---id-"
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
                              name="Accept"                data-endpoint="POSTapi-complaint--reply---id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>reply</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="reply"                data-endpoint="POSTapi-complaint--reply---id-"
               value="consequatur"
               data-component="url">
    <br>
<p>Example: <code>consequatur</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="POSTapi-complaint--reply---id-"
               value="17"
               data-component="url">
    <br>
<p>The ID number of medical access record to be revoked Example: <code>17</code></p>
            </div>
                    </form>

                <h1 id="transfer-apis">Transfer APIs</h1>

    

                                <h2 id="transfer-apis-POSTapi-transfer--transfer_id-">Make an appointment for a specified transfer</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<h3>For: Mobile(Patient)</h3>
<p>Only patients are allowed to use this API
Everyone in the system is allowed to use this API</p>

<span id="example-requests-POSTapi-transfer--transfer_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/api/transfer/17" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"datetime\": \"2107-08-04\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/transfer/17"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "datetime": "2107-08-04"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-transfer--transfer_id-">
</span>
<span id="execution-results-POSTapi-transfer--transfer_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-transfer--transfer_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-transfer--transfer_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-transfer--transfer_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-transfer--transfer_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-transfer--transfer_id-" data-method="POST"
      data-path="api/transfer/{transfer_id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-transfer--transfer_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-transfer--transfer_id-"
                    onclick="tryItOut('POSTapi-transfer--transfer_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-transfer--transfer_id-"
                    onclick="cancelTryOut('POSTapi-transfer--transfer_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-transfer--transfer_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/transfer/{transfer_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-transfer--transfer_id-"
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
                              name="Content-Type"                data-endpoint="POSTapi-transfer--transfer_id-"
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
                              name="Accept"                data-endpoint="POSTapi-transfer--transfer_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>transfer_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="transfer_id"                data-endpoint="POSTapi-transfer--transfer_id-"
               value="17"
               data-component="url">
    <br>
<p>The ID number of transfer to make an appointment for Example: <code>17</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>datetime</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="datetime"                data-endpoint="POSTapi-transfer--transfer_id-"
               value="2107-08-04"
               data-component="body">
    <br>
<p>Must be a valid date in the format <code>Y-m-d H:i</code>. Must be a date after or equal to <code>2026-07-05 11:37</code>. Example: <code>2107-08-04</code></p>
        </div>
        </form>

                    <h2 id="transfer-apis-POSTapi-transfer-ch--transfer_id-">Make another appointment instead of previous-one for a specified transfer</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<h3>For: Mobile(Patient)</h3>
<p>Only patients are allowed to use this API
Everyone in the system is allowed to use this API</p>

<span id="example-requests-POSTapi-transfer-ch--transfer_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/api/transfer/ch/17" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"datetime\": \"2107-08-04\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/transfer/ch/17"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "datetime": "2107-08-04"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-transfer-ch--transfer_id-">
</span>
<span id="execution-results-POSTapi-transfer-ch--transfer_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-transfer-ch--transfer_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-transfer-ch--transfer_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-transfer-ch--transfer_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-transfer-ch--transfer_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-transfer-ch--transfer_id-" data-method="POST"
      data-path="api/transfer/ch/{transfer_id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-transfer-ch--transfer_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-transfer-ch--transfer_id-"
                    onclick="tryItOut('POSTapi-transfer-ch--transfer_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-transfer-ch--transfer_id-"
                    onclick="cancelTryOut('POSTapi-transfer-ch--transfer_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-transfer-ch--transfer_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/transfer/ch/{transfer_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-transfer-ch--transfer_id-"
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
                              name="Content-Type"                data-endpoint="POSTapi-transfer-ch--transfer_id-"
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
                              name="Accept"                data-endpoint="POSTapi-transfer-ch--transfer_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>transfer_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="transfer_id"                data-endpoint="POSTapi-transfer-ch--transfer_id-"
               value="17"
               data-component="url">
    <br>
<p>The ID number of transfer to make an appointment for Example: <code>17</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>datetime</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="datetime"                data-endpoint="POSTapi-transfer-ch--transfer_id-"
               value="2107-08-04"
               data-component="body">
    <br>
<p>Must be a valid date in the format <code>Y-m-d H:i</code>. Must be a date after or equal to <code>2026-07-05 11:37</code>. Example: <code>2107-08-04</code></p>
        </div>
        </form>

                    <h2 id="transfer-apis-POSTapi-transfer--patient_id---receiving_doctor_id-">Transfer a patient to another doctor</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<h3>For: Mobile(Doctor)</h3>
<p>Only doctors are allowed to use this API</p>

<span id="example-requests-POSTapi-transfer--patient_id---receiving_doctor_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/api/transfer/17/17" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"message\": \"consequatur\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/transfer/17/17"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "message": "consequatur"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-transfer--patient_id---receiving_doctor_id-">
</span>
<span id="execution-results-POSTapi-transfer--patient_id---receiving_doctor_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-transfer--patient_id---receiving_doctor_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-transfer--patient_id---receiving_doctor_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-transfer--patient_id---receiving_doctor_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-transfer--patient_id---receiving_doctor_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-transfer--patient_id---receiving_doctor_id-" data-method="POST"
      data-path="api/transfer/{patient_id}/{receiving_doctor_id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-transfer--patient_id---receiving_doctor_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-transfer--patient_id---receiving_doctor_id-"
                    onclick="tryItOut('POSTapi-transfer--patient_id---receiving_doctor_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-transfer--patient_id---receiving_doctor_id-"
                    onclick="cancelTryOut('POSTapi-transfer--patient_id---receiving_doctor_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-transfer--patient_id---receiving_doctor_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/transfer/{patient_id}/{receiving_doctor_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-transfer--patient_id---receiving_doctor_id-"
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
                              name="Content-Type"                data-endpoint="POSTapi-transfer--patient_id---receiving_doctor_id-"
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
                              name="Accept"                data-endpoint="POSTapi-transfer--patient_id---receiving_doctor_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>patient_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="patient_id"                data-endpoint="POSTapi-transfer--patient_id---receiving_doctor_id-"
               value="17"
               data-component="url">
    <br>
<p>Example: <code>17</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>receiving_doctor_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="receiving_doctor_id"                data-endpoint="POSTapi-transfer--patient_id---receiving_doctor_id-"
               value="17"
               data-component="url">
    <br>
<p>Example: <code>17</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>message</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="message"                data-endpoint="POSTapi-transfer--patient_id---receiving_doctor_id-"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
        </form>

                    <h2 id="transfer-apis-GETapi-transfer-s--id-">Show a specified transfer</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<h3>For: Web, Mobile(Patient, Doctor)</h3>
<p>Everyone in the system is allowed to use this API</p>

<span id="example-requests-GETapi-transfer-s--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/transfer/s/17" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/transfer/s/17"
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

<span id="example-responses-GETapi-transfer-s--id-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;did_succeed&quot;: false,
    &quot;message&quot;: {
        &quot;base_message&quot;: &quot;Unauthenticated; A valid token is required&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-transfer-s--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-transfer-s--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-transfer-s--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-transfer-s--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-transfer-s--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-transfer-s--id-" data-method="GET"
      data-path="api/transfer/s/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-transfer-s--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-transfer-s--id-"
                    onclick="tryItOut('GETapi-transfer-s--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-transfer-s--id-"
                    onclick="cancelTryOut('GETapi-transfer-s--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-transfer-s--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/transfer/s/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-transfer-s--id-"
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
                              name="Content-Type"                data-endpoint="GETapi-transfer-s--id-"
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
                              name="Accept"                data-endpoint="GETapi-transfer-s--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-transfer-s--id-"
               value="17"
               data-component="url">
    <br>
<p>The ID number of transfer to be showen Example: <code>17</code></p>
            </div>
                    </form>

                    <h2 id="transfer-apis-GETapi-transfer--per_page---with_attended-">Paginate transfers in the system</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<h3>For: Web</h3>
<p>Only admins are allowed to use this API</p>

<span id="example-requests-GETapi-transfer--per_page---with_attended-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/transfer/17/17" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/transfer/17/17"
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

<span id="example-responses-GETapi-transfer--per_page---with_attended-">
            <blockquote>
            <p>Example response (405):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;did_succeed&quot;: false,
    &quot;message&quot;: {
        &quot;base_message&quot;: &quot;HTTP request method not allowed, The GET method is not supported for route api/transfer/17/17. Supported methods: POST.&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-transfer--per_page---with_attended-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-transfer--per_page---with_attended-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-transfer--per_page---with_attended-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-transfer--per_page---with_attended-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-transfer--per_page---with_attended-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-transfer--per_page---with_attended-" data-method="GET"
      data-path="api/transfer/{per_page}/{with_attended}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-transfer--per_page---with_attended-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-transfer--per_page---with_attended-"
                    onclick="tryItOut('GETapi-transfer--per_page---with_attended-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-transfer--per_page---with_attended-"
                    onclick="cancelTryOut('GETapi-transfer--per_page---with_attended-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-transfer--per_page---with_attended-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/transfer/{per_page}/{with_attended}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-transfer--per_page---with_attended-"
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
                              name="Content-Type"                data-endpoint="GETapi-transfer--per_page---with_attended-"
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
                              name="Accept"                data-endpoint="GETapi-transfer--per_page---with_attended-"
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
               step="any"               name="per_page"                data-endpoint="GETapi-transfer--per_page---with_attended-"
               value="17"
               data-component="url">
    <br>
<p>min:1 The number of items be shown in each page. Defaults to 10. Example: <code>17</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>with_attended</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="with_attended"                data-endpoint="GETapi-transfer--per_page---with_attended-"
               value="17"
               data-component="url">
    <br>
<p>Boolean value means does the admin want all of transfers to be showen even with attended ones? Example: <code>17</code></p>
            </div>
                    </form>

                    <h2 id="transfer-apis-GETapi-transfer-aP--with_attended---patient_id-">View all transfers of a specified patient</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<h3>For: Web, Mobile(Patient)</h3>
<p>Only admins and patients are allowed to use this API</p>
<h3>⚠ Important Info: The response's "data" field content would change based on the logged-in user role!</h3>

<span id="example-requests-GETapi-transfer-aP--with_attended---patient_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/transfer/aP/17/17" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/transfer/aP/17/17"
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

<span id="example-responses-GETapi-transfer-aP--with_attended---patient_id-">
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;did_succeed&quot;: false,
    &quot;message&quot;: {
        &quot;base_message&quot;: &quot;Not found&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-transfer-aP--with_attended---patient_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-transfer-aP--with_attended---patient_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-transfer-aP--with_attended---patient_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-transfer-aP--with_attended---patient_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-transfer-aP--with_attended---patient_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-transfer-aP--with_attended---patient_id-" data-method="GET"
      data-path="api/transfer/aP/{with_attended}/{patient_id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-transfer-aP--with_attended---patient_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-transfer-aP--with_attended---patient_id-"
                    onclick="tryItOut('GETapi-transfer-aP--with_attended---patient_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-transfer-aP--with_attended---patient_id-"
                    onclick="cancelTryOut('GETapi-transfer-aP--with_attended---patient_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-transfer-aP--with_attended---patient_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/transfer/aP/{with_attended}/{patient_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-transfer-aP--with_attended---patient_id-"
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
                              name="Content-Type"                data-endpoint="GETapi-transfer-aP--with_attended---patient_id-"
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
                              name="Accept"                data-endpoint="GETapi-transfer-aP--with_attended---patient_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>with_attended</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="with_attended"                data-endpoint="GETapi-transfer-aP--with_attended---patient_id-"
               value="17"
               data-component="url">
    <br>
<p>Boolean value means does the admin want all of transfers to be showen even with attended ones? Example: <code>17</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>patient_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="patient_id"                data-endpoint="GETapi-transfer-aP--with_attended---patient_id-"
               value="17"
               data-component="url">
    <br>
<p>min:1 The ID number of patient to view all permissions given by him Example: <code>17</code></p>
            </div>
                    </form>

                    <h2 id="transfer-apis-GETapi-transfer-pRef--per_page---with_attended---doctor_id-">Paginate transfers sent by a specified doctor</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<h3>For: Web, Mobile(Doctor)</h3>
<p>Only admins and doctors are allowed to use this API</p>
<h3>⚠ Important Info: The response's "data" field content would change based on the logged-in user role!</h3>

<span id="example-requests-GETapi-transfer-pRef--per_page---with_attended---doctor_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/transfer/pRef/17/17/17" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/transfer/pRef/17/17/17"
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

<span id="example-responses-GETapi-transfer-pRef--per_page---with_attended---doctor_id-">
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;did_succeed&quot;: false,
    &quot;message&quot;: {
        &quot;base_message&quot;: &quot;Not found&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-transfer-pRef--per_page---with_attended---doctor_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-transfer-pRef--per_page---with_attended---doctor_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-transfer-pRef--per_page---with_attended---doctor_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-transfer-pRef--per_page---with_attended---doctor_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-transfer-pRef--per_page---with_attended---doctor_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-transfer-pRef--per_page---with_attended---doctor_id-" data-method="GET"
      data-path="api/transfer/pRef/{per_page}/{with_attended}/{doctor_id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-transfer-pRef--per_page---with_attended---doctor_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-transfer-pRef--per_page---with_attended---doctor_id-"
                    onclick="tryItOut('GETapi-transfer-pRef--per_page---with_attended---doctor_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-transfer-pRef--per_page---with_attended---doctor_id-"
                    onclick="cancelTryOut('GETapi-transfer-pRef--per_page---with_attended---doctor_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-transfer-pRef--per_page---with_attended---doctor_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/transfer/pRef/{per_page}/{with_attended}/{doctor_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-transfer-pRef--per_page---with_attended---doctor_id-"
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
                              name="Content-Type"                data-endpoint="GETapi-transfer-pRef--per_page---with_attended---doctor_id-"
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
                              name="Accept"                data-endpoint="GETapi-transfer-pRef--per_page---with_attended---doctor_id-"
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
               step="any"               name="per_page"                data-endpoint="GETapi-transfer-pRef--per_page---with_attended---doctor_id-"
               value="17"
               data-component="url">
    <br>
<p>min:1 The number of items be shown in each page. Defaults to 10. Example: <code>17</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>with_attended</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="with_attended"                data-endpoint="GETapi-transfer-pRef--per_page---with_attended---doctor_id-"
               value="17"
               data-component="url">
    <br>
<p>Boolean value means does the admin want all of transfers to be showen even with attended ones? Example: <code>17</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>doctor_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="doctor_id"                data-endpoint="GETapi-transfer-pRef--per_page---with_attended---doctor_id-"
               value="17"
               data-component="url">
    <br>
<p>Example: <code>17</code></p>
            </div>
                    </form>

                    <h2 id="transfer-apis-GETapi-transfer-pRec--per_page---with_attended---doctor_id-">Paginate received transfers of a specified doctor</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<h3>For: Web, Mobile(Doctor)</h3>
<p>Only admins and doctors are allowed to use this API</p>
<h3>⚠ Important Info: The response's "data" field content would change based on the logged-in user role!</h3>

<span id="example-requests-GETapi-transfer-pRec--per_page---with_attended---doctor_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/transfer/pRec/17/17/17" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/transfer/pRec/17/17/17"
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

<span id="example-responses-GETapi-transfer-pRec--per_page---with_attended---doctor_id-">
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;did_succeed&quot;: false,
    &quot;message&quot;: {
        &quot;base_message&quot;: &quot;Not found&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-transfer-pRec--per_page---with_attended---doctor_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-transfer-pRec--per_page---with_attended---doctor_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-transfer-pRec--per_page---with_attended---doctor_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-transfer-pRec--per_page---with_attended---doctor_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-transfer-pRec--per_page---with_attended---doctor_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-transfer-pRec--per_page---with_attended---doctor_id-" data-method="GET"
      data-path="api/transfer/pRec/{per_page}/{with_attended}/{doctor_id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-transfer-pRec--per_page---with_attended---doctor_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-transfer-pRec--per_page---with_attended---doctor_id-"
                    onclick="tryItOut('GETapi-transfer-pRec--per_page---with_attended---doctor_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-transfer-pRec--per_page---with_attended---doctor_id-"
                    onclick="cancelTryOut('GETapi-transfer-pRec--per_page---with_attended---doctor_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-transfer-pRec--per_page---with_attended---doctor_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/transfer/pRec/{per_page}/{with_attended}/{doctor_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-transfer-pRec--per_page---with_attended---doctor_id-"
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
                              name="Content-Type"                data-endpoint="GETapi-transfer-pRec--per_page---with_attended---doctor_id-"
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
                              name="Accept"                data-endpoint="GETapi-transfer-pRec--per_page---with_attended---doctor_id-"
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
               step="any"               name="per_page"                data-endpoint="GETapi-transfer-pRec--per_page---with_attended---doctor_id-"
               value="17"
               data-component="url">
    <br>
<p>min:1 The number of items be shown in each page. Defaults to 10. Example: <code>17</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>with_attended</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="with_attended"                data-endpoint="GETapi-transfer-pRec--per_page---with_attended---doctor_id-"
               value="17"
               data-component="url">
    <br>
<p>Boolean value means does the admin want all of transfers to be showen even with attended ones? Example: <code>17</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>doctor_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="doctor_id"                data-endpoint="GETapi-transfer-pRec--per_page---with_attended---doctor_id-"
               value="17"
               data-component="url">
    <br>
<p>Example: <code>17</code></p>
            </div>
                    </form>

                <h1 id="unavailability-apis">Unavailability APIs</h1>

    

                                <h2 id="unavailability-apis-POSTapi-unavailability">Create an unavailability</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<h3>For: Mobile(Doctor), Web</h3>
<p>Only admins and doctors are allowed to use this API.
Creating a new unavailability by a doctor or admin, the doctor can create his own unavailability,
and the admin can create unavailability for medical center.</p>

<span id="example-requests-POSTapi-unavailability">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/api/unavailability" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"from_date\": \"2107-08-04\",
    \"to_date\": \"2107-08-04\",
    \"reason_type\": \"vacation\",
    \"justification\": \"consequatur\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/unavailability"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "from_date": "2107-08-04",
    "to_date": "2107-08-04",
    "reason_type": "vacation",
    "justification": "consequatur"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-unavailability">
</span>
<span id="execution-results-POSTapi-unavailability" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-unavailability"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-unavailability"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-unavailability" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-unavailability">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-unavailability" data-method="POST"
      data-path="api/unavailability"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-unavailability', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-unavailability"
                    onclick="tryItOut('POSTapi-unavailability');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-unavailability"
                    onclick="cancelTryOut('POSTapi-unavailability');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-unavailability"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/unavailability</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-unavailability"
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
                              name="Content-Type"                data-endpoint="POSTapi-unavailability"
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
                              name="Accept"                data-endpoint="POSTapi-unavailability"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>from_date</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="from_date"                data-endpoint="POSTapi-unavailability"
               value="2107-08-04"
               data-component="body">
    <br>
<p>Must be a valid date in the format <code>Y-m-d</code>. Must be a date after or equal to <code>2026-07-05 00:00:00</code>. Example: <code>2107-08-04</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>to_date</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="to_date"                data-endpoint="POSTapi-unavailability"
               value="2107-08-04"
               data-component="body">
    <br>
<p>Must be a valid date in the format <code>Y-m-d</code>. Must be a date after or equal to <code>from_date</code>. Example: <code>2107-08-04</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>reason_type</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="reason_type"                data-endpoint="POSTapi-unavailability"
               value="vacation"
               data-component="body">
    <br>
<p>Example: <code>vacation</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>vacation</code></li> <li><code>other</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>justification</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="justification"                data-endpoint="POSTapi-unavailability"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
        </form>

                    <h2 id="unavailability-apis-GETapi-unavailability--with_passed---per_page-">Paginate unavailabilities of all doctors</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<h3>For: Web</h3>
<p>Only admins are allowed to use this API.</p>

<span id="example-requests-GETapi-unavailability--with_passed---per_page-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/unavailability/17/17" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/unavailability/17/17"
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

<span id="example-responses-GETapi-unavailability--with_passed---per_page-">
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;did_succeed&quot;: false,
    &quot;message&quot;: {
        &quot;base_message&quot;: &quot;Not found&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-unavailability--with_passed---per_page-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-unavailability--with_passed---per_page-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-unavailability--with_passed---per_page-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-unavailability--with_passed---per_page-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-unavailability--with_passed---per_page-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-unavailability--with_passed---per_page-" data-method="GET"
      data-path="api/unavailability/{with_passed}/{per_page}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-unavailability--with_passed---per_page-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-unavailability--with_passed---per_page-"
                    onclick="tryItOut('GETapi-unavailability--with_passed---per_page-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-unavailability--with_passed---per_page-"
                    onclick="cancelTryOut('GETapi-unavailability--with_passed---per_page-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-unavailability--with_passed---per_page-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/unavailability/{with_passed}/{per_page}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-unavailability--with_passed---per_page-"
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
                              name="Content-Type"                data-endpoint="GETapi-unavailability--with_passed---per_page-"
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
                              name="Accept"                data-endpoint="GETapi-unavailability--with_passed---per_page-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>with_passed</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="with_passed"                data-endpoint="GETapi-unavailability--with_passed---per_page-"
               value="17"
               data-component="url">
    <br>
<p>Boolean value means does the user want all of unavailabilities to be showen even with the ones from the past? Example: <code>17</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>per_page</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="per_page"                data-endpoint="GETapi-unavailability--with_passed---per_page-"
               value="17"
               data-component="url">
    <br>
<p>The number of items shown in each page, Defaults to 10. Example: <code>17</code></p>
            </div>
                    </form>

                    <h2 id="unavailability-apis-GETapi-unavailability--with_passed---per_page---doctor_id-">Paginate unavailabilities of a specified doctor</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<h3>For: Web, Mobile(Doctor)</h3>
<p>Only admins and doctors are allowed to use this API.</p>

<span id="example-requests-GETapi-unavailability--with_passed---per_page---doctor_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/unavailability/17/17/17" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/unavailability/17/17/17"
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

<span id="example-responses-GETapi-unavailability--with_passed---per_page---doctor_id-">
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;did_succeed&quot;: false,
    &quot;message&quot;: {
        &quot;base_message&quot;: &quot;Not found&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-unavailability--with_passed---per_page---doctor_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-unavailability--with_passed---per_page---doctor_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-unavailability--with_passed---per_page---doctor_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-unavailability--with_passed---per_page---doctor_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-unavailability--with_passed---per_page---doctor_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-unavailability--with_passed---per_page---doctor_id-" data-method="GET"
      data-path="api/unavailability/{with_passed}/{per_page}/{doctor_id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-unavailability--with_passed---per_page---doctor_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-unavailability--with_passed---per_page---doctor_id-"
                    onclick="tryItOut('GETapi-unavailability--with_passed---per_page---doctor_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-unavailability--with_passed---per_page---doctor_id-"
                    onclick="cancelTryOut('GETapi-unavailability--with_passed---per_page---doctor_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-unavailability--with_passed---per_page---doctor_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/unavailability/{with_passed}/{per_page}/{doctor_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-unavailability--with_passed---per_page---doctor_id-"
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
                              name="Content-Type"                data-endpoint="GETapi-unavailability--with_passed---per_page---doctor_id-"
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
                              name="Accept"                data-endpoint="GETapi-unavailability--with_passed---per_page---doctor_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>with_passed</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="with_passed"                data-endpoint="GETapi-unavailability--with_passed---per_page---doctor_id-"
               value="17"
               data-component="url">
    <br>
<p>Boolean value means does the user want all of unavailabilities to be showen even with the ones from the past? Example: <code>17</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>per_page</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="per_page"                data-endpoint="GETapi-unavailability--with_passed---per_page---doctor_id-"
               value="17"
               data-component="url">
    <br>
<p>The number of items shown in each page, Defaults to 10. Example: <code>17</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>doctor_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="doctor_id"                data-endpoint="GETapi-unavailability--with_passed---per_page---doctor_id-"
               value="17"
               data-component="url">
    <br>
<p>The ID of the doctor to view his unavailabilities Example: <code>17</code></p>
            </div>
                    </form>

                    <h2 id="unavailability-apis-GETapi-unavailability-m--with_passed---per_page-">Paginate unavailabilities of the medical center</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<h3>For: Web</h3>
<p>Only admins are allowed to use this API.</p>

<span id="example-requests-GETapi-unavailability-m--with_passed---per_page-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/unavailability/m/17/17" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/unavailability/m/17/17"
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

<span id="example-responses-GETapi-unavailability-m--with_passed---per_page-">
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;did_succeed&quot;: false,
    &quot;message&quot;: {
        &quot;base_message&quot;: &quot;Not found&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-unavailability-m--with_passed---per_page-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-unavailability-m--with_passed---per_page-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-unavailability-m--with_passed---per_page-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-unavailability-m--with_passed---per_page-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-unavailability-m--with_passed---per_page-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-unavailability-m--with_passed---per_page-" data-method="GET"
      data-path="api/unavailability/m/{with_passed}/{per_page}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-unavailability-m--with_passed---per_page-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-unavailability-m--with_passed---per_page-"
                    onclick="tryItOut('GETapi-unavailability-m--with_passed---per_page-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-unavailability-m--with_passed---per_page-"
                    onclick="cancelTryOut('GETapi-unavailability-m--with_passed---per_page-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-unavailability-m--with_passed---per_page-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/unavailability/m/{with_passed}/{per_page}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-unavailability-m--with_passed---per_page-"
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
                              name="Content-Type"                data-endpoint="GETapi-unavailability-m--with_passed---per_page-"
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
                              name="Accept"                data-endpoint="GETapi-unavailability-m--with_passed---per_page-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>with_passed</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="with_passed"                data-endpoint="GETapi-unavailability-m--with_passed---per_page-"
               value="17"
               data-component="url">
    <br>
<p>Boolean value means does the admin want all of unavailabilities to be showen even with the ones from the past? Example: <code>17</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>per_page</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="per_page"                data-endpoint="GETapi-unavailability-m--with_passed---per_page-"
               value="17"
               data-component="url">
    <br>
<p>The number of items shown in each page, Defaults to 10. Example: <code>17</code></p>
            </div>
                    </form>

                <h1 id="doctor-speciality-apis">Doctor_Speciality APIs</h1>

    

                                <h2 id="doctor-speciality-apis-POSTapi-dSpecialities">Add New Speciality to a Doctor</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<h3>For: Mobile(Doctor)</h3>
<p>Only doctors are allowed to use this API.</p>

<span id="example-requests-POSTapi-dSpecialities">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/api/dSpecialities" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"speciality_id\": 17,
    \"experience_starting_date\": \"2026-07-05\",
    \"view_experience\": false
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/dSpecialities"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "speciality_id": 17,
    "experience_starting_date": "2026-07-05",
    "view_experience": false
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-dSpecialities">
</span>
<span id="execution-results-POSTapi-dSpecialities" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-dSpecialities"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-dSpecialities"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-dSpecialities" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-dSpecialities">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-dSpecialities" data-method="POST"
      data-path="api/dSpecialities"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-dSpecialities', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-dSpecialities"
                    onclick="tryItOut('POSTapi-dSpecialities');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-dSpecialities"
                    onclick="cancelTryOut('POSTapi-dSpecialities');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-dSpecialities"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/dSpecialities</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-dSpecialities"
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
                              name="Content-Type"                data-endpoint="POSTapi-dSpecialities"
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
                              name="Accept"                data-endpoint="POSTapi-dSpecialities"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>speciality_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="speciality_id"                data-endpoint="POSTapi-dSpecialities"
               value="17"
               data-component="body">
    <br>
<p>The <code>id</code> of an existing record in the specialities table. Example: <code>17</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>experience_starting_date</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="experience_starting_date"                data-endpoint="POSTapi-dSpecialities"
               value="2026-07-05"
               data-component="body">
    <br>
<p>Must be a valid date in the format <code>Y-m-d</code>. Example: <code>2026-07-05</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>view_experience</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
 &nbsp;
 &nbsp;
                <label data-endpoint="POSTapi-dSpecialities" style="display: none">
            <input type="radio" name="view_experience"
                   value="true"
                   data-endpoint="POSTapi-dSpecialities"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="POSTapi-dSpecialities" style="display: none">
            <input type="radio" name="view_experience"
                   value="false"
                   data-endpoint="POSTapi-dSpecialities"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Example: <code>false</code></p>
        </div>
        </form>

                    <h2 id="doctor-speciality-apis-GETapi-dSpecialities--per_page-">Paginate Doctors&#039; Specialities</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<h3>For: Web</h3>
<p>Only admins are allowed to use this API.</p>

<span id="example-requests-GETapi-dSpecialities--per_page-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/dSpecialities/17" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/dSpecialities/17"
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

<span id="example-responses-GETapi-dSpecialities--per_page-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;did_succeed&quot;: false,
    &quot;message&quot;: {
        &quot;base_message&quot;: &quot;Unauthenticated; A valid token is required&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-dSpecialities--per_page-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-dSpecialities--per_page-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-dSpecialities--per_page-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-dSpecialities--per_page-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-dSpecialities--per_page-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-dSpecialities--per_page-" data-method="GET"
      data-path="api/dSpecialities/{per_page}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-dSpecialities--per_page-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-dSpecialities--per_page-"
                    onclick="tryItOut('GETapi-dSpecialities--per_page-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-dSpecialities--per_page-"
                    onclick="cancelTryOut('GETapi-dSpecialities--per_page-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-dSpecialities--per_page-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/dSpecialities/{per_page}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-dSpecialities--per_page-"
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
                              name="Content-Type"                data-endpoint="GETapi-dSpecialities--per_page-"
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
                              name="Accept"                data-endpoint="GETapi-dSpecialities--per_page-"
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
               step="any"               name="per_page"                data-endpoint="GETapi-dSpecialities--per_page-"
               value="17"
               data-component="url">
    <br>
<p>The number of doctors shown in each page. Defaults to 10. Example: <code>17</code></p>
            </div>
                    </form>

                    <h2 id="doctor-speciality-apis-GETapi-dSpecialities-IFD--doctor_id-">All Specialities of a Doctor</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<h3>For: Mobile(Patient, Doctor), Web</h3>
<p>Everyone in the system is allowed to use this API.</p>
<h3>⚠ Important Info 1: The response's "data" field content would change based on the logged-in user role!</h3>
<h3>⚠ Important Info 2: If the logged-in user is the owner doctor himself, the response's "data" field content would have more details than what other doctors can see!</h3>

<span id="example-requests-GETapi-dSpecialities-IFD--doctor_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/dSpecialities/IFD/consequatur" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/dSpecialities/IFD/consequatur"
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

<span id="example-responses-GETapi-dSpecialities-IFD--doctor_id-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;did_succeed&quot;: false,
    &quot;message&quot;: {
        &quot;base_message&quot;: &quot;Unauthenticated; A valid token is required&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-dSpecialities-IFD--doctor_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-dSpecialities-IFD--doctor_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-dSpecialities-IFD--doctor_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-dSpecialities-IFD--doctor_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-dSpecialities-IFD--doctor_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-dSpecialities-IFD--doctor_id-" data-method="GET"
      data-path="api/dSpecialities/IFD/{doctor_id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-dSpecialities-IFD--doctor_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-dSpecialities-IFD--doctor_id-"
                    onclick="tryItOut('GETapi-dSpecialities-IFD--doctor_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-dSpecialities-IFD--doctor_id-"
                    onclick="cancelTryOut('GETapi-dSpecialities-IFD--doctor_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-dSpecialities-IFD--doctor_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/dSpecialities/IFD/{doctor_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-dSpecialities-IFD--doctor_id-"
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
                              name="Content-Type"                data-endpoint="GETapi-dSpecialities-IFD--doctor_id-"
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
                              name="Accept"                data-endpoint="GETapi-dSpecialities-IFD--doctor_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>doctor_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="doctor_id"                data-endpoint="GETapi-dSpecialities-IFD--doctor_id-"
               value="consequatur"
               data-component="url">
    <br>
<p>The ID of the doctor. Example: <code>consequatur</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>doctorId</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="doctorId"                data-endpoint="GETapi-dSpecialities-IFD--doctor_id-"
               value="17"
               data-component="url">
    <br>
<p>min:1 Example: <code>17</code></p>
            </div>
                    </form>

                    <h2 id="doctor-speciality-apis-GETapi-dSpecialities-IFS--speciality_id-">All Doctors of a Speciality</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<h3>For: Mobile(Patient, Doctor), Web</h3>
<p>Everyone in the system is allowed to use this API.</p>
<h3>⚠ Important Info: The response's "data" field content would change based on the logged-in user role!</h3>

<span id="example-requests-GETapi-dSpecialities-IFS--speciality_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/dSpecialities/IFS/consequatur" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/dSpecialities/IFS/consequatur"
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

<span id="example-responses-GETapi-dSpecialities-IFS--speciality_id-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;did_succeed&quot;: false,
    &quot;message&quot;: {
        &quot;base_message&quot;: &quot;Unauthenticated; A valid token is required&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-dSpecialities-IFS--speciality_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-dSpecialities-IFS--speciality_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-dSpecialities-IFS--speciality_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-dSpecialities-IFS--speciality_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-dSpecialities-IFS--speciality_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-dSpecialities-IFS--speciality_id-" data-method="GET"
      data-path="api/dSpecialities/IFS/{speciality_id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-dSpecialities-IFS--speciality_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-dSpecialities-IFS--speciality_id-"
                    onclick="tryItOut('GETapi-dSpecialities-IFS--speciality_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-dSpecialities-IFS--speciality_id-"
                    onclick="cancelTryOut('GETapi-dSpecialities-IFS--speciality_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-dSpecialities-IFS--speciality_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/dSpecialities/IFS/{speciality_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-dSpecialities-IFS--speciality_id-"
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
                              name="Content-Type"                data-endpoint="GETapi-dSpecialities-IFS--speciality_id-"
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
                              name="Accept"                data-endpoint="GETapi-dSpecialities-IFS--speciality_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>speciality_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="speciality_id"                data-endpoint="GETapi-dSpecialities-IFS--speciality_id-"
               value="consequatur"
               data-component="url">
    <br>
<p>The ID of the speciality. Example: <code>consequatur</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>specialityId</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="specialityId"                data-endpoint="GETapi-dSpecialities-IFS--speciality_id-"
               value="17"
               data-component="url">
    <br>
<p>min:1 Example: <code>17</code></p>
            </div>
                    </form>

                    <h2 id="doctor-speciality-apis-GETapi-dSpecialities-s--id-">View a Specified Doctor-Speciality</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<h3>For: Mobile(Patient - Doctor), Web</h3>
<p>Everyone in the system is allowed to use this API.</p>
<h3>⚠ Important Info 1: The response's "data" field content would change based on the logged-in user role!</h3>
<h3>⚠ Important Info 2: If the logged-in user is the owner doctor himself, the response's "data" field content would have more details than what other doctors can see!</h3>

<span id="example-requests-GETapi-dSpecialities-s--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/dSpecialities/s/17" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/dSpecialities/s/17"
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

<span id="example-responses-GETapi-dSpecialities-s--id-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;did_succeed&quot;: false,
    &quot;message&quot;: {
        &quot;base_message&quot;: &quot;Unauthenticated; A valid token is required&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-dSpecialities-s--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-dSpecialities-s--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-dSpecialities-s--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-dSpecialities-s--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-dSpecialities-s--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-dSpecialities-s--id-" data-method="GET"
      data-path="api/dSpecialities/s/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-dSpecialities-s--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-dSpecialities-s--id-"
                    onclick="tryItOut('GETapi-dSpecialities-s--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-dSpecialities-s--id-"
                    onclick="cancelTryOut('GETapi-dSpecialities-s--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-dSpecialities-s--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/dSpecialities/s/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-dSpecialities-s--id-"
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
                              name="Content-Type"                data-endpoint="GETapi-dSpecialities-s--id-"
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
                              name="Accept"                data-endpoint="GETapi-dSpecialities-s--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-dSpecialities-s--id-"
               value="17"
               data-component="url">
    <br>
<p>min:1 Example: <code>17</code></p>
            </div>
                    </form>

                    <h2 id="doctor-speciality-apis-PUTapi-dSpecialities--id-">Update a Speciality of a Doctor</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<h3>For: Mobile(Doctor)</h3>
<p>Only doctors are allowed to use this API.</p>

<span id="example-requests-PUTapi-dSpecialities--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://127.0.0.1:8000/api/dSpecialities/17" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"experience_starting_date\": \"2026-07-05\",
    \"view_experience\": false
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/dSpecialities/17"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "experience_starting_date": "2026-07-05",
    "view_experience": false
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-dSpecialities--id-">
</span>
<span id="execution-results-PUTapi-dSpecialities--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-dSpecialities--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-dSpecialities--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-dSpecialities--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-dSpecialities--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-dSpecialities--id-" data-method="PUT"
      data-path="api/dSpecialities/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-dSpecialities--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-dSpecialities--id-"
                    onclick="tryItOut('PUTapi-dSpecialities--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-dSpecialities--id-"
                    onclick="cancelTryOut('PUTapi-dSpecialities--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-dSpecialities--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/dSpecialities/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="PUTapi-dSpecialities--id-"
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
                              name="Content-Type"                data-endpoint="PUTapi-dSpecialities--id-"
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
                              name="Accept"                data-endpoint="PUTapi-dSpecialities--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PUTapi-dSpecialities--id-"
               value="17"
               data-component="url">
    <br>
<p>min:1 Example: <code>17</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>experience_starting_date</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="experience_starting_date"                data-endpoint="PUTapi-dSpecialities--id-"
               value="2026-07-05"
               data-component="body">
    <br>
<p>Must be a valid date in the format <code>Y-m-d</code>. Example: <code>2026-07-05</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>view_experience</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <label data-endpoint="PUTapi-dSpecialities--id-" style="display: none">
            <input type="radio" name="view_experience"
                   value="true"
                   data-endpoint="PUTapi-dSpecialities--id-"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="PUTapi-dSpecialities--id-" style="display: none">
            <input type="radio" name="view_experience"
                   value="false"
                   data-endpoint="PUTapi-dSpecialities--id-"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Example: <code>false</code></p>
        </div>
        </form>

                    <h2 id="doctor-speciality-apis-DELETEapi-dSpecialities--id-">Delete a Speciality from a Doctor Specialities</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<h3>For: Mobile(Doctor)</h3>
<p>Only doctors are allowed to use this API.</p>

<span id="example-requests-DELETEapi-dSpecialities--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://127.0.0.1:8000/api/dSpecialities/17" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/dSpecialities/17"
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

<span id="example-responses-DELETEapi-dSpecialities--id-">
</span>
<span id="execution-results-DELETEapi-dSpecialities--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-dSpecialities--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-dSpecialities--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-dSpecialities--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-dSpecialities--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-dSpecialities--id-" data-method="DELETE"
      data-path="api/dSpecialities/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-dSpecialities--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-dSpecialities--id-"
                    onclick="tryItOut('DELETEapi-dSpecialities--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-dSpecialities--id-"
                    onclick="cancelTryOut('DELETEapi-dSpecialities--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-dSpecialities--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/dSpecialities/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="DELETEapi-dSpecialities--id-"
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
                              name="Content-Type"                data-endpoint="DELETEapi-dSpecialities--id-"
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
                              name="Accept"                data-endpoint="DELETEapi-dSpecialities--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="DELETEapi-dSpecialities--id-"
               value="17"
               data-component="url">
    <br>
<p>min:1 Example: <code>17</code></p>
            </div>
                    </form>

                <h1 id="endpoints">Endpoints</h1>

    

                                <h2 id="endpoints-GETapi-admins--search_word-">Search for a admin</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<h3>For: Web</h3>
<p>Only admins are allowed to use this API.
This API is to search for an admin by first_name, returns a collection of admins have similar first_name</p>

<span id="example-requests-GETapi-admins--search_word-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/admins/consequatur" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/admins/consequatur"
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

<span id="example-responses-GETapi-admins--search_word-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;did_succeed&quot;: false,
    &quot;message&quot;: {
        &quot;base_message&quot;: &quot;Unauthenticated; A valid token is required&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-admins--search_word-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-admins--search_word-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-admins--search_word-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-admins--search_word-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-admins--search_word-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-admins--search_word-" data-method="GET"
      data-path="api/admins/{search_word}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-admins--search_word-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-admins--search_word-"
                    onclick="tryItOut('GETapi-admins--search_word-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-admins--search_word-"
                    onclick="cancelTryOut('GETapi-admins--search_word-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-admins--search_word-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/admins/{search_word}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-admins--search_word-"
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
                              name="Content-Type"                data-endpoint="GETapi-admins--search_word-"
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
                              name="Accept"                data-endpoint="GETapi-admins--search_word-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>search_word</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="search_word"                data-endpoint="GETapi-admins--search_word-"
               value="consequatur"
               data-component="url">
    <br>
<p>Example: <code>consequatur</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-POSTapi-admins--user_id-">Add New admin</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<h3>For: Web</h3>
<p>Only admins are allowed to use this API.</p>

<span id="example-requests-POSTapi-admins--user_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/api/admins/17" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/admins/17"
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

<span id="example-responses-POSTapi-admins--user_id-">
</span>
<span id="execution-results-POSTapi-admins--user_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-admins--user_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-admins--user_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-admins--user_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-admins--user_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-admins--user_id-" data-method="POST"
      data-path="api/admins/{user_id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-admins--user_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-admins--user_id-"
                    onclick="tryItOut('POSTapi-admins--user_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-admins--user_id-"
                    onclick="cancelTryOut('POSTapi-admins--user_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-admins--user_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/admins/{user_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-admins--user_id-"
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
                              name="Content-Type"                data-endpoint="POSTapi-admins--user_id-"
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
                              name="Accept"                data-endpoint="POSTapi-admins--user_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>user_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="user_id"                data-endpoint="POSTapi-admins--user_id-"
               value="17"
               data-component="url">
    <br>
<p>The ID of user to link new admin with Example: <code>17</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-POSTapi-admins-u--id-">Unactive an admin</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<h3>For: Web</h3>
<p>Only admins are allowed to use this API</p>

<span id="example-requests-POSTapi-admins-u--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/api/admins/u/17" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/admins/u/17"
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

<span id="example-responses-POSTapi-admins-u--id-">
</span>
<span id="execution-results-POSTapi-admins-u--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-admins-u--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-admins-u--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-admins-u--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-admins-u--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-admins-u--id-" data-method="POST"
      data-path="api/admins/u/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-admins-u--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-admins-u--id-"
                    onclick="tryItOut('POSTapi-admins-u--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-admins-u--id-"
                    onclick="cancelTryOut('POSTapi-admins-u--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-admins-u--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/admins/u/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-admins-u--id-"
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
                              name="Content-Type"                data-endpoint="POSTapi-admins-u--id-"
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
                              name="Accept"                data-endpoint="POSTapi-admins-u--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="POSTapi-admins-u--id-"
               value="17"
               data-component="url">
    <br>
<p>The ID number of admin to unactive Example: <code>17</code></p>
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
