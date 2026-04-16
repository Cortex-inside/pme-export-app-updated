<?php

namespace PMEexport\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;
use PMEexport\Traits\Uuids;

/**
 * Class CompanyCertificateMessage
 * @package PMEexport\Models
 * @version August 30, 2018, 10:15 am -03
 *
 * @property \PMEexport\Models\CompanyCertificate companyCertificate
 * @property \PMEexport\Models\User user
 * @property \Illuminate\Database\Eloquent\Collection certificateRequirements
 * @property \Illuminate\Database\Eloquent\Collection certificates
 * @property \Illuminate\Database\Eloquent\Collection companies
 * @property \Illuminate\Database\Eloquent\Collection companyAnnouncements
 * @property \Illuminate\Database\Eloquent\Collection companyCaes
 * @property \Illuminate\Database\Eloquent\Collection companyCertificates
 * @property \Illuminate\Database\Eloquent\Collection permissionRole
 * @property \Illuminate\Database\Eloquent\Collection permissionUser
 * @property \Illuminate\Database\Eloquent\Collection requestAnnouncements
 * @property \Illuminate\Database\Eloquent\Collection requestMessages
 * @property \Illuminate\Database\Eloquent\Collection requests
 * @property \Illuminate\Database\Eloquent\Collection roleUser
 * @property string uuid
 * @property integer company_certificate_id
 * @property integer user_id
 * @property string message
 * @property integer type
 */
class CompanyCertificateMessage extends Model
{
    use SoftDeletes, Uuids;

    public $table = 'company_certificate_messages';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'uuid',
        'company_certificate_id',
        'user_id',
        'message',
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
        'company_certificate_id' => 'integer',
        'user_id' => 'integer',
        'message' => 'string',
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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function companyCertificate()
    {
        return $this->belongsTo(\PMEexport\Models\CompanyCertificate::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\PMEexport\Models\User::class);
    }

    public function createdAtFormat()
    {
        return Carbon::parse($this->created_at)->format("d/m/Y H:i");
    }
}
