<?php

class Emailtouser {

    public function transaksiberhasil($subject, $nama_user, $pesan)
    {
        return $message = '
    <!DOCTYPE html>
      <html>
      <head>
      <title>Verifikasi Akun Orenz Laundry</title>
      <!--
      
          An email present from your friends at Litmus (@litmusapp)
      
          Email is surprisingly hard. While this has been thoroughly tested, your mileage may vary.
          Its highly recommended that you test using a service like Litmus (http://litmus.com) and your own devices.
      
          Enjoy!
      
      -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <style type="text/css">
          /* CLIENT-SPECIFIC STYLES */
          body, table, td, a{-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%;} /* Prevent WebKit and Windows mobile changing default text sizes */
          table, td{mso-table-lspace: 0pt; mso-table-rspace: 0pt;} /* Remove spacing between tables in Outlook 2007 and up */
          img{-ms-interpolation-mode: bicubic;} /* Allow smoother rendering of resized image in Internet Explorer */
      
          /* RESET STYLES */
          img{border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none;}
          table{border-collapse: collapse !important;}
          body{height: 100% !important; margin: 0 !important; padding: 0 !important; width: 100% !important;}
      
          /* iOS BLUE LINKS */
          a[x-apple-data-detectors] {
              color: inherit !important;
              text-decoration: none !important;
              font-size: inherit !important;
              font-family: inherit !important;
              font-weight: inherit !important;
              line-height: inherit !important;
          }
      
          /* MOBILE STYLES */
          @media screen and (max-width: 525px) {
      
              /* ALLOWS FOR FLUID TABLES */
              .wrapper {
                width: 100% !important;
                  max-width: 100% !important;
              }
      
              /* ADJUSTS LAYOUT OF LOGO IMAGE */
              .logo img {
                margin: 0 auto !important;
              }
      
              /* USE THESE CLASSES TO HIDE CONTENT ON MOBILE */
              .mobile-hide {
                display: none !important;
              }
      
              .img-max {
                max-width: 100% !important;
                width: 100% !important;
                height: auto !important;
              }
      
              /* FULL-WIDTH TABLES */
              .responsive-table {
                width: 100% !important;
              }
      
              /* UTILITY CLASSES FOR ADJUSTING PADDING ON MOBILE */
              .padding {
                padding: 10px 5% 15px 5% !important;
              }
      
              .padding-meta {
                padding: 30px 5% 0px 5% !important;
                text-align: center;
              }
      
              .padding-copy {
                  padding: 10px 5% 10px 5% !important;
                text-align: left;
              }
      
              .no-padding {
                padding: 0 !important;
              }
      
              .section-padding {
                padding: 50px 15px 50px 15px !important;
              }
      
              /* ADJUST BUTTONS ON MOBILE */
              .mobile-button-container {
                  margin: 0 auto;
                  width: 100% !important;
              }
      
              .mobile-button {
                  padding: 15px !important;
                  border: 0 !important;
                  font-size: 16px !important;
                  display: block !important;
              }
      
          }
      
          /* ANDROID CENTER FIX */
          div[style*="margin: 16px 0;"] { margin: 0 !important; }
      </style>
      </head>
      <body style="margin: 0 !important; padding: 0 !important;">
      
      <!-- HIDDEN PREHEADER TEXT -->
      <div style="display: none; font-size: 1px; color: #fefefe; line-height: 1px; font-family: Helvetica, Arial, sans-serif; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;">
          Aktivasi Akun anda dengan cara mengunjungi link ini...
      </div>
      
      <!-- HEADER -->
      <table border="0" cellpadding="0" cellspacing="0" width="100%">
          <tr>
              <td bgcolor="#00BCE5" align="center" style="padding: 8px; font-size:9pt; color: #fff; font-family: Helvetica, Arial, sans-serif;">Workshop JTI</td>
          </tr>
          <tr>
              <td bgcolor="#ffffff" align="center">
                  <!--[if (gte mso 9)|(IE)]>
                  <table align="center" border="0" cellspacing="0" cellpadding="0" width="500">
                  <tr>
                  <td align="center" valign="top" width="500">
                  <![endif]-->
                  <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 500px;" class="wrapper">
                      <tr>
                          <td align="center" valign="top" style="padding: 40px 0 15px;" class="logo">
                              <a href="#" target="_blank">
                                  <img alt="Logo" src="https://lh3.googleusercontent.com/CuQFMn8rVjx8q8EOFaLg9B8gECzsGhvY_58KpN8au3-gjrRUhKzlXWovaFZkPC6IoPKY_kgq8JiAy7uhqdSkK4g6dm2E9OZnEbUrkTaOlZGIM4w-Jyrx1VOygycx1BPyArwhA4P6CfOs_5G7w4e3Os09a_Gam05bPsMie0vk_udzLOxaeGzRAuaCaHjkzORd4i7QAJFLhxa3aNN93G4P50l0DvkBx65VCOJrNexAGcMuj-qCkkPmQ7SIjDYkf_exYKXrC1yLVXvih3FvnJBEd2evyxiu-kAj3HMWXl23TJz8M29O9JASg96t9xIOvUY8RxY4MmS7ziQC6g7ymc3r1ySKSV9HSTKsuOmu2iNIBXvF1dIyYTgY0T2f0OzEFdi5hNjFiIcv1b8Km0EqfC2DvqHDu_JpcnbxzdZ1-nAPu28Ev1AoalD-9mitELsnt445Sv_qBC5Kgjw_OIqFNzd1A06dc_uIDSodiHtBwzOCo3nd8VhEqa9TdO3QZF4Xj3nbRzVQ72Di4-X8RtdH8w8tnEMPnbWwd4nq8m3_iGdhxDRcQQ_NdFSLyXj9arP9YDPCU0uOD_JJQM4NrF1546szDEo_M6U10YxC67egtyFMlRKEHHOsvB98y50pfpROC5aJSwx25YP2VM_TAeKFhX3cVU1Cq6B7NzwdvCbUKNtcBGWpD00VEj9bUg=w124-h28-no?authuser=0" width="135" height="60" style="display: block; font-family: Helvetica, Arial, sans-serif; color: #ffffff; font-size: 16px;" border="0">
                              </a>
                          </td>
                      </tr>
                  </table>
                  <!--[if (gte mso 9)|(IE)]>
                  </td>
                  </tr>
                  </table>
                  <![endif]-->
              </td>
          </tr>
          <tr>
              <td bgcolor="#ffffff" align="center" style="padding: 15px;">
                  <!--[if (gte mso 9)|(IE)]>
                  <table align="center" border="0" cellspacing="0" cellpadding="0" width="500">
                  <tr>
                  <td align="center" valign="top" width="500">
                  <![endif]-->
                  <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 500px;" class="responsive-table">
                      <tr>
                          <td>
                              <!-- COPY -->
                              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                  <tr>
                                      <td align="center" style="font-size: 32px; font-family: Helvetica, Arial, sans-serif; color: #333333; padding-top: 10px;" class="padding-copy">'.$subject.'</td>
                                  </tr>
                                  <tr>
                                      <td align="justify" style="padding: 20px 0 0 0; font-size: 16px; line-height: 25px; font-family: Helvetica, Arial, sans-serif; color: #666666;" class="padding-copy">Hai '.$nama_user.',<br>'.$pesan.' :</td>
                                  </tr>
                              </table>
                          </td>
                      </tr>
                  </table>
                  <!--[if (gte mso 9)|(IE)]>
                  </td>
                  </tr>
                  </table>
                  <![endif]-->
              </td>
          </tr>
          <tr>
              <td bgcolor="#ffffff" align="center" style="padding: 15px;">
                  <!--[if (gte mso 9)|(IE)]>
                  <table align="center" border="0" cellspacing="0" cellpadding="0" width="500">
                  <tr>
                  <td align="center" valign="top" width="500">
                  <![endif]-->
                  <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 500px;" class="responsive-table">
                      <tr>
                          <td>
                              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                  <tr>
                                      <td>
                                          <!-- COPY -->
                                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                              <tr>
                                                  <td align="left" style="padding: 0 0 0 0; font-size: 14px; line-height: 18px; font-family: Helvetica, Arial, sans-serif; color: #aaaaaa; font-style: italic;" class="padding-copy">Jika data yang tertera diatas tidak cocok dengan data yang anda daftarkan, Mohon hubungi kami melalui Telepon/WhatsApp.</td>
                                              </tr>
                                          </table>
                                      </td>
                                  </tr>
                              </table>
                          </td>
                      </tr>
                  </table>
                  <!--[if (gte mso 9)|(IE)]>
                  </td>
                  </tr>
                  </table>
                  <![endif]-->
              </td>
          </tr>
          <tr>
              <td bgcolor="#3688E1" align="center" style="padding: 20px 0px;">
                  <!--[if (gte mso 9)|(IE)]>
                  <table align="center" border="0" cellspacing="0" cellpadding="0" width="500">
                  <tr>
                  <td align="center" valign="top" width="500">
                  <![endif]-->
                  <!-- UNSUBSCRIBE COPY -->
                  <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" style="max-width: 500px;" class="responsive-table">
                      <tr>
                          <td align="center" style="font-size: 12px; line-height: 18px; font-family: Helvetica, Arial, sans-serif; color:#fff;">
                              Perumahan Mastrip Blok G-21, Sumbersai, Jember
                              <br>
                              +62 81 556 885 614 (Hp) &nbsp;&nbsp; 
                              <br>
                              <span style="color: #fff; text-decoration: none;">Workshop JTI</span>
                              <span style="font-family: Arial, sans-serif; font-size: 12px; color:#fff;">&nbsp;&nbsp;|&nbsp;&nbsp;</span>
                              <span href="http://litmus.com" target="_blank" style="color: #fff; text-decoration: none;">&copy; 2020</span>
                          </td>
                      </tr>
                  </table>
                  <!--[if (gte mso 9)|(IE)]>
                  </td>
                  </tr>
                  </table>
                  <![endif]-->
              </td>
          </tr>
      </table>
      
      </body>
      </html>
    ';
    }

  public function verifikasiakun($subject, $nama_user, $pesan, $link, $email)
  {
    return $message = '
        <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

        <html xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:v="urn:schemas-microsoft-com:vml">
            <head>
            <!--[if gte mso 9]><xml><o:OfficeDocumentSettings><o:AllowPNG/><o:PixelsPerInch>96</o:PixelsPerInch></o:OfficeDocumentSettings></xml><![endif]-->
            <meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>
            <meta content="width=device-width" name="viewport"/>
            <!--[if !mso]><!-->
            <meta content="IE=edge" http-equiv="X-UA-Compatible"/>
            <!--<![endif]-->
            <title></title>
            <!--[if !mso]><!-->
            <!--<![endif]-->
            <style type="text/css">
                    body {
                        margin: 0;
                        padding: 0;
                    }

                    table,
                    td,
                    tr {
                        vertical-align: top;
                        border-collapse: collapse;
                    }

                    * {
                        line-height: inherit;
                    }

                    a[x-apple-data-detectors=true] {
                        color: inherit !important;
                        text-decoration: none !important;
                    }
                </style>
            <style id="media-query" type="text/css">
                    @media (max-width: 660px) {

                        .block-grid,
                        .col {
                            min-width: 320px !important;
                            max-width: 100% !important;
                            display: block !important;
                        }

                        .block-grid {
                            width: 100% !important;
                        }

                        .col {
                            width: 100% !important;
                        }

                        .col_cont {
                            margin: 0 auto;
                        }

                        img.fullwidth,
                        img.fullwidthOnMobile {
                            max-width: 100% !important;
                        }

                        .no-stack .col {
                            min-width: 0 !important;
                            display: table-cell !important;
                        }

                        .no-stack.two-up .col {
                            width: 50% !important;
                        }

                        .no-stack .col.num2 {
                            width: 16.6% !important;
                        }

                        .no-stack .col.num3 {
                            width: 25% !important;
                        }

                        .no-stack .col.num4 {
                            width: 33% !important;
                        }

                        .no-stack .col.num5 {
                            width: 41.6% !important;
                        }

                        .no-stack .col.num6 {
                            width: 50% !important;
                        }

                        .no-stack .col.num7 {
                            width: 58.3% !important;
                        }

                        .no-stack .col.num8 {
                            width: 66.6% !important;
                        }

                        .no-stack .col.num9 {
                            width: 75% !important;
                        }

                        .no-stack .col.num10 {
                            width: 83.3% !important;
                        }

                        .video-block {
                            max-width: none !important;
                        }

                        .mobile_hide {
                            min-height: 0px;
                            max-height: 0px;
                            max-width: 0px;
                            display: none;
                            overflow: hidden;
                            font-size: 0px;
                        }

                        .desktop_hide {
                            display: block !important;
                            max-height: none !important;
                        }
                    }
                </style>
            </head>
            <body class="clean-body" style="margin: 0; padding: 0; -webkit-text-size-adjust: 100%; background-color: #f8f8f9;">
            <!--[if IE]><div class="ie-browser"><![endif]-->
            <table bgcolor="#f8f8f9" cellpadding="0" cellspacing="0" class="nl-container" role="presentation" style="table-layout: fixed; vertical-align: top; min-width: 320px; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #f8f8f9; width: 100%;" valign="top" width="100%">
            <tbody>
            <tr style="vertical-align: top;" valign="top">
            <td style="word-break: break-word; vertical-align: top;" valign="top">
            <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td align="center" style="background-color:#f8f8f9"><![endif]-->
            <div style="background-color:#1aa19c;">
            <div class="block-grid" style="min-width: 320px; max-width: 640px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; Margin: 0 auto; background-color: #1aa19c;">
            <div style="border-collapse: collapse;display: table;width: 100%;background-color:#1aa19c;">
            <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:#1aa19c;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:640px"><tr class="layout-full-width" style="background-color:#1aa19c"><![endif]-->
            <!--[if (mso)|(IE)]><td align="center" width="640" style="background-color:#1aa19c;width:640px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:0px; padding-bottom:0px;"><![endif]-->
            <div class="col num12" style="min-width: 320px; max-width: 640px; display: table-cell; vertical-align: top; width: 640px;">
            <div class="col_cont" style="width:100% !important;">
            <!--[if (!mso)&(!IE)]><!-->
            <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:0px; padding-bottom:0px; padding-right: 0px; padding-left: 0px;">
            <!--<![endif]-->
            <table border="0" cellpadding="0" cellspacing="0" class="divider" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top" width="100%">
            <tbody>
            <tr style="vertical-align: top;" valign="top">
            <td class="divider_inner" style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px;" valign="top">
            <table align="center" border="0" cellpadding="0" cellspacing="0" class="divider_content" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 4px solid #1AA19C; width: 100%;" valign="top" width="100%">
            <tbody>
            <tr style="vertical-align: top;" valign="top">
            <td style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top"><span></span></td>
            </tr>
            </tbody>
            </table>
            </td>
            </tr>
            </tbody>
            </table>
            <!--[if (!mso)&(!IE)]><!-->
            </div>
            <!--<![endif]-->
            </div>
            </div>
            <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
            <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
            </div>
            </div>
            </div>
            <div style="background-color:#fff;">
            <div class="block-grid" style="min-width: 320px; max-width: 640px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; Margin: 0 auto; background-color: #fff;">
            <div style="border-collapse: collapse;display: table;width: 100%;background-color:#fff;">
            <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:#fff;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:640px"><tr class="layout-full-width" style="background-color:#fff"><![endif]-->
            <!--[if (mso)|(IE)]><td align="center" width="640" style="background-color:#fff;width:640px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:0px; padding-bottom:0px;"><![endif]-->
            <div class="col num12" style="min-width: 320px; max-width: 640px; display: table-cell; vertical-align: top; width: 640px;">
            <div class="col_cont" style="width:100% !important;">
            <!--[if (!mso)&(!IE)]><!-->
            <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:0px; padding-bottom:0px; padding-right: 0px; padding-left: 0px;">
            <!--<![endif]-->
            <div align="center" class="img-container center autowidth" style="padding-right: 0px;padding-left: 0px;">
            <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr style="line-height:0px"><td style="padding-right: 0px;padding-left: 0px;" align="center"><![endif]-->
            <!-- <div style="font-size:1px;line-height:22px"> </div><img align="center" alt="Im an image" border="0" class="center autowidth" src="images/Companify-Logo.png" style="text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; width: 100%; max-width: 149px; display: block;" title="Im an image" width="149"/> -->
            <div style="font-size:1px;line-height:25px"> </div>
            <!--[if mso]></td></tr></table><![endif]-->
            </div>
            <!--[if (!mso)&(!IE)]><!-->
            </div>
            <!--<![endif]-->
            </div>
            </div>
            <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
            <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
            </div>
            </div>
            </div>
            <div style="background-color:transparent;">
            <div class="block-grid" style="min-width: 320px; max-width: 640px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; Margin: 0 auto; background-color: #f8f8f9;">
            <div style="border-collapse: collapse;display: table;width: 100%;background-color:#f8f8f9;">
            <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:transparent;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:640px"><tr class="layout-full-width" style="background-color:#f8f8f9"><![endif]-->
            <!--[if (mso)|(IE)]><td align="center" width="640" style="background-color:#f8f8f9;width:640px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->
            <div class="col num12" style="min-width: 320px; max-width: 640px; display: table-cell; vertical-align: top; width: 640px;">
            <div class="col_cont" style="width:100% !important;">
            <!--[if (!mso)&(!IE)]><!-->
            <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
            <!--<![endif]-->
            <table border="0" cellpadding="0" cellspacing="0" class="divider" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top" width="100%">
            <tbody>
            <tr style="vertical-align: top;" valign="top">
            <td class="divider_inner" style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 20px; padding-right: 20px; padding-bottom: 20px; padding-left: 20px;" valign="top">
            <table align="center" border="0" cellpadding="0" cellspacing="0" class="divider_content" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 0px solid #BBBBBB; width: 100%;" valign="top" width="100%">
            <tbody>
            <tr style="vertical-align: top;" valign="top">
            <td style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top"><span></span></td>
            </tr>
            </tbody>
            </table>
            </td>
            </tr>
            </tbody>
            </table>
            <!--[if (!mso)&(!IE)]><!-->
            </div>
            <!--<![endif]-->
            </div>
            </div>
            <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
            <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
            </div>
            </div>
            </div>
            <div style="background-color:transparent;">
            <div class="block-grid" style="min-width: 320px; max-width: 640px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; Margin: 0 auto; background-color: #fff;">
            <div style="border-collapse: collapse;display: table;width: 100%;background-color:#fff;">
            <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:transparent;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:640px"><tr class="layout-full-width" style="background-color:#fff"><![endif]-->
            <!--[if (mso)|(IE)]><td align="center" width="640" style="background-color:#fff;width:640px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:0px; padding-bottom:0px;"><![endif]-->
            <div class="col num12" style="min-width: 320px; max-width: 640px; display: table-cell; vertical-align: top; width: 640px;">
            <div class="col_cont" style="width:100% !important;">
            <!--[if (!mso)&(!IE)]><!-->
            <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:0px; padding-bottom:0px; padding-right: 0px; padding-left: 0px;">
            <!--<![endif]-->
            <table border="0" cellpadding="0" cellspacing="0" class="divider" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top" width="100%">
            <tbody>
            <tr style="vertical-align: top;" valign="top">
            <td class="divider_inner" style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 60px; padding-right: 0px; padding-bottom: 12px; padding-left: 0px;" valign="top">
            <table align="center" border="0" cellpadding="0" cellspacing="0" class="divider_content" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 0px solid #BBBBBB; width: 100%;" valign="top" width="100%">
            <tbody>
            <tr style="vertical-align: top;" valign="top">
            <td style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top"><span></span></td>
            </tr>
            </tbody>
            </table>
            </td>
            </tr>
            </tbody>
            </table>
            <div align="center" class="img-container center fixedwidth" style="padding-right: 40px;padding-left: 40px;">
            <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr style="line-height:0px"><td style="padding-right: 40px;padding-left: 40px;" align="center"><![endif]--><img align="center" alt="Im an image" border="0" class="center fixedwidth" src="https://lh3.googleusercontent.com/pw/ACtC-3f-95HCQv_igBS2NcFWVfeaPwu_OFQhoq3LXe0bv-6ohqVJVvBO1KAzaXVe6iv8Qtydh_hfqvjkB9DSGtg7_QY493UM-R_9jvhcieh0w1rZEAys-pd-3Ic66zZx4aLgVYD3x5f9N37k5caK_9hQ1QU=w630-h488-no?authuser=0" style="text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; width: 100%; max-width: 352px; display: block;" title="Im an image" width="352"/>
            <!--[if mso]></td></tr></table><![endif]-->
            </div>
            <table border="0" cellpadding="0" cellspacing="0" class="divider" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top" width="100%">
            <tbody>
            <tr style="vertical-align: top;" valign="top">
            <td class="divider_inner" style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 50px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px;" valign="top">
            <table align="center" border="0" cellpadding="0" cellspacing="0" class="divider_content" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 0px solid #BBBBBB; width: 100%;" valign="top" width="100%">
            <tbody>
            <tr style="vertical-align: top;" valign="top">
            <td style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top"><span></span></td>
            </tr>
            </tbody>
            </table>
            </td>
            </tr>
            </tbody>
            </table>
            <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 40px; padding-left: 40px; padding-top: 10px; padding-bottom: 10px; font-family: Tahoma, sans-serif"><![endif]-->
            <div style="color:#555555;font-family:Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;line-height:1.2;padding-top:10px;padding-right:40px;padding-bottom:10px;padding-left:40px;">
            <div style="line-height: 1.2; font-size: 12px; color: #555555; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif; mso-line-height-alt: 14px;">
            <p style="font-size: 30px; line-height: 1.2; text-align: center; word-break: break-word; mso-line-height-alt: 36px; margin: 0;"><span style="font-size: 30px; color: #2b303a;"><strong>'.$subject.'</strong></span></p>
            </div>
            </div>
            <!--[if mso]></td></tr></table><![endif]-->
            <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 40px; padding-left: 40px; padding-top: 10px; padding-bottom: 10px; font-family: Tahoma, sans-serif"><![endif]-->
            <div style="color:#555555;font-family:Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;line-height:1.5;padding-top:10px;padding-right:40px;padding-bottom:10px;padding-left:40px;">
            <div style="line-height: 1.5; font-size: 12px; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif; color: #555555; mso-line-height-alt: 18px;">
            <p style="font-size: 15px; line-height: 1.5; text-align: justify; word-break: break-word; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif; mso-line-height-alt: 23px; margin: 0;"><span style="color: #808389; font-size: 15px;">Halo '.$nama_user.'! '.$pesan.'</span></p>
            </div>
            </div>
            <!--[if mso]></td></tr></table><![endif]-->
            <div align="center" class="button-container" style="padding-top:15px;padding-right:10px;padding-bottom:0px;padding-left:10px;">
            <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="border-spacing: 0; border-collapse: collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;"><tr><td style="padding-top: 15px; padding-right: 10px; padding-bottom: 0px; padding-left: 10px" align="center"><v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="" style="height:46.5pt; width:189.75pt; v-text-anchor:middle;" arcsize="97%" stroke="false" fillcolor="#1aa19c"><w:anchorlock/><v:textbox inset="0,0,0,0"><center style="color:#ffffff; font-family:Tahoma, sans-serif; font-size:16px"><![endif]-->
            <a href="'.$link.'"><div style="text-decoration:none;display:inline-block;color:#ffffff;background-color:#1aa19c;border-radius:60px;-webkit-border-radius:60px;-moz-border-radius:60px;width:auto; width:auto;;border-top:1px solid #1aa19c;border-right:1px solid #1aa19c;border-bottom:1px solid #1aa19c;border-left:1px solid #1aa19c;padding-top:15px;padding-bottom:15px;font-family:Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;text-align:center;mso-border-alt:none;word-break:keep-all;"><span style="padding-left:30px;padding-right:30px;font-size:16px;display:inline-block;"><span style="font-size: 16px; margin: 0; line-height: 2; word-break: break-word; mso-line-height-alt: 32px;"><strong>Reset Password</strong></span></span></div></a>
            <!--[if mso]></center></v:textbox></v:roundrect></td></tr></table><![endif]-->
            </div>
            <table border="0" cellpadding="0" cellspacing="0" class="divider" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top" width="100%">
            <tbody>
            <tr style="vertical-align: top;" valign="top">
            <td class="divider_inner" style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 60px; padding-right: 0px; padding-bottom: 12px; padding-left: 0px;" valign="top">
            <table align="center" border="0" cellpadding="0" cellspacing="0" class="divider_content" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 0px solid #BBBBBB; width: 100%;" valign="top" width="100%">
            <tbody>
            <tr style="vertical-align: top;" valign="top">
            <td style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top"><span></span></td>
            </tr>
            </tbody>
            </table>
            </td>
            </tr>
            </tbody>
            </table>
            <!--[if (!mso)&(!IE)]><!-->
            </div>
            <!--<![endif]-->
            </div>
            </div>
            <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
            <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
            </div>
            </div>
            </div>
            <div style="background-color:transparent;">
            <div class="block-grid" style="min-width: 320px; max-width: 640px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; Margin: 0 auto; background-color: #f8f8f9;">
            <div style="border-collapse: collapse;display: table;width: 100%;background-color:#f8f8f9;">
            <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:transparent;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:640px"><tr class="layout-full-width" style="background-color:#f8f8f9"><![endif]-->
            <!--[if (mso)|(IE)]><td align="center" width="640" style="background-color:#f8f8f9;width:640px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->
            <div class="col num12" style="min-width: 320px; max-width: 640px; display: table-cell; vertical-align: top; width: 640px;">
            <div class="col_cont" style="width:100% !important;">
            <!--[if (!mso)&(!IE)]><!-->
            <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
            <!--<![endif]-->
            <table border="0" cellpadding="0" cellspacing="0" class="divider" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top" width="100%">
            <tbody>
            <tr style="vertical-align: top;" valign="top">
            <td class="divider_inner" style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 20px; padding-right: 20px; padding-bottom: 20px; padding-left: 20px;" valign="top">
            <table align="center" border="0" cellpadding="0" cellspacing="0" class="divider_content" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 0px solid #BBBBBB; width: 100%;" valign="top" width="100%">
            <tbody>
            <tr style="vertical-align: top;" valign="top">
            <td style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top"><span></span></td>
            </tr>
            </tbody>
            </table>
            </td>
            </tr>
            </tbody>
            </table>
            <!--[if (!mso)&(!IE)]><!-->
            </div>
            <!--<![endif]-->
            </div>
            </div>
            <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
            <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
            </div>
            </div>
            </div>
            <div style="background-color:transparent;">
            <div class="block-grid" style="min-width: 320px; max-width: 640px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; Margin: 0 auto; background-color: #2b303a;">
            <div style="border-collapse: collapse;display: table;width: 100%;background-color:#2b303a;">
            <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:transparent;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:640px"><tr class="layout-full-width" style="background-color:#2b303a"><![endif]-->
            <!--[if (mso)|(IE)]><td align="center" width="640" style="background-color:#2b303a;width:640px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:0px; padding-bottom:0px;"><![endif]-->
            <div class="col num12" style="min-width: 320px; max-width: 640px; display: table-cell; vertical-align: top; width: 640px;">
            <div class="col_cont" style="width:100% !important;">
            <!--[if (!mso)&(!IE)]><!-->
            <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:0px; padding-bottom:0px; padding-right: 0px; padding-left: 0px;">
            <!--<![endif]-->
            <table border="0" cellpadding="0" cellspacing="0" class="divider" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top" width="100%">
            <tbody>
            <tr style="vertical-align: top;" valign="top">
            <td class="divider_inner" style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px;" valign="top">
            <table align="center" border="0" cellpadding="0" cellspacing="0" class="divider_content" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 4px solid #1AA19C; width: 100%;" valign="top" width="100%">
            <tbody>
            <tr style="vertical-align: top;" valign="top">
            <td style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top"><span></span></td>
            </tr>
            </tbody>
            </table>
            </td>
            </tr>
            </tbody>
            </table>
            <div align="center" class="img-container center autowidth" style="padding-right: 0px;padding-left: 0px;">
            <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr style="line-height:0px"><td style="padding-right: 0px;padding-left: 0px;" align="center"><![endif]--><img align="center" alt="Im an image" border="0" class="center autowidth" src="https://lh3.googleusercontent.com/MKmxRLhAcGe-Zb58A6Qp6tCktqqq17jEd-oN8SfvuxIU-rktlUDfsnfIIad8G-cslPA54NlbnrrJrO7ZmLACzP8r2DkuSRMaw3xKv_XxILkMze4zDWiNTP8cDXCCJKwA2CVREGouQbPiyLQX7JbDNJd2YUzU42d72v5Ew80NS6rCxq3CQb2DhWmvr_jOIY3gownlRT-4RDVp2meMVar8jFRjRA4U-70wUDx5Ha77ZWkJ6YT8hK2LtU2PfAeu00ckSgsXz9ebLNN6ro1VFDRrKA0Dx6aiQ7PwxnlmZzKeCVFP6qk0nDDgQJrDZieyZbRN4ERiavZ-GIUN4X17q0hp1EWkrQIrhipPzK1qv9aff1vDFJ_NZMSlsJ8FC5UlBeoDgi9aFZUdiq2udXOgVmRn-Cg4ldsKAOq9BPMNq7eY6C6hq86tT15jo__AmDfLAtNHD3_VJS4cDuofneDhq5hDEgVybyY2r-uRJ3HG2jcmITG4IKCgBJfPt5coICHc3GJ8SQRNw3o6fjR8ahQ5hGsPUKdqABvXMAmMicnkMMj9gFi2Tc0rXE8G7HQBbP07YhAEXw-7sTy0AmSP-Ks7Rj68JfYwq16R-o1Ng8t1g039rsLdrTk-WGW9J557OacgRi2lo1912f1dDKvUKt3gnOIshRfgWX3PYcxF2IPAmNXed8VvpVdgKvSUZA=w640-h140-no?authuser=0" style="text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; width: 100%; max-width: 640px; display: block;" title="Im an image" width="640"/>
            <!--[if mso]></td></tr></table><![endif]-->
            </div>
            <div align="center" class="img-container center autowidth" style="padding-right: 0px;padding-left: 0px;">
            <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr style="line-height:0px"><td style="padding-right: 0px;padding-left: 0px;" align="center"><![endif]-->
            <!-- <div style="font-size:1px;line-height:40px"> </div><img align="center" alt="Alternate text" border="0" class="center autowidth" src="images/Logo-white.png" style="text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; width: 100%; max-width: 149px; display: block;" title="Alternate text" width="149"/> -->
            <!--[if mso]></td></tr></table><![endif]-->
            </div>
            <table cellpadding="0" cellspacing="0" class="social_icons" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt;" valign="top" width="100%">
            <tbody>
            <tr style="vertical-align: top;" valign="top">
            <td style="word-break: break-word; vertical-align: top; padding-top: 28px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px;" valign="top">
            <table align="center" cellpadding="0" cellspacing="0" class="social_table" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-tspace: 0; mso-table-rspace: 0; mso-table-bspace: 0; mso-table-lspace: 0;" valign="top">
            <tbody>
            <tr align="center" style="vertical-align: top; display: inline-block; text-align: center;" valign="top">

            <td style="word-break: break-word; vertical-align: top; padding-bottom: 0; padding-right: 10px; padding-left: 10px;" valign="top"><a href="https://www.facebook.com/" target="_blank"><img alt="Facebook" height="32" src="https://lh3.googleusercontent.com/YXASxB-CMugb2Pw28tDdjELMGpvM3BsWANJWlDu6tIeDwnH3EGfukrLIP3HfoMqxRm7aZDj5jZkya2uL3aLz4qa6pFi2m7jossPYql4zw0H8F7xftOOUMhgx6_0vCef9rQYl-YbbAcAysG34U8f800S-fb18DWnyhebX_d_0EhU7GO0L2MOHQtBP5A4kd4O-pJZfquQvMaPoiMLW78bZV_9hml2chL_9XgndJVg4H5aDI7t4QLrSm5XkrdcHu7omwZ6fAk8SP_zfgZGZznrvF2uNYsYRrIbxJ_qjFsuYBU26O00LvDWGKx1F6sqSE7hsF5OtZo1GxGYABdIy5jaOlOzNC5kdnQ4GqHT2z64WlMcGD-_O6v0rfbxOAL9NZGeIoT-sr2iHt5pmRukPNyHIw_YJ3zHb-AwLiJ4x2HvPpPSR8Eo386_v89f2pWhXsBQ7bavuncOzafmnWn0Ptx4JV-K6KkbiKu0edU0CMoXXwrUb2izsqYvUJjOveLJcgU3Y0kgYDl2M0hodrUxHGsCbZHCjjQlXrgdgrIocq_nPF1geCJ_LhhF-TIxDwXHPa1cssnVrG4FhYRxoKO4HwbC8DidC_hc1pUgR-bbHOFsPZkva5mdhkwwLSkXdzps0N8eeRSZX1z2s5FL_4bX3LYrpJCJ96yRfjtYNN9wcfcDTyClPuJKzTYW2IA=s64-no?authuser=0" style="text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; display: block;" title="Facebook" width="32"/></a></td>

            <!-- <td style="word-break: break-word; vertical-align: top; padding-bottom: 0; padding-right: 10px; padding-left: 10px;" valign="top"><a href="https://twitter.com/" target="_blank"><img alt="Twitter" height="32" src="images/twitter2x.png" style="text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; display: block;" title="Twitter" width="32"/></a></td> -->

            <td style="word-break: break-word; vertical-align: top; padding-bottom: 0; padding-right: 10px; padding-left: 10px;" valign="top"><a href="https://api.whatsapp.com/" target="_blank"><img alt="Whatsapps" height="32" src="https://lh3.googleusercontent.com/nlac4Z4_KWBmiCXsQ9Zep_zmAeLaZmJPNVas-Bjeg4wStXQjKwm0muPn-mdq8M-BASR23HXL0QXPwQayzYB1jvbj-QUbQq3w8w6SYKpmJvB8VzHZqt521BPV3kwjfFFEo9vDAnTZldfRX4Q1-KcADRpB3k0geOVx4Q7Xj7ZgHtwtXzEca4gvLoNHKRSWtE6_6KBUkPsdeWCpIRl7roZ6BKQuLXXLeWy4-eFr-YtJipiSRHnHTef3B2k_siXfh4xhLPx5jHulv97hz-eS-ghFrGbiVt6xMXv_yRCH_2SYvrmogtGSjqAQu3fVKwwQGltn4p9VRyavdXk6JYKkuZ1h9qiXed7NH7aOUSxviXRgirAsj5fqbqDmtaPfXsUvWNgLLJzJYIzN7oAdy4lctZe9H0UWO-oq7wXonhY4V8F8IdftDq0XbXMpVh5pczymw7LKUj1B-zAr9CMUyYUwA7A_hjZo-38MVE6knsMeeTvfEvAQlQ9pdBZlsaEhw1UUdSs8vFT1wZI95cU3PwY3TIm2tIEFEQxh71b8itK7uFxiiH2ggqs_mxLRrqcR71YBkZp0Yh23r8u4KCUkEVsq1VypFJRbp4zURwK38Y6yG5CSitixLxy7IoKjOKIVMLiuOSo8U4SdTOzw2ZAWt8QKPg1egpHULTg3WO97lRUSGpfDq9t6UwJ5PIsaDQ=s512-no?authuser=0" style="text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; display: block;" title="Whatsapp" width="32"/></a></td>

            <td style="word-break: break-word; vertical-align: top; padding-bottom: 0; padding-right: 10px; padding-left: 10px;" valign="top"><a href="https://instagram.com/" target="_blank"><img alt="Instagram" height="32" src="https://lh3.googleusercontent.com/KjOVJy2vU23qWol_OB3xgZ7EvArGl4rSMwltTelfJ3g0115VJoEpGSRLZFadPw4CEqA_T5Ou_Qn0sBkYaznTH5UsEXvcwpVhMepHbqd3vtr9nPvtJCh5K6sbRciqBaDs2lMm9pdfZ26pUYkQFK0vLRWNwQAF8OIORTA11vxU06Kg_5s3NbgWF7FupQuEYlfqgWzKQKQG-Knw52_ViSm9dc4Ewt8YzkiTtE1jIIEdWfEgs1p0XhYNL56nHgUp6QtoEeYZ5Tf9LpULbuRDG1t2DE41NSJjr73kR23J73EyjBlmpnCf_5hsWOLoR1whdYc2nI7sM0ZdOhwYzEWBf0-9a33WcEjhZZ1doExrzRSe0qUJ3wPf96Nr0Cxfi3nYRNInfNsMXIP2Ci2daXD7AS529by5b3ffeGKJYjzlujbfDPrDT8y_Be0hLq-oH_nT-LRshDO68bGEE6y38KyycYbN32eFN2tzvBge8w4fivrgZ_m3w4JOmkESS4RoR4ORZuzn2N-uoqf56XTf8RUAYfz91bZpaKpds5rI0GK94RrcAYHnh0UuZ5ikGl2zDKbFvkhAQSvrm9RGE8MU0O3lR1W6ulb8JaD5HTJ_P3KfNJ6s25yqn5EOV1ue4uenNxwUzEunPkO-zOl0yTmX_xtUZuUrHr_wCM3TRRwT79bE-ZbSWjWUzangSXD7iw=s64-no?authuser=0" style="text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; display: block;" title="Instagram" width="32"/></a></td>

            <!-- <td style="word-break: break-word; vertical-align: top; padding-bottom: 0; padding-right: 10px; padding-left: 10px;" valign="top"><a href="https://www.linkedin.com/" target="_blank"><img alt="LinkedIn" height="32" src="images/linkedin2x.png" style="text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; display: block;" title="LinkedIn" width="32"/></a></td> -->
            </tr>
            </tbody>
            </table>
            </td>
            </tr>
            </tbody>
            </table>
            <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 40px; padding-left: 40px; padding-top: 15px; padding-bottom: 10px; font-family: Tahoma, sans-serif"><![endif]-->
            <div style="color:#555555;font-family:Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;line-height:1.5;padding-top:15px;padding-right:40px;padding-bottom:10px;padding-left:40px;">
            <div style="line-height: 1.5; font-size: 12px; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif; color: #555555; mso-line-height-alt: 18px;">
            <p style="font-size: 12px; line-height: 1.5; word-break: break-word; text-align: justify; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif; mso-line-height-alt: 18px; margin: 0;"><span style="color: #95979c; font-size: 12px;">Email ini kami kirim ke '.$email.' (Anda) untuk membantu anda dalam proses lupa kata sandi, anda dapat menghapusnya ketika telah berhasil mengatur ulang kata sandi pada laman web GGJ Group Zakah. Kami ucapkan terimakash karna telah menggunakan sistem informasi kami.</span></p>
            </div>
            </div>
            <!--[if mso]></td></tr></table><![endif]-->
            <table border="0" cellpadding="0" cellspacing="0" class="divider" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top" width="100%">
            <tbody>
            <tr style="vertical-align: top;" valign="top">
            <td class="divider_inner" style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 25px; padding-right: 40px; padding-bottom: 10px; padding-left: 40px;" valign="top">
            <table align="center" border="0" cellpadding="0" cellspacing="0" class="divider_content" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 1px solid #555961; width: 100%;" valign="top" width="100%">
            <tbody>
            <tr style="vertical-align: top;" valign="top">
            <td style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top"><span></span></td>
            </tr>
            </tbody>
            </table>
            </td>
            </tr>
            </tbody>
            </table>
            <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 40px; padding-left: 40px; padding-top: 20px; padding-bottom: 30px; font-family: Tahoma, sans-serif"><![endif]-->
            <div style="color:#555555;font-family:Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;line-height:1.2;padding-top:20px;padding-right:40px;padding-bottom:30px;padding-left:40px;">
            <div style="line-height: 1.2; font-size: 12px; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif; color: #555555; mso-line-height-alt: 14px;">
            <p style="font-size: 12px; line-height: 1.2; word-break: break-word; text-align: left; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif; mso-line-height-alt: 14px; margin: 0;"><span style="color: #95979c; font-size: 12px;">GGJ Group Copyright © 2020</span></p>
            </div>
            </div>
            <!--[if mso]></td></tr></table><![endif]-->
            <!--[if (!mso)&(!IE)]><!-->
            </div>
            <!--<![endif]-->
            </div>
            </div>
            <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
            <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
            </div>
            </div>
            </div>
            <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
            </td>
            </tr>
            </tbody>
            </table>
            <!--[if (IE)]></div><![endif]-->
            </body>
        </html>
    ';
  }
}