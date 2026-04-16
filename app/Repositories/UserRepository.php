<?php

namespace PMEexport\Repositories;

use PMEexport\Models\Cae;
use Prettus\Repository\Eloquent\BaseRepository;
use PMEexport\Models\User;

/**
 * Class CaeRepository
 * @package PMEexport\Repositories
 * @version August 14, 2018, 6:20 pm -03
 *
 * @method Cae findWithoutFail($id, $columns = ['*'])
 * @method Cae find($id, $columns = ['*'])
 * @method Cae first($columns = ['*'])
*/
class UserRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'company_id',
        'email',
        'department_id',
        'status'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return User::class;
    }
}
