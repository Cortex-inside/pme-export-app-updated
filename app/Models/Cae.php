<?php

namespace PMEexport\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use PMEexport\Traits\Uuids;

/**
 * Class Cae
 * @package PMEexport\Models
 * @version August 14, 2018, 6:20 pm -03
 *
 * @property \Illuminate\Database\Eloquent\Collection companies
 * @property \Illuminate\Database\Eloquent\Collection CompanyCae
 * @property \Illuminate\Database\Eloquent\Collection permissionRole
 * @property \Illuminate\Database\Eloquent\Collection permissionUser
 * @property \Illuminate\Database\Eloquent\Collection products
 * @property \Illuminate\Database\Eloquent\Collection requestMessages
 * @property \Illuminate\Database\Eloquent\Collection requestProducts
 * @property \Illuminate\Database\Eloquent\Collection requests
 * @property \Illuminate\Database\Eloquent\Collection roleUser
 * @property string uuid
 * @property integer cae_id
 * @property string code
 * @property string description
 * @property string rev
 * @property string other
 */
class Cae extends Model
{
    use SoftDeletes, Uuids;

    public $table = 'caes';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'uuid',
        'cae_id',
        'code',
        'description',
        'designation',
        'rev',
        'other'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'uuid' => 'string',
        'cae_id' => 'integer',
        'code' => 'string',
        'description' => 'string',
        'designation' => 'string',
        'rev' => 'string',
        'other' => 'string'
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
    public function companyCaes()
    {
        return $this->hasMany(\PMEexport\Models\CompanyCae::class);
    }
}
