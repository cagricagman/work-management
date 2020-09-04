<div class="row">
<<<<<<< HEAD
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
=======
    <div class="col-md-12">
        <h3>Kullanıcılar Modülü</h3>
    </div>

    <div class="col-md-12">
        <div class="widget p-lg">
            <h4 class="text-left m-b-lg"><b>Kullanıcı Listesi</b> |
                <button class="btn btn-outline btn-primary btn-xs">Yeni Ekle</button>
            </h4>

            <?php if (!isset($items)) { ?>

            <?php } else { ?>

                <table class="table table-hover table-bordered table-responsive">
                    <tbody>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Profil Fotoğrafı</th>
                        <th class="text-center">Ad Soyad</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Kullanıcı Adı</th>
                        <th class="text-center">Aktif/Pasif</th>
                        <th class="text-center">İşlemler</th>
                    </tr>

                    <?php foreach ($items as $item) { ?>

                        <tr>
                            <td class="text-center"><?= $item->Id ?></td>
                            <td class="text-center">
                                <img src="<?= ($item->profile_photo != null) ? $item->profile_photo : base_url("uploads/profile_photo.png") ?>" class="img-responsive" width="50" alt="">
                            </td>
                            <td class="text-center"><?= $item->fullname ?></td>
                            <td class="text-center"><?= $item->email ?></td>
                            <td class="text-center"><?= $item->username ?></td>
                            <td class="text-center">
                                    <input id="switch-0-1"
                                           type="checkbox"
                                           data-switchery
                                        <?= ($item->isActive == 1) ? "checked" : "" ?> />
                            </td>
                            <td class="text-center">
                                <button class="btn btn-outline btn-success btn-xs">Güncelle</button>
                                <button class="btn btn-outline btn-danger btn-xs">Sil</button>
                            </td>
                        </tr>

                    <?php } ?>


                    </tbody>
                </table>

            <?php } ?>

        </div>
    </div>
>>>>>>> 02f60fa45d490919a9825813ff513c2ee243c07c
</div>