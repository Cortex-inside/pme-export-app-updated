<?php

namespace PMEexport\Repositories;

use PMEexport\Models\ProductCategory;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class ProductCategoryRepository
 * @package PMEexport\Repositories
 * @version August 14, 2018, 6:19 pm -03
 *
 * @method ProductCategory findWithoutFail($id, $columns = ['*'])
 * @method ProductCategory find($id, $columns = ['*'])
 * @method ProductCategory first($columns = ['*'])
*/
class ProductCategoryRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'uuid',
        'name'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ProductCategory::class;
    }
}
