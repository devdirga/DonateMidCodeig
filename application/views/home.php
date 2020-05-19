 <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
     <h1 class="display-4">Pricing</h1>
     <p class="lead">Quickly build an effective pricing table for your potential customers with this Bootstrap
         example. It's built with default Bootstrap components and utilities with little customization.</p>
 </div>
 <div class="row">
     <?php
        function limit_words($string, $word_limit)
        {
            $words = explode(" ", $string);
            return implode(" ", array_splice($words, 0, $word_limit));
        }
        foreach ($data->result() as $row) :
        ?>
     <div class="col-md-4">
         <div class="card mb-4 box-shadow">
             <img src="<?php echo base_url() . 'assets/img/' . $row->imageurl; ?>" class="card-img-top" alt="...">
             <div class="card-body">
                 <h5 class="card-title"><?= $row->title ?></h5>
                 <p class="card-text"><?php echo limit_words($row->description, 10); ?></p>
                 <a href="<?php echo base_url() . 'Donates/Detail/' . $row->slug; ?>"
                     class="btn btn-primary">Details</a>
             </div>
         </div>
     </div>
     <?php endforeach; ?>
 </div>