
<div class="simple-page-wrap">
    <div class="simple-page-logo animated swing">
        <a href="#">
            <span>True Kontrol Teknolojileri</span>
        </a>
    </div><!-- logo -->
    <div class="simple-page-form animated flipInY" id="login-form">
        <h4 class="form-title m-b-xl text-center">TrueKontrol Hesabınla Oturum Aç</h4>
        <form action="<?php echo base_url("userop/do_login"); ?>" method="post">
            <div class="form-group">
                <input id="sign-in-email" type="text" class="form-control" name="username" placeholder="Kullanıcı Adı">
                <?php if (isset($form_error)) { ?>
                    <small class="pull-right input-form-error"><?php echo form_error("username") ?></small>
                <?php } ?>
            </div>

            <div class="form-group">
                <input id="sign-in-password" type="password" class="form-control" name="password" placeholder="Parola">
                <?php if (isset($form_error)) { ?>
                    <small class="pull-right input-form-error"><?php echo form_error("password") ?></small>
                <?php } ?>
            </div>

<!--            <div class="form-group m-b-xl">-->
<!--                <div class="checkbox checkbox-primary">-->
<!--                    <input type="checkbox" id="keep_me_logged_in"/>-->
<!--                    <label for="keep_me_logged_in">Keep me signed in</label>-->
<!--                </div>-->
<!--            </div>-->
            <button type="submit" class="btn btn-primary">OTURUM AÇ</button>
        </form>
    </div><!-- #login-form -->

    <div class="simple-page-footer">
        <p><a href="<?php //echo base_url("sifremi-unuttum"); ?>">ŞİFREMİ UNUTTUM ?</a></p>
    </div><!-- .simple-page-footer -->


</div><!-- .simple-page-wrap -->