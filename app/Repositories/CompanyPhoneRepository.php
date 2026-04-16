<?php

namespace PMEexport\Repositories;

use PMEexport\Models\CompanyPhone;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class CompanyPhoneRepository
 * @package PMEexport\Repositories
 * @version August 14, 2018, 6:17 pm -03
 *
 * @method CompanyPhone findWithoutFail($id, $columns = ['*'])
 * @method CompanyPhone find($id, $columns = ['*'])
 * @method CompanyPhone first($columns = ['*'])
*/
class CompanyPhoneRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'uuid',
        'company_id',
        'type',
        'ddi',
        'prefix',
        'number'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return CompanyPhone::class;
    }
}
