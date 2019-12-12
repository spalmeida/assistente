<?php

print ('Iniciando processo de atualização do composer...').PHP_EOL;
print (exec('composer update')).PHP_EOL;
//
//
print ('Iniciando processo de atualização das classes...').PHP_EOL;
print (exec('composer dump-autoload -o')).PHP_EOL;
//
//
//print ('Iniciando processo de atualização das classes...').PHP_EOL;
//print (exec('composer dump-autoload -o')).PHP_EOL;

print ('Assistente atualizada com Sucesso!').PHP_EOL;
