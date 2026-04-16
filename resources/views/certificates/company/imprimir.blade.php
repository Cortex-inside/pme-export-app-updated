@extends('layouts.imprimir_certificate')

@section('content')

    <p class="paragraph-2">Certifica-se que a  {{$companyCertificate->company->name}} participou com sucesso na capacitação em “{!! $companyCertificate->certificate->name !!}”,
        com carga horária de {!! $companyCertificate->certificate->duration !!} horas,
        realizada entre as datas {{$companyCertificate->certificate->iniDate()}} a {{$companyCertificate->certificate->endDate()}}, na {{$companyCertificate->certificate->address}} pelo Instituto para a Promoção das Pequenas e  
        Médias Empresas, {{$companyCertificate->certificate->description}}.</p>
    <img src="/images/associados.svg" alt=""></div><img src="/images/Asset-4.svg" alt="">

@endsection
