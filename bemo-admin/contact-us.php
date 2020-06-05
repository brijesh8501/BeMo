<?php 
include 'template-parts/header.php'; 
include '../backend/controller.php';

$controller = new Controller();
$contact_list = $controller->contact_list_controller();
?>
<div class="container contact-body">
<h2 class="text-center">CONTACT US</h2>
<div class="table-responsive">
    <table id="contact-table" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Message</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php 
            foreach ($contact_list as $data){
        ?>
            <tr id='data-<?php echo $data['id']; ?>'>
                <td><?php echo $data['name']; ?></td>
                <td><?php echo $data['email']; ?></td>
                <td><?php echo $data['message']; ?></td>
                <td class="text-center"><button class="btn delete-rec" name="delete" data-id="<?php echo $data['id']; ?>" ><i class='fas fa-trash'></i></button></td>
            </tr>
        <?php }  ?>
        </tbody>
    </table>
</div>
</div>
<?php include 'template-parts/footer.php'; ?>
