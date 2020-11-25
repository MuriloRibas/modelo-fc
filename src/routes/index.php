<?php

// $this->get('/', (new src\controller\ExController)->index());
$this->get('/', 'ExController@index');

// $this->get('/dd', (new src\controller\ExController)->none());
$this->get('/dd', 'ExController@none');

$id = 0;
$this->get('/agendar/'.$id, 'ExController@agendar');

