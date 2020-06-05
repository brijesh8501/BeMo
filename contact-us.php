<?php 
include 'template-parts/header.php';
?>
<main role="main" id="contact-us">
    <img src="<?php echo "/bemo/".$select_record_by_id_resp->banner; ?>" class="img-fluid" style="width:100%"/>
    <div class="container">
        <div class="contact-content col-xs-12">
            <?php echo html_entity_decode($select_record_by_id_resp->content); ?>
        </div>
        <div class="col-xs-12" id="contact-form">
            <form action="" id="contact" method="post">
              
                <div class="form-group">
                    <label for="email">NAME</label>
                    <input type="email" class="form-control" id="name">
                </div>
                <div class="form-group">
                    <label for="email">EMAIL ADDRESS</label>
                    <input type="email" class="form-control" id="email">
                </div>
                <div class="form-group">
                    <label for="message">HOW CAN WE HELP YOU?</label>
                    <textarea class="form-control" id="message" rows="8" cols="38"></textarea>
                </div>
              <div class="g-recaptcha" data-sitekey="**************************************************************"></div>
                <button type="button" class="btn btn-primary" id="contact-reset">RESET</button>
                <button type="button" class="btn btn-primary" id="contact-submit">SUBMIT</button>
            </form>
        </div>
        <div class="col-xs-12 pt-5 pb-5" style="font-size:15px">
            <u>Note:</u> If you are having difficulties with our contact us form above, send us an email to info@bemoacademicconsulting.com (copy & paste the email address)
        </div>
    </div> <!-- /container -->

</main>
<?php include 'template-parts/footer.php'; ?>