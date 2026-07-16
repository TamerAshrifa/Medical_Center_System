<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\DoctorSpecialityController;
use App\Http\Controllers\MedicalRecordAccessController;
use App\Http\Controllers\PatientComplaintController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\SpecialityController;
use App\Http\Controllers\TransferController;
use App\Http\Controllers\UnavailabilityController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VisitController;
use App\Http\Controllers\WorkScheduleController;
use Illuminate\Support\Facades\Route;

// Authentication
Route::middleware('throttle:3,1')->group(function () {
    Route::post('r', [AuthController::class, 'register']);
    Route::post('v', [AuthController::class, 'verifyOtp']);
    Route::post('l', [AuthController::class, 'login']);
    Route::post('f', [AuthController::class, 'forgotPassword']);
    Route::post('re', [AuthController::class, 'resetPassword']);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::post('logout', [AuthController::class, 'logout'])->middleware('throttle:1,1');

    // Users APIs
    Route::prefix('users/')->group(function () {
        Route::post('', [UserController::class, 'store'])->middleware('CheckAdmin');
        Route::get('{per_page}', [UserController::class, 'index'])->middleware('CheckAdmin');
        Route::get('s/{id}', [UserController::class, 'show']);
        Route::get('se/{search_word}', [UserController::class, 'searchForNonRoledUser']);
        Route::put('{id}', [UserController::class, 'update']);
    });

    // Patient APIs
    Route::prefix('patients/')->group(function () {
        Route::post('', [PatientController::class, 'store'])->middleware('StorePatientMiddleware');
        Route::get('{per_page}', [PatientController::class, 'index'])->middleware('CheckAdmin');
        Route::get('s/{id}', [PatientController::class, 'show'])->middleware('ShowPatientMiddleware');
        Route::get('se/{search_word}', [PatientController::class, 'search'])->middleware(['CheckDoctor']);
        Route::put('{id}', [PatientController::class, 'update'])->middleware(['CheckPatientOnly', 'UpdatePatientMiddleware']);
        Route::delete('{id}', [PatientController::class, 'destroy'])->middleware('CheckAdmin');
    });

    // Admin APIs
    Route::prefix('admins/')->middleware('CheckAdmin')->group(function () {
        Route::get('{search_word}', [AdminController::class, 'search']);
        Route::post('u/{id}', [AdminController::class, 'destroy']);
        Route::put('u/{id}', [AdminController::class, 'activate']);
        Route::post('m/m', [AdminController::class, 'monthlyReport']);
        Route::post('{user_id}', [AdminController::class, 'store']);
    });

    // Room APIs
    Route::prefix('rooms/')->group(function () {
        Route::post('', [RoomController::class, 'store'])->middleware('CheckAdmin');
        Route::get('{per_page}', [RoomController::class, 'index'])->middleware('CheckAdmin');
        Route::get('s/{roomId}', [RoomController::class, 'show']);
        Route::put('{roomId}', [RoomController::class, 'update'])->middleware('CheckAdmin');
        Route::delete('{roomId}', [RoomController::class, 'destroy'])->middleware('CheckAdmin');
    });

    // Doctor APIs
    Route::prefix('doctors/')->group(function () {
        Route::post('', [DoctorController::class, 'store'])->middleware('CheckAdmin');
        Route::get('{per_page}/{with_unactive}', [DoctorController::class, 'index']);
        Route::get('s/{doctor_id}', [DoctorController::class, 'show']);
        Route::get('se/{search_word}', [DoctorController::class, 'search']);
        Route::put('{doctor_id}', [DoctorController::class, 'update'])->middleware(['CheckDoctorOnly', 'UpdateDoctorMiddleware']);
        Route::put('d/{id}', [DoctorController::class, 'deactivate'])->middleware('CheckAdmin');
        Route::put('a/{id}/{room_id}', [DoctorController::class, 'activate'])->middleware('CheckAdmin');
        Route::delete('{doctorId}', [DoctorController::class, 'destroy'])->middleware('CheckAdmin');
    });

    // Specialities APIs
    Route::prefix('specialities/')->group(function () {
        Route::post('', [SpecialityController::class, 'store'])->middleware('CheckAdmin');
        Route::get('{per_page}', [SpecialityController::class, 'index']);
        Route::get('s/{specialityId}', [SpecialityController::class, 'show']);
        Route::put('{specialityId}', [SpecialityController::class, 'update'])->middleware('CheckAdmin');
        Route::delete('{specialityId}', [SpecialityController::class, 'destroy'])->middleware('CheckAdmin');
    });

    // Doctor Speciality APIs
    Route::prefix('dSpecialities/')->group(function () {
        Route::post('', [DoctorSpecialityController::class, 'store'])->middleware('CheckDoctor');
        Route::get('{per_page}', [DoctorSpecialityController::class, 'index'])->middleware('CheckAdmin');
        Route::get('IFD/{doctor_id}', [DoctorSpecialityController::class, 'indexForDoctor']);
        Route::get('IFS/{speciality_id}', [DoctorSpecialityController::class, 'indexForSpeciality']);
        Route::get('s/{id}', [DoctorSpecialityController::class, 'show']);
        Route::put('{id}', [DoctorSpecialityController::class, 'update'])->middleware(['CheckDoctor', 'UpdateDoctorSpecialityMiddleware']);
        Route::delete('{id}', [DoctorSpecialityController::class, 'destroy'])->middleware(['CheckDoctor', 'DeleteDoctorSpecialityMiddleware']);
    });

    // Scheduling APIs
    Route::prefix('schedules/')->group(function () {
        Route::post('', [WorkScheduleController::class, 'store'])->middleware('CheckDoctor');
        Route::get('WDs', [WorkScheduleController::class, 'indexWeekDays']);
        Route::get('DsWS/{with_expired}/{with_unactive_doctors}/{per_page}', [WorkScheduleController::class, 'paginateDoctorsWorkSchedules'])->middleware('CheckAdmin');
        Route::get('MCWS/{with_expired}/{per_page}', [WorkScheduleController::class, 'paginateMedicalCenterWorkSchedules'])->middleware('CheckAdmin');
        Route::get('DWS/{doctor_id}/{with_expired}/{per_page}', [WorkScheduleController::class, 'paginateDoctorWorkSchedules'])->middleware(['CheckDoctor', 'PaginateDoctorWorkSchedulesMiddleware']);
    });

    // Appointment APIs
    Route::prefix('appointments/')->group(function () {
        Route::post('{doctor_id}', [AppointmentController::class, 'allAvailableTimesToBook'])->middleware('CheckPatientOnly');
        Route::post('s/{doctor_id}', [AppointmentController::class, 'store'])->middleware('CheckPatientOnly');
        Route::get('{status}/{with_expired}/{per_page}', [AppointmentController::class, 'paginate'])->middleware('CheckAdmin');
        Route::get('DA/{status}/{with_expired}/{per_page}/{doctor_id}', [AppointmentController::class, 'paginateDoctorAppointments'])->middleware(['CheckDoctor', 'PaginateDoctorAppointmentsMiddleware']);
        Route::get('PA/{status}/{with_expired}/{per_page}/{patient_id}', [AppointmentController::class, 'paginatePatientAppointments'])->middleware('CheckPatient');
        Route::get('{id}', [AppointmentController::class, 'show'])->middleware('ShowAppointmentMiddleware');

        Route::post('cA/{id}', [AppointmentController::class, 'cancelAppointment'])->middleware(['CheckPatientOnly', 'CancelAppointmentMiddleware']);
        Route::post('mA/{id}', [AppointmentController::class, 'makeAppointmentMissed'])->middleware(['CheckDoctorOnly', 'MakeAppointmentMissedMiddleware']);
        Route::post('aA/{id}', [AppointmentController::class, 'makeAppointmentAttended'])->middleware(['CheckDoctorOnly', 'MakeAppointmentAttendedMiddleware']);
    });

    // Visits APIs
    Route::prefix('visits/')->group(function () {
        Route::get('{per_page}', [VisitController::class, 'paginate'])->middleware('CheckAdmin');
        Route::get('DV/{per_page}/{doctor_id}', [VisitController::class, 'paginateDoctorVisits'])->middleware(['CheckDoctor', 'PaginateDoctorVisitsMiddleware']);
        Route::get('PV/{per_page}/{patient_id}', [VisitController::class, 'paginatePatientVisits'])->middleware(['CheckPatient', 'PaginatePatientVisitsMiddleware']);
        Route::get('s/{id}', [VisitController::class, 'show'])->middleware('ShowVisitMiddleware');
        Route::post('{id}', [VisitController::class, 'update'])->middleware(['CheckDoctorOnly', 'UpdateVisitMiddleware']);
    });

    // Medical Record Access APIs (Access Permission APIs)
    Route::prefix('access/')->group(function () {
        Route::post('{doctor_id}/{visit_id}', [MedicalRecordAccessController::class, 'store'])->middleware(['CheckPatientOnly', 'StoreMedicalRecordAccessMiddleware']);
        Route::get('DA/{per_page}/{with_unactive}/{doctor_id}', [MedicalRecordAccessController::class, 'paginateDoctorMedicalRecordAccesses'])->middleware(['CheckDoctor', 'PaginateDoctorMedicalRecordAccessesMiddleware']);
        Route::get('PA/{per_page}/{with_unactive}/{patient_id}', [MedicalRecordAccessController::class, 'paginatePatientMedicalRecordAccesses'])->middleware(['CheckPatient', 'PaginatePatientMedicalRecordAccessesMiddleware']);
        Route::get('VA/{per_page}/{with_unactive}/{visit_id}', [MedicalRecordAccessController::class, 'paginateVisitMedicalRecordAccesses'])->middleware(['CheckPatient', 'PaginateVisitMedicalRecordAccessesMiddleware']);
        Route::post('{id}', [MedicalRecordAccessController::class, 'destroy'])->middleware(['CheckPatientOnly', 'DestroyMedicalRecordAccessMiddleware']);
    });

    // Patient Complaint APIs
    Route::prefix('complaint/')->group(function () {
        Route::post('', [PatientComplaintController::class, 'store'])->middleware(['CheckPatientOnly', 'throttle:1,1']);
        Route::get('{patient_id}', [PatientComplaintController::class, 'allPatientComplaints'])->middleware(['CheckPatient', 'AllPatientComplaintsMiddleware']);
        Route::get('s/{id}', [PatientComplaintController::class, 'show'])->middleware(['CheckPatient', 'ShowPatientComplaintMiddleware']);
        Route::get('{per_page}/{with_reviewed}', [PatientComplaintController::class, 'paginate'])
            ->whereNumber('per_page')->where('with_reviewed', '0|1|true|false')->middleware(['CheckAdmin']);
        Route::post('{reply}/{id}', [PatientComplaintController::class, 'makePatientComplaintReviewed'])->middleware(['CheckAdmin']);
    });

    // Transfer APIs
    Route::prefix('transfer/')->group(function () {
        Route::post('{transfer_id}', [TransferController::class, 'makeAppointmentForTransfer'])
            ->whereNumber(['transfer_id'])
            ->middleware(['CheckPatientOnly', 'MakeAppointmentForTransferMiddleware']);
        Route::post('ch/{transfer_id}', [TransferController::class, 'makeAnotherAppointmentForTransfer'])
            ->whereNumber(['transfer_id'])
            ->middleware(['CheckPatientOnly', 'MakeAnotherAppointmentForTransferMiddleware']);
        Route::post('{patient_id}/{receiving_doctor_id}', [TransferController::class, 'store'])
            ->whereNumber(['patient_id', 'receiving_doctor_id'])
            ->middleware(['CheckDoctorOnly', 'StoreTransferMiddleware']);
        Route::get('s/{id}', [TransferController::class, 'show'])->whereNumber('id')
            ->middleware(['ShowTransferMiddleware']);
        Route::get('{per_page}/{with_attended}', [TransferController::class, 'paginate'])
            ->whereNumber('per_page')->where('with_attended', '0|1|true|false')->middleware(['CheckAdmin']);
        Route::get('aP/{with_attended}/{patient_id}', [TransferController::class, 'allPatientTransfers'])
            ->whereNumber('patient_id')->where('with_attended', '0|1|true|false')
            ->middleware(['CheckPatient', 'AllPatientTransfersMiddleware']);
        Route::get('pRef/{per_page}/{with_attended}/{doctor_id}', [TransferController::class, 'paginateReferredTransfers'])
            ->whereNumber(['per_page', 'doctor_id'])->where('with_attended', '0|1|true|false')
            ->middleware(['CheckDoctor', 'PaginateReferredTransfersMiddleware']);
        Route::get('pRec/{per_page}/{with_attended}/{doctor_id}', [TransferController::class, 'paginateReceivedTransfers'])
            ->whereNumber(['per_page', 'doctor_id'])->where('with_attended', '0|1|true|false')
            ->middleware(['CheckDoctor', 'PaginateReceivedTransfersMiddleware']);
    });

    // Unavailability APIs
    Route::prefix('unavailability/')->group(function () {
        Route::post('maker_id', [UnavailabilityController::class, 'store'])->middleware(['CheckDoctor', 'StoreUnavailabilityMiddleware']);
        Route::get('{with_passed}/{per_page}', [UnavailabilityController::class, 'paginateDoctorsUnavailabilities'])
            ->whereNumber('per_page')->where('with_passed', '0|1|true|false')->middleware(['CheckAdmin']);
        Route::get('{with_passed}/{per_page}/{doctor_id}', [UnavailabilityController::class, 'paginateDoctorUnavailabilities'])
            ->whereNumber(['per_page', 'doctor_id'])->where('with_passed', '0|1|true|false')->middleware(['CheckDoctor', 'PaginateDoctorUnavailabilitiesMiddleware']);
        Route::get('m/{with_passed}/{per_page}', [UnavailabilityController::class, 'paginateMedicalUnavailabilities'])
            ->whereNumber(['per_page'])->where('with_passed', '0|1|true|false')->middleware(['CheckAdmin']);
    });
});