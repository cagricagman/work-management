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
						<form method="POST" action="<?= base_url("projects/update/$item->Id"); ?>">
							<div class="form-group">
								<label>Proje Başlığı</label>
								<input type="text" class="form-control" value="<?= $item->title; ?>" name="title">
                                <?php if (isset($form_error)) { ?>
                                    <small class="pull-right input-form-error"><?php echo form_error("title") ?></small>
                                <?php } ?>
							</div>
							
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Başlangıç Tarihi</label>
										<div class="input-group date" id="datetimepicker" data-plugin="datetimepicker">
											<input type="text" class="form-control" value="<?= $item->start_date; ?>" name="start_date">
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
										<div class="input-group date" id="datetimepicker" data-plugin="datetimepicker">
											<input type="text" class="form-control" value="<?= $item->finish_date; ?>" name="finish_date">
											<span class="input-group-addon bg-info text-white">
												<span class="glyphicon glyphicon-calendar"></span>
											</span>
										</div>
										<?php if (isset($form_error)) { ?>
											<small class="pull-right input-form-error"><?php echo form_error("finish_date") ?></small>
										<?php } ?>
									</div>	
								</div>
							</div>
							
							<div class="form-group">
								<label for="select2-demo-2" class="control-label">Proje Çalışanları</label>
								<select id="select2-demo-2" class="form-control" name="incumbents[]" data-plugin="select2" multiple>
                                    <?php $userJsonDecode = json_decode($item->incumbents);
                                     foreach($users as $user){ 
                                         foreach($userJsonDecode as $valueUser){
                                            if($user->Id == $valueUser){ ?>
                                                <option selected value="<?= $user->Id; ?>"><?= $user->fullname; ?></option>
                                           <?php } ?> 
                                        <?php } ?>
                                           <option value="<?= $user->Id; ?>"><?= $user->fullname; ?></option>
                                    <?php } ?> 
								</select>
									<?php if (isset($form_error)) { ?>
                                    	<small class="pull-right input-form-error"><?php echo form_error("incumbents") ?></small>
                                	<?php } ?>
							</div><!-- .form-group -->
							
							<div class="form-group">
								<label>Öncelik</label>
								<select class="form-control" placeholder="Proje Önceliği" name="priority_status">
									<option <?= ($item->priority_status == "Düşük") ? "selected" : ""; ?> value="Düşük">Düşük</option>
									<option <?= ($item->priority_status == "Orta") ? "selected" : ""; ?> value="Orta">Orta</option>
									<option <?= ($item->priority_status == "Yüksek") ? "selected" : ""; ?> value="Yüksek">Yüksek</option>
								</select>
                                <?php if (isset($form_error)) { ?>
                                    <small class="pull-right input-form-error"><?php echo form_error("priority_status") ?></small>
                                <?php } ?>
							</div>
							
							<div class="form-group">
								<label>Durumu</label>
								<select class="form-control" placeholder="Proje Durumu" name="status">
									<option <?= ($item->status == "Yeni Başladı") ? "selected" : ""; ?> value="Yeni Başladı">Yeni Başladı</option>
									<option <?= ($item->status == "Devam Ediyor") ? "selected" : ""; ?> value="Devam Ediyor">Devam Ediyor</option>
									<option <?= ($item->status == "Bitti") ? "selected" : ""; ?> value="Bitti">Bitti</option>
								</select>
                                <?php if (isset($form_error)) { ?>
                                    <small class="pull-right input-form-error"><?php echo form_error("status") ?></small>
                                <?php } ?>
							</div>

							<div class="form-group">
								<label>Notlar</label>
                                <textarea name="note" 
                                        id="maxlength-demo-4" 
                                        class="form-control"  
                                        data-options="{ alwaysShow: true}" 
                                        placeholder="Proje İle ilgili Notunuzu Buraya Yazınız"><?= $item->note; ?></textarea>
							</div>
                            <a href="<?= base_url("projects"); ?>" class="btn btn-default btn-md"><i class="fa fa-arrow-left"></i> Geri</a>
							<button type="submit" class="btn btn-primary btn-md">Kaydet</button>
						</form>
					</div><!-- .widget-body -->
		</div><!-- .widget -->
	</div>
</div>