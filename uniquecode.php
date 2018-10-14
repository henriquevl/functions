<?php
//FROM: http://blog.clares.com.br/criando-codigo-alfanumerico-unico-com-php/

function uniqueAlfa($length=16)
{
	$salt = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
	$len = strlen($salt);
	$pass = '';
	mt_srand(10000000*(double)microtime());
	for ($i = 0; $i < $length; $i++)
	{
		$pass .= $salt[mt_rand(0,$len - 1)];
	}
	return $pass;
}

//gerando alfa de 6 caracteres
echo uniqueAlfa(6);
//gerando alfa de 16 caracteres - padrao da function
echo uniqueAlfa();
?>
