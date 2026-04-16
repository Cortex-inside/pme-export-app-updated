<?php

namespace PMEexport\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use PMEexport\Traits\Uuids;

class CompanyAnnouncement extends Model
{
    use SoftDeletes;
    use Uuids;

    public $table = 'company_announcements';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'uuid',
        'company_id',
        'product_id',
        'market_type',
        'type_of_exposure',
        'visibility',
        'unit_of_measure_or_weight',
        'amount',
        'coin',
        'price',
        'local_entrega',
        'logistica',
        'description',
        'payment_model'
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
        'product_id' => 'integer',
        'market_type' => 'integer',
        'type_of_exposure' => 'integer',
        'visibility' => 'integer',
        'unit_of_measure_or_weight' => 'integer',
        'amount' => 'integer',
        'coin' => 'integer',
        'price' => 'integer',
        'local_entrega' => 'string',
        'logistica' => 'string',
        'description' => 'string',
        'payment_model' => 'integer'
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
    public function product()
    {
        return $this->belongsTo(\PMEexport\Models\Product::class);
    }


    public function getCreatedAtFormat()
    {
        return Carbon::parse($this->create_at)->format("d/m/Y");
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function company()
    {
        return $this->belongsTo(\PMEexport\Models\Company::class);
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function request_announcements()
    {
        return $this->hasMany(\PMEexport\Models\RequestAnnouncement::class, "company_announcements_id", "id");
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function announcementsDocuments()
    {
        return $this->hasMany(\PMEexport\Models\AnnouncementDocument::class);
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function announcementsImages()
    {
        return $this->hasMany(\PMEexport\Models\AnnouncementImage::class);
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function announcementsCompanies()
    {
        return $this->hasMany(\PMEexport\Models\AnnouncementCompanie::class);
    }

    public function checkVisible()
    {
        if(Auth::user()->company_id) {
            $announcement_companie = AnnouncementCompanie::where("company_announcement_id", "=", $this->id)
                ->where("companie_id", "=", Auth::user()->company_id)
                ->first();

            return $announcement_companie;
        } else {
            return false;
        }
    }
    public function dataPedido()
    {
        return Carbon::parse($this->created_at)->format("d/m/Y H:i");
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
    public function typeVendaCompra()
    {
        if ($this->type_of_exposure == 1) {
            return "Compra";
        }else if($this->type_of_exposure == 2) {
            return "Compra";
        }else if($this->type_of_exposure == 3) {
            return "Compra";
        }else if($this->type_of_exposure == 4) {
            return "Compra";
        }else if($this->type_of_exposure == 5) {
            return "Venda";
        }else if($this->type_of_exposure == 6) {
            return "Venda";
        }else if($this->type_of_exposure == 7) {
            return "Venda";
        }else if($this->type_of_exposure == 8) {
            return "Venda";
        }

    }
    public function typeOfExposureAnnouncement()
    {
        if ($this->type_of_exposure == 1) {
            return "Compra ";
        }else if($this->type_of_exposure == 2) {
            return "Compra fechada sobre período";
        }else if($this->type_of_exposure == 3) {
            return "Compra aguardando proposta";
        }else if($this->type_of_exposure == 4) {
            return "Compra aguardando proposta sobre período";
        }else if($this->type_of_exposure == 5) {
            return "Venda ";
        }else if($this->type_of_exposure == 6) {
            return "Venda fechada sobre período";
        }else if($this->type_of_exposure == 7) {
            return "Venda aguardando proposta";
        }else if($this->type_of_exposure == 8) {
            return "Venda aguardando proposta sobre período";
        }
    }
    public function typeOfExposure()
    {
        if ($this->type_of_exposure == 1) {
            return __("sistema.Comprar");
        }else if($this->type_of_exposure == 2) {
            return "Compra fechada sobre período";
        }else if($this->type_of_exposure == 3) {
            return "Compra aguardando proposta";
        }else if($this->type_of_exposure == 4) {
            return "Compra aguardando proposta sobre período";
        }else if($this->type_of_exposure == 5) {
            return __("sistema.Vender");
        }else if($this->type_of_exposure == 6) {
            return "Venda fechada sobre período";
        }else if($this->type_of_exposure == 7) {
            return "Venda aguardando proposta";
        }else if($this->type_of_exposure == 8) {
            return "Venda aguardando proposta sobre período";
        }else if($this->type_of_exposure == 8) {
            return "Venda confidencial";
        }
    }
    public function paymentModel()
    {
        if ($this->payment_model == 1) {
            return "Dinheiro";
        } else if($this->payment_model == 2) {
            return "Cheque";
        } else if($this->payment_model == 3) {
            return "Transferência";
        }
    }

    public function marketType()
    {
        if ($this->market_type == 1) {
            return "Interno";
        } else if($this->market_type == 2) {
            return "Externo";
        }
    }

    public function visibility()
    {
        if ($this->visibility == 1) {
            return "Confidencial";
        } else if($this->visibility == 2) {
            return "Visível";
        }
    }

    public function coin()
    {
        if ($this->visibility == 1) {
            return "Metical:MT";
        } else if($this->visibility == 2) {
            return "Dollar:USD";
        } else if($this->visibility == 3) {
            return "Euro:EUR";
        }
    }

    public function coinSigla()
    {
        if ($this->visibility == 1) {
            return "MT";
        } else if($this->visibility == 2) {
            return "USD";
        } else if($this->visibility == 3) {
            return "EUR";
        }
    }
}
