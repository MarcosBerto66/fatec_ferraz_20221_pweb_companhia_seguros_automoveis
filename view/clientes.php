<!doctype html>
<html lang="pt-br">
  <head>
    <title>Companhia de Seguros - Clientes</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css'>

    <!-- Classes e instâncias necessárias (PHP)-->
    <?php require_once("../controller/ClienteController.php")?>
    <?php $clienteController = new ClienteController();?>
  </head>
  <?php include_once("_includes/header.php");?>
  <body>
    <div class="container pt-5">
      <div class="row">
        <form class='d-flex col-10'>
          <div class="col-9">
            <input class='form-control mx-auto' type='search' placeholder='Pesquisar' aria-label='Search'>
          </div>
          <button class='btn btn-outline-primary col-2 mx-auto'><i class="bi bi-search"></i> Pesquisar</button>
        </form>
        <button class='btn btn-outline-success col-2 mx-auto' data-toggle='modal' data-target='.bd-example-modal-lg'><i class="bi bi-plus-circle-fill"></i> Novo Partido</button>
      </div>
      <div class="table-responsive mt-3 mb-5">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Nome</th>
              <th scope="col">RG</th>
              <th scope="col">CPF</th>
              <th scope="col">Endereço</th>
              <th scope="col">Ações</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $rows = $clienteController->listarTodosClientes();
            if(mysqli_num_rows($rows) > 0){
              while($element = mysqli_fetch_assoc($rows)){
                echo "<tr>";
                echo "  <td>".$element['idCliente']."</td>";
                echo "  <td>".$element['nomeCliente']."</td>";
                echo "  <td>".$element['rgCliente']."</td>";
                echo "  <td>".$element['cpfCliente']."</td>";
                echo "  <td>".$element['logradouroCliente']."</td>";
                echo "  <td></td>";
                echo "</tr>";
              }
            }
              
            ?>
          </tbody>
        </table>
      </div>
    </div>
       <!--Bootstrap Bundle with Popper -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>