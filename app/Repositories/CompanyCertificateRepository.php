<?php

namespace PMEexport\Repositories;

use PMEexport\Models\CompanyCertificate;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class CompanyCertificateRepository
 * @package PMEexport\Repositories
 * @version August 23, 2018, 3:36 pm -03
 *
 * @method CompanyCertificate findWithoutFail($id, $columns = ['*'])
 * @method CompanyCertificate find($id, $columns = ['*'])
 * @method CompanyCertificate first($columns = ['*'])
*/
class CompanyCertificateRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'uuid',
        'company_id',
        'certificate_id',
        'status',
        'motive_disapprove',
        'request_date'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return CompanyCertificate::class;
    }
}
