<div class="row">
    <div class="col-md-12">
        <h3><b>"<?= $project->title; ?>"</b> ile İlgili Detaylar</h3>
    </div>

    <div class="col-md-12">
		<div class="widget">
                <header class="widget-header">
                    <h4 class="widget-title">Proje Bilgileri</h4>
                </header>
                <hr class="widget-separator">
                <div class="widget-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Proje Başlığı</label>
                                    <input type="text" class="form-control" value="<?= $project->title; ?>" disabled name="title">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Başlangıç Tarihi</label>
                                    <input type="text" id="datetimepicker5" name="start_date" class="form-control" disabled data-plugin="datetimepicker" data-options="{ defaultDate: '<?= $project->start_date; ?>' }">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Bitiş Tarihi</label>
                                    <input type="text" id="datetimepicker5" name="finish_date" class="form-control" disabled data-plugin="datetimepicker" data-options="{ defaultDate: '<?= ($project->finish_date != null) ? $project->finish_date : ""; ?>' }">
                                </div>	
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="select2-demo-2" class="control-label">Proje Çalışanları</label><br>
                                    <?php $userJsonDecode = json_decode($project->incumbents);
                                        foreach($userJsonDecode as $value){  
                                            $userInfo = dbGetUserInfo($value);
                                            ?>
                                    <code><?= $userInfo->fullname; ?></code>              
                                    <?php } ?> 
                                </div><!-- .form-group -->
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Öncelik</label>
                                    <input type="text" class="form-control" value="<?= $project->priority_status; ?>" disabled>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Durumu</label>
                                    <input type="text" class="form-control" value="<?= $project->status; ?>" disabled>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Notlar</label>
                            <textarea name="note" 
                                    id="maxlength-demo-4" 
                                    class="form-control"
                                    disabled
                                    data-options="{ alwaysShow: true}" 
                                    placeholder="Proje İle ilgili Notunuzu Buraya Yazınız"><?= $project->note; ?></textarea>
                        </div>
                </div>
		</div>
    </div>
    
    <div class="col-md-12">
        <div class="widget">
            <header class="widget-header">
                <h4 class="widget-title">Hareket İle İlgili Detaylı Not</h4>
            </header>
            <hr class="widget-separator">
            <div class="widget-body">
                <form method="POST" action="<?= base_url("reports/save_note/$project->Id"); ?>">
                    <div class="form-group">
                        <label>Rapor Detayı</label>
                        <textarea name="report_detail" class="m-0" data-plugin="summernote" data-options="{height: 250}"></textarea>
                        <?php if (isset($form_error)) { ?>
                            <small class="pull-right input-form-error"><?php echo form_error("report_detail") ?></small>
                        <?php } ?>
                    </div>
                    <button type="submit" class="btn btn-primary btn-md">Kaydet</button>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
	</div>

    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">
                <form action="<?php echo base_url("galleries/file_upload/$item->id/$item->gallery_type/$item->folder_name"); ?>"
                      class="dropzone"
                      id="dropzone"
                      data-url="<?php echo base_url("galleries/refresh_file_list/$item->id/$item->gallery_type"); ?>"
                      data-plugin="dropzone"
                      data-options="{ url : '<?php echo base_url("galleries/file_upload/$item->id/$item->gallery_type/$item->folder_name"); ?>'}">
                    <div class="dz-message">
                        <h3 class="m-h-lg">
                            Dosyaları Buraya Sürükleyin ya da Buraya Tıklayın
                        </h3>
                        <p class="m-b-lg text-muted">
                            (Birden fazla dosya yükleyebilirsiniz.)
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body image_list_container">

                <?php $this->load->view("{$viewFolder}/{$subViewFolder}/render_elements/file_list_v"); ?>

            </div>
        </div>
    </div>
    

</div>