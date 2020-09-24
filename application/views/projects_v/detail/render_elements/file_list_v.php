

<table class="table table-hover table-striped table-bordered pictures_list">
    <thead>
    <th class="w50 text-center"><i class="fa fa-reorder"></i></th>
    <th class="w100 text-center">#id</th>
    <th class="w100 text-center">Görsel</th>
    <th class="text-center">Dosya Yolu/Adı</th>
    <th class="w100 text-center">Durum</th>
    <th class="w100 text-center">İşlem</th>
    </thead>
    <tbody class="sortable" data-url="<?php echo base_url("galleries/imageRankSetter/$gallery_type") ?>">

    <?php foreach ($items as $item) { ?>

        <tr id="ord-<?php echo $item->id; ?>">
            <td class="w50 text-center"><i class="fa fa-reorder"></i></td>
            <td class="w100 text-center">#<?php echo $item->id; ?></td>
            <td class="w100 text-center">
                <?php if ($gallery_type == "image") { ?>
                    <img src="<?php echo base_url("$item->url"); ?>"
                         alt="<?php echo $item->url; ?>"
                         class="img-responsive" width="30">
                <?php } elseif ($gallery_type == "file") { ?>
                    <i class="fa fa-folder fa-2x"></i>
                <?php } ?>
            </td>
            <td class="text-center"><?php echo $item->url; ?></td>
            <td class="w100 text-center">
                <button
                        data-url="<?php echo base_url("galleries/fileDelete/$item->id/$item->gallery_id/$gallery_type"); ?>"
                        class="btn btn-danger btn-outline btn-sm remove-btn"><i
                            class="fa fa-trash"></i>
                    Sil
                </button>
            </td>
        </tr>

    <?php } ?>

    </tbody>
</table>

<div class="col-md-12">
        <div class="widget p-lg">
            <h4 class="m-b-lg">Proje Rapor Harekeleri</h4>
            <table class="table table-hover pictures_list">
                <tbody>
                    <tr>
                        <th class="text-center">#ID</th>
                        <th class="text-center">Ekleyen Kullanıcı</th>
                        <th class="text-center">İşlem Tarihi</th>
                        <th class="text-center">Detay</th>
                        <th class="text-center">Dosya</th>
                        <th class="text-center">Resim</th>
                        <th class="text-center">İşlem</th>
                    </tr>
                    <?php foreach ($uploads as $upload) { ?>
                    
                        <tr>
                            <td class="text-center">#<?php echo $upload->Id; ?></td>
                            <td class="text-center"><?php echo $upload->createdUserId; ?></td>
                            <td class="text-center"><?php  get_readable_date($upload->createdAt); ?></td>
                            <td class="text-center">
                                <!-- <?php if ($gallery_type == "image") { ?>
                                <img src="<?php echo base_url("$item->url"); ?>"
                                    alt="<?php echo $item->url; ?>"
                                    class="img-responsive" width="30">
                                <?php } elseif ($gallery_type == "file") { ?>
                                <i class="fa fa-folder fa-2x"></i>
                                <?php } ?> -->
                            </td>
                            <td class="text-center"><?php echo $upload->url; ?></td>
                            <td class="text-center">
                                <button
                                    data-url="<?php echo base_url("projects/fileDelete/"); ?>"
                                    class="btn btn-danger btn-outline btn-sm remove-btn"><i
                                        class="fa fa-trash"></i>
                                Sil
                                </button>
                            </td>
                        </tr>

                    <?php } ?>
                    
            </tbody></table>
        </div><!-- .widget -->
    </div>