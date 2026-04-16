<?php

namespace PMEexport\Repositories;

use PMEexport\Models\Cae;
use Prettus\Repository\Eloquent\BaseRepository;
use PMEexport\Models\CompanyAnnouncement;

/**
 * Class CaeRepository
 * @package PMEexport\Repositories
 * @version August 14, 2018, 6:20 pm -03
 *
 * @method Cae findWithoutFail($id, $columns = ['*'])
 * @method Cae find($id, $columns = ['*'])
 * @method Cae first($columns = ['*'])
*/
class CompanyAnnouncementRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'uuid',
        'company_id',
        'product_id',
        'market_type',
        'type_of_exposure',
        'visibility',
        'unit_of_measure_or_weight',
        'amount',
        'coin',
        'price',
        'payment_model',
        'description'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return CompanyAnnouncement::class;
    }
}
