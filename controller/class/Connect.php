<?php 

/*
|
| Desenvolvedor: Samuel Prado almeida
| email: samuelprado.a@gmail.com
| GitHub: https://github.com/siglanero
| repositório: https://github.com/siglanero/controller
|
*/

class Connect{

	public $conn;


//MÉTODO MÁGICO CONEXÃO COM O BANCO DE DADOS PARA CHAMA-LO BASTA USAR
//$var = new Connect("HOSTNAME","DBNAME","USER","PASS");
//CONSTRUCT ====================================================================		
	function __construct($host,$dbname,$user,$pass){
		try {
			$this->conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass, array(
				PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
				PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
			));
		} catch(PDOException $e) {
			echo 'ERROR: ' . $e->getMessage();
		}
		}//FIM DO CONSTRUCT		
//==============================================================================


//MÉTODO DATA===================================================================		
		public	function Data($select,$type){
			
			if($type == 'fetch'){
				$select = $this->conn->prepare($select);
				$select->execute();
				return $select->fetch();

			}else if($type == 'fetchAll'){
				$select = $this->conn->prepare($select);
				$select->execute();
				return $select->fetchAll();

			}else if($type == 'update'){
				$select = $this->conn->prepare($select);
				return $select->execute();
			}
		}
//==============================================================================


//MÉTODO SELECT=================================================================		
		public function select($table, $where){
			$select = "SELECT * FROM $table WHERE $where ";
			return Connect::Data($select,"fetchAll"); 
		}
//==============================================================================


//MÉTODO FETCHALL===============================================================		
		public function FetchAll($value){

			$select = "SELECT * FROM $value";
			return Connect::Data($select,"fetchAll");	 
		}
//==============================================================================


//MÉTODO MAGICFETCH=============================================================		
		public function magicFetch($value){

			$select = "SELECT * FROM $value order by str_to_date(date, '%d/%m/%Y') ASC";
			return Connect::Data($select,"fetchAll");	 
		}
//==============================================================================


//IDENTIICAÇÃO DE TABELAS ]=====================================================        
		public function Tables($table){	

			$search=Connect::MagicSelect($table);
			$count = count($search);

			for ($i=0; $i < $count ; $i++) { 

				if($search[$i]['Field'] !== "id"){
					$result[] = $search[$i]['Field'];
				}
			}

			return $result;
		}
//==============================================================================


//MÉTODO QUERY==================================================================		
		public function Query($table, $array, $type, $where){
		//$table = RECEBE O NOME DA TABELA
		//$array = RECEBE UM ARRAY COM OS DADOS A SEREM INSERIDOS
		//$type = TIPO DE EXECUÇÃO NO BANCO DE DADOS
		//$where = CONDIÇÃO CASO PRECISE DE UMA

			//$tableInfo = TRAZ AS INFORMAÇÕES DA COLUNA NO MÉTODO Tables()
			$tableInfo = Connect::Tables($table);
			$fieldA = "";
			$fieldB = "";
			$field  = "";
			//$count = VERIFICA A QUANTIDADE DE ITENS DENTRO DO ARRAY $tableInfo
			$count = count($tableInfo);

			//CASO SEJA insert
			if($type == "insert"){

				foreach ($tableInfo as $index => $value) {

					if($index+1 < $count){
						
						$fieldA .= $value . ", "; 
						
						$fieldB .= ":".strtoupper($value).", ";

						$fieldAarray[] = $value;
						$fieldBarray[] = ":".strtoupper($value);

					}else{
						$fieldA .= $value;
						$fieldB .= ":".strtoupper($value);

						$fieldAarray[] = $value;
						$fieldBarray[] = ":".strtoupper($value);
					}
				}

				$stmt = $this->conn->prepare("INSERT INTO $table ($fieldA) VALUES ($fieldB) $where");

				for ($i=0; $i < count($fieldAarray) ; $i++) { 

					$stmt->bindParam($fieldBarray[$i], $array[$fieldAarray[$i]]);				

				}

				$stmt->execute();

			//CASO SEJA update	
			}else if($type == "update"){

				foreach ($tableInfo as $index => $value) {

					if($index+1 < $count){
						
						$field .= $value . " = :".strtoupper($value).", "; 
						

						$fieldAarray[] = ":".strtoupper($value);
						$fieldBarray[] = $value;

					}else{

						$field .= $value . " = :".strtoupper($value);

						$fieldAarray[] = ":".strtoupper($value);
						$fieldBarray[] = $value;
					}
				}

				$stmt = $this->conn->prepare("UPDATE $table SET $field WHERE $where");

				for ($i=0; $i < count($fieldAarray) ; $i++) { 

					$stmt->bindParam($fieldAarray[$i], $array[$fieldBarray[$i]]);
				}

				$stmt->execute();
			}

			return;	

		}
