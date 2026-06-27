<?php

namespace App\Providers;

use App\Models\WorkSchedule;
use App\Repositories\AppointmentRepository;
use App\Repositories\DoctorRepository;
use App\Repositories\DoctorSpecialityRepository;
use App\Repositories\Interfaces\AppointmentRepositoryInterface;
use App\Repositories\Interfaces\DoctorRepositoryInterface;
use App\Repositories\Interfaces\DoctorSpecialityRepositoryInterface;
use App\Repositories\Interfaces\MedicalRecordAccessRepositoryInterface;
use App\Repositories\Interfaces\PatientComplaintRepositoryInterface;
use App\Repositories\Interfaces\PatientRepositoryInterface;
use App\Repositories\Interfaces\RepositoryInterface;
use App\Repositories\Interfaces\ResetPasswordTokenRepositoryInterface;
use App\Repositories\Interfaces\RoomRepositoryInterface;
use App\Repositories\Interfaces\SchedulingRepositoryInterface;
use App\Repositories\Interfaces\SpecialityRepositoryInterface;
use App\Repositories\Interfaces\TransferRepositoryInterface;
use App\Repositories\Interfaces\UnavailabilityRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\Interfaces\VisitRepositoryInterface;
use App\Repositories\MedicalRecordAccessRepository;
use App\Repositories\PatientComplaintRepository;
use App\Repositories\PatientRepository;
use App\Repositories\Repository;
use App\Repositories\ResetPasswordTokenRepository;
use App\Repositories\RoomRepository;
use App\Repositories\SchedulingRepository;
use App\Repositories\SpecialityRepository;
use App\Repositories\TransferRepository;
use App\Repositories\UnavailabilityRepository;
use App\Repositories\UserRepository;
use App\Repositories\VisitRepository;
use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            AppointmentRepositoryInterface::class,
            AppointmentRepository::class
        );
        $this->app->bind(
            DoctorRepositoryInterface::class,
            DoctorRepository::class
        );
        $this->app->bind(
            DoctorSpecialityRepositoryInterface::class,
            DoctorSpecialityRepository::class
        );
        $this->app->bind(
            MedicalRecordAccessRepositoryInterface::class,
            MedicalRecordAccessRepository::class
        );
        $this->app->bind(
            PatientRepositoryInterface::class,
            PatientRepository::class
        );
        $this->app->bind(
            RepositoryInterface::class,
            Repository::class
        );
        $this->app->bind(
            ResetPasswordTokenRepositoryInterface::class,
            ResetPasswordTokenRepository::class
        );
        $this->app->bind(
            RoomRepositoryInterface::class,
            RoomRepository::class
        );
        $this->app->bind(
            SchedulingRepositoryInterface::class,
            SchedulingRepository::class
        );
        $this->app->bind(
            SpecialityRepositoryInterface::class,
            SpecialityRepository::class
        );
        $this->app->bind(
            UserRepositoryInterface::class,
            UserRepository::class
        );
        $this->app->bind(
            VisitRepositoryInterface::class,
            VisitRepository::class
        );
        $this->app->bind(
            PatientComplaintRepositoryInterface::class,
            PatientComplaintRepository::class
        );
        $this->app->bind(
            TransferRepositoryInterface::class,
            TransferRepository::class
        );
        $this->app->bind(
            UnavailabilityRepositoryInterface::class,
            UnavailabilityRepository::class
        );

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Carbon::serializeUsing(function (Carbon $carbon) {
            return $carbon->setTimezone(config('app.timezone'))->toIso8601String();
        });
    }
}
