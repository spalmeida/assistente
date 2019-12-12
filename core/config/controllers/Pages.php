<?php

function view($dir, $getParam = ""){

	$caminho = DIR.DS.'public'.DS.wINFO['themes'].DS.str_replace('.', DS, $dir).'.php';
	//retorna a pagina solicitada já com as folhas de estilo usado para a página do painel
	//require_once LAYOUT_HEADER;
	file_exists($caminho)? require_once $caminho : 'error';
	//require_once LAYOUT_FOOTER;

}