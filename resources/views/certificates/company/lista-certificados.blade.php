    @forelse($certificateCategories as $category)

                <h4 class="font-weight-bold py-3 mb-0">{{  $category->name }} - {{ $category->description  }}</h4>

                <div class="row">
                    @foreach($category->certificates as $certificate)

                        @php
                            $checkCertificado = checkMyCertificate($certificate->id);
                        @endphp

                    <div class="col-md-6">
                        <div class="card mb-4 overflow-hidden">
                            <div class="card-body">
                                {{--<div class="card-badges bg-danger text-white"><span>Urgent</span></div>--}}
                                <a href="javascript:void(0)" class="text-dark text-large font-weight-semibold">{{ $certificate->name }}</a>
                                {{--<div class="d-flex flex-wrap mt-3">--}}
                                    {{--<div class="mr-3"><i class="vacancy-tooltip mr-1 ion ion-md-business text-light" title="Department"></i> Marketing</div>--}}
                                    {{--<div class="mr-3"><i class="vacancy-tooltip mr-1 ion ion-md-pin text-light" title="Location"></i> UK wide</div>--}}
                                    {{--<div class="mr-3"><i class="vacancy-tooltip mr-1 ion ion-md-time text-primary" title="Employment"></i> Full-time</div>--}}
                                {{--</div>--}}
                                <div class="my-3" style="overflow-y: scroll; min-height: 105px; height: 105px">
                                    {{ $certificate->description }}
                                </div>
                                <div class="text-right">
                                    @hasanyrole('empresa_estrangeira|empresa')

                                        @if($checkCertificado)
                                            <a href="{!! route('sysCompany.certificates.showMyCertificates', [$checkCertificado->id]) !!}" class='btn btn-default btn-round'>
                                                {{optional($checkCertificado)->status()}}
                                            </a>


                                        @else
                                            <a href="{!! route('sysCompany.certificates.requestCertificate', [$certificate->uuid]) !!}" class='btn btn-primary btn-round'>
                                                @lang("sistema.Solicitar")
                                            </a>

                                        @endif

                                    @endhasanyrole
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

    @empty
        <span>Nenhum certificado cadastrado</span>
    @endforelse
