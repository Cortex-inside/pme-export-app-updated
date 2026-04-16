<?php

namespace PMEexport\Repositories;

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
class DocumentRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'uuid',
        'company_certificate_id',
        'requirement_id',
        'user_id',
        'status',
        'type',
        'url',
        'text',
        'approved_date',
        'disapproved_date'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Document::class;
    }
}
