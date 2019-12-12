<?php

use world\wSession;

function verifySession(){
	$session = new wSession;
	return $session->verifySession();
}