<div class="row">
    <div class="col-md-3">
        <h3>Rapor Listesi / <a href="<?php echo base_url("reports/add_form"); ?>"
                                   class="btn btn-primary btn-xs btn-outline">Yeni Ekle</a></h3>
    </div>

    <?php if ($datas == null) { ?>
        <div class="col-md-12">
            <div class="alert alert-info alert-custom alert-dismissible">
                <h4 class="alert-title">Herhangi bir veri bulunmamaktadır</h4>
                <p>Sisteme kayıt edilmiş herhangi bir veri bulunmamaktadır. Yeni Kayıt için <a
                            href="<?php echo base_url("reports/add_form"); ?>">Buraya
                        Tıklayın</a></p>
            </div>
        </div>
    <?php } else { ?>

        <div class="col-md-12">
            <div class="widget p-lg">
                <table class="table table-hover table-bordered content-container">
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Ad Soyad</th>
                        <th class="text-center">Başlık</th>
                        <th class="text-center">Eklenme Tarih</th>
                        <th class="text-center">İşlemler</th>
                    </tr>
                    <?php foreach ($datas as $data) { $user = dbGetUserInfo($data->userId); ?>
                        <tr>
                            <td class="text-center"><?= $data->Id; ?></td>
                            <td class="text-center"><?= $user->fullname; ?></td>
                            <td class="text-center"><?= $data->title; ?></td>
                            <td class="text-center"><?= get_readable_date($data->createdAt); ?></td>
                            <td class="text-center">
                                <a href="<?= base_url("reports/edit_form/$data->Id"); ?>" class="btn btn-outline btn-success"><i class="fa fa-pencil"></i></a>
                                <button class="btn btn-outline btn-danger remove-btn" data-url="<?= base_url("reports/delete/$data->Id"); ?>" ><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div><!-- .widget -->
        </div><!-- END column -->
    <?php } ?>
</div>