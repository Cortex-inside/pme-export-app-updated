<?php

namespace PMEexport\Repositories;

use PMEexport\Models\RequestMessage;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class RequestMessageRepository
 * @package PMEexport\Repositories
 * @version August 14, 2018, 6:20 pm -03
 *
 * @method RequestMessage findWithoutFail($id, $columns = ['*'])
 * @method RequestMessage find($id, $columns = ['*'])
 * @method RequestMessage first($columns = ['*'])
*/
class RequestMessageRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'uuid',
        'request_id',
        'user_id',
        'message'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return RequestMessage::class;
    }
}
