<?php

namespace world;

class wQuery{

	public function select($query){
		return "select";
	}

	public	function Data($select,$type){

		if($type == 'fetch'){

			$select = conn()->prepare($select);
			$select->execute();
			$info   = $select->fetch();

		}else if($type == 'fetchAll'){

			$select = conn()->prepare($select);
			$select->execute();
			$info = $select->fetchAll(\PDO::FETCH_ASSOC);

		}else if($type == 'insert'){

			$select = conn()->prepare($select);
			$info = $select->execute();

		}else if($type == 'update'){

			$select = conn()->prepare($select);
			$info = $select->execute();

		}

		return $info;
	}


	public function findTables(...$params){

		//$params[1] = conexão com banco de dados
		//$params[2] = tabela a ser consultada

		$params = $params[0];
		$select = $params[1]->prepare("DESCRIBE $params[2]");
		$select->execute();
		$search = $select->fetchAll(\PDO::FETCH_ASSOC);
		$count  = count($search);

		for ($i=0; $i < $count ; $i++) {

			if($search[$i]['Field'] !== "id"){
				$result[] = $search[$i]['Field'];
			}
		}

		return $result;
	}


	public function Query($table, $array, $type, $where){

		$tableInfo 	= self::Tables($table);
		$count 		= count($tableInfo);
		$fieldA 	= "";
		$fieldB 	= "";
		$field  	= "";



 //CASO SEJA insert =========================== * * *

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

			$stmt = conn()->prepare("INSERT INTO $table ($fieldA) VALUES ($fieldB) $where");

			for ($i=0; $i < count($fieldAarray) ; $i++) {

				$stmt->bindParam($fieldBarray[$i], $array[$fieldAarray[$i]]);
			}

			$stmt->execute();

 //CASO SEJA update =========================== * * *

		}else if($type == "update"){

			foreach ($tableInfo as $index => $value) {

				if($index+1 < $count){

					$field 		   .= $value . " = :".strtoupper($value).", ";
					$fieldAarray[] 	= ":".strtoupper($value);
					$fieldBarray[] 	= $value;

				}else{

					$field .= $value . " = :".strtoupper($value);

					$fieldAarray[] = ":".strtoupper($value);

					$fieldBarray[] = $value;

				}

			}


			$stmt = conn()->prepare("UPDATE $table SET $field WHERE $where");


			for ($i=0; $i < count($fieldAarray) ; $i++) {

				$stmt->bindParam($fieldAarray[$i], $array[$fieldBarray[$i]]);
			}

			return $stmt->execute();
		}

		return;

	}
}
