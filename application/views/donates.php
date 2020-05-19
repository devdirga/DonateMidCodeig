<a href="<?= base_url('Donates/insert') ?>"></a>
<?php
function limit_words($string, $word_limit)
{
    $words = explode(" ", $string);
    return implode(" ", array_splice($words, 0, $word_limit));
}
foreach ($data->result() as $row) :
?>
<div class="col-md-8 col-md-offset-2">
    <h2><?php echo $row->title; ?></h2>
    <hr />
    <img src="<?php echo base_url() . 'assets/img/' . $row->imageurl; ?>">
    <?php echo limit_words($row->description, 10); ?><a
        href="<?php echo base_url() . 'Donates/Detail/' . $row->slug; ?>">
        <strong>Selengkapnya ></strong></a>
</div>
<?php endforeach; ?>