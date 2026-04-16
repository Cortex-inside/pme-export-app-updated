<?php

/**
 * Created by PhpStorm.
 * User: Guilherme Dias
 * Date: 17/08/2018
 * Time: 13:36
 */

namespace PMEexport\Services;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;
use PMEexport\Criteria\AnunciosCriteria;
use PMEexport\Criteria\ProductByCompanyCriteria;
use PMEexport\Repositories\CaeRepository;
use PMEexport\Repositories\CompanyAnnouncementRepository;
use PMEexport\Repositories\ProductRepository;
use Prettus\Repository\Criteria\RequestCriteria;

class ExchangeService
{
    /**
     * @var ProductRepository
     */
    private $companyAnnouncementRepository;

    /**
     * ProductService constructor.
     */
    public function __construct(CompanyAnnouncementRepository $companyAnnouncementRepository)
    {
        $this->companyAnnouncementRepository = $companyAnnouncementRepository;
    }

    public function listProducts()
    {
        $this->companyAnnouncementRepository->pushCriteria(new AnunciosCriteria());
        $announcements = $this->companyAnnouncementRepository->all();

        return view('exchange.index', compact('announcements'));
    }
    public function detailProduct($announcement)
    {
        return view('exchange.offer-details')
            ->with('announcement', $announcement);
    }
}
