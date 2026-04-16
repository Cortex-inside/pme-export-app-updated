<div class="row">
    <div class="col-md-12">
        <!-- DIRECT CHAT PRIMARY -->
        <div class="box box-primary direct-chat direct-chat-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Interação</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="">

                <!-- Conversations are loaded here -->
                <div class="direct-chat-messages">
                @if($announcement->messages->count() > 0)

                    @foreach($announcement->messages as $message)

                        @if($message->type == 1)

                            <!-- Message. Default to the left -->
                                <div class="direct-chat-msg">
                                    <div class="direct-chat-info clearfix">
                                        <span class="direct-chat-name pull-left">PME Exporte</span>
                                        <span class="direct-chat-timestamp pull-right">{{$message->created_at}}</span>
                                    </div>
                                    <!-- /.direct-chat-info -->
                                    <img class="direct-chat-img" src="/img/logo/logo-316x352.png" alt="Adm User Image"><!-- /.direct-chat-img -->
                                    <div class="direct-chat-text">
                                        {{$message->message}}
                                    </div>
                                    <!-- /.direct-chat-text -->
                                </div>
                                <!-- /.direct-chat-msg -->

                        @else

                            <!-- Message to the right -->
                                @if($message->user_id == Auth::user()->id)
                                    <div class="direct-chat-msg right">
                                @else
                                    <div class="direct-chat-msg left">
                                @endif
                                    <div class="direct-chat-info clearfix">
                                        <span class="direct-chat-name pull-right">{{$message->user->company->name}}</span>
                                        <span class="direct-chat-timestamp pull-left">{{$message->created_at}}</span>
                                    </div>
                                    <!-- /.direct-chat-info -->
                                    <img class="direct-chat-img" src="/img/icons/user-316x352.png" alt="Message User Image"><!-- /.direct-chat-img -->
                                    <div class="direct-chat-text">
                                        {{$message->message}}
                                    </div>
                                    <!-- /.direct-chat-text -->
                                </div>
                                <!-- /.direct-chat-msg -->

                            @endif
                        @endforeach

                    @else
                        <span>Nenhuma interação realizada.</span>
                    @endif

                </div>
                <!--/.direct-chat-messages-->
            </div>
            <!-- /.box-body -->
            <div class="box-footer" style="">
                {!! Form::open(['route' => 'exchange.request.sendMessageRequest']) !!}
                <input type="hidden" name="type" value="2">
                <input type="hidden" name="request_announcement_id" value="{{$announcement->id}}">
                <div class="input-group">
                    {!! Form::text('message', null, ['class' => 'form-control', 'placeholder'=>'Digite sua mensagem...']) !!}
                    <span class="input-group-btn">
                                {!! Form::submit('Enviar', ['class' => 'btn btn-primary btn-flat']) !!}
                          </span>
                </div>
                {!! Form::close() !!}
            </div>
            <!-- /.box-footer-->
        </div>
        <!--/.direct-chat -->
    </div>
</div>