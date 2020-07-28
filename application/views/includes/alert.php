<?php

$alert = $this->session->userdata("alert");
if ($alert) {
    if ($alert["type"] == "success") {
        ?>
        <script>
            iziToast.success({
                // theme: 'dark',
                // progressBarColor: 'rgb(0, 255, 184)',
                title: '<?php echo $alert["title"];?>',
                message: '<?php echo $alert["text"];?>',
                transitionIn: "bounceInUp",
                position: "topRight"
            });
        </script>
    <?php } else { ?>
        <script>
            iziToast.error({
                // theme: 'dark',
                // progressBarColor: 'rgb(0, 255, 184)',
                title: '<?php echo $alert["title"];?>',
                message: '<?php echo $alert["text"];?>',
                transitionIn: "bounceInUp",
                position: "topRight"
            });
        </script>
    <?php }
} ?>