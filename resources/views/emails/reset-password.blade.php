@component('mail::message')

    <div style=" width: 100%;margin: 0px; font-family: 'Open Sans',sans-serif; font-size: 14px; line-height: 150%; color: #333; padding: 0px; font-weight: normal;">
        <div style="width: 100%;">
            <div style="padding: 8px; vertical-align: middle; margin: 0 auto; width: 90%; margin-bottom: 30px; background-color: #fff!important; border-top: 0px!important; border-left: 0px!important; border-right: 0px!important;">
                <p style="margin: 0 0 10px; padding-bottom: 10px;">Olá {{$first_name}}, </p>

                <br>
                <p style="margin: 0 0 10px; padding-bottom: 10px;">Você está recebendo este e-mail porque recebemos uma solicitação de redefinição de senha para sua conta.</p>

                <p style="margin: 0 0 10px; padding-bottom: 10px;">
                    @component('mail::button', ['url' => route('password.reset', $token), 'color' => 'green'])
                        Resetar Senha
                    @endcomponent
                </p>

                <p style="margin: 0 0 10px; padding-bottom: 10px;">Se você não solicitou uma redefinição de senha, nenhuma ação adicional é necessária.</p>
                <p style="margin: 0 0 10px; padding-bottom: 10px;">Obrigado,</p>
                <p style="margin: 0 0 10px; padding-bottom: 10px;">PmeExporte</p>
                <hr>

                <br>

            </div>
        </div>

        <table width="100%" border="0" cellspacing="0" cellpadding="10">
            <tr>
                <td align="center" valign="top">
                    <p style="color:#888888;font-size:80%;font-family:Helvetica,Arial,sans-serif;line-height:16px;text-align:center">
                    <span class="js-footer-preview">
                    Email enviado <b>PmeExporte</b> <br>
                    <a href="http://sweetalyssum.com.au" target="_blank">http://pmeexporte.co.mz</a> <br>
                    <br>Moçambique <br>
                    </span>
                    </p>
                    <p style="color:#888888;font-size:80%;font-family:Helvetica,Arial,sans-serif;line-height:16px;text-align:center">

                    </p>
                </td>
            </tr>
        </table>
        <div style="width: 100%; padding: 0px 0px 0px 0px; text-align: center; color: #bbb; font-size: 12px;"><a style="color: #fff !important; font-size: 12px!important; background-color: transparent; text-decoration: none!important; font-family: 'Open Sans',sans-serif; font-weight: normal; line-height: 150%;" href="http://pmeexporte.co.mz" target="_blank"></a> <br></div>
    </div>

@endcomponent



