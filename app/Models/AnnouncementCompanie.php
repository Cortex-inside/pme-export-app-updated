<?php

namespace PMEexport\Models;

use Illuminate\Database\Eloquent\Model;
use PMEexport\Traits\Uuids;

class AnnouncementCompanie extends Model
{
    use Uuids;

    public $table = 'announcements_companies';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

//    protected $dates = ['deleted_at'];

    public $fillable = [
        'uuid',
        'company_announcement_id',
        'companie_id',
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
        'companie_id' => 'integer',
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
        return $this->hasOne(\PMEexport\Models\Company::class, "id", "companie_id");
    }
}
