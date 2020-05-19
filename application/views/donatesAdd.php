<div class="col-md-8 col-md-offset-2">
    <form action="<?php echo base_url() . 'Donates/insert' ?>" method="post" enctype="multipart/form-data">
        <input type="text" name="title" class="form-control" placeholder="title" required /><br />
        <textarea id="description" name="description" class="form-control" required></textarea><br />
        <input type="file" name="file" required><br>
        <button class="btn btn-success btn-sm" type="submit">POST</button>
    </form>
</div>

<script src="<?php echo base_url() . 'assets/jquery/jquery-3.5.1.min.js' ?>"></script>
<script type="text/javascript" src="<?php echo base_url() . 'assets/js/bootstrap.js' ?>"></script>
<script type="text/javascript" src="<?php echo base_url() . 'assets/ckeditor/ckeditor.js' ?>"></script>
<script type="text/javascript">
$(function() {
    // Fungsi untuk mengganti textarea dengan ckeditor style
    CKEDITOR.replace('description', {
        extraPlugins: 'syntaxhighlight',
        toolbar: [
            ['Source'],
            ['Bold', 'Italic', '-', 'NumberedList', 'BulletedList', '-', 'Link', 'Unlink', '-',
                'Image'
            ],
        ]
    });

});
</script>