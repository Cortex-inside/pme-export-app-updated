<?php

namespace PMEexport\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;
use PMEexport\Traits\Uuids;

/**
 * Class RequestMessage
 * @package PMEexport\Models
 * @version August 14, 2018, 6:20 pm -03
 *
 * @property \PMEexport\Models\Request request
 * @property \PMEexport\Models\User user
 * @property \Illuminate\Database\Eloquent\Collection companies
 * @property \Illuminate\Database\Eloquent\Collection companyCaes
 * @property \Illuminate\Database\Eloquent\Collection permissionRole
 * @property \Illuminate\Database\Eloquent\Collection permissionUser
 * @property \Illuminate\Database\Eloquent\Collection products
 * @property \Illuminate\Database\Eloquent\Collection requestProducts
 * @property \Illuminate\Database\Eloquent\Collection requests
 * @property \Illuminate\Database\Eloquent\Collection roleUser
 * @property string uuid
 * @property integer request_id
 * @property integer user_id
 * @property string message
 */
class RequestMessage extends Model
{
    use SoftDeletes;
    use Uuids;

    public $table = 'request_messages';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'uuid',
        'request_announcement_id',
        'user_id',
        'type',
        'message'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'uuid' => 'string',
        'request_announcement_id' => 'integer',
        'user_id' => 'integer',
        'type' => 'integer',
        'message' => 'string'
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
    public function request()
    {
        return $this->belongsTo(\PMEexport\Models\Request::class);
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
