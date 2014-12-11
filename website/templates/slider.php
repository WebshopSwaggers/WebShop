<div class="container-img">
  <?php
  $item = Item::getItems("games");
  $count = count($item);
  $i= 0;
  for($count; $i < $count; $i++)
  {
    ?>

    <div class="imgInfo">
      <div class="imgInfoTitle">
        <p><?php echo $item[$i]['item_name']; ?></p>
      </div>
      <div class="imgInfoDesc">
        <p><?php echo $item[$i]['item_description']; ?></p>
      </div>
    </div>
    <?php
  }
  ?>
  <div class="image_slider">
    <figure id="slideshow">

      <img src="<?php echo $link; ?>/assets/images/header-510x186.png" class="active" alt="banner-radius">
      <img src="<?php echo $link; ?>/assets/images/Logo600x4001.png" alt="banner-radius">

    </figure>

  </div>
</div>
