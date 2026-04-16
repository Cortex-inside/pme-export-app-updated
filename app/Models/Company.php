<?php

namespace PMEexport\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use PMEexport\Traits\Uuids;

/**
 * Class Company
 * @package PMEexport\Models
 * @version August 14, 2018, 6:15 pm -03
 *
 * @property \PMEexport\Models\District district
 * @property \PMEexport\Models\LegalSituation legalSituation
 * @property \Illuminate\Database\Eloquent\Collection CompanyCae
 * @property \Illuminate\Database\Eloquent\Collection CompanyEmail
 * @property \Illuminate\Database\Eloquent\Collection CompanyPartner
 * @property \Illuminate\Database\Eloquent\Collection CompanyPhone
 * @property \Illuminate\Database\Eloquent\Collection CompanyRepresentative
 * @property \Illuminate\Database\Eloquent\Collection permissionRole
 * @property \Illuminate\Database\Eloquent\Collection permissionUser
 * @property \Illuminate\Database\Eloquent\Collection Product
 * @property \Illuminate\Database\Eloquent\Collection requestMessages
 * @property \Illuminate\Database\Eloquent\Collection requestProducts
 * @property \Illuminate\Database\Eloquent\Collection Request
 * @property \Illuminate\Database\Eloquent\Collection roleUser
 * @property \Illuminate\Database\Eloquent\Collection User
 * @property string uuid
 * @property string name
 * @property integer status
 * @property integer legal_situation_id
 * @property integer district_id
 * @property string initials
 * @property string address
 * @property string number
 * @property string locality
 * @property string latitude
 * @property string longitude
 * @property integer country
 * @property string zipcode
 * @property string website
 * @property integer nuit
 * @property string nuit_doc
 * @property integer alvara
 * @property string alvara_doc
 * @property string initial investment
 * @property integer business_volume
 * @property integer number_of_workers_h
 * @property integer number_of_workers_m
 */
class Company extends Model
{
    use SoftDeletes;
    use Uuids;

    public $table = 'companies';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'uuid',
        'name',
        'status',
        'legal_situation_id',
        'district_id',
        'initials',
        'address',
        'number',
        'locality',
        'latitude',
        'longitude',
        'country',
        'zipcode',
        'website',
        'nuit',
        'nuit_doc',
        'alvara',
        'alvara_doc',
        'initial_investment',
        'business_volume',
        'motive_disapprove',
        'number_of_workers_h',
        'photo',
        'number_of_workers_m',
        'type',
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
        'status' => 'integer',
        'legal_situation_id' => 'integer',
        'district_id' => 'integer',
        'initials' => 'string',
        'address' => 'string',
        'number' => 'string',
        'locality' => 'string',
        'latitude' => 'string',
        'longitude' => 'string',
        'country' => 'integer',
        'zipcode' => 'string',
        'website' => 'string',
        'nuit' => 'integer',
        'nuit_doc' => 'string',
        'alvara' => 'integer',
        'alvara_doc' => 'string',
        'initial_investment' => 'string',
        'business_volume' => 'integer',
        'motive_disapprove' => 'string',
        'number_of_workers_h' => 'integer',
        'photo' => 'string',
        'number_of_workers_m' => 'integer',
        'type' => 'integer',
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
    public function district()
    {
        return $this->belongsTo(\PMEexport\Models\District::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function legalSituation()
    {
        return $this->belongsTo(\PMEexport\Models\LegalSituation::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function companyCaes()
    {
        return $this->hasMany(\PMEexport\Models\CompanyCae::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function companyEmails()
    {
        return $this->hasMany(\PMEexport\Models\CompanyEmail::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function companyPartners()
    {
        return $this->hasMany(\PMEexport\Models\CompanyPartner::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function companyPhones()
    {
        return $this->hasMany(\PMEexport\Models\CompanyPhone::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function companyRepresentatives()
    {
        return $this->hasMany(\PMEexport\Models\CompanyRepresentative::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function requests()
    {
        return $this->hasMany(\PMEexport\Models\Request::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function users()
    {
        return $this->hasMany(\PMEexport\Models\User::class);
    }
    public function announcements()
    {
        return $this->hasMany(\PMEexport\Models\CompanyAnnouncement::class);
    }


    public function tipoEmpresa()
    {

    }

    public function typeName()
    {
        if ($this->type == 1) {
            return "Local";
        }else if($this->type == 2) {
            return "Estrangeira";
        }
    }
    public function status()
    {
        if ($this->status == 1) {
            return "Aguardando aprovação";
        }else if($this->status == 2) {
            return "Cadastro reprovado";
        }else if($this->status == 3) {
            return "Empresa desativada";
        }else if($this->status == 4) {
            return "Revisar documentos/informações";
        }else if($this->status == 5) {
            return "Aguardando finalização de cadastro";
        }else if($this->status == 6) {
            return "Cadastro aprovado";
        }
    }


    public function business_volume()
    {
        if ($this->business_volume == 1) {
            return "0 » 1.200.000.000 MT Micro";
        }else if($this->business_volume == 2) {
            return "1.200.000.000 MT » 14.700.000.000 MT Pequena";
        }else if($this->business_volume == 3) {
            return "14.700.000.000 MT » 29.970.000.000 MT Média";
        }
    }
}
