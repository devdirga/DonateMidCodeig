<div class="col-md-8 col-md-offset-2">
    <h2><?php echo $data->title; ?></h2>
    <hr />
    <img src="<?php echo base_url() . 'assets/img/' . $data->imageurl; ?>">
    <?php echo $data->description; ?>
</div>