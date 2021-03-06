    <div class="header bg-gradient-info pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">iPet</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>                  
                  <li class="breadcrumb-item active" aria-current="page">Home</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
              <a href="list/list_ongs.php" class="btn btn-sm btn-neutral">ONG's</a>              
            </div>
          </div>
          <?php
          //Fazendo uma busca pela quantidade de posts globais
          $sql_count_global_post = "SELECT * FROM post";          
          $res_count_global_post = mysqli_query($con, $sql_count_global_post);
          $count_global_post = mysqli_num_rows($res_count_global_post); 
          ?>
          <!-- Card stats -->
          <div class="row">
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Pets para ajudar</h5>
                      <span class="h2 font-weight-bold mb-0"><?= $count_global_post;?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                        <i class="ni ni-notification-70"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> <?= $count_global_post; ?>0%</span>
                    <span class="text-nowrap">Últimos 5 dias</span>
                  </p>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Minhas postagens</h5>
                      <span class="h2 font-weight-bold mb-0"><?= $count_post;?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                        <i class="ni ni-collection"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> <?= $count_post;?>0%</span>
                    <span class="text-nowrap">Últimos 5 dias</span>
                  </p>
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>