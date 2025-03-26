<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

abstract class BaseModel extends Model
{
    //Appointment
    public const DOCTOR_ID     = 'doctor_id';
    public const PATIENT_NAME  = 'patient_name';
    public const PATIENT_EMAIL = 'patient_email';
    public const DATE_TIME     = 'date_time';
    public const STATUS        = 'status';

    //Doctor
    public const NAME              = 'name';
    public const SPECIALISATION_ID = 'specialization_id';

    // TimeSlot
    public const START_TIME   = 'start_time';
    public const END_TIME     = 'end_time';
    public const IS_AVAILABLE = 'is_available';

}
