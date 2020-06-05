<?php
include 'template-parts/header.php';
include 'request.php';
?>
<div class="container">
    <?php if($select_record_for_edit_resp === 0){ ?>
        <div class="card bg-danger text-white">
            <div class="card-body">Something went wrong!</div>
        </div>
    <?php }else{ ?>
    <h2 class="text-center"><?php echo strtoupper($select_record_for_edit_resp->title); ?></h2>
        <form method="POST" enctype="multipart/form-data">
            <input type="hidden" name="csrf_token" id="csrfToken" value="<?php echo generateToken('edit'); ?>"/>
            <input type="hidden" id="id" name="id" value="<?php echo $select_record_for_edit_resp->id; ?>"/>
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" name="title" value="<?php echo $select_record_for_edit_resp->title; ?>" required="required">
            </div>
            <div class="form-group">
                <label for="address">Content:</label>
                <textarea id="editor" name="content"><?php echo $select_record_for_edit_resp->content; ?></textarea>
            </div>
            <div class="form-group">
                <label for="metaTitle">Meta Author:</label>
                <input type="text" class="form-control" id="metaAuthor" name="meta_author" value="<?php echo $select_record_for_edit_resp->meta_author; ?>" required="required">
            </div>
            <div class="form-group">
                <label for="metaDescription">Meta Description:</label>
                <input type="text" class="form-control" id="metaDescription" name="meta_description" value="<?php echo $select_record_for_edit_resp->meta_description; ?>" required="required">
            </div>
            <div class="form-group">
                <label for="metaKeywords">Meta Keywords:</label>
                <input type="text" class="form-control" id="metaKeywords" name="meta_keywords" value="<?php echo $select_record_for_edit_resp->meta_keywords; ?>" required="required">
            </div>
            <div class="form-group">
                <label for="pageIndex">Page Index:</label>
                <select class="form-control" id="pageIndex" name="is_index">
                <option value="Y" <?php if($select_record_for_edit_resp->is_index === "Y") { echo "selected"; } ?>>Yes</option>
                <option value="N" <?php if($select_record_for_edit_resp->is_index === "N") { echo "selected"; } ?>>No</option>     
                </select>
            </div>
            <div class="form-group">
                <input type="hidden" name="banner" value="<?php echo $select_record_for_edit_resp->banner; ?>">
                <label for="fileToUpload">Banner:</label>
                <input type="file" class="form-control upload-file" name="image" id="fileToUpload" <?php if(empty($select_record_for_edit_resp->banner)) { echo "required"; } ?>>
            </div>
            <div class="form-group">
                <?php if(empty($select_record_for_edit_resp->banner)){ 

                    echo '<label>No banner set yet!</label>';

                }else{

                    echo '<img src="../'.$select_record_for_edit_resp->banner.'" width="100" height="100"/>';

                }
            ?>
            </div>
            <button type="submit" id="edit" class="btn btn-primary" name="edit">Save changes</button>
        </form>
    <?php } ?>
</div>
<?php include 'template-parts/footer.php'; ?>