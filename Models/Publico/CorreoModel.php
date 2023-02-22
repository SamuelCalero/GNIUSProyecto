<?php 

class Correo{
	private $db;

    public function __construct()
    {
        $this->db = conectar::conexion();
    }

	public function Correo($usuario,$codigo,$correo,$subject,$titulo,$msg1,$msg2){
        //$subject = 'Signup | Verification';
        $mensaje =
        '<!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width,initial-scale=1">
            <meta name="x-apple-disable-message-reformatting">
            <title></title>
            <style>
            table, td, div, h1, p {font-family: Arial, sans-serif;}
            footer#site-footer {margin: 0 auto;background: #431220;color: white;}
            footer#site-footer section.horizontal-footer-section {display: flex;flex-direction: row;flex-wrap: nowrap;align-items: center;}
            footer#site-footer section.horizontal-footer-section#footer-bottom-section {padding: 1.32rem 0;margin: 1rem 2rem 0rem 2rem;border-top: 0.05rem solid #7c1c36;}
            footer#site-footer #footer-social-buttons {justify-self: flex-end;margin-left: auto;}
            footer#site-footer #footer-social-buttons img {margin-left: 0.68rem;}
            footer#site-footer #footer-social-buttons img:hover {cursor: pointer;}
            @media screen and (max-width: 530px) {
              .unsub {display: block;padding: 8px;margin-top: 14px;border-radius: 10px;background-color: #555555;text-decoration: none !important;font-weight: bold;}
              .col-lge {max-width: 100% !important;}
            }
            @media screen and (min-width: 531px) {
              .col-sml {max-width: 27% !important;}
              .col-lge {max-width: 73% !important;}
            }
            </style>
        </head>
        <body style="margin:0;padding:0;word-spacing:normal;background-color:#F1F0F1;">
          <div role="article" aria-roledescription="email" lang="en" style="text-size-adjust:100%;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;">
            <table role="presentation" style="width:100%;border:none;border-spacing:0;">
              <tr>
                <td align="center" style="padding:0;">
                  <table role="presentation" style="width:94%;max-width:600px;border:none;border-spacing:0;text-align:left;font-family:Arial,sans-serif;font-size:16px;line-height:22px;color:#363636;">
                    <tr>
                      <td style="padding:40px 0px 0px 10px;text-align:center;font-size:24px;font-weight:bold;">
                        <div style="text-align: left;">
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td style="padding:20px 0px 0px 10px;text-align:center;font-size:24px;font-weight:bold;background-color:#ffffff;">
                        <div style="text-align: left;">
                            <img src="https://i.ibb.co/g6K6ZdN/gnius.png" width="140" alt="Logo" style="width:140px;max-width:80%;height:auto;border:none;text-decoration:none;color:#ffffff;">
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td style="padding:20px;background-color:#ffffff;">
                        <h1 style="margin-top:0;margin-bottom:5px;font-size:26px;line-height:32px;font-weight:bold;letter-spacing:-0.02em;">'.$titulo.' </h1>
                        <h3 style="margin:0;margin-bottom:16px">'.$usuario.'</h3>
                        <p style="margin:0;">'.$msg1.'</p>
                        <div style="text-align:center;">
                        <p style="font-size:20px; color:#6F6F6F;">'.$codigo.'</p>
                        </div>
                        <p>'.$msg2.'</p>
                      </td>
                    </tr>
                    <tr>
                        <td style="background-color:#431220;color:#cccccc;">
                            <footer id="site-footer">
                              <section class="horizontal-footer-section" id="footer-bottom-section">
                                  <div id="footer-copyright-info">
                                   <img src="https://i.ibb.co/pv7zrmH/gnius-logo.png" width="100" alt="Logo" style="width:120px;max-width:100%;height:auto;">  
                                  </div>
                                  <div id="footer-social-buttons">
                                      <a href=""><img src="https://i.ibb.co/yPShqSk/youtube-1.png" width="24px" alt="youtube" border="0"></a>
                                      <a href=""><img src="https://i.ibb.co/Hzf4TFf/instagram-1.png" width="24px" alt="instagram" border="0"></a>
                                      <a href=""><img src="https://i.ibb.co/R7zCKy7/facebook-1.png" width="24px" alt="facebook" border="0"></a>
                                  </div>
                              </section>
                          </footer>
                        </td>
                    </tr>
                    <tr>
                      <td style="padding:15px 0px 0px 0px;text-align:center;font-size:15px;color:#6F6F6F;">
                        <div style="padding-bottom: 5px;">
                          <img src="https://i.ibb.co/gvYKWCF/telefono.png" width="15px" alt="Telefono" border="0">&nbsp;2275-8802
                          &nbsp;&nbsp;&nbsp;
                          <img src="https://i.ibb.co/MBHpJ13/correo-electronico.png" width="15px" alt="Correo" border="0">&nbsp;gnius@utec.edu.sv
                        </div>
                        <div style="padding-bottom: 10px;">
                          <img src="https://i.ibb.co/kgCqXZB/ubicacion.png" width="15px" alt="Ubicacion" border="0">&nbsp;Universidad Tecnológica de El Salvador, 1a Calle Pte, San Salvador
                        </div>
                        <div style="padding-bottom: 0px;font-size:10px;">
                          GNIUS, 2022
                        </div>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>
          </div>
        </body>
        </html>
        ';
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        $resultado = mail($correo, $subject, $mensaje, $headers);
								
		if($resultado){
            return "Exito";
        }else{
            return "Error en enviar el correo";
        }

    }
	
}





?>