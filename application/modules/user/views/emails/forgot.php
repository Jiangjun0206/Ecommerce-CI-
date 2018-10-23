<div>
    <div style="padding:0;background-color:#ffffff;margin:0!important">

        <table style="border-spacing:0;font-family:sans-serif;color:#333333" align="center">

            <tbody>

            <tr>

                <td style="padding:0">


                    <div style="border:14px solid #ebeef0">

                        <center style="width:100%;table-layout:fixed">

                            <div style="max-width:690px;margin:0 auto">

                                <table style="border-spacing:0;font-family:sans-serif;color:#333333;margin:0 auto;width:100%;max-width:690px" align="center" width="100%">

                                    <tbody>

                                    <tr>

                                        <td style="padding:0;text-align:center;padding-top:20px" align="center"><span style="float:none;display:block;text-align:center"><img alt="<?php echo $this->settings->get('website_name') ?>" src="<?php echo $this->settings->get('logo') ?>" style="border:0;width:60px" width="60"></span></td>

                                    </tr>

                                    <tr>

                                        <td style="padding:0">

                                            <table style="border-spacing:0;font-family:sans-serif;color:#333333" align="center" width="80%">

                                                <tbody>

                                                <tr>

                                                    <td style="padding:10px;width:100%;text-align:center" align="center" width="100%">

                                                        <h3 style="font-family:'Trebuchet MS','Lucida Grande','Lucida Sans Unicode','Lucida Sans',Tahoma,sans-serif;font-weight:400;line-height:1.4em;margin-bottom:10px;font-size:20px;opacity:0.9;color:#111111!important">Hello <?php echo $user?>,</h3>



                                                        <p style="margin:0;font-family:'Trebuchet MS','Lucida Grande','Lucida Sans Unicode','Lucida Sans',Tahoma,sans-serif;font-weight:normal;margin-bottom:10px;line-height:1.8em;font-size:16px">We received your
                                                            request to reset your <?php echo $this->settings->get('website_name') ?> account password. To reset your password,
                                                            click the link below within 24 hours.</p>

                                                    </td>

                                                </tr>

                                                </tbody>

                                            </table>

                                        </td>

                                    </tr>

                                    <tr>

                                        <td style="padding:0 0 1%">

                                            <table style="border-spacing:0;font-family:sans-serif;color:#333333;width:100%" width="100%">

                                                <tbody>

                                                <tr>

                                                    <td style="padding:0">

                                                        <table style="border-spacing:0;font-family:sans-serif;color:#333333;width:auto" align="center">

                                                            <tbody>

                                                            <tr>

                                                                <td style="padding:0;background-color:#55d876;border-radius:5px;text-align:center" bgcolor="#55d876" align="center" >

<a href="<?php echo site_url('user/forgot_reset/'.$code)?>" style="display:inline-block;color:#ffffff;background-color:#55d876;border:solid 1px #0091ea;border-radius:5px;text-decoration:none; font-size:14px;font-weight:bold ;margin:0;padding:12px 25px;text-transform:capitalize;border-color:#55d876" target="_blank" >Reset Password</a>
                                                                </td>

                                                            </tr>

                                                            </tbody>

                                                        </table>

                                                    </td>

                                                </tr>

                                                </tbody>

                                            </table>

                                        </td>

                                    </tr>

                                    <tr>

                                        <td style="padding:0;background-color:#ffffff" bgcolor="#ffffff">

                                            <div style="margin-top:20px;margin-bottom:20px;margin-left:20%;margin-right:20%;height:2px;background:#ebeef0">
                                                </div>

                                        </td>

                                    </tr>

                                    <tr>

                                        <td style="background-color:#ffffff;padding:10px 15px" bgcolor="#ffffff">

                                            <p style="margin:0;font-family:'Trebuchet MS','Lucida Grande','Lucida Sans Unicode','Lucida Sans',Tahoma,sans-serif;font-size:14px;font-weight:normal;margin-bottom:15px;opacity:0.9"><i>Unsolicited
                                                    Request? </i></p>



                                            <p style="margin:0;font-family:'Trebuchet MS','Lucida Grande','Lucida Sans Unicode','Lucida Sans',Tahoma,sans-serif;font-weight:normal;margin-bottom:15px;opacity:0.9;font-size:13px">If you didn't make
                                                this
                                                change or if you believe an unauthorized person has accessed your account,
                                                go to <?php echo site_url('user'); ?> to reset your password,
                                                review and update your security settings immediately.

                                                If you need additional help, contact Support on <?php echo mailto($this->settings->get('admin_email'));  ?>.
                                                <?php echo $this->settings->get('website_name') ?> Support</p>

                                        </td>

                                    </tr>

                                    </tbody>

                                </table>

                            </div>

                        </center>

                    </div>

    </div>

    </td>

    </tr>

    </tbody>

    </table>



</div></div>
</div>