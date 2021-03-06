$(document).ready(function () {

    // $(function () {
    //     $('#datetimepicker').datetimepicker({
    //         language: 'tr'
    //     });
    // });

    $(".content-container,.pictures_list").on("click", ".remove-btn", function () {

        $data_url = $(this).data("url");

        Swal.fire({
            title: 'Silme İşlemi',
            text: "Kaydı Silmek İstediğinize Emin Misiniz?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Evet, Sil!',
            cancelButtonText: "Hayır"
        }).then((result) => {
            if (result.value) {
                Swal.fire(
                    'Başarılı!',
                    'Silme İşlemi Gerçekleşti.',
                    'success'
                );
                // sleep(2000);
                window.location.href = $data_url;
            }
        })

    })

    $(".content-container").on("change", ".isActive", function () {

        var $data = $(this).prop("checked");
        var $data_url = $(this).data("url");

        if (typeof $data !== "undefined" && typeof $data_url !== "undefined") {
            $.post($data_url, { data: $data }, function (response) {
            });
        }
    })


    var uploadSection = Dropzone.forElement("#dropzone");

    $(".image_list_container").on("change", ".isCover", function () {

        var $data = $(this).prop("checked");
        var $data_url = $(this).data("url");

        if (typeof $data !== "undefined" && typeof $data_url !== "undefined") {
            $.post($data_url, { data: $data }, function (response) {
                $(".image_list_container").html(response);
            });
        }

    })

    uploadSection.on("complete", function (file) {

        var $data_url = $("#dropzone").data("url")

        $.post($data_url, {}, function (response) {

            $(".image_list_container").html(response);

        })

    })
})