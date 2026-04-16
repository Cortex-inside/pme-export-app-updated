<?php

namespace PMEexport\Repositories;

use PMEexport\Models\District;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class DistrictRepository
 * @package PMEexport\Repositories
 * @version August 14, 2018, 5:54 pm -03
 *
 * @method District findWithoutFail($id, $columns = ['*'])
 * @method District find($id, $columns = ['*'])
 * @method District first($columns = ['*'])
*/
class DistrictRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'uuid',
        'province_id',
        'name'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return District::class;
    }
}
