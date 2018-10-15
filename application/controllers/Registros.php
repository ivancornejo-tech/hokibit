<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Registros extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model("RegistrosModel");
	}

	/*public function index()
	{
		$Licencia = $this->RegistrosModel->getREgistros();
	}*/

	public function SaveRegister()
	{
		if ($this->input->post()) 
		{
			$data = array(
                    'Nombre' => $_POST['Nombre'],
                    'Email' => $_POST['Email'],
                    'Telefono' => $_POST['Telefono'],
                    'Empresa' => $_POST['Empresa'],
                    'Cargo' => $_POST['Cargo'],
                    'Normas' => $_POST['Normas'],
                    'Publicidad' => $_POST['Publicidad']
                );
			$RegistroId =$this->RegistrosModel->SaveRegister($data); 
			if (!is_null($RegistroId)) {
				$dataKey = array(
                    'Tipo' => $_POST['Tipo'],
					'Version' => $_POST['Version'],
					'Duracion' => '365',//$_POST['Duracion'],
					'Status' => '1',
					'idRegistro' => $RegistroId
                );
				$SerialKey =$this->RegistrosModel->SaveUUID($dataKey);
				if (!is_null($SerialKey)) {
					// print_r($SerialKey);
						$Nombre = $_POST['Nombre'];
                    	$Email = $_POST['Email'];
					if ($this->_sentEmail($Nombre, $Email, $SerialKey)) {
						header('Location: '.base_url().'welcome');
					}
				}
			}
		}
	}

	public function Prueba_Gratis()
	{
		if ($this->input->post()) 
		{
			$data = array(
                    'Nombre' => $_POST['Nombre'],
                    'Email' => $_POST['Email'],
                    'Telefono' => $_POST['Telefono'],
                    'Empresa' => $_POST['Empresa'],
                    'Cargo' => $_POST['Cargo'],
                    'Normas' => $_POST['Normas'],
                    'Publicidad' => $_POST['Publicidad']
                );
			$RegistroId =$this->RegistrosModel->SaveRegister($data); 
			if (!is_null($RegistroId)) {
				$dataKey = array(
                    'Tipo' => '1',
					'Version' => 'SM1.5',
					'Duracion' => '30',//$_POST['Duracion'],
					'Status' => '1',
					'idRegistro' => $RegistroId
                );
				$SerialKey =$this->RegistrosModel->SaveUUID($dataKey);
				if (!is_null($SerialKey)) {
					// print_r($SerialKey);
						$Nombre = $_POST['Nombre'];
                    	$Email = $_POST['Email'];
					if ($this->_sentEmail($Nombre, $Email, $SerialKey)) {
						/*header('Location: '.base_url().'welcome');*/
						print_r('ok');
					}
				}
			}
		}
	}

	private function _sentEmail($Nombre, $Email, $SerialKey){

		$config = Array(
			'protocol' => 'smtp',
	        'smtp_host' => 'smtp-mail.outlook.com',
	        'smtp_port' =>  587,
	        'smtp_crypto' => 'tls',
	        'smtp_user' => 'cornejo.quintana@hotmail.com',
	        'smtp_pass' => 'anapao210996',
	        'mailtype'  => 'html', 
	        'charset' => 'utf-8',
	        'newline' => "\r\n"
    	);

		$this->load->library('email', $config);

		$this->email->from('cornejo.quintana@hotmail.com', 'Ivan Cornejo');
		$this->email->to($Email);
		/*$this->email->cc('');
		$this->email->bcc('');*/
		
		$this->email->subject('Licencia de SmartBusinesPOS');

		$this->email->message($this->htmlMessage($Nombre, $SerialKey));

		if (!$this->email->send()){
		    /*echo "Email is not sent!! <br/>";
		    echo $this->email->print_debugger();*/
		    return false;
		}else{
			return true;
		}
	}

	private function htmlMessage($Nombre, $SerialKey){
		$mensaje  =  '<!DOCTYPE html>
						<html>
						<head>
							<meta charset="utf-8">
							<title></title>
						</head>
						<body>
							<table style="max-width: 600px; padding: 10px; margin:0 auto; border-collapse: collapse;">

							<tr>
								<td style="padding: 0">
									<img style="padding: 0; display: block" src="https://blog.vivanuncios.com.mx/wp-content/uploads/2018/04/reinventando-los-negocios-inmobiliarios-3-areas-de-oportunidad.jpg" width="100%">
								</td>
							</tr>
							
							<tr>
								<td style="background-color: #ecf0f1">
									<div style="color: #34495e; margin: 4% 10% 2%; text-align: justify;font-family: sans-serif">
										<h2 style="color: #e67e22; margin: 0 0 7px">Hola '.$Nombre.'</h2>
										<p style="margin: 2px; font-size: 15px">
											Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum odit accusamus fuga eaque odio. Molestias rem enim error adipisci sapiente facilis aliquam voluptates iure ullam ducimus commodi quaerat, eos, nesciunt?
										</p>
										<ul style="font-size: 15px;  margin: 10px 0">
											<li>Licencia: '.$SerialKey.'</li>
										</ul>
										<!-- <div style="width: 100%;margin:20px 0; display: inline-block;text-align: center">
											<img style="padding: 0; width: 200px; margin: 5px" src="">
											<img style="padding: 0; width: 200px; margin: 5px" src="">
										</div> -->
										<div style="width: 100%; text-align: center">
											<a style="text-decoration: none; border-radius: 5px; padding: 11px 23px; color: white; background-color: #3498db" href="http://smartbusinesspos.com">Ir a la página</a>	
										</div>
										<p style="color: #b3b3b3; font-size: 12px; text-align: center;margin: 30px 0 0">SmartBusinessPOS 2018</p>
									</div>
								</td>
							</tr>
						</table>
						</body>
						</html>';
		return $mensaje;
	}

}