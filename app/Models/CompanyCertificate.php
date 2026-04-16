<?php

namespace PMEexport\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use PMEexport\Traits\Uuids;

/**
 * Class CompanyCertificate
 * @package PMEexport\Models
 * @version August 23, 2018, 3:36 pm -03
 *
 * @property \PMEexport\Models\Certificate certificate
 * @property \PMEexport\Models\Company company
 * @property \Illuminate\Database\Eloquent\Collection certificateRequirements
 * @property \Illuminate\Database\Eloquent\Collection certificates
 * @property \Illuminate\Database\Eloquent\Collection companies
 * @property \Illuminate\Database\Eloquent\Collection companyAnnouncements
 * @property \Illuminate\Database\Eloquent\Collection companyCaes
 * @property \Illuminate\Database\Eloquent\Collection Document
 * @property \Illuminate\Database\Eloquent\Collection permissionRole
 * @property \Illuminate\Database\Eloquent\Collection permissionUser
 * @property \Illuminate\Database\Eloquent\Collection requestMessages
 * @property \Illuminate\Database\Eloquent\Collection requestProducts
 * @property \Illuminate\Database\Eloquent\Collection requests
 * @property \Illuminate\Database\Eloquent\Collection roleUser
 * @property string uuid
 * @property integer company_id
 * @property integer certificate_id
 * @property integer status
 * @property string|\Carbon\Carbon request_date
 */
class CompanyCertificate extends Model
{
    use SoftDeletes, Uuids;

    public $table = 'company_certificates';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'uuid',
        'company_id',
        'certificate_id',
        'status',
        'motive_disapprove',
        'request_date'
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
        'certificate_id' => 'integer',
        'motive_disapprove' => 'string',
        'status' => 'integer'
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
            return "Aguardando avaliação do pedido";
        } else if($this->status == 2) {
            return "Pedido em análise";
        } else if($this->status == 3) {
            return "Aprovado";
        } else if($this->status == 4) {
            return "Reprovado";
        } else if($this->status == 5) {
            return "Pendente de documento";
        }
    }

    public function request_dateFormat()
    {
       return ($this->request_date) ? Carbon::parse($this->request_date)->format('d/m/Y H:i') : '';
    }
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
    public function company()
    {
        return $this->belongsTo(\PMEexport\Models\Company::class);
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
    public function messages()
    {
        return $this->hasMany(\PMEexport\Models\CompanyCertificateMessage::class);
    }
}
