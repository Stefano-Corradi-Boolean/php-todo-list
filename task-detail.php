<?php
/*
 1. importo il file JSON
 2. lo decodifico
 3. salvo in una variabile l'elemento a indece index
 4. stampo i dati

*/

$json_string = file_get_contents('todo-list.json');
$list = json_decode($json_string, true);
$task = $list[$_GET['index']];

// se viene inviato in index inesistente reindirizzo alla index
if(!$task){
  header("Location: index.html");
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap  -->
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.css'
    integrity='sha512-bR79Bg78Wmn33N5nvkEyg66hNg+xF/Q8NA8YABbj+4sBngYhv9P8eum19hdjYcY7vXk/vRkhM3v/ZndtgEXRWw=='
    crossorigin='anonymous' />

  <!-- FontAwesome  -->
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.css'
    integrity='sha512-FA9cIbtlP61W0PRtX36P6CGRy0vZs0C2Uw26Q1cMmj3xwhftftymr0sj8/YeezDnRwL9wtWw8ZwtCiTDXlXGjQ=='
    crossorigin='anonymous' />

  <!-- Axios  -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/axios/1.1.3/axios.js'
    integrity='sha512-xjzDqCmpabFznyCZ92vM1F0gg8ExgSukopZQOCcVbObLyJSmZAkaB9wzOCeSClearljJcjRh67cGDp2uv4diLg=='
    crossorigin='anonymous'></script>

  <!-- Vue  -->
  <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>

  <!-- Custom CSS  -->
  <link rel="stylesheet" href="style.css">

  <title>Dettaglio Task</title>
</head>

<body>

  <div id="app" class="sc-container">

    <div class="container-fluid my-5">
      <h1 class="text-center"> <?php echo $task['text'] ?> </h1>


      <div class="bg-white text-dark rounded-1 p-3">

        <p>
          <?php echo $task['description'] ?>
        </p>

      </div>

    </div>



  </div>



</body>

</html>