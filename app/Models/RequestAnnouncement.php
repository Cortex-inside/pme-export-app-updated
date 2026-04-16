<?php

namespace PMEexport\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use PMEexport\Traits\Uuids;

/**
 * Class RequestAnnouncement
 * @package PMEexport\Models
 * @version August 14, 2018, 6:20 pm -03
 *
 * @property \PMEexport\Models\Request request
 * @property \PMEexport\Models\Product product
 * @property \Illuminate\Database\Eloquent\Collection companies
 * @property \Illuminate\Database\Eloquent\Collection companyCaes
 * @property \Illuminate\Database\Eloquent\Collection permissionRole
 * @property \Illuminate\Database\Eloquent\Collection permissionUser
 * @property \Illuminate\Database\Eloquent\Collection products
 * @property \Illuminate\Database\Eloquent\Collection requestMessages
 * @property \Illuminate\Database\Eloquent\Collection requests
 * @property \Illuminate\Database\Eloquent\Collection roleUser
 * @property integer request_id
 * @property integer product_id
 */
class RequestAnnouncement extends Model
{
    use SoftDeletes;
    use Uuids;

    public $table = 'request_announcements';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'company_announcements_id',
        'company_id_request',
        'company_id',
        'product_id',
        'unit_of_measure_or_weight',
        'amount',
        'coin',
        'price',
        'status',
        'local_entrega',
        'logistica',
        'description',
        'canceled_at',
        'canceled_message',
    ];

    protected $casts = [
        'id' => 'integer',
        'company_announcements_id' => 'integer',
        'company_id' => 'integer',
    ];

    public static $rules = [
        
    ];

    public function numeroPedido()
    {
        return str_pad($this->id,5,"0",STR_PAD_LEFT);
    }

    public function company_announcements()
    {
        return $this->belongsTo(\PMEexport\Models\CompanyAnnouncement::class);
    }

    public function company_request()
    {
        return $this->belongsTo(\PMEexport\Models\Company::class,"company_id_request");
    }

    public function company_enviado()
    {
        return $this->belongsTo(\PMEexport\Models\Company::class, "company_id");
    }

    public function company_recebido()
    {
        return $this->belongsTo(\PMEexport\Models\Company::class,"company_id");
    }

    public function company_announcement()
    {
        return $this->belongsTo(\PMEexport\Models\Company::class,"company_id");
    }

    public function messages()
    {
        return $this->hasMany(\PMEexport\Models\RequestMessage::class);
    }

    public function product()
    {
        return $this->belongsTo(\PMEexport\Models\Product::class);
    }
    public function enviadoRecebido()
    {

        $empresaUsuario = Auth::user()->company_id;

        if($this->company_id_request == $empresaUsuario) {
            return "Enviado"; // Enviado
        } else if ($this->company_id == $empresaUsuario) {
            return "Recebido"; //Recebido
        } else {
            return "-";
        }

    }
    public function status()
    {
        if ($this->status == 1) {
            return "Aguardando aprovação";
        } else if($this->status == 2) {
            return "Cancelado";
        }else if($this->status == 3) {
            return "Aprovado";
        }
    }

    public function unidadeMedidaOuPeso()
    {
        if ($this->unit_of_measure_or_weight == 1) {
            return "Granel";
        } else if($this->unit_of_measure_or_weight == 2) {
            return "Quilo";
        }else if($this->unit_of_measure_or_weight == 3) {
            return "Sacas";
        }else if($this->unit_of_measure_or_weight == 4) {
            return "Toneladas";
        }
    }
    public function closedAtFormat()
    {
        return Carbon::parse($this->closed_at)->format("d/m/Y H:i");
    }
    public function dataPedido()
    {
        return Carbon::parse($this->created_at)->format("d/m/Y H:i");
    }
    public function cancelDateFormat()
    {
        return Carbon::parse($this->canceled_at)->format("d/m/Y H:i");
    }

    public function nomeEmpresa()
    {
        return $this->company_announcements->company->name;
    }

    public function enderecoEmpresa()
    {
        return $this->company_announcements->company->address;
    }

    public function websiteEmpresa()
    {
        return $this->company_announcements->company->website;
    }

    public function nuitEmpresa()
    {
        return $this->company_announcements->company->nuit;
    }

    public function districtEmpresa()
    {
        return $this->company_announcements->company->district->name;
    }

    public function tipoEmpresa()
    {
        if($this->company_announcements->company->type) {
            return $this->company_announcements->company->typeName();
        } else {
            return "";
        }
    }
}
