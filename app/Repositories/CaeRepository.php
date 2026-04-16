<?php

namespace PMEexport\Repositories;

use PMEexport\Models\Cae;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class CaeRepository
 * @package PMEexport\Repositories
 * @version August 14, 2018, 6:20 pm -03
 *
 * @method Cae findWithoutFail($id, $columns = ['*'])
 * @method Cae find($id, $columns = ['*'])
 * @method Cae first($columns = ['*'])
*/
class CaeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'uuid',
        'cae_id',
        'code',
        'description',
        'designation',
        'rev',
        'other'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Cae::class;
    }
}
