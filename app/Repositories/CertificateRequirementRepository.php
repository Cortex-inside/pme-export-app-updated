<?php

namespace PMEexport\Repositories;

use PMEexport\Models\CertificateRequirement;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class CertificateRequirementRepository
 * @package PMEexport\Repositories
 * @version August 23, 2018, 3:36 pm -03
 *
 * @method CertificateRequirement findWithoutFail($id, $columns = ['*'])
 * @method CertificateRequirement find($id, $columns = ['*'])
 * @method CertificateRequirement first($columns = ['*'])
*/
class CertificateRequirementRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'uuid',
        'certificate_id',
        'requirement_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return CertificateRequirement::class;
    }
}
