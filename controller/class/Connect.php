<?php 

class Connect{

	public $conn;
//==============================================================================

		//MÉTODO MÁGICO CONEXÃO COM O BANCO DE DADOS PARA CHAMA-LO BASTA USAR
		//$var = new Connect("HOSTNAME","DBNAME","USER","PASS");

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
		public function select($table, $where){
			$select = "SELECT * FROM $table WHERE $where ";
			return Connect::Data($select,"fetchAll"); 
		}

		public function selectDefault($table,$column, $where){
			$select = "SELECT $column FROM $table WHERE $where ";
			return Connect::Data($select,"fetchAll"); 
		}

		public function FetchAll($value){

			$select = "SELECT * FROM $value";
			return Connect::Data($select,"fetchAll");	 
		}

		public function FetchWhere($value, $where){

			$select = "SELECT * FROM $value WHERE $where";
			return Connect::Data($select,"fetchAll");	 
		}

		//É POSSÍVEL COLOCAR UMA QUERY INTEIRA SEM DINÂMICA "não recomendado"
		public function FetchDefault($value){

			$select = "$value";
			return Connect::Data($select,"fetchAll");	 
		}

		public function magicFetch($value){

			$select = "SELECT * FROM $value order by str_to_date(date, '%d/%m/%Y') ASC";
			return Connect::Data($select,"fetchAll");	 
		}

		public function MagicSelect($table){

			$select = "DESCRIBE $table";
			return Connect::Data($select,"fetchAll");	 
		}

		function RemoveAcento($string){

			$remover_separador = str_replace(" ", "_", $string); 
			$nome = strtolower(preg_replace( '/[`^~\'"]/', null, iconv( 'UTF-8', 'ASCII//TRANSLIT', $remover_separador ) ));

			return utf8_encode($nome);
		}	

//==============================================================================

//IDENTIFICAÇÃO DE TABELAS ]=====================================================
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

