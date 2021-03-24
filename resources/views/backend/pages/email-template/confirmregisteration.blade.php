<!DOCTYPE html>
<html>
<head>
    <title>Email Template</title>
</head>
<body>
<table data-module="noti-2" data-thumbnail="bg.jpg" class="full selected-table" width="80%" cellspacing="0" cellpadding="0" border="0" align="center">
    <tbody><tr>
        <td data-bgcolor="Main BG" data-background="Main BG" style="background-size: cover; background-position: center center;" valign="top" bgcolor="#494c50">
            <table class="table-inner ui-resizable" style="max-width: 600px; height: 417px;" width="600" cellspacing="0" cellpadding="0" border="0" align="center">
                <tbody><tr>
                    <td height="40"></td>
                </tr>
                <tr>
                    <td data-bgcolor="Panel" style="border-top-left-radius: 4px;border-top-right-radius: 4px;" bgcolor="#FFFFFF" align="center">
                        <table width="90%" cellspacing="0" cellpadding="0" border="0" align="center">
                            <tbody><tr>
                                <td height="50"></td>
                            </tr>
                            <!-- logo -->
                            <tr>
                                @foreach(App\Models\Logo::first()->get() as $logo)
                                    <td style="line-height: 0px;" align="center"><img mc:edit="noti-2-1" src="{{ $message->embed(asset('images/logo/'.$logo->image)) }}" alt="logo" style="display:block; line-height:0px; font-size:0px; border:0px;" editable="" label="logo" width="50"></td>
                                @endforeach
                            </tr>
                            <!-- end logo -->
                            <tr>
                                <td height="15"></td>
                            </tr>
                            <!-- slogan -->
                            <tr>
                                <td mc:edit="noti-2-2" data-link-style="text-decoration:none; color:#3cb2d0;" data-link-color="Slogan Link" data-color="Slogan" data-size="Slogan" style="font-family: 'Open Sans', Arial, sans-serif; font-size:12px; color:#3b3b3b; text-transform:uppercase; letter-spacing:2px; font-weight: normal;" align="center">
                                    <singleline label="title">Powered by <a href="{{ route('index') }}" style="color: #377FB0">BarisalGeek</a></singleline>
                                </td>
                            </tr>
                            <!-- end slogan -->
                            <tr>
                                <td height="40"></td>
                            </tr>
                            </tbody></table>
                    </td>
                </tr>
                <tr>
                    <td data-bgcolor="Content BG" bgcolor="#f3f3f3" align="center">
                        <table width="90%" cellspacing="0" cellpadding="0" border="0" align="center">
                            <tbody><tr>
                                <td height="50"></td>
                            </tr>
                            <!-- title -->
                            <tr>
                                <td mc:edit="noti-2-3" data-link-style="text-decoration:none; color:#3cb2d0;" data-link-color="Content Link" data-color="Headline" data-size="Headline" style="font-family: 'Open Sans', Arial, sans-serif; font-size:30px; color:#3b3b3b; font-weight: bold; letter-spacing:4px;" align="center">
                                    <singleline label="title">Making You <span style="color: #377FB0">Admin</span></singleline>
                                </td>
                            </tr>
                            <!-- end title -->
                            <tr>
                                <td height="15"></td>
                            </tr>
                            <tr>
                                <td align="center">
                                    <table data-width="Dash" width="25" cellspacing="0" cellpadding="0" border="0">
                                        <tbody><tr>
                                            <td data-bgcolor="Dash" height="2" bgcolor="#3cb2d0"></td>
                                        </tr>
                                        </tbody></table>
                                </td>
                            </tr>
                            <tr>
                                <td height="20"></td>
                            </tr>
                            <!-- content -->
                            <tr>
                                <td mc:edit="noti-2-4" data-link-style="text-decoration:none; color:#3cb2d0;" data-link-color="Content Link" data-color="Main Text" data-size="Main Text" style="font-family: 'Open Sans', Arial, sans-serif; font-size:14px; color:#7f8c8d; line-height:29px;" align="center">
                                    <multiline label="content">If you agree Please confirm your email by clicking the link below...</multiline>
                                </td>
                            </tr>
                            <!-- end content -->
                            <tr>
                                <td height="50"></td>
                            </tr>
                            </tbody></table>
                    </td>
                </tr>
                <tr>
                    <td data-bgcolor="Panel" style="border-bottom-left-radius: 4px;border-bottom-right-radius: 4px;" bgcolor="#FFFFFF" align="center">
                        <table width="90%" cellspacing="0" cellpadding="0" border="0" align="center">
                            <tbody><tr>
                                <td height="40"></td>
                            </tr>
                            <!-- button -->
                            <tr>
                                <td align="center">
                                    <table class="textbutton" cellspacing="0" cellpadding="0" border="0" align="center">
                                        <tbody><tr>
                                            <td mc:edit="noti-2-5" data-bgcolor="Button Color" data-size="Button" style="font-family: 'Open Sans', Arial, sans-serif; font-size:16px; color:#FFFFFF;font-weight: bold;padding-left: 25px;padding-right: 25px;border-radius:4px;" height="55" bgcolor="#3cb2d0" align="center">
                                                <singleline label="button"><a href="{{ route('admin.registration.verify',$token) }}" style="color: #fff">Confirm Registration</a></singleline>
                                            </td>
                                        </tr>
                                        </tbody></table>
                                </td>
                            </tr>
                            <!-- end button -->
                            <tr>
                                <td height="25"></td>
                            </tr>
                            <!-- preference -->

                            <!-- end preference -->
                            <tr>
                                <td height="30"></td>
                            </tr>
                            </tbody></table>
                    </td>
                </tr>
                <tr>
                    <td height="25"></td>
                </tr>
                <!-- copyright -->
                <tr>
                    <td mc:edit="noti-2-7" data-color="copyright" data-size="copyright" style="font-family: 'Open Sans', Arial, sans-serif; font-size:13px; color:#ffffff;" align="center">
                        <p>Copyright &copy; <script>document.write(new Date().getFullYear());</script> All rights reserved</p>
                    </td>
                </tr>
                <!-- end copyright -->
                <tr>
                    <td height="25"></td>
                </tr>
                <!-- social -->

                <!-- end social -->
                <tr>
                    <td height="45"></td>
                </tr>
                </tbody><div class="ui-resizable-handle ui-resizable-s selected-element" style="z-index: 90;" contenteditable="true"></div></table>
        </td>
    </tr>
    </tbody></table>
</body>
</html>