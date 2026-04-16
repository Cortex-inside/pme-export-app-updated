<?php

namespace PMEexport\Repositories;

use PMEexport\Models\CompanyCertificateMessage;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class CompanyCertificateMessageRepository
 * @package PMEexport\Repositories
 * @version August 30, 2018, 10:15 am -03
 *
 * @method CompanyCertificateMessage findWithoutFail($id, $columns = ['*'])
 * @method CompanyCertificateMessage find($id, $columns = ['*'])
 * @method CompanyCertificateMessage first($columns = ['*'])
*/
class CompanyCertificateMessageRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'uuid',
        'company_certificate_id',
        'user_id',
        'message',
        'type'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return CompanyCertificateMessage::class;
    }
}
