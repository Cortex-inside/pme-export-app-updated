<?php

namespace PMEexport\Repositories;

use PMEexport\Models\Certificate;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class CertificateRepository
 * @package PMEexport\Repositories
 * @version August 23, 2018, 3:34 pm -03
 *
 * @method Certificate findWithoutFail($id, $columns = ['*'])
 * @method Certificate find($id, $columns = ['*'])
 * @method Certificate first($columns = ['*'])
*/
class CertificateRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'uuid',
        'department_id',
        'certificate_category_id',
        'duration',
        'description',
        'name',
        'status'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Certificate::class;
    }
}
