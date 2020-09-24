<div class="row">
    <div class="col-md-12">
        <h3><?= $item->title; ?> Kayıdını Düzenliyorsunuz...</h3>
    </div>
    <div class="col-md-12">
		<div class="widget">
					<header class="widget-header">
						<h4 class="widget-title">Proje Bilgileri</h4>
					</header>
					<hr class="widget-separator">
					<div class="widget-body">
						<form method="POST" action="<?= base_url("reports/update/$item->Id"); ?>">
							<div class="form-group">
								<label>Başlık</label>
								<input type="text" class="form-control" value="<?= $item->title; ?>" name="title">
                                <?php if (isset($form_error)) { ?>
                                    <small class="pull-right input-form-error"><?php echo form_error("title") ?></small>
                                <?php } ?>
							</div>
							
							<div class="form-group">
								<label>Rapor Detayı</label>
								<textarea name="report_detail" class="m-0" data-plugin="summernote" data-options="{height: 250}"><?= $item->report_detail; ?></textarea>
                                <?php if (isset($form_error)) { ?>
                                    <small class="pull-right input-form-error"><?php echo form_error("report_detail") ?></small>
                                <?php } ?>
							</div>
                            <a href="<?= base_url("reports"); ?>" class="btn btn-default btn-md"><i class="fa fa-arrow-left"></i> Geri</a>
							<button type="submit" class="btn btn-primary btn-md">Kaydet</button>
						</form>
					</div><!-- .widget-body -->
		</div><!-- .widget -->
	</div>
</div>