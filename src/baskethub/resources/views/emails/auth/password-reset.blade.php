@include("emails.layouts._header")
<div>
    <table style="width: 750px;" border="0" cellspacing="0" cellpadding="0" align="center">
        <tbody>
            <tr>
                <td valign="middle" class=" bg_white" style="position: relative; z-index: 0; align-items: center; bottom: 20px; padding: 2em 0 0 0;">
                    <div class=" bg_sand" style=" padding:130px;color: rgba(0, 0, 0, 0.3);text-align: center;">
                        <h2 style="color: #000; font-size: 40px; margin-bottom: 0; font-weight: 600; letter-spacing: 3px;font-family: 'arial' , 'sans-serif'">{{ __("mail-title.PASSWORD_RESET") }}</h2>
                        <p style="color: #000; font-size: 20px; margin: 10px 40px 0; font-weight: normal; letter-spacing: 2px;font-family: 'arial' , 'sans-serif'">
					  	{{ __("mail-content.DEAR") }}
                        {{ $customerNameSurname }}
						</p>
                        <p style="color: #000; font-size: 20px; margin: 10px 40px 0; font-weight: normal; letter-spacing: 2px;font-family: 'arial' , 'sans-serif'">{{ __("mail-content.MESSAGE") }}</p>
                        <a href="{{ $urlToken }}" style="padding: 15px 45px 15px; display: inline-block; margin-top: 30px; margin-bottom: 30px; border-radius: 0px; background: #000; font-weight: bold; color: #fff; font-size: 20px; letter-spacing: 9px;font-family: 'arial' , 'sans-serif'" >{{ __("mail-content.CLICK") }}</a>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@include("emails.layouts._footer")