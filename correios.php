<?php 
set_time_limit(0);

$inputCep = (!empty($_GET['cep']))?$_GET['cep']:$_POST['cep'];


$config = array(
	"trace" => 1, 
	"exception" => 0, 
	"cache_wsdl" => WSDL_CACHE_MEMORY
);

$address = 'https://apps.correios.com.br/SigepMasterJPA/AtendeClienteService/AtendeCliente?wsdl';   

$client = new SoapClient($address, $config);

$baseCep = explode(',', $inputCep);
$resultCep = [];
echo '<pre>';
foreach ($baseCep as $consultcep) {

	try {
		$cep  = $client->consultaCEP(['cep' =>$consultcep]);
		
		array_push($resultCep,['cep' => $consultcep, 'result' => $cep]);
	} catch (Exception $e) {
		
		array_push($resultCep,['cep' => $consultcep, 'result' => ['error' => $e->getMessage()]]);
		
	}
	
	
}

echo json_encode($resultCep);
?>