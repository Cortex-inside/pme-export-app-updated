<?php

namespace PMEexport\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use PMEexport\Traits\Uuids;

/**
 * Class Certificate
 * @package PMEexport\Models
 * @version August 23, 2018, 3:34 pm -03
 *
 * @property \PMEexport\Models\CertificateCategory certificateCategory
 * @property \PMEexport\Models\Department department
 * @property \Illuminate\Database\Eloquent\Collection CertificateRequirement
 * @property \Illuminate\Database\Eloquent\Collection companies
 * @property \Illuminate\Database\Eloquent\Collection companyAnnouncements
 * @property \Illuminate\Database\Eloquent\Collection companyCaes
 * @property \Illuminate\Database\Eloquent\Collection CompanyCertificate
 * @property \Illuminate\Database\Eloquent\Collection permissionRole
 * @property \Illuminate\Database\Eloquent\Collection permissionUser
 * @property \Illuminate\Database\Eloquent\Collection requestMessages
 * @property \Illuminate\Database\Eloquent\Collection requestProducts
 * @property \Illuminate\Database\Eloquent\Collection requests
 * @property \Illuminate\Database\Eloquent\Collection roleUser
 * @property string uuid
 * @property integer department_id
 * @property integer certificate_category_id
 * @property string duration
 * @property string description
 * @property integer status
 */
class Certificate extends Model
{
    use SoftDeletes, Uuids;

    public $table = 'certificates';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'uuid',
        'department_id',
        'certificate_category_id',
        'duration',
        'description',
        'name',
        'status',
        'ini_date',
        'end_date',
        'address',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'uuid' => 'string',
        'department_id' => 'integer',
        'certificate_category_id' => 'integer',
        'duration' => 'string',
        'description' => 'string',
        'name' => 'string',
        'address' => 'string',
        'status' => 'integer',
        'ini_date' => 'datetime',
        'end_date' => 'end_date',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    public function status()
    {
        if ($this->status == 1) {
            return "Ativada";
        } else if($this->status == 2) {
            return "Desativada";
        }
    }

    public function nameFilter()
    {
        return "category-" . $this->certificate_category_id;
    }

    public function iniDate()
    {
        return Carbon::parse($this->ini_date)->format('d/m/Y');
    }
    public function createdAt()
    {
        return Carbon::parse($this->created_at)->format('d/m/Y');
    }

    public function endDate()
    {
        return Carbon::parse($this->end_date)->format('d/m/Y');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function certificateCategory()
    {
        return $this->belongsTo(\PMEexport\Models\CertificateCategory::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function department()
    {
        return $this->belongsTo(\PMEexport\Models\Department::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function certificateRequirements()
    {
        return $this->hasMany(\PMEexport\Models\CertificateRequirement::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function requirements()
    {
        return $this->belongsToMany(\PMEexport\Models\Requirement::class, 'certificate_requirements', 'certificate_id','requirement_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function companyCertificates()
    {
        return $this->hasMany(\PMEexport\Models\CompanyCertificate::class);
    }
}
