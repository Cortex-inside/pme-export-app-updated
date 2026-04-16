<?php

namespace PMEexport\Repositories;

use PMEexport\Models\Product;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class ProductRepository
 * @package PMEexport\Repositories
 * @version August 14, 2018, 6:19 pm -03
 *
 * @method Product findWithoutFail($id, $columns = ['*'])
 * @method Product find($id, $columns = ['*'])
 * @method Product first($columns = ['*'])
*/
class ProductRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'uuid',
        'product_category_id',
        'name',
        'description'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Product::class;
    }
}
