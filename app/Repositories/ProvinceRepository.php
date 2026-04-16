<?php

namespace PMEexport\Repositories;

use PMEexport\Models\Province;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class ProvinceRepository
 * @package PMEexport\Repositories
 * @version August 14, 2018, 5:53 pm -03
 *
 * @method Province findWithoutFail($id, $columns = ['*'])
 * @method Province find($id, $columns = ['*'])
 * @method Province first($columns = ['*'])
*/
class ProvinceRepository extends BaseRepository
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
        return Province::class;
    }
}
