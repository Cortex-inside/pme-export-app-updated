<?php

namespace PMEexport\Repositories;

use PMEexport\Models\CompanyRepresentative;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class CompanyRepresentativeRepository
 * @package PMEexport\Repositories
 * @version August 14, 2018, 6:18 pm -03
 *
 * @method CompanyRepresentative findWithoutFail($id, $columns = ['*'])
 * @method CompanyRepresentative find($id, $columns = ['*'])
 * @method CompanyRepresentative first($columns = ['*'])
*/
class CompanyRepresentativeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'uuid',
        'company_id',
        'name'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return CompanyRepresentative::class;
    }
}
