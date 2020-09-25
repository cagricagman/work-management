<h4 class="m-b-lg">Proje Rapor Harekeleri</h4>
<table class="table table-hover pictures_list">
    <tbody>
        <tr>
            <th class="text-center">#ID</th>
            <th class="text-center">Ekleyen Kullanıcı</th>
            <th class="text-center">İşlem Tarihi</th>
            <th class="text-center">Dosya/Fotoğraf</th>
            <th class="text-center">İşlem</th>
        </tr>
        <?php foreach ($uploads as $upload) { ?>
        
            <tr>
                <td class="text-center">#<?php echo $upload["Id"]; ?></td>
                <td class="text-center"><?php echo $upload["createdUserId"]; ?></td>
                <td class="text-center"><?php echo get_readable_date($upload["createdAt"]); ?></td>
                <td class="text-center">
                    <?php if ($upload["type"] == "image") { ?>
                    <img src="<?php echo base_url("{$upload["url"]}"); ?>"
                        alt="<?php echo $upload["url"]; ?>"
                        class="img-responsive" width="90">
                    <?php } elseif ($upload["type"] == "file") { ?>
                    <i class="fa fa-folder fa-2x"></i>
                    <?php } ?>
                </td>
                <td class="text-center">
                    <button
                        data-url="<?php echo base_url("projects/fileDelete/{$upload["project_Id"]}/{$upload["Id"]}/{$upload["type"]}"); ?>"
                        class="btn btn-danger btn-outline btn-sm remove-btn"><i
                            class="fa fa-trash"></i>
                    Sil
                    </button>
                </td>
            </tr>

        <?php } ?>
        
    </tbody>
</table>