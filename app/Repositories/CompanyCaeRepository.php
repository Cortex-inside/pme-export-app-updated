<?php

namespace PMEexport\Repositories;

use PMEexport\Models\CompanyCae;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class CompanyCaeRepository
 * @package PMEexport\Repositories
 * @version August 14, 2018, 6:21 pm -03
 *
 * @method CompanyCae findWithoutFail($id, $columns = ['*'])
 * @method CompanyCae find($id, $columns = ['*'])
 * @method CompanyCae first($columns = ['*'])
*/
class CompanyCaeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'uuid',
        'company_id',
        'cae_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return CompanyCae::class;
    }
}
