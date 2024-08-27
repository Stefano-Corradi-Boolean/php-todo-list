<?php

// prendo il file json e salvo il contenuto come stringa
$json_string = file_get_contents('todo-list.json');

// trasformo la stringa in elemento PHP. Mettendo true come secondo parametro ottendo un aarray di array e non un array di oggetti
$list = json_decode($json_string, true);



/// codice di tutte le operazioni

// se mi arriva in POST 'text' creo un nuovo task
if(isset($_POST['text'])){
  // creo un nuovo task da salvare
  $new_item = [
    'text' => $_POST['text'],
    'description' => $_POST['description'],
    'done' => false
  ];

  // lo aggiungo alla lista
  $list[] = $new_item;

  // salvo la nuova lista nel file JSON
  file_put_contents('todo-list.json', json_encode($list));
  
}

// se arriva la chiave 'indexToToggle' in POST eseguo il toggle del task e lo salvo
if(isset($_POST['indexToToggle'])){
  $indexToToggle = $_POST['indexToToggle'];
  $list[$indexToToggle]['done'] = !$list[$indexToToggle]['done'];
  
  file_put_contents('todo-list.json', json_encode($list));
}

if(isset($_POST['indextoDelete'])){
  $indextoDelete = $_POST['indextoDelete'];
  
  array_splice($list, $indextoDelete, 1);
  
  file_put_contents('todo-list.json', json_encode($list));
}


// 'trasformo' il file PHP come se fosse un file JSON
header('Content-Type: application/json');


// ritrasformo la lista in JSON e la stampo
echo json_encode($list);