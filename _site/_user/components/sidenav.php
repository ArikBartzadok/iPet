  <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  align-items-center">
        <a class="navbar-brand" href="<?= BASE . '_site/_user/home.php';?>">
          <img src="<?= PUBLICO . 'img/brand/ipet-blue.png'; ?>" class="navbar-brand-img" alt="...">
          
        </a>
      </div>
      <div class="navbar-inner">
      <?php
      $id = $_SESSION['user_id'];
      ?>
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" href="<?= BASE . '_site/_user/home.php';?>">
                <i class="ni ni-tv-2 text-default"></i>
                <span class="nav-link-text">Home</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= BASE . '_site/_user/list/list_pets.php';?>">
                <i class="ni ni-tag text-info"></i>
                <span class="nav-link-text">Pet's</span>
              </a>
            </li> 
            <li class="nav-item">
              <a class="nav-link" href="<?= BASE . '_site/_user/list/list_ongs.php';?>">
                <i class="ni ni-badge text-primary"></i>
                <span class="nav-link-text">ONG's</span>
              </a>
            </li>            
            <li class="nav-item">
              <a class="nav-link" href="<?= BASE . '_site/_user/list/list_users.php';?>">
                <i class="ni ni-single-02 text-yellow"></i>
                <span class="nav-link-text">Usuários</span>
              </a>
            </li>                                  
            <li class="nav-item">
            <?php
            //Fazendo uma busca pela quantidade de posts do usuário
            $sql_count_favorite = "SELECT * FROM favorite WHERE user_id = '$id'";
            $res_count_favorite = mysqli_query($con, $sql_count_favorite);
            $count_favorite = mysqli_num_rows($res_count_favorite); 
            ?>
              <a class="nav-link" href="<?= BASE . '_site/_user/list/list_favs.php';?>">
                <i class="ni ni-favourite-28 text-danger"></i>
                <span class="nav-link-text">Pet's salvos</span>
                <span class="badge badge-md badge-circle badge-floating badge-danger border-white"><?= $count_favorite;?></span>
              </a>
            </li>                       
          </ul>
          <!-- Divider -->
          <hr class="my-3">
          <!-- Heading -->
          <h6 class="navbar-heading p-0 text-muted">
            <span class="docs-normal">Mais ações</span>
          </h6>
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" href="<?= BASE . '_site/_user/upload/upload_post.php';?>">
                <i class="ni ni-single-copy-04 text-info"></i>
                <span class="nav-link-text">Realizar Post</span>
              </a>
            </li>
            <li class="nav-item">
            <?php
            //Fazendo uma busca pela quantidade de posts do usuário
            $sql_count_post = "SELECT * FROM post WHERE id_author = '$id'";
            $res_count_post = mysqli_query($con, $sql_count_post);
            $count_post = mysqli_num_rows($res_count_post); 
            ?>
              <a class="nav-link" href="<?= BASE . '_site/_user/list/list_posts.php';?>">
                <i class="ni ni-collection text-default"></i>
                <span class="nav-link-text">Meus Post's</span>
                <span class="badge badge-md badge-circle badge-floating badge-info border-white"><?= $count_post;?></span>
              </a>
            </li>                                             
          </ul>
          
        </div>
      </div>
    </div>
  </nav>