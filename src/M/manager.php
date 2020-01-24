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



  public function insertItem($nom,$lienhttp,$numLigne,$positionInLigne){
    if(!empty($this->getItem())){
      foreach($this->getItem() as $donneesItem){
        if(($donneesItem['nom'] != $nom)&&(!empty($nom))){
          $test="true";
        }else{
          $test="numero Item deja attribuer";
          break;
        }
        if(!empty($lienhttp)){
          $test="true";
        }else{
          $test="veuillez fournir un lienhttp";
          break;
        }
      }
    }else{
      $test='true';
    }
    if(!empty($this->getLigne())){
      foreach($this->getLigne() as $donneesItem){
        if($donneesItem['numeroligne'] === $numLigne){
          $test2="true";
          break;
        }else{
          $test2="aucune ligne correspondant à ce numéro de ligne";
        }
      }
    }else{
      $test='true';
    }
    if(($test==="true")&&($test2==="true")){
      $cheminimage = 'css/img/cate/' . $nom .'.png';
      $this->getBDD()->exec("INSERT INTO portail_items (nom, lienhttp, cheminimage, numeroligne,positionInLigne) VALUES('$nom', '$lienhttp', '$cheminimage','$numLigne','$positionInLigne')");  
      header("Refresh:0");
    }else{
      echo $test;
      echo $test2;
    }
  }	
  public function updateItem($id,$nom,$lienhttp,$numLigne){
    $this->getBDD()->exec("UPDATE portail_items SET nom='$nom', lienhttp='$lienhttp', cheminimage='css/img/cate/$nom.png', numeroligne=$numLigne WHERE id=$id");
    header("Refresh:0");
  }
  public function deleteItem($id){
    $this->getBDD()->exec("DELETE FROM portail_items WHERE id = $id");
    header("Refresh:0");
  } 



  public function insertLigne($nomLigne,$numLigne){
    if(!empty($this->getLigne())){
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
  public function updatePositionItemInLigne($nom,$numLigne){
    $this->getBDD()->exec("UPDATE portail_items SET positionInLigne='$numLigne' WHERE nom='$nom'");
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
    
      $item[] = ["id"=>utf8_encode($donnees['id']),"nom"=>utf8_encode($donnees['nom']),"lienhttp"=>utf8_encode($donnees['lienhttp']),"cheminimage"=>utf8_encode($donnees['cheminimage']),"numeroligne"=>utf8_encode($donnees['numeroligne']),"positionInLigne"=>utf8_encode($donnees['positionInLigne'])];
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
}
?>