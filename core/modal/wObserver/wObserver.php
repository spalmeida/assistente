<?php

namespace world;

class wObserver{

	private $function;
	private $class;

//
	public function __construct($class){

		$this->function = array();

		//retorna todos os métodos da classe solicitada
		$wConnect = get_class_methods(new $class);

		foreach ($wConnect as $method_name) {
			$this->function[] = [
				"method_name" => $method_name
			];
		}

		//nome da classe solicitada
		$this->class = $class;

		return $this->function;
	}

//mostra todos os métodos da classe observada
	public function viewMethods(){return $this->function;}

//
	public function exeMethod(...$params){
		$method_name = $params[0];

		return $this->class::$method_name( $params );
	}

}
