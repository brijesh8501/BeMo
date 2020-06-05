
<footer id="footer" class="py-4 text-dark mt-5">
      <small>BeMo Academic Consulting&copy; Brijesh Ahir</small>
</footer>
<script src="../js/jquery-3.2.1.js"></script>
<script src="../js/popper.js"></script>
<script src="../js/bootstrap-4.4.1.js"></script>
<script src="./js/jquery.dataTables.min.js"></script>
<script src="./js/dataTables.bootstrap4.min.js"></script>
<script src="./js/main.js"></script>
<script>
$(document).ready(function() {
    $('#contact-table').DataTable();
} );
</script>
<script src="https://cdn.tiny.cloud/1/9x2o5ryjglasbc5m4yk7suufw5mv7ae5g39bkluujb8ztr2t/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: 'textarea#editor',
        skin: 'bootstrap',
        height : "1000",
        image_class_list: [
            {title: 'None', value: ''},
            {title: 'img-fluid', value: 'img-fluid'},
        ],
        plugins: 'lists, link, image, media',
        toolbar: 'undo redo | styleselect | bold italic | link image media | alignleft aligncenter alignright alignjustify | bullist numlist | outdent indent',
        menubar: true,
        image_advtab: true,
        setup: function (editor) {
            editor.on('change', function () {
            //Update the DOM here
            console.log("bdf");
            }); 
        }  
    });
</script>
</body>
</html>