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
               <div class="col-6">
                    <form method="post">
                         <div class="card card-danger">
                              <div class="card-header ">
                                   <h3 class="card-title">Formulário de cadastro de novas usuários...</h3>

                                   <div class="align-items-end" style="margin-left: 86%;">
                                        <button type="submit" class="btn btn-warning">
                                             <i class="fas fa-check"></i> Cadastrar
                                        </button>
                                   </div>

                              </div>
                              <!-- /.card-header -->
                              <div class="card card-primary">

                              <div class="card-body">

                                   <div class="form-group">
                                        <label>Nome</label>
                                        <input type="text" class="form-control" name="nome" required>
                                   </div>

                                   <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control" name="email" required>
                                   </div>

                                   <div class="form-group">
                                        <label>Senha</label>
                                        <input type="password" placeholder="Senha" id="password" class="form-control" name="senha" required>
                                   </div>

                                   <div class="form-group">
                                        <label>Confirma Senha</label>
                                        <input type="password" placeholder="Confirme Senha" id="confirm_password" class="form-control" required>
                                   </div>
                              </div>
                         </div>

               </div>

          </div>

     </div>
     </form>

     </div>


</section>

</div>
</section>