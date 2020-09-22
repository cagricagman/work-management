<div class="row">
    <div class="col-md-12">
        <h3>Yeni Proje Kaydı</h3>
    </div>
    <div class="col-md-12">
		<div class="widget">
					<header class="widget-header">
						<h4 class="widget-title">Proje Bilgileri</h4>
					</header>
					<hr class="widget-separator">
					<div class="widget-body">
						<form method="POST" action="<?= base_url("projects/save"); ?>">
							<div class="form-group">
								<label>Proje Başlığı</label>
								<input type="text" class="form-control" placeholder="Proje Başlık" name="title">
                                <?php if (isset($form_error)) { ?>
                                    <small class="pull-right input-form-error"><?php echo form_error("title") ?></small>
                                <?php } ?>
							</div>
							
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Başlangıç Tarihi</label>
										<div class="input-group date" id="datetimepicker2" data-plugin="datetimepicker">
											<input type="text" class="form-control">
											<span class="input-group-addon bg-info text-white">
												<span class="glyphicon glyphicon-calendar"></span>
											</span>
										</div>
										<?php if (isset($form_error)) { ?>
											<small class="pull-right input-form-error"><?php echo form_error("start_date") ?></small>
										<?php } ?>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Bitiş Tarihi</label>
										<?php if (isset($form_error)) { ?>
											<small class="pull-right input-form-error"><?php echo form_error("finish_date") ?></small>
										<?php } ?>
									</div>	
								</div>
							</div>
							

							
							
							<div class="form-group">
								<label>Proje Çalışanları</label>
								<select id="select2-demo-6" class="form-control" name="incumbents[]" data-plugin="select2" data-options="{ placeholder: 'Personeller', allowClear: true }">
										<option value="option1">HTML</option>
										<option value="option2">CSS</option>
										<option value="option3">Javascript</option>
										<option value="option4">PHP</option>
										<option value="option5">Bootstrap</option>
									</select>
								<?php if (isset($form_error)) { ?>
                                    <small class="pull-right input-form-error"><?php echo form_error("incumbents") ?></small>
                                <?php } ?>
							</div>
							
							<div class="form-group">
								<label>Öncelik</label>
								<select class="form-control" placeholder="Proje Önceliği" name="priority_status">
									<option value="Düşük">Düşük</option>
									<option value="Orta">Orta</option>
									<option value="Yüksek">Yüksek</option>
								</select>
                                <?php if (isset($form_error)) { ?>
                                    <small class="pull-right input-form-error"><?php echo form_error("priority_status") ?></small>
                                <?php } ?>
							</div>
							
							<div class="form-group">
								<label>Durumu</label>
								<select class="form-control" placeholder="Proje Durumu" name="status">
									<option value="Düşük">Yeni Başladı</option>
									<option value="Orta">Devam Ediyor</option>
									<option value="Yüksek">Bitti</option>
								</select>
                                <?php if (isset($form_error)) { ?>
                                    <small class="pull-right input-form-error"><?php echo form_error("status") ?></small>
                                <?php } ?>
							</div>
                            <a href="<?= base_url("projects"); ?>" class="btn btn-default btn-md"><i class="fa fa-arrow-left"></i> Geri</a>
							<button type="submit" class="btn btn-primary btn-md">Kaydet</button>
						</form>
					</div><!-- .widget-body -->
		</div><!-- .widget -->
	</div>
</div>