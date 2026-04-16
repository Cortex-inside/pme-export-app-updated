<?php

namespace PMEexport\Repositories;

use PMEexport\Models\Requirement;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class RequirementRepository
 * @package PMEexport\Repositories
 * @version August 23, 2018, 3:35 pm -03
 *
 * @method Requirement findWithoutFail($id, $columns = ['*'])
 * @method Requirement find($id, $columns = ['*'])
 * @method Requirement first($columns = ['*'])
*/
class RequirementRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'uuid',
        'name',
        'description',
        'type'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Requirement::class;
    }
}
