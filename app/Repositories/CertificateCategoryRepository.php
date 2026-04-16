<?php

namespace PMEexport\Repositories;

use PMEexport\Models\CertificateCategory;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class CertificateCategoryRepository
 * @package PMEexport\Repositories
 * @version August 23, 2018, 3:34 pm -03
 *
 * @method CertificateCategory findWithoutFail($id, $columns = ['*'])
 * @method CertificateCategory find($id, $columns = ['*'])
 * @method CertificateCategory first($columns = ['*'])
*/
class CertificateCategoryRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'uuid',
        'name',
        'description'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return CertificateCategory::class;
    }
}
