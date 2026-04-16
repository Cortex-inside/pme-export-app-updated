<?php

namespace PMEexport\Repositories;

use PMEexport\Models\RequestAnnouncement;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class RequestAnnouncementRepository
 * @package PMEexport\Repositories
 * @version August 14, 2018, 6:20 pm -03
 *
 * @method RequestAnnouncement findWithoutFail($id, $columns = ['*'])
 * @method RequestAnnouncement find($id, $columns = ['*'])
 * @method RequestAnnouncement first($columns = ['*'])
*/
class RequestAnnouncementRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'company_announcements_id',
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return RequestAnnouncement::class;
    }
}
