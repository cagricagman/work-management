<?php //$user = get_user(); 
$uri = $this->uri->segment(1);
?>

<aside id="menubar" class="menubar light">
    <div class="app-user">
        <div class="media">
            <div class="media-left">
                <div class="avatar avatar-md avatar-circle">
                    <a href="javascript:void(0)"><img class="img-responsive"
                                                      src="<?php echo base_url("assets"); ?>/assets/images/221.jpg"
                                                      alt="avatar"/></a>
                </div><!-- .avatar -->
            </div>
            <div class="media-body">
                <div class="foldable">
                    <h5><a href="javascript:void(0)" class="username"><?php echo "Kullanıcı Adı" //$user->full_name; ?></a></h5>
                    <ul>
                        <li class="dropdown">
                            <a href="javascript:void(0)" class="dropdown-toggle usertitle" data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">
                                <small>İşlemler</small>
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu animated flipInY">
                                <li>
                                    <a class="text-color" href="<?php echo base_url(); ?>">
                                        <span class="m-r-xs"><i class="fa fa-home"></i></span>
                                        <span>Anasayfa</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="text-color" href="<?php echo "#"//base_url("users/update_form/$user->id"); ?>">
                                        <span class="m-r-xs"><i class="fa fa-user"></i></span>
                                        <span>Profil</span>
                                    </a>
                                </li>
                                <li role="separator" class="divider"></li>
                                <li>
                                    <a class="text-color" href="<?php echo base_url("logout")?>">
                                        <span class="m-r-xs"><i class="fa fa-power-off"></i></span>
                                        <span>Çıkış Yap</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div><!-- .media-body -->
        </div><!-- .media -->
    </div><!-- .app-user -->

    <div class="menubar-scroll">
        <div class="menubar-scroll-inner">
            <ul class="app-menu">

                <li class="<?php echo ($uri == "dashboard") ? "active" : ""; ?>">
                    <a href="<?php echo base_url("dashboard"); ?>">
                        <i class="menu-icon zmdi zmdi-view-dashboard zmdi-hc-lg"></i>
                        <span class="menu-text">Dashboards</span>
                    </a>
                </li>

                <li class="<?php echo ($uri == "users") ? "active" : ""; ?>">
                    <a href="<?php echo base_url("users"); ?>">
                        <i class="menu-icon fa fa-users"></i>
                        <span class="menu-text">Kullanıcılar</span>
                    </a>
                </li>

                <li class="<?php echo ($uri == "reports") ? "active" : ""; ?>">
                    <a href="<?php echo base_url("reports"); ?>">
                        <i class="menu-icon fa fa-book"></i>
                        <span class="menu-text">Raporlar</span>
                    </a>
                </li>

                <li style="display : none;" class="<?php echo ($uri == "projects") ? "active" : ""; ?>">
                    <a href="<?php echo base_url("projects"); ?>">
                        <i class="menu-icon fa fa-object-group"></i>
                        <span class="menu-text">Projeler</span>
                    </a>
                </li>

                <li class="<?php echo ($uri == "emailsettings") ? "active" : ""; ?>">
                    <a href="<?php echo base_url("emailsettings"); ?>">
                        <i class="menu-icon zmdi zmdi-email zmdi-hc-lg"></i>
                        <span class="menu-text">E-Posta Ayarları</span>
                    </a>
                </li>

                <!--
                <li <?php echo ($uri == "") ? "active" : ""; ?>>
                    <a href="<?php echo base_url("courses"); ?>">
                        <i class="menu-icon fa fa-calendar"></i>
                        <span class="menu-text">Eğitimler</span>
                    </a>
                </li>

                <li <?php echo ($uri == "") ? "active" : ""; ?>>
                    <a href="<?php echo base_url("users"); ?>">
                        <i class="menu-icon fa fa-user-secret"></i>
                        <span class="menu-text">Kullanıcılar</span>
                    </a>
                </li>

                <li <?php echo ($uri == "") ? "active" : ""; ?>>
                    <a href="#">
                        <i class="menu-icon zmdi zmdi-lamp zmdi-hc-lg"></i>
                        <span class="menu-text">Popup Hizmeti</span>
                    </a>
                </li>
                -->

            </ul><!-- .app-menu -->
        </div><!-- .menubar-scroll-inner -->
    </div><!-- .menubar-scroll -->
</aside>