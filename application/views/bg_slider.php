
<!-- bxSlider CSS file -->
<link href="<?=base_url()?>/bxslider/dist/jquery.bxslider.css" rel="stylesheet" />
<div style="margin-left: 160px;">
<ul class="bxslider">
  <?php
  foreach ($row->result() as $key => $data) {
  ?>  
      <li> <img src="<?=base_url('uploads/banner/'.$data->foto_banner)?>"></li>
  <?php 
    }
  ?>
</ul>
</div>

<!-- jQuery library -->
<script src="<?=base_url()?>/bxslider/dist/jquery-3.1.1.min.js"></script>
<!-- bxSlider Javascript file -->
<script src="<?=base_url()?>/bxslider/dist/jquery.bxslider.js"></script>
<script>
  $(document).ready(function(){
    $('.bxslider').bxSlider({
      mode: 'horizontal',
      moveSlides: 1,
      slideMargin: 40,
      infiniteLoop: true,
      slideWidth: 1000,
      minSlides: 1,
      maxSlides: 1,
      speed: 800,
      auto: true,

    });
  });
</script>

