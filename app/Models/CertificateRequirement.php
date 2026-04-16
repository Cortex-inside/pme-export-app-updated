<?php

namespace PMEexport\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use PMEexport\Traits\Uuids;

/**
 * Class CertificateRequirement
 * @package PMEexport\Models
 * @version August 23, 2018, 3:36 pm -03
 *
 * @property \PMEexport\Models\Certificate certificate
 * @property \PMEexport\Models\Requirement requirement
 * @property \Illuminate\Database\Eloquent\Collection certificates
 * @property \Illuminate\Database\Eloquent\Collection companies
 * @property \Illuminate\Database\Eloquent\Collection companyAnnouncements
 * @property \Illuminate\Database\Eloquent\Collection companyCaes
 * @property \Illuminate\Database\Eloquent\Collection companyCertificates
 * @property \Illuminate\Database\Eloquent\Collection permissionRole
 * @property \Illuminate\Database\Eloquent\Collection permissionUser
 * @property \Illuminate\Database\Eloquent\Collection requestMessages
 * @property \Illuminate\Database\Eloquent\Collection requestProducts
 * @property \Illuminate\Database\Eloquent\Collection requests
 * @property \Illuminate\Database\Eloquent\Collection roleUser
 * @property string uuid
 * @property integer certificate_id
 * @property integer requirement_id
 */
class CertificateRequirement extends Model
{
    use SoftDeletes, Uuids;

    public $table = 'certificate_requirements';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'uuid',
        'certificate_id',
        'requirement_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'uuid' => 'string',
        'certificate_id' => 'integer',
        'requirement_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function certificate()
    {
        return $this->belongsTo(\PMEexport\Models\Certificate::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function requirement()
    {
        return $this->belongsTo(\PMEexport\Models\Requirement::class);
    }
}
