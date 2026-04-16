<?php

namespace PMEexport\Repositories;

use PMEexport\Models\CompanyEmail;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class CompanyEmailRepository
 * @package PMEexport\Repositories
 * @version August 14, 2018, 6:16 pm -03
 *
 * @method CompanyEmail findWithoutFail($id, $columns = ['*'])
 * @method CompanyEmail find($id, $columns = ['*'])
 * @method CompanyEmail first($columns = ['*'])
*/
class CompanyEmailRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'uuid',
        'company_id',
        'email',
        'type'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return CompanyEmail::class;
    }
}
