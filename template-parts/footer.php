<footer>
<div class="row">
		<div class="col-xs-12 col-md-8 copy p-2">
        <span class="footer-block text-white">©2013-2016 BeMo Academic Consulting Inc. All rights reserved.
        <a href="http://www.cdainterview.com/disclaimer-privacy-policy.html" target="_blank"><span style="text-decoration:underline;">Disclaimer &amp; Privacy Policy</span></a>
        <a href="mailto:info@bemoacademicconsulting.com" id="rw_email_contact"><span style="text-decoration:underline;">Contact Us</span></a>
        </span>
    </div>
    <div class="col-xs-12 col-md-4 copy p-2">
      <div id="social-icons">
      <a href="https://www.facebook.com/brijeshh.ahirr" class="social fa fa-facebook"></a>
      <a href="https://www.linkedin.com/in/brijesh-ahir-9b8b40101/" class="social fa fa-twitter"></a>
      </div>
</div>
</footer>
<a href="#" id="scrollup">Scroll</a>
<script src="js/jquery-3.2.1.js"></script>
<script src="js/popper.js"></script>
<script src="js/bootstrap-4.4.1.js" ></script>
<script src="js/main.js"></script>
<script src='https://www.google.com/recaptcha/api.js' async defer></script>
<?php 
    foreach ($online_tool_list as $data){

      echo html_entity_decode($data['footer_content']);

    } ?>
</body>
</html>