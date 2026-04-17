<?php

namespace PMEexport\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use PMEexport\Support\UploadStorage;
use PMEexport\Traits\Uuids;

/**
 * Class ProductCategory
 * @package PMEexport\Models
 * @version August 14, 2018, 6:19 pm -03
 *
 * @property \Illuminate\Database\Eloquent\Collection companies
 * @property \Illuminate\Database\Eloquent\Collection companyCaes
 * @property \Illuminate\Database\Eloquent\Collection permissionRole
 * @property \Illuminate\Database\Eloquent\Collection permissionUser
 * @property \Illuminate\Database\Eloquent\Collection Product
 * @property \Illuminate\Database\Eloquent\Collection requestMessages
 * @property \Illuminate\Database\Eloquent\Collection requestProducts
 * @property \Illuminate\Database\Eloquent\Collection requests
 * @property \Illuminate\Database\Eloquent\Collection roleUser
 * @property string uuid
 * @property string name
 */
class ProductCategory extends Model
{
    use SoftDeletes, Uuids;

    public $table = 'product_categories';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'uuid',
        'name',
        'photo'
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
        'photo' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */


    public static $rules = [
        'name' => 'required:max:255|min:3|string',
        'photo' => 'required',
    ];


    public function getPhotoUrlAttribute()
    {
        if (! $this->photo) {
            return asset('img/blank.gif');
        }

        if (Str::startsWith($this->photo, ['http://', 'https://'])) {
            return $this->photo;
        }

        $normalizedPath = ltrim($this->photo, '/');

        // Compatibilidade com categorias antigas salvas em caminhos públicos (ex: /imagens/categoria/...)
        if (file_exists(public_path($normalizedPath))) {
            return asset($normalizedPath);
        }

        return UploadStorage::url($normalizedPath) ?: asset('img/blank.gif');
    }

    public function nameFilter()
    {
        return "category-" . $this->id;
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function products()
    {
        return $this->hasMany(\PMEexport\Models\Product::class, 'product_category_id');
    }
}
