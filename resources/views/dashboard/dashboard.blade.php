@extends('layouts.admin.index')

@section('content')


                <div class="row">
                    <!-- first card start -->
                    <div class="col-xl-12 col-md-12">
                        <div class="card d-flex w-100 mb-4">
                            <div class="row no-gutters row-bordered row-border-light h-100">
                                <div class="d-flex col-sm-3 align-items-center">
                                    <div class="card-body media align-items-center text-dark">
                                        <i class="lnr lnr-apartment display-4 d-block text-primary"></i>
                                        <span class="media-body d-block ml-3">
                                            <span class="text-big mr-1 text-primary">{{$data['companies_all']}}
                                                @lang('sistema.dashboard.companies_all')</span>
                                        </span>
                                    </div>
                                </div>

                                <div class="d-flex col-sm-3 align-items-center">
                                    <div class="card-body media align-items-center text-dark">
                                        <i class="lnr lnr-diamond display-4 d-block text-primary"></i>
                                        <span class="media-body d-block ml-3">
                                            <span class="text-big mr-1 text-primary">{{$data['certificates_all']}}  @lang('sistema.dashboard.certificates_all')
                                            </span>
                                        </span>
                                    </div>
                                </div>
                                <div class="d-flex col-sm-3 align-items-center">
                                    <div class="card-body media align-items-center text-dark">
                                        <i class="lnr lnr-clock display-4 d-block text-warning"></i>
                                        <span class="media-body d-block ml-3">
                                                    <span class="text-big"><span class="mr-1
                                                    text-warning">{{$data['request_announcements_all']}}</span>@lang('sistema.dashboard.request_announcements_all')</span>
                                    </div>
                                </div>
                                <div class="d-flex col-sm-3 align-items-center">
                                    <div class="card-body media align-items-center text-dark">
                                        <i class="lnr lnr-hourglass display-4 d-block text-danger"></i>
                                        <span class="media-body d-block ml-3">
                                                    <span class="text-big"><span class="mr-1
                                                    text-danger">{{$data['companies_pendentes']}}</span> @lang('sistema.dashboard.companies_pendentes')</span>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- first card end -->

                </div>



@endsection
@section('scripts')

    <script src="/assets/libs/eve/eve.js"></script>
    <script src="/assets/libs/flot/flot.js"></script>
    <script src="/assets/libs/flot/curvedLines.js"></script>
    <script src="/assets/libs/chart-am4/core.js"></script>
    <script src="/assets/libs/chart-am4/charts.js"></script>
    <script src="/assets/libs/chart-am4/animated.js"></script>
    <!-- Demo -->
    <script src="/assets/js/pages/dashboards_index.js"></script>
@endsection


