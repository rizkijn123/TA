<body class="g-sidenav-show  bg-gray-100">
    <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 " id="sidenav-main">
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0" href="#" target="_blank">
                <i class="fas fa-project-diagram"></i>
                <span class="ms-1 font-weight-bold"><?= $title ?></span>
            </a>
        </div>
        <hr class="horizontal dark mt-0">
        <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <!-- Query menu -->
                <?php
                $role_id = $this->session->userdata('role_id');
                $queryMenu = "SELECT `user_menu`.`id`, `menu`
                                FROM `user_menu` JOIN `user_access_menu` 
                                ON `user_menu`.`id` = `user_access_menu`.`menu_id`
                                WHERE `user_access_menu`.`role_id` = $role_id
                                ORDER BY `user_access_menu`.`menu_id` ASC
                                ";
                $menu = $this->db->query($queryMenu)->result_array();
                ?>
                <!-- looping menu  -->
                <?php foreach ($menu as $m) : ?>
                    <li class="nav-item mt-3">
                        <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6"><?= $m['menu']; ?></h6>
                    </li>


                    <!-- submenu -->
                    <?php
                    $menuId = $m['id'];
                    $querySubmenu = "SELECT * FROM `user_sub_menu` 
                                WHERE `menu_id` = $menuId
                                AND `is_active` = 1";
                    $subMenu = $this->db->query($querySubmenu)->result_array();
                    ?>
                    <?php foreach ($subMenu as $sm) : ?>
                        <li class="nav-item">
                            <?php if ($page_title == $sm['title']) : ?>
                                <a class="nav-link active" href="<?= base_url($sm['url']) ?>">
                                <?php else : ?>
                                    <a class="nav-link" href="<?= base_url($sm['url']) ?>">
                                    <?php endif; ?>

                                    <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                                        <?= $sm['icon']; ?>
                                    </div>
                                    <span class="nav-link-text ms-1"><?= $sm['title']; ?></span>
                                    </a>
                        </li>
                    <?php endforeach; ?>

                <?php endforeach; ?>
            </ul>
        </div>
    </aside>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">