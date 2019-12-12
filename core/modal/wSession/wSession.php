<?php

namespace world;

class wSession{

	public function verifySession(){
		if (isset($_SESSION)) {
			return 'ok';
		}else{
			return 'nao';
		}
	}

}
