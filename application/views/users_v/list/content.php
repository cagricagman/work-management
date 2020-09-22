<div class="row">
    <div class="col-md-3">
        <h3>Kullanıcı Listesi / <a href="<?php echo base_url("users/add_form"); ?>"
                                   class="btn btn-primary btn-xs btn-outline">Yeni Ekle</a></h3>
    </div>

    <?php if ($datas == null) { ?>
        <div class="col-md-12">
            <div class="alert alert-info alert-custom alert-dismissible">
                <h4 class="alert-title">Herhangi bir veri bulunmamaktadır</h4>
                <p>Sisteme kayıt edilmiş herhangi bir veri bulunmamaktadır. Yeni Kayıt için <a
                            href="<?php echo base_url("users/add_form"); ?>">Buraya
                        Tıklayın</a></p>
            </div>
        </div>
    <?php } else { ?>

        <div class="col-md-12">
            <div class="widget p-lg">
                <table class="table table-hover table-bordered content-container">
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
                                <img src="<?= ($data->profile_photo != null) ? base_url($data->profile_photo) : base_url("uploads/default_profilephoto.png"); ?>"
                                     width="50" alt="">
                            </td>
                            <td class="text-center"><?= $data->fullname; ?></td>
                            <td class="text-center"><?= $data->username; ?></td>
                            <td class="text-center"><?= $data->email; ?></td>
                            <td class="text-center">
                                <input id="switch-0-1"
                                       type="checkbox"
                                       class="isActive"
                                       data-switchery
                                       data-url="<?= base_url("users/isActiveSetter/$data->Id"); ?>"
                                    <?= ($data->isActive == 1) ? "checked" : ""; ?> />
                            </td>
                            <td class="text-center">
                                <a href="<?= base_url("users/edit_form/$data->Id"); ?>" class="btn btn-outline btn-success"><i class="fa fa-pencil"></i></a>
                                <button class="btn btn-outline btn-danger remove-btn" data-url="<?= base_url("users/delete/$data->Id"); ?>"><i class="fa fa-trash"></i></button>
                                <a href="<?= base_url("users/password_form/$data->Id"); ?>" class="btn btn-outline btn-dark"><i class="fa fa-key"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div><!-- .widget -->
        </div><!-- END column -->
    <?php } ?>
</div>