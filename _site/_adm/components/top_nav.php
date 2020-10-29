    <nav class="navbar navbar-top navbar-expand navbar-dark bg-gradient-info border-bottom">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Search form -->
          <?php if(!isset($_SESSION['filter'])){
            $_SESSION['filter'] = 1;
          }?>
          <form method="POST" action="<?= BASE . '_site/_user/share/share.php?filter=' . $_SESSION['filter'];?>" class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main">
            <div class="form-group mb-0">
              <div class="input-group input-group-alternative input-group-merge">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-search"></i></span>
                </div>
                <input name="share" class="form-control" placeholder="Pesquisar" type="text">                                  
              </div>              
            </div>
            <button type="button" class="close" data-action="search-close" data-target="#navbar-search-main" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </form>
          <!-- Navbar links -->
          <ul class="navbar-nav align-items-center  ml-md-auto ">
            <li class="nav-item d-xl-none">
              <!-- Sidenav toggler -->
              <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </div>
            </li>
            <li class="nav-item d-sm-none">
              <a class="nav-link" href="#" data-action="search-show" data-target="#navbar-search-main">
                <i class="ni ni-zoom-split-in"></i>
              </a>
            </li>
            <li class="nav-item dropdown">
            <?php
                  //Fazendo uma busca por todos as notificações deste usuário     
                  //EXIBE APENAS AS 5 ÚLTIMAS NOTIFICAÇÕES             
                  $sql_notify = "SELECT * FROM notify ORDER BY id_not DESC LIMIT 5";
                  $res_notify = mysqli_query($con, $sql_notify);

                  //Quantidade de notificações
                  $qtd_notify = mysqli_num_rows($res_notify);
            
            		  //Transforma o $resultado em um array
                  $array_notify = mysqli_fetch_assoc($res_notify);                     
                  
                ?>
              <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php if($qtd_notify != 0){
                  echo "<span class='badge badge-dot mr-4'><i class='bg-danger'></i></span>";
                }
                ?>
                <i class="ni ni-bell-55"></i>           
              </a>
              <div class="dropdown-menu dropdown-menu-xl  dropdown-menu-right  py-0 overflow-hidden">
              
                <!-- Dropdown header -->
                <div class="px-3 py-3">
                  <h6 class="text-sm text-muted m-0">Você tem <strong class="text-primary"><?= $qtd_notify; ?></strong> notificações.</h6>
                </div>
                <!-- List group -->
                <div class="list-group list-group-flush">
                <?php
                    //Verifica se existem registros:
                    if($qtd_notify):
                    //Início do loop
                    do{

                      if($array_notify['origin'] == 0){
                        $notify_telephone = "https://api.whatsapp.com/send?phone=55" . $array_notify['telephone_user'] . "&amp;text=iPet%20-%20Ol%C3%A1,%20eu%20gostaria%20de%20contatar%20vocês,%20Pet%20-%20" . $array_notify['id_post'];
                      }else{
                        $notify_telephone = "#!";
                      }
                  ?>              
                  <a href="<?= $notify_telephone;?>" class="list-group-item list-group-item-action" target="_blank">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <!-- Avatar -->
                        <img alt="Image placeholder" src="<?= PUBLICO . 'img/users/' . $array_notify['image_user']; ?>" class="avatar rounded-circle">
                      </div>
                      <div class="col ml--2">
                        <div class="d-flex justify-content-between align-items-center">
                          <div>
                            <h4 class="mb-0 text-sm"><?= $array_notify['name_user']; ?></h4>
                          </div>
                          <div class="text-right text-muted">
                            <small>
                            <?php
                              if ($array_notify['type'] == 1){
                                echo "<span class='badge badge-pill badge-primary'>Info</span>";
                              } elseif ($array_notify['type'] == 2) {
                                echo "<span class='badge badge-pill badge-success'>Sucesso</span>";
                              } elseif ($array_notify['type'] == 3) {
                                echo "<span class='badge badge-pill badge-danger'>Urgente</span>";
                              }else {
                                echo "<span class='badge badge-pill badge-warning'>Aviso</span>";
                              }
                             ?>
                             </small>
                          </div>
                        </div>
                        <p class="text-sm mb-0"><?= $array_notify['created_at'] . " - " . $array_notify['title']; ?></p>
                      </div>
                    </div>
                  </a>
                  <?php
                    //fim do loop
                    } while($array_notify = mysqli_fetch_assoc($res_notify));

                  else:
                  ?>
                  <a href="#!" class="list-group-item list-group-item-action">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <!-- Icon -->
                        <i class="ni ni-bold-up"></i>
                      </div>
                      <div class="col ml--2">
                        <div class="d-flex justify-content-between align-items-center">
                          <div>
                            <h4 class="mb-0 text-sm">Oops...</h4>
                          </div>                          
                        </div>
                        <p class="text-sm mb-0">Não existem notificações.</p>
                      </div>
                    </div>
                  </a> 

                  <?php endif; ?> 
                  <!-- Inserir com um while -->
                </div>
                <!-- View all -->
                <a href="#" class="dropdown-item text-center text-primary font-weight-bold py-3">Fechar</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="ni ni-ungroup"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-lg dropdown-menu-dark bg-default  dropdown-menu-right ">
                <div class="row shortcuts px-4">
                  <a href="<?= BASE . '_site/_user/list/list_log.php'; ?>" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-info">
                      <i class="ni ni-bullet-list-67"></i>
                    </span>
                    <small>Histórico</small>
                  </a>                  
                </div>
              </div>
            </li>
          </ul>
          <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
            <li class="nav-item dropdown">
              <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media align-items-center">
                  <span class="avatar avatar-sm rounded-circle">
                    <img alt="Image placeholder" src="<?= PUBLICO . 'img/users/' . $_SESSION['profile_image']; ?>">
                  </span>
                  <div class="media-body  ml-2  d-none d-lg-block">
                    <span class="mb-0 text-sm  font-weight-bold"><?= $_SESSION['name']; ?></span>
                  </div>
                </div>
              </a>
              <div class="dropdown-menu  dropdown-menu-right ">
                <div class="dropdown-header noti-title">
                  <h6 class="text-overflow m-0">Bem vindo!</h6>
                </div>
                <a href="<?= BASE . '_site/_user/profile.php'; ?>" class="dropdown-item">
                  <i class="ni ni-single-02"></i>
                  <span>Meu perfil</span>
                </a>
                <a href="<?= BASE . '_site/_user/edit/edit_config.php'; ?>" class="dropdown-item">
                  <i class="ni ni-settings-gear-65"></i>
                  <span>Configurações</span>
                </a>                
                <a href="#!" class="dropdown-item">
                  <i class="ni ni-support-16"></i>
                  <span>Suporte</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="<?= BASE . '_site/controller/logout.php'; ?>" class="dropdown-item">
                  <i class="ni ni-user-run"></i>
                  <span>Sair</span>
                </a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>