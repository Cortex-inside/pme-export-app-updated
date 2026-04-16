@section('css')
    <link rel="stylesheet" href="/assets/css/pages/chat.css">
@endsection

<div class="chat-wrapper">

    <!-- Make card full height of `.chat-wrapper` -->
    <div class="card flex-grow-1 position-relative overflow-hidden">

        <!-- Make row full height of `.card` -->
        <div class="row no-gutters h-100">
            <div class="d-flex col flex-column">

                <!-- Wrap `.chat-scroll` to properly position scroll area. Remove this wtapper if you don't need scroll -->
                <div class="flex-grow-1 position-relative">

                    <!-- Remove `.chat-scroll` and add `.flex-grow-1` if you don't need scroll -->
                    <div class="chat-messages chat-scroll p-4">

                        @if($companyCertificate->messages->count() > 0)

                            @foreach($companyCertificate->messages as $message)
                                @if($message->type == 1)
                                    <div class="chat-message-right mb-4">
                                        <div>
                                            <img src="/img/logo/logo-316x352.png" class="ui-w-40 rounded-circle"
                                                 alt>
                                            <div class="text-muted small text-nowrap
                                            mt-2">{{$message->createdAtFormat()}}</div>
                                        </div>
                                        <div class="flex-shrink-1 bg-lighter rounded py-2 px-3 mr-3">
                                            <div class="font-weight-semibold mb-1">PME Exporte</div>
                                            {{$message->message}}
                                        </div>
                                    </div>

                                @else


                                    <div class="chat-message-left mb-4">
                                        <div>
                                            @if($message->user->company->photo)
                                                <img src="{{optional($message->user->company)->photo}}" class="ui-w-40 rounded-circle" alt>
                                            @else
                                                <img src="/assets/img/avatars/1-small.png" class="ui-w-40 rounded-circle" alt>
                                            @endif
                                            <div class="text-muted small text-nowrap
                                            mt-2">{{$message->createdAtFormat()}}</div>
                                        </div>
                                        <div class="flex-shrink-1 bg-lighter rounded py-2 px-3 ml-3">
                                            <div class="font-weight-semibold
                                            mb-1">{{optional($message->user->company)->name}}</div>
                                            {{$message->message}}
                                        </div>
                                    </div>

                                @endif
                            @endforeach

                        @else
                            <span>Nenhuma interação realizada.</span>
                        @endif

                    </div>
                    <!-- / .chat-messages -->
                </div>

                <!-- Chat footer -->
                <hr class="border-light m-0">
                @if($companyCertificate->status != 3 &&  $companyCertificate->status != 4)
                <div class="flex-grow-0 py-3 px-4">
                    {!! Form::open(['route' => 'sysCompany.certificates.sendMessageRequestCertificate']) !!}
                    <input type="hidden" name="type" value="1">
                    <input type="hidden" name="company_certificate_id" value="{{$companyCertificate->id}}">

                    <div class="input-group">
                        {!! Form::text('message', null, ['class' => 'form-control', 'placeholder'=>'Digite sua mensagem...']) !!}
                        <div class="input-group-append">
                            {!! Form::submit('Enviar', ['class' => 'btn btn-primary btn-flat  waves-effect waves-light']) !!}
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
                @endif
                <!-- / Chat footer -->

            </div>
        </div>
        <!-- / .row -->
    </div>
    <!-- / .card -->

</div>

@section('scripts')

    <script src="/assets/js/pages/pages_chat.js"></script>

@endsection