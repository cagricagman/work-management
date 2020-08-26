<div class="row">
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
</div>