				return $stmt->execute();
			}

			return;	

		}

		public function Delete($table ,$id){

			$stmt = $this->conn->prepare("DELETE FROM $table WHERE id = :ID");
			$stmt->bindParam(":ID", $id);
			$stmt->execute();

			return;
		}

		public function Rand($value){
		//$value RECEBE A QUANTIDADE DE CARACTERES

			$characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMOPQRSTUVXWYZ0123456789+_-'; 
			$qtd_characters = strlen($characters); 
			$hash=NULL; 
			for($x=1;$x<=$value;$x++){ 
				$position = rand(0,$qtd_characters); 
				$hash .= substr($characters,$position,1); 
			}

			return $hash;
		}/* FIM DO MÉTODO Rand()*/

		public function FileUpload($array, $format, $type, $sub){

			//$array = RECEBE UM ARRAY DO ARQUIVO
			//$format = RECEBE O TIPO DE ARQUIVO QUE VAI CHEGAR
			//$type = RECEBE O NOME DO DIRETÓRIO PARA ONDE SERÁ ENVIADO O ARQUIVO
			//$sub = USADO PARA REFERENCIA DE SUBPASTA PARA ONDE O ARQUIVO SERÁ ENVIADO

			$new_type_1[] = explode(".", $array['name']);
			$new_type[] = end($new_type_1[0]);

			$file_type = $new_type[0];
			//FORMATOS PERMITIDOS PARA UPLOADS DE IMAGEM
			if($format == "imagem"){
				$format_type = array('jpg', 'png', 'jpeg');
			}elseif($format == "task"){
				$format_type = array('zip','pdf','gif','docx','pptx','xlsx','xls','jpg','txt','png','rar');
			}
			//==========================================

			//GRAVA O ARRAY "$array" DENTRO DA VÁRIAVEL "$archive"
			foreach ($array as $value){
				$archive[] = $value;
			}	
			//====================================================

			//FAZ A VERIFICAÇÃO DA EXTENSÃO DO ARQUIVO
			if(!empty($file_type)){
				if (array_search($file_type, $format_type) === false){
					echo 'O tipo de arquivo enviado é inválido!';
			//========================================

				}else{

			//VERIFICA SE HOUVE ALGUM ERRO NO ENVIO DO ARQUIVO
					if($array["error"]){
						echo " Ops ocorreu um erro :( ";
					}
				}
			//================================================

				//DIRETÓRIO PARA ONDE IRÁ O ARQUIVO
				$dirUploads = "..".DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."UPLOADS/";
				$dirType = "..".DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."UPLOADS".DIRECTORY_SEPARATOR.$type. DIRECTORY_SEPARATOR.$sub;
				//===============================

			//VERIFICA SE O DIRETÓRIO EXISTE, CASO NÃO EXISTA ELE CRIA
				if(!is_dir($dirUploads)){
					mkdir($dirUploads, 0777, true);
				}if(!is_dir($dirType)){
					mkdir($dirType, 0777, true);
				}
			//========================================================
				
				foreach ($archive as $value) { /* INICIO FOREACH */

				//$extension FICA APENAS O VALOR FINAL DA EXTENSÃO
					$extension = ".".$file_type;
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
					if(move_uploaded_file($array["tmp_name"], $path)){
			//ENVIA O ARQUIVO PARA O BANCO COM SUAS INFORMAÇÕES
						$file_array = array(

							'file_name' => $file_name,
							'file_type' => $format,
							'file_dir' => $type,
							'file_date' => Connect::DateInfo("1")
						);

						return array(
							'file_type' => $type,
							'file_name' => $array['name'],
							'file_directory' => $path,
							'cripto_name' => $file_name
						);
					}
			//======================================
					/* FIM DO IF "move_uploaded_file" */

				}/* FIM "FOREACH" */

				
				
			}

		}/* FIM DO MÉTODO FileUpload() */
		public function Validationtable($tab, $column, $info){
			$select = Connect::select($tab,"$column LIKE '%$info%'");
			if(empty($select)){
				return false;
			}else{
				return true;
			}
		}
		//MÉTODO PARA VALIDAR USUÁRIO
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

		public function VerifyUser(){

			if(!empty($_SESSION['email'])){
			}else{
				unset($_SESSION['start']);
				session_destroy();
				header("location: login.php ");
			}

 		}//FIM DO MÉTODO VerifyUser

 		public function DateInfo($value){
 			$date = new DateTime();
 			$day = $date->format("d"); // DIA
 			$month = $date->format("m"); //MÊS
 			$year = $date->format("y"); //APENAS OS DOIS ÚLTIMOS DIGÍTOS DO ANO
 			$fullYear = $date->format("Y");; //ANO COMPLETO
 			$semana = date('w', time()); //NÚMERO DA SEMANA
 			$mes = date('m', time()); //NÚMERO DOS MESES
 			$dias_da_semana = Array("Domingo", "Segunda Feira", "Terça feira", "Quarta feira", "Quinta feira", "Sexta Feira", "Sábado");
 			$meses_do_ano = Array("Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho","Agosto","Setembro","Outubro","Novembro","Dezembro");
 			$s = " - "; //SEPARADOR

 			if($value == "1"){
 				//Exemplo: 02 - 11 - 2018
 				$dateinfo = $day.$s.$month.$s.$fullYear;

 			}elseif($value == "2"){
 				//Exemplo: Sexta dia 02 de Dezembro de 2018
 				$dateinfo = $dias_da_semana[$semana]." dia ".$day." de ".$meses_do_ano[$mes]." de ".$fullYear;

 			}elseif($value == "3"){
 				//Exemplo: Sexta
 				$dateinfo = $dias_da_semana[$semana];
 			}elseif($value == "4"){
 				//Exemplo: 02
 				$dateinfo = $day;
 			}elseif($value == "5"){
 				//Exemplo: 12
 				$dateinfo = $month;
 			}

 			return $dateinfo;
 		}//FIM DO MÉTODO DateInfo

 		public function ConvertDate($date){

 			$convert = str_replace("/", "-", $date);
 			return date('d-m-Y', strtotime($convert));

 		}

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