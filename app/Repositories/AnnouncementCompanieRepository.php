<?php

namespace PMEexport\Repositories;

use PMEexport\Models\AnnouncementCompanie;
use PMEexport\Models\Document;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class DocumentRepository
 * @package PMEexport\Repositories
 * @version August 23, 2018, 3:36 pm -03
 *
 * @method Document findWithoutFail($id, $columns = ['*'])
 * @method Document find($id, $columns = ['*'])
 * @method Document first($columns = ['*'])
 */
class AnnouncementCompanieRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'uuid',
        'announcement_id',
        'company_id',
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return AnnouncementCompanie::class;
    }
}
