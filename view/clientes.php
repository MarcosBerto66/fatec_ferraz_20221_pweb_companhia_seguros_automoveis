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

    <!--JQuery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


    <!-- Classes e instâncias necessárias (PHP)-->
    <?php require_once("../controller/ClienteController.php")?>
    <?php $clienteController = new ClienteController();?>

    <script>
      $(document).ready(function(){
        //$('#telefone').mask('(00)0000-0000#');
        $(".btn-excluir").on("click",function(){
          if(confirm("Deseja realmente excluir o cliente?")){
            //href='../controller/ClienteController.php?action=delete&id=".$element["idCliente"]."'
            document.location='../controller/ClienteController.php?action=delete&id='+$(this).val();
          }
        });
      });

      function confirmar(formulario) {
        if(confirm("Deseja realmente cadastrar o novo cliente?")){
          formulario.submit();
        }else{
          return false;
      }

      function deletarCliente(){
        if(confirm("Deseja realmente excluir o cliente?")){
          //href='../controller/ClienteController.php?action=delete&id=".$element["idCliente"]."'
          document.location='../controller/ClienteController.php?action=delete&id='+$(this).val();
        }
      }
        
    }
    
    </script>
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
        <button class='btn btn-outline-success col-2 mx-auto' data-toggle='modal' data-target='.bd-example-modal-lg'><i class="bi bi-plus-circle-fill"></i> Novo Cliente</button>
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
                echo "  <td><button value='".$element["idCliente"]."' class='btn btn-outline-danger btn-excluir'><i class='bi bi-trash3-fill'><i/></button></td>";
                echo "</tr>";
              }
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>

     <!-- Large modal -->
     <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Cadastro de Clientes</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form method="post" action="../controller/ClienteController.php?action=create" id="form" name="form" onsubmit="confirmar(document.form); return false;">
          <div class="modal-body col-12">
            <div class="mb-3 row">
              <div class="col-8">
                <label for="nomeCliente" class="form-label">Nome Completo*</label>
                <input type="text" class="form-control" id="nomeCliente" name="nomeCliente" required>
              </div>
              <div class="col-4">
                <label for="rgCliente" class="form-label">RG*</label>
                <input type="text" class="form-control" id="rgCliente" name="rgCliente" required>
              </div>
            </div>
            <div class="mb-3 row">
              <div class="col-4">
                <label for="cpfCliente" class="form-label">CPF*</label>
                <input type="text" class="form-control" id="cpfCliente" name="cpfCliente" required>
              </div>
              <div class="col-5">
                <label for="telefone" class="form-label">Telefones*</label>
                <input type="text" class="form-control" id="telefone" name="telefone" data-mask="(00) 0000-0000" data-mask-selectonfocus="true" />
                <!--<input type="text" class="form-control" id="telefonesCliente" name="telefonesCliente" placeholder="(00)0000-0000#" required>-->
              </div>
            </div>
            <div class="mb-3 row">
              <div class="col-4">
                <label for="cepCliente" class="form-label">CEP*</label>
                <input type="text" class="form-control" id="cepCliente" name="cepCliente" required>
              </div>
              <div class="col-8">
                <label for="logradouroCliente" class="form-label">Logradouro*</label>
                <input type="text" class="form-control" id="logradouroCliente" name="logradouroCliente" required>
              </div>
            </div>
            <div class="mb-3 row">
              <div class="col-4">
                <label for="bairroCliente" class="form-label">Bairro*</label>
                <input type="text" class="form-control" id="bairroCliente" name="bairroCliente" required>
              </div>
              <div class="col-3">
                <label for="cidadeCliente" class="form-label">Cidade*</label>
                <input type="text" class="form-control" id="cidadeCliente" name="cidadeCliente" required>
              </div>
              <div class="col-3">
                <label for="ufCliente" class="form-label">Estado*</label>
                <select id="ufCliente" class="form-control" name="ufCliente" required>
                    <option value="AC">Acre</option>
                    <option value="AL">Alagoas</option>
                    <option value="AP">Amapá</option>
                    <option value="AM">Amazonas</option>
                    <option value="BA">Bahia</option>
                    <option value="CE">Ceará</option>
                    <option value="DF">Distrito Federal</option>
                    <option value="ES">Espírito Santo</option>
                    <option value="GO">Goiás</option>
                    <option value="MA">Maranhão</option>
                    <option value="MT">Mato Grosso</option>
                    <option value="MS">Mato Grosso do Sul</option>
                    <option value="MG">Minas Gerais</option>
                    <option value="PA">Pará</option>
                    <option value="PB">Paraíba</option>
                    <option value="PR">Paraná</option>
                    <option value="PE">Pernambuco</option>
                    <option value="PI">Piauí</option>
                    <option value="RJ">Rio de Janeiro</option>
                    <option value="RN">Rio Grande do Norte</option>
                    <option value="RS">Rio Grande do Sul</option>
                    <option value="RO">Rondônia</option>
                    <option value="RR">Roraima</option>
                    <option value="SC">Santa Catarina</option>
                    <option value="SP">São Paulo</option>
                    <option value="SE">Sergipe</option>
                    <option value="TO">Tocantins</option>
                </select>
              </div>
              <div class="col-2">
                <label for="numCliente" class="form-label">Número*</label>
                <input type="text" class="form-control" id="numCliente" name="numCliente" required>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Cadastrar</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
          </div>
          </form>
        </div>
      </div>
    </div>

       <!--Bootstrap Bundle with Popper -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>