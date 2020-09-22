<div class="row">
    <div class="col-md-12">
        <h3><b><?= $item->username; ?></b> Kullanıcısının Kaydını Güncelliyorsunuz..</h3>
    </div>
    <div class="col-md-12">
				<div class="widget">
					<header class="widget-header">
						<h4 class="widget-title">Kullanıcı Bilgileri</h4>
					</header>
					<hr class="widget-separator">
					<div class="widget-body">
						<form method="POST" action="<?= base_url("users/update/$item->Id"); ?>">
							<div class="form-group">
								<label for="exampleInputEmail1">Ad Soyad</label>
								<input type="text" class="form-control" placeholder="Ad Soyad" name="fullname" value="<?= $item->fullname; ?>">
                                <?php if (isset($form_error)) { ?>
                                    <small class="pull-right input-form-error"><?php echo form_error("fullname") ?></small>
                                <?php } ?>
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">E-Posta Adresi</label>
								<input type="email" class="form-control" placeholder="E-Mail" name="email" value="<?= $item->email; ?>">
                                <?php if (isset($form_error)) { ?>
                                    <small class="pull-right input-form-error"><?php echo form_error("email") ?></small>
                                <?php } ?>
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Kullanıcı Adı</label>
								<input type="text" class="form-control" placeholder="Kullanıcı Adı" name="username" value="<?= $item->username; ?>">
                                <?php if (isset($form_error)) { ?>
                                    <small class="pull-right input-form-error"><?php echo form_error("username") ?></small>
                                <?php } ?>
							</div>
                            <a href="<?= base_url("users"); ?>" class="btn btn-default btn-md"><i class="fa fa-arrow-left"></i> Geri</a>
							<button type="submit" class="btn btn-primary btn-md">Kaydet</button>
						</form>
					</div><!-- .widget-body -->
				</div><!-- .widget -->
	</div>
</div>