<?php
	function upload2($tmp, $nome, $largura, $pasta){
		$img 		= imagecreatefromjpeg($tmp); // Cria uma imagem JPG
		$x 			= imagesx($img); // Pega o eixo X da imagem
		$y 			= imagesy($img); // Pega o eixo Y da imagem

		$altura 	= ($largura * $y) / $x; // Regra de 3 pra redimensionar a imagem

		$nova 		= imagecreatetruecolor($largura, $altura); // padrão
		imagecopyresampled($nova, $img, 0,0,0,0, $largura, $altura, $x, $y); // Praticamente cria a nova imagem
		imagedestroy($img); // Destroy a imagem (Não mexer)

		$marca 				= imagecreatefrompng('logo/logo.png'); // 'Cria a logo' (Passe o caminho da sua logo já redimensionada)
		$marcax 			= imagesx($marca); // Pega o eixo X da logo
		$marcay 			= imagesy($marca); // Pega o eixo Y da logo
		$localx 			= $largura-$marcax-20; // Local aonde vai ficar a logo (canto inferior direito com margim de 20px '+ou-')
		$localy 			= $altura-$marcay-20; // Local aonde vai ficar a logo (canto inferior direito com margim de 20px '+ou-')
		imagecopyresampled($nova, $marca, $localx,$localy,0,0, $marcax, $marcay, $marcax, $marcay); // Praticamente cria a nova imagem com a marca d'agua

		imagejpeg($nova, "$pasta/$nome"); // Move a imagem

		imagedestroy($nova);// Destroy a imagem (Não mexer)
		

		return($nome); // Retorna o nome
	}

 ?>