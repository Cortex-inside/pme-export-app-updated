<?php

namespace PMEexport\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use PMEexport\Traits\Uuids;

/**
 * Class Document
 * @package PMEexport\Models
 * @version August 23, 2018, 3:36 pm -03
 *
 * @property \PMEexport\Models\CompanyCertificate companyCertificate
 * @property \PMEexport\Models\Requirement requirement
 * @property \PMEexport\Models\User user
 * @property \Illuminate\Database\Eloquent\Collection certificateRequirements
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
 * @property integer company_certificate_id
 * @property integer requirement_id
 * @property integer user_id
 * @property integer status
 * @property string url
 * @property string|\Carbon\Carbon approved_date
 * @property string|\Carbon\Carbon disapproved_date
 */
class AnnouncementImage extends Model
{
    use Uuids;

    public $table = 'announcements_images';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $fillable = [
        'uuid',
        'company_announcement_id',
        'user_id',
        'type',
        'url',
        'text',
        'original_name',
        'name',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'uuid' => 'string',
        'company_announcement_id' => 'integer',
        'user_id' => 'integer',
        'url' => 'string',
        'original_name' => 'string',
        'name' => 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];
}