//==============================================================================


//MÉTODO DELETE=================================================================		
		public function Delete($table ,$id){

			$stmt = $this->conn->prepare("DELETE FROM $table WHERE id = :ID");
			$stmt->bindParam(":ID", $id);
			$stmt->execute();

			return;
		}
//==============================================================================
		

//MÉTODO RAND ==================================================================        
		public function Rand($value){
		//$value RECEBE A QUANTIDADE DE CARACTERES

			$characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMOPQRSTUVXWYZ0123456789'; 
			$qtd_characters = strlen($characters); 
			$hash=NULL; 
			for($x=1;$x<=$value;$x++){ 
				$position = rand(0,$qtd_characters); 
				$hash .= substr($characters,$position,1); 
			}

			return $hash;
		}/* FIM DO MÉTODO Rand()*/
//==============================================================================


//MÉTODO FILEUPLOAD=============================================================		
		public function FileUpload($array, $format, $type){

			//$array = RECEBE UM ARRAY DO ARQUIVO
			//$format = RECEBE O TIPO DE ARQUIVO QUE VAI CHEGAR
			//$type = RECEBE O NOME DO DIRETÓRIO PARA ONDE SERÁ ENVIADO O ARQUIVO

			//FORMATOS PERMITIDOS PARA UPLOADS DE IMAGEM
			if($format == "imagem"){
				$format_type = array('image/jpg', 'image/png', 'image/jpeg');
			}
			//==========================================

			//GRAVA O ARRAY "$array" DENTRO DA VÁRIAVEL "$archive"
			foreach ($array as $value){
				$archive[] = $value;
			}	
			//====================================================

			//FAZ A VERIFICAÇÃO DA EXTENSÃO DO ARQUIVO
			if(!empty($archive[0]['type'])){
				if (array_search($archive[0]['type'], $format_type) === false){
					echo 'O tipo de arquivo enviado é inválido!';
			//========================================

				}else{

			//VERIFICA SE HOUVE ALGUM ERRO NO ENVIO DO ARQUIVO
					if($archive[0]["error"]){
						echo " Ops ocorreu um erro :( ";
					}
				}
			//================================================

				//DIRETÓRIO PARA ONDE IRÁ O ARQUIVO
				$dirUploads = "../../../UPLOADS/";
				$dirType = "../../../UPLOADS/".$type;
				//===============================

			//VERIFICA SE O DIRETÓRIO EXISTE, CASO NÃO EXISTA ELE CRIA
				if(!is_dir($dirUploads)){
					mkdir($dirUploads, 0777, true);
				}if(!is_dir($dirType)){
					mkdir($dirType, 0777, true);
				}
			//========================================================
				
				foreach ($archive as $value) { /* INICIO FOREACH */

			//REMOVE O VALOR "image/" QUE VEM DENTRO NO ARRAY "$archive"
					if($format == "imagem"){	
						$remove = "image/";
					}
					$rest = str_replace($remove, "", $value['type']);
			//==========================================================

				//$extension FICA APENAS O VALOR FINAL DA EXTENSÃO
					$extension = ".".$rest;
				//================================================

				//CRIA UM NOME PARA O ARQUIVO USANDO O MÉTODO "Rand()"
					$rand = Connect::Rand(5);
				//====================================================

				//DETERMINA O NOME DO ARQUIVO E PARA ONDE SERÁ ENVIADO
					$file_name = $type."_".$rand.$extension; 
					$path = $dirType . DIRECTORY_SEPARATOR . $file_name;
				//====================================================

			//VERIFICA SE EXISTE ALGUM ARQUIVO COM O MESMO NOME	
					if(file_exists($path)) {
						$path = $dirType . DIRECTORY_SEPARATOR . $file_name;
					}else{
						$path = $dirType . DIRECTORY_SEPARATOR . $file_name;
					}	
			//=================================================

					/* INICIO DO IF "move_uploaded_file" */
			//ENVIA O ARQUIVO PARA O LOCAL INFORMADO
					if(move_uploaded_file($value["tmp_name"], $path)){
			//ENVIA O ARQUIVO PARA O BANCO COM SUAS INFORMAÇÕES
						$file_array = array(

							'file_name' => $file_name,
							'file_type' => $format,
							'file_dir' => $type,
							'file_date' => Connect::DateInfo("1")
						);

						return array(
							'name' => $type,
							'name_file' => $file_name
						);
					}
			//======================================
					/* FIM DO IF "move_uploaded_file" */

				}/* FIM "FOREACH" */

				
				
			}

		}/* FIM DO MÉTODO FileUpload() */
