<?php
		if(isset($_POST['uploaded'])){ // Verifica se existe o post do botão

			$img 		= $_FILES['img']; // Pega os arquivos do campo file que está em array e armazena na variável $img

			$numfile	= count(array_filter($img['name'])); // Conta o campo file ($img)
			
			

			if($numfile <= 0){ // Verifica se algum arquivo foi selecionado 

				echo "Selecione uma imagem. <a href=\"index2.html\">Voltar</a>";

			}else{
			
				for ($i=0; $i < $numfile; $i++) { // Meu 'i' é zero, enquanto ele for MENOR do que a contagem de arquivos ele incrementa

					$pasta 			= 'uploadandmarca/'; // Pasta que será salva as imagens 
					$permitido 		= array('image/jpg','image/jpeg','image/pjpeg'); // Tipos de imagens permitidas

					
					// Dados das imagens (aconselhavel não mexer)
					$tmp 			= $img['tmp_name'][$i]; 
					$name 			= $img['name'][$i];
					$type			= $img['type'][$i];

					require_once('funcao.php');

					if(!empty($name) && in_array($type, $permitido)) { // Verifica se o tipo da imagem é permitido
						$nome 		= 'image-'.md5(uniqid(rand(), true)).'.jpg'; // Novo nome da imagem
						upload2($tmp, $nome, 800, $pasta);// Chamando a função
						$numera 	= $i+1; // Numerei pra não ficar perdido kkkk
						echo $numera.") ".$name." concluida com sucesso !<br>"; // Mostrei os arquivos concluidos
					}else{
						echo 'Tipo não permitido'; // Erro se o tipo de imagem não for permitido
					}
				}
			echo "<a href=\"index.html\">Voltar</a>";
			}

			
		}
			

		

	 ?>	