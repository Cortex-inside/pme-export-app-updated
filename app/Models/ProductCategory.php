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
        if (!$this->photo) {
            return null;
        }

        if (Str::startsWith($this->photo, ['http://', 'https://'])) {
            return $this->photo;
        }

        return UploadStorage::url($this->photo);
        $baseUrl = rtrim((string) config('filesystems.disks.s3.url', env('AWS_URL', '')), '/');

        if (!$baseUrl) {
            return $this->photo;
        }

        return $baseUrl . '/' . ltrim($this->photo, '/');
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
