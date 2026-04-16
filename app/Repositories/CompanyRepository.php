<?php

namespace PMEexport\Repositories;

use PMEexport\Models\Company;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class CompanyRepository
 * @package PMEexport\Repositories
 * @version August 14, 2018, 6:15 pm -03
 *
 * @method Company findWithoutFail($id, $columns = ['*'])
 * @method Company find($id, $columns = ['*'])
 * @method Company first($columns = ['*'])
*/
class CompanyRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'uuid',
        'name',
        'status',
        'legal_situation_id',
        'district_id',
        'initials',
        'address',
        'number',
        'locality',
        'latitude',
        'longitude',
        'country',
        'zipcode',
        'website',
        'nuit',
        'nuit_doc',
        'alvara',
        'alvara_doc',
        'initial_investment',
        'business_volume',
        'motive_disapprove',
        'number_of_workers_h',
        'number_of_workers_m'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Company::class;
    }
}
