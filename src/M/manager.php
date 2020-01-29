<?php
class manager
{
	private $_BDD;
	private $_ligne;
	private $_item;

	public function getBDD(){return $this->_BDD;}
	public function getLigne(){return $this->_ligne;} 
	public function getItem(){return $this->_item;} 

	public function setBDD($BDD){
		$this->_BDD = $BDD;
	}
	public function setLigne($ligne){
		$this->_ligne = $ligne;
  	}
  	public function setItem($item){
		$this->_item = $item;
	}

	public function connectBDD($nomBDD,$indentifiantBDD,$mdpBDD){
		try
		{
		$this->setBDD(new PDO('mysql:host=localhost;dbname=' . $nomBDD , $indentifiantBDD, $mdpBDD));
		}
		catch(Exception $e)
		{
		die('Erreur : '.$e->getMessage());
		}
	}

	public function insertItem($image,$nom,$lienhttp,$numLigne,$positionInLigne,$reverseProxy){
		if($this->getItem() != null){
			foreach($this->getItem() as $donneesItem){
				//test si le nom et deja attribué
				if($donneesItem['nom'] != $nom){
					$test = "true";
				}else{
					$test = "false";
					break;
				}
			}
		}else{ //si pas d'item 
			$test = "true";
		}

		if($this->getLigne() != null){
			foreach($this->getLigne() as $donneesLigne){
				//test si le numero de ligne et attribué
				if($donneesLigne['numeroligne'] === $numLigne){
					$test2 = "true";
					break;
				}else{
					$test2 = "false";
				}
			}
		}else{ //si pas de ligne
			$test2 = "false";
		}

		if(($test === "true")&&($test2 === "true")){
			if ($_FILES["file"]["size"] < 300000)
			{
				$newfilename =  $_POST['nom'] . ".png";
				if (move_uploaded_file($_FILES["file"]["tmp_name"],"css/img/cate/" . $newfilename));
				{
					resize_crop_image(200, 120, "css/img/cate/" . $newfilename, "css/img/cate/" . $newfilename);
					$cheminimage = 'css/img/cate/' . $nom .'.png';
					$this->getBDD()->exec("INSERT INTO portail_items (nom, lienhttp, cheminimage, numeroligne,positionInLigne,reverseProxy) VALUES('$nom', '$lienhttp', '$cheminimage','$numLigne','$positionInLigne','$reverseProxy')");
					if(!empty($reverseProxy)){
						$this->ajoutReverseProxy($lienhttp,$reverseProxy); 
					}
					header("Refresh:0");
				}
			}
			elseif ($_FILES["file"]["size"] > 300000)
			{
				echo "Le fichier fourni et trop volumineux";
			}
		}else{
			if($test != "true"){
				echo "Nom d'item déjà attribué";
			}
			if($test2 != "true"){
				echo "numero de ligne non attribué";
			}
			
		}
		
	}	
	public function updateItem($image,$id,$nom,$lienhttp,$numLigne,$ReverseProxy){
		if($this->getItem() != null){
			foreach($this->getItem() as $donneesItem){
				if($donneesItem['id'] === $id){
					if($donneesItem['nom'] === $nom){
						$test = "true";
						break;
					}else{
						foreach($this->getItem() as $donneesItem){
							if($donneesItem['nom'] != $nom){
								$test = "true";
							}else{
								$test = "false";
								break;
							}
						}
					}
				}
			}	
		}else{
			$test = "true";
		}
		if($this->getLigne() != null){
			foreach($this->getLigne() as $donneesLigne){
				if($donneesLigne['numeroligne'] === $numLigne){
					$test2 = "true";
					break;
				}else{
					$test2 = "false";
				}
			}
		}else{
			$test2 = "false";
		}

		if(($test === "true")&&($test2 === "true")){
			if(isset($image["file"]["name"])){
				if ($image["file"]["size"] < 300000){
					$newfilename =  $nom . ".png";
					foreach($this->getItem() as $donneesitems){
						if($donneesitems['id'] === $id){
							unlink($donneesitems['cheminimage']);
						}
					}
					if (move_uploaded_file($image["file"]["tmp_name"],"css/img/cate/" . $newfilename));
					{
						resize_crop_image(200, 120, "css/img/cate/" . $newfilename, "css/img/cate/" . $newfilename);
					}
				}
				elseif ($image["file"]["size"] > 300000)
				{
					echo "Le fichier fourni et trop volumineux";
				}
			}else{
				foreach($this->getItem() as $donneesitems){
					if($donneesitems['id'] === $id){
						rename($donneesitems['cheminimage'],"css/img/cate/" . $nom . ".png");
					break;
					}
				}
			}
			if(isset($ReverseProxy)){
				foreach($this->getItem() as $donneesitems){
					if($donneesitems['id'] === $id){
						if($donneesitems['reverseProxy'] != $ReverseProxy){
							$this->suppReverseProxy($id);
							$this->ajoutReverseProxy($lienhttp,$ReverseProxy);
							break;
						}
					}
				}
				$this->getBDD()->exec("UPDATE portail_items SET nom='$nom', lienhttp='$lienhttp', cheminimage='css/img/cate/$nom.png', numeroligne=$numLigne, reverseProxy='$ReverseProxy' WHERE id=$id");
				header("Refresh:0");
			}else{
				$this->getBDD()->exec("UPDATE portail_items SET nom='$nom', lienhttp='$lienhttp', cheminimage='css/img/cate/$nom.png', numeroligne=$numLigne, reverseProxy='' WHERE id=$id");
				header("Refresh:0");
			}
		}else{
			if($test != "true"){
				echo "nom d'item deja attribué";
			}
			if($test2 != "true"){
				echo "numero de ligne non attribué";
			}
		}
	}

