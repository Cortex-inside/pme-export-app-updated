<?php

namespace PMEexport\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;
use PMEexport\Traits\Uuids;

/**
 * Class CompanyPhone
 * @package PMEexport\Models
 * @version August 14, 2018, 6:17 pm -03
 *
 * @property \PMEexport\Models\Company company
 * @property \Illuminate\Database\Eloquent\Collection companies
 * @property \Illuminate\Database\Eloquent\Collection companyCaes
 * @property \Illuminate\Database\Eloquent\Collection permissionRole
 * @property \Illuminate\Database\Eloquent\Collection permissionUser
 * @property \Illuminate\Database\Eloquent\Collection products
 * @property \Illuminate\Database\Eloquent\Collection requestMessages
 * @property \Illuminate\Database\Eloquent\Collection requestProducts
 * @property \Illuminate\Database\Eloquent\Collection request_announcements
 * @property \Illuminate\Database\Eloquent\Collection roleUser
 * @property string uuid
 * @property integer company_id
 * @property integer type
 * @property string ddi
 * @property string prefix
 * @property string number
 */
class CompanyPhone extends Model
{
    use SoftDeletes, Uuids;

    public $table = 'company_phones';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'uuid',
        'company_id',
        'type',
        'ddi',
        'prefix',
        'number'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'uuid' => 'string',
        'company_id' => 'integer',
        'type' => 'integer',
        'ddi' => 'string',
        'prefix' => 'string',
        'number' => 'string'
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
    public function company()
    {
        return $this->belongsTo(\PMEexport\Models\Company::class);
    }


    public function createdAtFormat()
    {
        return Carbon::parse($this->created_at)->format("d/m/Y H:i");
    }
}
