<?php

namespace PMEexport\Repositories;

use PMEexport\Models\AnnouncementImage;
use PMEexport\Models\Document;
use Prettus\Repository\Eloquent\BaseRepository;
use PMEexport\Models\AnnouncementDocument;

/**
 * Class DocumentRepository
 * @package PMEexport\Repositories
 * @version August 23, 2018, 3:36 pm -03
 *
 * @method Document findWithoutFail($id, $columns = ['*'])
 * @method Document find($id, $columns = ['*'])
 * @method Document first($columns = ['*'])
 */
class AnnouncementImageRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'uuid',
        'company_announcement_id',
        'user_id',
        'type',
        'url',
        'text',
        'name',
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return AnnouncementImage::class;
    }
}
