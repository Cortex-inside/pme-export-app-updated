<?php

namespace PMEexport\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use PMEexport\Traits\Uuids;

/**
 * Class Requirement
 * @package PMEexport\Models
 * @version August 23, 2018, 3:35 pm -03
 *
 * @property \Illuminate\Database\Eloquent\Collection CertificateRequirement
 * @property \Illuminate\Database\Eloquent\Collection certificates
 * @property \Illuminate\Database\Eloquent\Collection companies
 * @property \Illuminate\Database\Eloquent\Collection companyAnnouncements
 * @property \Illuminate\Database\Eloquent\Collection companyCaes
 * @property \Illuminate\Database\Eloquent\Collection companyCertificates
 * @property \Illuminate\Database\Eloquent\Collection Document
 * @property \Illuminate\Database\Eloquent\Collection permissionRole
 * @property \Illuminate\Database\Eloquent\Collection permissionUser
 * @property \Illuminate\Database\Eloquent\Collection requestMessages
 * @property \Illuminate\Database\Eloquent\Collection requestProducts
 * @property \Illuminate\Database\Eloquent\Collection requests
 * @property \Illuminate\Database\Eloquent\Collection roleUser
 * @property string uuid
 * @property string name
 * @property string description
 * @property integer type
 */
class Requirement extends Model
{
    use SoftDeletes, Uuids;

    public $table = 'requirements';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'uuid',
        'name',
        'description',
        'type'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'uuid' => 'string',
        'name' => 'string',
        'description' => 'string',
        'type' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

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
    public function documents()
    {
        return $this->hasMany(\PMEexport\Models\Document::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function certificates()
    {
        return $this->belongsToMany(\PMEexport\Models\Certificate::class, 'certificate_requirements', 'requirement_id', 'certificate_id');
    }

    public function createdAtFormat()
    {
        return Carbon::parse($this->created_at)->format("d/m/Y H:i");
    }
    public function type()
    {
        if ($this->type == 1) {
            return "Arquivo";
        } else if($this->type == 2) {
            return "Texto";
        }
    }
}
