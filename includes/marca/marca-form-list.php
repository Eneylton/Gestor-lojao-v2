<?php

$resultados = '';

foreach ($usuarios as $item) {

   $resultados .= '<tr>
                      <td>' . $item->id . '</td>
                      <td style="text-transform:uppercase">' . $item->nome . '</td>
                      <td style="text-align: center;">
                        
                       <a href="marca-edit.php?id=' . $item->id . '">
                         <button type="button" class="btn btn-primary"> <i class="fas fa-paint-brush"></i> </button>
                       </a>

                       <a href="marca-delete.php?id=' . $item->id . '">
                       <button type="button" class="btn btn-danger"> <i class="fas fa-trash"></i></button>
                       </a>


                      </td>
                      </tr>

                      ';
}

$resultados = strlen($resultados) ? $resultados : '<tr>
                                                     <td colspan="6" class="text-center" > Nenhuma Vaga Encontrada !!!!! </td>
                                                     </tr>';


unset($_GET['status']);
unset($_GET['pagina']);
$gets = http_build_query($_GET);

//PAGINAÇÂO

$paginacao = '';
$paginas = $pagination->getPages();

foreach ($paginas as $key => $pagina) {
   $class = $pagina['atual'] ? 'btn-primary' : 'btn-secondary';
   $paginacao .= '<a href="?pagina=' . $pagina['pagina'] . '&' . $gets . '">

                  <button type="button" class="btn ' . $class . '">' . $pagina['pagina'] . '</button>
                  </a>';
}

?>

<div class="content-wrapper" style="margin-top: 60px;">

    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?=TITLE?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"><?=BRAND?></li>
            </ol>
          </div>
        </div>
      </div>
    </div>

<section class="content">
   <div class="container-fluid">
      <div class="row">
         <div class="col-12">
            <div class="card card-danger">
               <div class="card-header">

                  <form method="get">
                     <div class="row my-7">
                        <div class="col">

                           <label>Buscar por Marca</label>
                           <input type="text" class="form-control" name="buscar" value="<?= $buscar ?>">

                        </div>


                        <div class="col d-flex align-items-end">
                           <button type="submit" class="btn btn-warning" name="">
                              <i class="fas fa-search"></i>

                              Pesquisar

                           </button>
                           &nbsp &nbsp &nbsp
                           <a  href="gerar-pdf.php" class="btn btn-dark" name="">
                           <i class="fas fa-file-pdf"></i> &nbsp; &nbsp;

                              Gerar PDF

                           </a>
                        </div>


                     </div>

                  </form>

               </div>

               <div class="card-body">

                  <div class="col d-flex align-items-end">

                     <a href="marca-insert.php">
                        <button type="submit" class="btn btn-success"> <i class="fas fa-plus"></i> Adicionar Nova Marca</button>
                     </a>

                  </div>
                  <br>
                  <table class="table table-head-fixed table-dark table-striped table-hover">
                     <thead>
                        <tr>
                           <th> ID </th>
                           <th> MARCAS </th>
                           <th style="text-align: center;"> AÇÃO </th>
                        </tr>
                     </thead>
                     <tbody>
                        <?= $resultados ?>
                     </tbody>

                  </table>
               </div>

            </div>

         </div>

      </div>

   </div>

</section>

<?= $paginacao ?>