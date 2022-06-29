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
        $("#form")[0].reset();

        $(".btn-excluir").on("click",function(){
          if(confirm("Deseja realmente excluir o cliente?")){
            //href='../controller/ClienteController.php?action=delete&id=".$element["idCliente"]."'
            document.location='../controller/ClienteController.php?action=delete&id='+$(this).val();
          }
        });

        $(".btn-editar").on("click",function(){
          var linha = $(this).parent().parent();
          var colunas = $(linha).find('td');
          $("#tituloModal").html("Alteração de Clientes");
          $("#nomeCliente").val($(colunas[1]).html());
          $("#rgCliente").val($(colunas[2]).html());
          $("#cpfCliente").val($(colunas[3]).html());
          $("#cepCliente").val($(colunas[4]).html());
          $("#logradouroCliente").val($(colunas[5]).html());
          $("#bairroCliente").val($(colunas[6]).html());
          $("#cidadeCliente").val($(colunas[7]).html());
          $("#ufCliente").val($(colunas[8]).html());
          $("#numCliente").val($(colunas[9]).html());
          document.getElementById('form').action = '../controller/ClienteController.php?action=update&id='+$(this).val();
          //console.log($(linha[0]).html());
        });
      });

      function resetarFormulario(){
        $("#form")[0].reset();
        $("#tituloModal").html("Cadastro de Clientes");
        document.getElementById('form').action = '../controller/ClienteController.php?action=create';
      }
      

      function confirmar(formulario) {
        if(confirm("Deseja realmente cadastrar/alterar?")){
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
        <button class='btn btn-outline-success col-2 mx-auto' onclick='resetarFormulario();' data-toggle='modal' data-target='.bd-example-modal-lg'><i class="bi bi-plus-circle-fill"></i> Novo Cliente</button>
      </div>
      <div class="table-responsive mt-3 mb-5">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Nome</th>
              <th scope="col">RG</th>
              <th scope="col">CPF</th>
              <th class="d-none" scope="col">CEP</th>
              <th class="d-none" scope="col">Logradouro</th>
              <th class="d-none" scope="col">Bairro</th>
              <th class="d-none" scope="col">Cidade</th>
              <th class="d-none" scope="col">Estado/UF</th>
              <th class="d-none" scope="col">Nº</th>
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
                echo "  <td class='d-none'>".$element['cepCliente']."</td>";
                echo "  <td class='d-none'>".$element['logradouroCliente']."</td>";
                echo "  <td class='d-none'>".$element['bairroCliente']."</td>";
                echo "  <td class='d-none'>".$element['cidadeCliente']."</td>";
                echo "  <td class='d-none'>".$element['ufCliente']."</td>";
                echo "  <td class='d-none'>".$element['numCliente']."</td>";
                echo "  <td>".$element['logradouroCliente']." Nº ".$element['numCliente']." - ".$element['cidadeCliente']." - ".$element['ufCliente'].", ".$element['cepCliente']."</td>";//Parei aqui, é ideia é criar um modal semelhante ao usado para o cadastro,
                echo "  <td><button value='".$element["idCliente"]."' class='btn btn-outline-danger btn-excluir'>
                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash3-fill' viewBox='0 0 16 16'>
                <path d='M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z'/>
                </svg>
                </button>
                <button value='".$element["idCliente"]."' class='btn btn-outline-success btn-editar'  data-toggle='modal' data-target='.bd-example-modal-lg'>
                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-fill' viewBox='0 0 16 16'>
                <path d='M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z'/>
                </svg>
                </button></td>";
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
            <h5 class="modal-title" id="tituloModal">Cadastro de Clientes</h5>
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
              <!--<div class="col-5">
                <label for="telefone" class ="form-label">Telefones*</label>
                <input type="text" class="form-control" id="telefone" name="telefone" data-mask="(00) 0000-0000" data-mask-selectonfocus="true" />
                <input type="text" class="form-control" id="telefonesCliente" name="telefonesCliente" placeholder="(00)0000-0000#" required>
              </div>-->
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
            <button type="submit" class="btn btn-primary">Confirmar</button>
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