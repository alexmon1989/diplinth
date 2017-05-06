<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>DiPlinth | Заказ плинтуса</title>

<style type="text/css">
    .ReadMsgBody {width: 100%; background-color: #ffffff;}
    .ExternalClass {width: 100%; background-color: #ffffff;}
    body     {width: 100%; background-color: #ffffff; margin:0; padding:0; -webkit-font-smoothing: antialiased;font-family: Arial, Helvetica, sans-serif}
    table {border-collapse: collapse;}

    @media only screen and (max-width: 640px)  {
                    body[yahoo] .deviceWidth {width:440px!important; padding:0;}
                    body[yahoo] .center {text-align: center!important;}
            }

    @media only screen and (max-width: 479px) {
                    body[yahoo] .deviceWidth {width:280px!important; padding:0;}
                    body[yahoo] .center {text-align: center!important;}
            }
</style>
</head>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" yahoo="fix" style="font-family: Arial, Helvetica, sans-serif">

<!-- Wrapper -->
<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
    <tr>
        <td width="100%" valign="top" bgcolor="#ffffff" style="padding-top:20px">

            <!--Start Header-->
            <table width="700" bgcolor="#fff" border="0" cellpadding="0" cellspacing="0" align="center" class="deviceWidth">
                <tr>
                    <td style="padding: 6px 0px 0px">
                        <table width="680" border="0" cellpadding="0" cellspacing="0" align="center" class="deviceWidth">
                            <tr>
                                <td width="100%" >
                                    <!--Start logo-->
                                    <table  border="0" cellpadding="0" cellspacing="0" align="left" class="deviceWidth">
                                        <tr>
                                            <td class="center" style="padding: 10px 0px 10px 0px">
                                                <a href="#"><img src="{{ asset('unify/img/logo-header.png') }}"></a>
                                            </td>
                                        </tr>
                                    </table><!--End logo-->
                                </td>
                            </tr>
                        </table>
                   </td>
                </tr>
            </table>
            <!--End Header-->

            <!--Start Three Blocks-->
            <table width="700" border="0" cellpadding="0" cellspacing="0" align="center" class="deviceWidth">
                <tr>
                    <td width="100%" bgcolor="#f7f7f7" >
                        <!-- Top  -->
                        <table width="70%"  border="0" cellpadding="0" cellspacing="0" align="center" >
                            <tr>
                                <td class="center" style="font-size: 16px; color: #303030; font-weight: bold; text-align: center; font-family: Arial, Helvetica, sans-serif; line-height: 25px; vertical-align: middle; padding: 20px 50px 0px; " >
                                    {!! Lang::get('interface.sections.products.order_client_message') !!}
                                </td>
                            </tr>
                            <tr>
                                <td class="center" style="font-size: 14px; color: #303030; font-family: Arial, Helvetica, sans-serif; line-height: 25px; vertical-align: middle; padding: 20px 50px 20px; " >
                                    {{ Lang::get('interface.sections.products.username') }}: <strong>{{ $username }}</strong><br/>
                                    {{ Lang::get('interface.sections.products.userphone') }}: <strong>{{ $userphone }}</strong><br/>
                                    @if($useremail)
                                    {{ Lang::get('interface.sections.products.useremail') }}: <strong><a href="mailto:{{ $useremail }}">{{ $useremail }}</a></strong><br/>
                                    @endif
                                    {{ Lang::get('interface.sections.products.product') }}: <strong>{{ $product->title }}</strong><br/>
                                    {{ Lang::get('interface.sections.products.height') }}: <strong>{{ $height }} {{ Lang::get('interface.sections.products.mm') }}</strong><br/>
                                    {{ Lang::get('interface.sections.products.price') }} 1 {{ Lang::get('interface.sections.products.linear_meter') }}: <strong>{{ $price }} {{ Lang::get('interface.sections.products.uah') }}</strong><br/>
                                    {{ Lang::get('interface.sections.products.count_of_linear_metres') }}: <strong>{{ $count }}</strong><br/>
                                    {{ Lang::get('interface.sections.products.total_sum') }}: <strong>{{ $total_sum }} {{ Lang::get('interface.sections.products.uah') }}</strong>
                                </td>
                            </tr>
                            <tr>
                                <td class="center" style="font-size: 16px; color: #303030; font-weight: bold; text-align: center; font-family: Arial, Helvetica, sans-serif; line-height: 25px; vertical-align: middle; padding: 20px 50px 0px; " >
                                    {{ Lang::get('interface.sections.products.order_success_message') }}
                                </td>
                            </tr>
                        </table><!--End Top-->
                    </td>
                </tr>
            </table>
            <!--End Three Blocks -->


            <!-- Footer -->
            <table width="700"  border="0" cellpadding="0" cellspacing="0" align="center" class="deviceWidth"  >
                <tr>
                    <td  bgcolor="#ffffff" class="center" style="font-size: 12px; color: #687074; font-weight: bold; text-align: center; font-family: Arial, Helvetica, sans-serif; line-height: 25px; vertical-align: middle; padding: 20px 50px 0px 50px; " >
                        {{ Lang::get('interface.copyright') }} © DiPlinth {{ date('Y') }}
                    </td>
                </tr>
            </table>
            <!--End Footer-->

        </td>
    </tr>
</table>
<!-- End Wrapper -->
</body>
</html>