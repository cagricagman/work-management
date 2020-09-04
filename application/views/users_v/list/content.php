<div class="row">
    <div class="col-md-3">
        <h3>Kullanıcı Listesi / <a href="<?php echo base_url("users/add_form"); ?>" class="btn btn-primary btn-xs btn-outline">Yeni Ekle</a></h3>
    </div>

    <?php if (!isset($datas)) { ?>
        <div class="col-md-12">
            <div class="alert alert-info alert-custom alert-dismissible">
                <h4 class="alert-title">Herhangi bir veri bulunmamaktadır</h4>
                <p>Sisteme kayıt edilmiş herhangi bir veri bulunmamaktadır. Yeni Kayıt için <a href="<?php echo base_url("users/add_form"); ?>">Buraya
                        Tıklayın</a></p>
            </div>
        </div>
    <?php } else { ?>

        <div class="col-md-12">
            <div class="widget p-lg">
                <table class="table table-hover table-bordered">
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Fotoğraf</th>
                        <th class="text-center">Tam Ad</th>
                        <th class="text-center">Kullanıcı Adı</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Durum</th>
                        <th class="text-center">İşlemler</th>
                    </tr>
                    <?php foreach ($datas as $data) { ?>
                        <tr>
                            <td class="text-center"><?= $data->Id; ?></td>
                            <td class="text-center">
                                <img src="<?= ($data->profilePhoto != null) ? base_url($data->profilePhoto) : base_url("uploads/default_profilephoto.png"); ?>" width="50" alt="">
                            </td>
                            <td class="text-center"><?= $data->fullname; ?></td>
                            <td class="text-center"><?= $data->username; ?></td>
                            <td class="text-center"><?= $data->email; ?></td>
                            <td class="text-center">
                                <input id="switch-0-1"
                                       type="checkbox"
                                       data-switchery
                                    <?= ($data->isActive == 1) ? "checked" : ""; ?> />
                            </td>
                            <td class="text-center">
                                <a href="#" class="btn btn-outline btn-success"><i class="fa fa-pencil"></i></a>
                                <button class="btn btn-outline btn-danger"><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div><!-- .widget -->
        </div><!-- END column -->
    <?php } ?>
</div>