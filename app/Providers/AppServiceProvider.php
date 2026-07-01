<?php

namespace App\Providers;

use App\Repositories\AdminRepository;
use App\Repositories\AppointmentRepository;
use App\Repositories\DoctorRepository;
use App\Repositories\DoctorSpecialityRepository;
use App\Repositories\Interfaces\AdminRepositoryInterface;
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
        $this->app->singleton(
            AppointmentRepositoryInterface::class,
            AppointmentRepository::class
        );
        $this->app->singleton(
            DoctorRepositoryInterface::class,
            DoctorRepository::class
        );
        $this->app->singleton(
            DoctorSpecialityRepositoryInterface::class,
            DoctorSpecialityRepository::class
        );
        $this->app->singleton(
            MedicalRecordAccessRepositoryInterface::class,
            MedicalRecordAccessRepository::class
        );
        $this->app->singleton(
            PatientRepositoryInterface::class,
            PatientRepository::class
        );
        $this->app->singleton(
            RepositoryInterface::class,
            Repository::class
        );
        $this->app->singleton(
            ResetPasswordTokenRepositoryInterface::class,
            ResetPasswordTokenRepository::class
        );
        $this->app->singleton(
            RoomRepositoryInterface::class,
            RoomRepository::class
        );
        $this->app->singleton(
            SchedulingRepositoryInterface::class,
            SchedulingRepository::class
        );
        $this->app->singleton(
            SpecialityRepositoryInterface::class,
            SpecialityRepository::class
        );
        $this->app->singleton(
            UserRepositoryInterface::class,
            UserRepository::class
        );
        $this->app->singleton(
            VisitRepositoryInterface::class,
            VisitRepository::class
        );
        $this->app->singleton(
            PatientComplaintRepositoryInterface::class,
            PatientComplaintRepository::class
        );
        $this->app->singleton(
            TransferRepositoryInterface::class,
            TransferRepository::class
        );
        $this->app->singleton(
            UnavailabilityRepositoryInterface::class,
            UnavailabilityRepository::class
        );
        $this->app->singleton(
            AdminRepositoryInterface::class,
            AdminRepository::class
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
