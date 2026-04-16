@extends('layouts.website')

@section('content')
<section class="section section--no-pt">
    <div class="container">
        <h2 class="h2">Perguntas Frequentes</h2>
        <p class="mb-4">Reunimos aqui respostas rápidas sobre conta, certificados e suporte.</p>

        <div class="faq-list">
            <div class="mb-3">
                <h4 class="h4">Como solicitar um certificado?</h4>
                <p>Acesse sua área autenticada, entre no menu <strong>Certificados &gt; Solicitar</strong>, selecione o tipo de certificado e envie os documentos exigidos.</p>
            </div>

            <div class="mb-3">
                <h4 class="h4">Onde acompanho o status do meu pedido?</h4>
                <p>Na área da empresa, acesse <strong>Certificados &gt; Meus Certificados</strong> para visualizar andamento, aprovações e eventuais reprovações.</p>
            </div>

            <div class="mb-3">
                <h4 class="h4">Como falar com o suporte?</h4>
                <p>Use a página de <a href="{{ route('site.contato') }}">contactos</a> para enviar sua mensagem. Nossa equipa responderá pelos canais informados no seu pedido.</p>
            </div>

            <div class="mb-3">
                <h4 class="h4">Esqueci a senha. O que fazer?</h4>
                <p>Na tela de login, use a opção de recuperação de senha. Se persistir, entre em contacto pelo suporte.</p>
            </div>
        </div>
    </div>
</section>
@endsection