	public function deleteItem($id){
		foreach($this->getItem() as $donneesitems){
			if($donneesitems['id'] === $id){
				unlink($donneesitems['cheminimage']);
				if($donneesitems['reverseProxy'] != ""){
					$this->suppReverseProxy($id);
				}
			}
		}
		$this->getBDD()->exec("DELETE FROM portail_items WHERE id = $id");
		header("Refresh:0");
	} 



	public function insertLigne($nomLigne,$numLigne){
		if($this->getLigne() != null){
			foreach($this->getLigne() as $donneesligne){
				if($donneesligne['nomligne'] != $nomLigne){
					if($donneesligne['numeroligne'] != $numLigne){
				    	$test="true";
				  	}else{
				    	$test="numero de ligne deja attribuer";
				    	break;
				  	}
				}else{
				 	$test="nom de ligne deja attribuer";
					break;
				}
			}
		}else{
			$test="true";
		}
		if($test==="true"){
		  	$this->getBDD()->exec("INSERT INTO portail_ligne (nomligne, numeroligne) VALUES('$nomLigne', $numLigne)");
		  	header("Refresh:0");
		}else{
		  	echo $test;
		}
	}
	public function updateLigne($id,$nomLigne,$numLigne){
		$this->getBDD()->exec("UPDATE portail_ligne SET nomligne='$nomLigne', numeroligne='$numLigne' WHERE id=$id");
		header("Refresh:0");
	}
	public function deleteLigne($id){
		$this->getBDD()->exec("DELETE FROM portail_ligne WHERE id = $id");
		header("Refresh:0");
	}
	public function updatePositionItemInLigne($id,$positionInLigne){
		$this->getBDD()->exec("UPDATE portail_items SET positionInLigne='$positionInLigne' WHERE id='$id'");
	}

	public function updateNumLigneItem($ancienNumLigne,$newNumLigne){
		$this->getBDD()->exec("UPDATE portail_items SET numeroligne='$newNumLigne' WHERE numeroligne='$ancienNumLigne'");
	}



	public function getLigneBDD(){
		$data = $this->getBDD()->query("SELECT * FROM portail_ligne ORDER BY numeroLigne");

		while ($donnees = $data->fetch()) {

		  	$ligne[] = ["id"=>utf8_encode($donnees['id']),"nomligne"=>utf8_encode($donnees['nomligne']),"numeroligne"=>utf8_encode($donnees['numeroligne'])];
		}
		if(!empty($ligne)){
			$this->setLigne($ligne);
		}
	}
	public function getItemBDD(){
		$data = $this->getBDD()->query("SELECT * FROM portail_items ORDER BY positionInLigne");
	    
		while ($donnees = $data->fetch()) {

			$item[] = ["id"=>utf8_encode($donnees['id']),"nom"=>utf8_encode($donnees['nom']),"lienhttp"=>utf8_encode($donnees['lienhttp']),"cheminimage"=>utf8_encode($donnees['cheminimage']),"numeroligne"=>utf8_encode($donnees['numeroligne']),"positionInLigne"=>utf8_encode($donnees['positionInLigne']),"reverseProxy"=>utf8_encode($donnees['reverseProxy'])];
		}
		if(!empty($item)){
		  	$this->setItem($item);
		}
	}

	public function connexionAdmin($login,$mdp){  
		$data = $this->getBDD()->query("SELECT * FROM identifiants");
		while ($donnees = $data->fetch()) {
		    if(($donnees['login']==$login) && ($donnees['mdp'] === $mdp)){
				$_SESSION["id"]     = $donnees['id'];
				$_SESSION["login"]  = $donnees['login'];
				return true;
		    }
		}
	return false;    
	}

	public function ajoutReverseProxy($lienhttp,$ReverseProxy){
		$monfichier = fopen('/etc/apache2/sites-available/default-ssl.conf', 'r+' );
		while(($ligne = fgets($monfichier)) != false){
			$ligneCache = $ligneCache.$ligne;
			if(trim($ligne) === "#ReverseProxy portail"){ 
				$ligneCache = $ligneCache."		#".$ReverseProxy."\n"."		ProxyPass	".$ReverseProxy."	".$lienhttp."\n"."		ProxyPassReverse	".$ReverseProxy."	".$lienhttp."\n\n";
	  		}
		}
		fseek($monfichier,0);
	    fwrite($monfichier, $ligneCache);
	    fclose($monfichier);

	}

	public function suppReverseProxy($id){
		foreach($this->getItem() as $donneesItem){
			if($donneesItem['id'] === $id){
				$reverseProxy = $donneesItem['reverseProxy'];
			}
		}
		$monfichier = fopen('/etc/apache2/sites-available/default-ssl.conf', 'r+' );
		$test = 0;
		while(($ligne = fgets($monfichier)) != false){
			
			if((trim($ligne) === "#".$reverseProxy) || ($test===1) || ($test===2) ){ 		
				$test=$test+1;

	  		}else{
	  			$ligneCache = $ligneCache.$ligne;
	  		}
		}
		fseek($monfichier,0);
	    fwrite($monfichier, $ligneCache);
	    fwrite($monfichier, "\n                                                                  ");
	    fwrite($monfichier, "\n                                                                  ");
	    fwrite($monfichier, "\n                                                                  ");

	    fclose($monfichier);
	}
}
?>