<?php

namespace PMEexport\Repositories;

use PMEexport\Models\Department;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class DepartmentRepository
 * @package PMEexport\Repositories
 * @version August 23, 2018, 3:33 pm -03
 *
 * @method Department findWithoutFail($id, $columns = ['*'])
 * @method Department find($id, $columns = ['*'])
 * @method Department first($columns = ['*'])
*/
class DepartmentRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'uuid',
        'name',
        'description'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Department::class;
    }
}
