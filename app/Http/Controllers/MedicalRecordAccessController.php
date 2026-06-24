<?php

namespace App\Http\Controllers;

use App\DTOs\MedicalRecordAccess\MedicalRecordAccessDTO;
use App\Enums\UserRoleEnum;
use App\GeneralClasses\Enums\ResponseStatusEnum;
use App\Http\Resources\MedicalRecordAccess\MedicalRecordAccessToAdminResource;
use App\Http\Resources\MedicalRecordAccess\MedicalRecordAccessToDoctorResource;
use App\Http\Resources\MedicalRecordAccess\MedicalRecordAccessToPatientResource;
use App\Services\MedicalRecordAccessService;
use Illuminate\Support\Facades\Auth;

/**
 * @group Medical Record Access APIs (Access Permission APIs)
 */
class MedicalRecordAccessController extends Controller
{
    public function __construct(
        protected MedicalRecordAccessService $medicalRecordAccessService,
    ) {
    }

    private function resource($recordOrCollectionOfIt, bool $isCollection)
    {
        switch (Auth::user()->role) {
            case UserRoleEnum::ADMIN:
                return $isCollection ?
                    MedicalRecordAccessToAdminResource::collection($recordOrCollectionOfIt) :
                    new MedicalRecordAccessToAdminResource($recordOrCollectionOfIt);
            case UserRoleEnum::DOCTOR:
                return $isCollection ?
                    MedicalRecordAccessToDoctorResource::collection($recordOrCollectionOfIt) :
                    new MedicalRecordAccessToDoctorResource($recordOrCollectionOfIt);
            case UserRoleEnum::PATIENT:
                return $isCollection ?
                    MedicalRecordAccessToPatientResource::collection($recordOrCollectionOfIt) :
                    new MedicalRecordAccessToPatientResource($recordOrCollectionOfIt);
            default:
                return $isCollection ?
                    MedicalRecordAccessToPatientResource::collection($recordOrCollectionOfIt) :
                    new MedicalRecordAccessToPatientResource($recordOrCollectionOfIt);
        }
    }


    /**
     * Grant a new access permission
     * 
     * ###For: Mobile(Patient)
     * Only patients are allowed to use this API.
     * @urlParam visit_id integer required min:1
     * @urlParam doctor_id integer required min:1
     */
    public function store(int $doctor_id, int $visit_id)
    {
        $request = [
            'visit_id' => $visit_id,
            'patient_id' => Auth::id(),
            'can_accessed_by_doctor_id' => $doctor_id,
        ];

        $response = $this->medicalRecordAccessService->create(MedicalRecordAccessDTO::fromRequest($request));

        return response()->json([
            'result' => $response->result,
            'message' => $response->message,
        ], $response->statusCode);
    }

    /**
     * View all permission accesses given to a specified doctor
     * 
     * ###For: Web, Mobile(Doctor)
     * Only admins and doctors are allowed to use this API
     * ###⚠ Important Info: The response's "data" field content would change based on the logged-in user role!
     * @urlParam per_page integer required min:1 The number of items be shown in each page. Defaults to 10. 
     * @urlParam with_unactive integer required Boolean value means does the admin want all of permission accesses to be showen even with unactivated ones? Doctores only allowed to see with unactive ones.
     * @urlParam doctor_id integer required min:1 The ID number of doctor to view it's permission accesses 
     */
    public function paginateDoctorMedicalRecordAccesses(int $per_page = 10, bool $with_unactive, int $doctor_id)
    {
        $response = $this->medicalRecordAccessService->paginateDoctorMedicalRecordAccesses($per_page, $with_unactive, $doctor_id);

        if ($response->result != ResponseStatusEnum::SUCCESS)
            return response()->json([
                'result' => $response->result,
                'message' => $response->message,
            ], $response->statusCode);

        return response()->json([
            'result' => $response->result,
            'message' => $response->message,
            'data' => $this->resource($response->data, true),
        ], $response->statusCode);
    }

    /**
     * View all permission accesses given by a specified patient
     * 
     * ###For: Web, Mobile(Patient)
     * Only admins and patients are allowed to use this API
     * ###⚠ Important Info: The response's "data" field content would change based on the logged-in user role!
     * @urlParam per_page integer required min:1 The number of items be shown in each page. Defaults to 10. 
     * @urlParam with_unactive integer required Boolean value means does the user want all of permission accesses to be showen even with unactivated ones?
     * @urlParam patient_id integer required min:1 The ID number of patient to view all permissions given by him 
     */
    public function paginatePatientMedicalRecordAccesses(int $per_page = 10, bool $with_unactive, int $patient_id)
    {
        $response = $this->medicalRecordAccessService->paginatePatientMedicalRecordAccesses($per_page, $with_unactive, $patient_id);

        if ($response->result != ResponseStatusEnum::SUCCESS)
            return response()->json([
                'result' => $response->result,
                'message' => $response->message,
            ], $response->statusCode);

        return response()->json([
            'result' => $response->result,
            'message' => $response->message,
            'data' => $this->resource($response->data, true),
        ], $response->statusCode);
    }


    /**
     * View all permission accesses to a specified visit
     * 
     * ###For: Web, Mobile(Patient)
     * Only admins and patients are allowed to use this API
     * ###⚠ Important Info: The response's "data" field content would change based on the logged-in user role!
     * @urlParam per_page integer required min:1 The number of items be shown in each page. Defaults to 10. 
     * @urlParam with_unactive integer required Boolean value means does the user want all of permission accesses to be showen even with unactivated ones?
     * @urlParam visit_id integer required min:1 The ID number of visit to view who have access to it 
     */
    public function paginateVisitMedicalRecordAccesses(int $per_page = 10, bool $with_unactive, int $visit_id)
    {
        $response = $this->medicalRecordAccessService->paginateVisitMedicalRecordAccesses($per_page, $with_unactive, $visit_id);

        if ($response->result != ResponseStatusEnum::SUCCESS)
            return response()->json([
                'result' => $response->result,
                'message' => $response->message,
            ], $response->statusCode);

        return response()->json([
            'result' => $response->result,
            'message' => $response->message,
            'data' => $this->resource($response->data, true),
        ], $response->statusCode);
    }

    /**
     * Revoke an access permission
     * 
     * ###For: Mobile(Patient)
     * Only patients are allowed to use this API
     * @urlParam id integer required min:1 The ID number of medical access record to be revoked
     */
    public function destroy(int $id)
    {
        $response = $this->medicalRecordAccessService->unactive($id);

        return response()->json([
            'result' => $response->result,
            'message' => $response->message,
        ], $response->statusCode);
    }

}
