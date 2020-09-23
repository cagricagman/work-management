<div class="row">
    <div class="col-md-3">
        <h3>Proje Listesi / <a href="<?php echo base_url("projects/add_form"); ?>"
                                   class="btn btn-primary btn-xs btn-outline">Yeni Ekle</a></h3>
    </div>

    <?php if ($datas == null) { ?>
        <div class="col-md-12">
            <div class="alert alert-info alert-custom alert-dismissible">
                <h4 class="alert-title">Herhangi bir veri bulunmamaktadır</h4>
                <p>Sisteme kayıt edilmiş herhangi bir veri bulunmamaktadır. Yeni Kayıt için <a
                            href="<?php echo base_url("projects/add_form"); ?>">Buraya
                        Tıklayın</a></p>
            </div>
        </div>
    <?php } else { ?>

        <div class="col-md-12">
            <div class="widget p-lg">
                <table class="table table-hover table-bordered">
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Başlık</th>
                        <th class="text-center">Proje Çalışanları</th>
                        <th class="text-center">Öncelik</th>
                        <th class="text-center">Başlama Tarihi</th>
                        <th class="text-center">Durum</th>
                        <th class="text-center">Klasör Adı</th>
                        <th class="text-center">İşlemler</th>
                    </tr>
                    <?php foreach ($datas as $data) { ?>
                        <tr>
                            <td class="text-center"><?= $data->Id; ?></td>
                            <td class="text-center"><?= $data->title; ?></td>
                            <td class="text-center">
                                <?php $jsonUserDecode = json_decode($data->incumbents); 
                                      foreach($jsonUserDecode as $item){
                                          $user = dbGetUserInfo($item);
                                          echo "<code>" . $user->fullname . "</code> ";
                                      }
                                ?>
                            </td>
                            <td class="text-center"><?= $data->priority_status; ?></td>
                            <td class="text-center"><?= get_readable_date($data->start_date); ?></td>
                            <td class="text-center"><?= $data->status; ?></td>
                            <td class="text-center"><?= $data->folder_name; ?></td>
                            <td class="text-center">
                                <a href="<?= base_url("projects/edit_form/$data->Id"); ?>" class="btn btn-outline btn-success"><i class="fa fa-pencil"></i></a>
                                <a href="<?= base_url("projects/detail_form/$data->Id"); ?>" class="btn btn-outline btn-dark"><i class="fa fa-folder-open"></i></a>
                                <button class="btn btn-outline btn-danger"><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div><!-- .widget -->
        </div><!-- END column -->
    <?php } ?>
</div>