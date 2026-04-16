<?php

namespace PMEexport\Repositories;

use PMEexport\Models\CompanyPartner;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class CompanyPartnerRepository
 * @package PMEexport\Repositories
 * @version August 14, 2018, 6:16 pm -03
 *
 * @method CompanyPartner findWithoutFail($id, $columns = ['*'])
 * @method CompanyPartner find($id, $columns = ['*'])
 * @method CompanyPartner first($columns = ['*'])
*/
class CompanyPartnerRepository extends BaseRepository
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
        return CompanyPartner::class;
    }
}
