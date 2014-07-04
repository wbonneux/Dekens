<?php 
	require_once('_/components/php/include_dao.php');
	require_once('_/components/core/Encryption.class.php');
	//print all rows from table CODE_LANGUAGE
	
		/*$language = DAOFactory::getLanguageDAO()->load(1);
		if(is_null($language)){
			echo "no language<br/>";
		}
		else{
			echo $language->id.'<br/>';
		echo $language->descrNed.'<br/>';
		echo $language->descrEn.'<br/>';	
		echo $language->descrFr.'<br/>';	
		}*/
		
	/*$language = DAOFactory::getLanguageDAO()->load(1);

	$language->descrNed = 'updating tweede record';
	DAOFactory::getLanguageDAO()->update($language);

	$lang = new language();
	$lang->descrNed = 'tweede record';
	$lang->descrFr = 'deuxieme record';
	$lang->descrEn = 'second record';

	try {
		DAOFactory::getLanguageDAO()->insert($lang);
		echo '<br/>';
		$language = DAOFactory::getLanguageDAO()->load(2);
		echo $language->id.'<br/>';
		echo $language->descrNed.'<br/>';
		echo $language->descrFr.'<br/>';
		echo $language->descrEn.'<br/>';
	} catch (Exception $e) {
		die("Insert failed");	
	}

	$password = hash("sha512","amandina");
	echo $password.'<br/>';

	echo '<h1>Encryption</h1>';
	echo 'Encrypted:' . "\n";
	$str = "My secret String";

	$converter = new Encryption;
	$encoded = $converter->encode($str );
	$decoded = $converter->decode($encoded);    

	echo "$encoded<p>$decoded<br/><br/>";*/

	$languageArray = DAOFactory::getLanguageDAO()->queryAll();

	
	for($i=0;$i<count($languageArray);$i++){
		$row = $languageArray[$i];
		echo $row->id.' '.$row->descrNed.'<br/>';
	}
	
	
 ?>

 