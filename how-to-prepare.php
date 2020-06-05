<?php include 'template-parts/header.php'; ?>
<main role="main" id="how-to-prepare">
  <div id="banner">
    <img src="<?php echo "/bemo/".$select_record_by_id_resp->banner; ?>" class="img-fluid" style="width:100%"/>
    <div class="banner-text-wrapper">
      <div class="centered banner-text-expand"><?php echo $select_record_by_id_resp->title; ?></div>
    </div>
  </div>
  <div class="container pt-5 pb-5">
    <?php echo html_entity_decode($select_record_by_id_resp->content); ?>
  </div> <!-- /container -->

</main>
<?php include 'template-parts/footer.php'; ?>