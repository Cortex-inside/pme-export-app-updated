<?php

namespace PMEexport\Repositories;

use PMEexport\Models\LegalSituation;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class LegalSituationRepository
 * @package PMEexport\Repositories
 * @version August 14, 2018, 5:54 pm -03
 *
 * @method LegalSituation findWithoutFail($id, $columns = ['*'])
 * @method LegalSituation find($id, $columns = ['*'])
 * @method LegalSituation first($columns = ['*'])
*/
class LegalSituationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'uuid',
        'name'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return LegalSituation::class;
    }
}