//==============================================================================


//MÉTODO PARA VALIDAR USUÁRIO===================================================		
		public function Validation($table, $email, $pass){
			session_destroy();
			$select = Connect::select($table,"user_mail LIKE '%$email%' AND user_pass LIKE '%$pass%'");
			if(empty($select)){
				return false;
			}else{
				session_start();
				$user_info = Connect::select("system_users", "user_mail LIKE '%$email%'");
				$_SESSION['user_id'] = $user_info[0]['id'];
				$_SESSION['email'] = $user_info[0]['user_mail'];
				$_SESSION['user_name'] = $user_info[0]['user_name'];
				$_SESSION['user_last_name'] = $user_info[0]['user_last_name'];
				$_SESSION['user_type'] = $user_info[0]['user_type'];
				$_SESSION['user_status'] = $user_info[0]['user_status'];
				return true;
			}

		}
//==============================================================================


//MÉTODO VERIFYUSER=============================================================		
		public function VerifyUser(){

			if(!empty($_SESSION['email'])){
			}else{
				unset($_SESSION['start']);
				session_destroy();
				header("location: login.php ");
			}

 		}//FIM DO MÉTODO VerifyUser
//==============================================================================


//MÉTODO DATEINFO=============================================================== 		
 		public function DateInfo($value){
 			$date = new DateTime();
 			$day = $date->format("d"); // DIA
 			$month = $date->format("m"); //MÊS
 			$year = $date->format("y"); //APENAS OS DOIS ÚLTIMOS DIGÍTOS DO ANO
 			$fullYear = $date->format("Y");; //ANO COMPLETO
 			$s = " - "; //SEPARADOR

 			if($value == "1"){

 				$dateinfo = $day.$s.$month.$s.$fullYear;

 			}

 			return $dateinfo;
 		}//FIM DO MÉTODO DateInfo
//==============================================================================


//MÉTODO PARA REMOVER ACENTUAÇÃO================================================		
 		public function RemoveAcento($text){

 			$remove = str_replace(" ", "_", $text); 
 			$name = strtolower(preg_replace( '/[`^~\'"]/', null, iconv( 'UTF-8', 'ASCII//TRANSLIT', $remove ) ));

 			return $name;
 		}
//==============================================================================

 		public function VerifyLogin(){
 			if($_SESSION){
 				header("Location: index");
 			}
 		}

 		public function VerifySession(){
 			if(empty($_SESSION)){
 				header("Location: login.php");
 			}
 		}

 		public function Verifytype($id){
 			$status = Connect::select("system_users", "id = $id");
 			if($status[0]['user_type'] == 1){
 			}elseif($status[0]['user_type'] == 2){
 				echo '<script>';
 				echo 'window.location.assign("index.php")';
 				echo '</script>';
 			}

 			return;
 		}

 		public function Verifystatus($id){
 			$status = Connect::select("system_users", "id = $id");
 			if($status[0]['user_status'] == 1){
 			}elseif($status[0]['user_status'] == 2){
 				session_destroy();
 				echo '<script>';
 				echo 'window.location.assign("login.php?info=aguardando")';
 				echo '</script>';
 				return;
 			}elseif($status[0]['user_status'] == 3){
 				session_destroy();
 				echo '<script>';
 				echo 'window.location.assign("login.php?info=bloqueado")';
 				echo '</script>';
 			}elseif($status[0]['user_status'] == 4){
 				session_destroy();
 				echo '<script>';
 				echo 'window.location.assign("login.php?info=desativado")';
 				echo '</script>';
 			}

 			return;
 		}



 	}

 	?>
