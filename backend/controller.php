<?php
include 'model.php';

class Controller{

    private $model;
    public function __construct(){
        $this->model = new Model();
    }
    // contact form
    public function insert_contact_controller($data){


        if(isset($data['name']) && isset($data['email']) && isset($data['message'])){

            if(!empty($data['name']) && !empty($data['email']) && !empty($data['message'])){

                if (preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i", $data['email'])){

                    $insert_array = array(
                        "name" => strip_tags($data['name']),
                        "email" => strip_tags($data['email']),
                        "message" => strip_tags($data['message'])
                    );         
                    $insert_resp = $this->model->insert($insert_array, 'guest_contact');
                    return $insert_resp;

                } else {

                    return 0;

                }
                
            }else{

                return 0;

            }

        }

    }
    // admin login form
    public function login_controller($data){

        if(isset($data['email']) && isset($data['password'])){

            if(!empty($data['email']) && !empty($data['password'])){

                if (preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i", $data['email'])){

                    $login_credentials = array(
                        "email" => strip_tags($data['email']),
                        "password" => md5(strip_tags($data['password']))
                    );         
                    $login_response = $this->model->select($login_credentials, 'user_login');
                    $result = $login_response !== 0 ? $login_response : 0;
                    return $result;

                } else {

                    return 0;

                }

            }

        }

    }
    // select record for edit form - admin side
    public function select_record_by_id_controller($data, $action){

        if(isset($data['id'])){

            $id = (int)$data['id'];

            if(!empty($id) && is_int($id)){
                $where_array = array(
                    "id" => $id,
                );     
            if($action === "edit"){

                $tablename = "add_content";

            }else if($action === "online-tool"){

                $tablename = "header_footer_section";

            }
            $select_record = $this->model->select($where_array, $tablename);
            return $select_record;

            }

        }

    }
    // edit form - admin side
    public function edit_controller($data){

        if(isset($data['title']) && isset($data['content']) && isset($data['meta_author'])
        && isset($data['meta_description']) && isset($data['meta_keywords']) && isset($data['is_index'])){

            if(!empty($data['title']) && !empty($data['content']) && !empty($data['meta_author'])
            && !empty($data['meta_description']) && !empty($data['meta_keywords']) && !empty($data['is_index'])){

                $banner = $data['banner'];

                    if(!empty($_FILES['image']['name'])){
                        
                        $errors = array();
                        $file_name = $_FILES['image']['name'];
                        $file_size = $_FILES['image']['size'];
                        $file_tmp = $_FILES['image']['tmp_name'];
                        $file_type = $_FILES['image']['type'];
                        $file_ext = strtolower(end(explode('.', $_FILES['image']['name'])));
                        
                        $extensions= array("jpeg","jpg","png");
                        
                        if(in_array($file_ext,$extensions)=== false){

                            $errors[]="extension not allowed, please choose a JPEG or PNG file.";

                        }
                        
                        if($file_size > 2097152){

                            $errors[]='File size must be exactely 2 MB';

                        }
                        
                        if(empty($errors)==true){

                            move_uploaded_file($file_tmp,"../uploads/".$file_name);
                            $banner = "/uploads/".$file_name;

                        }else{
                            
                            echo "upload";
                            return 0;

                        }

                    }

                    $edit_data = array(
                        "title" => strip_tags($data['title']),
                        "content" => htmlentities($data['content'], ENT_QUOTES),
                        "meta_author" => strip_tags($data['meta_author']),
                        "meta_description" => strip_tags($data['meta_description']),
                        "meta_keywords" => strip_tags($data['meta_keywords']),
                        "is_index" => strip_tags($data['is_index']),
                        "banner" => $banner
                    );
                    $update_id = $data['id'];       
                    $edit_response = $this->model->edit($edit_data, $update_id,  'add_content');
                    return $edit_response;

            }else{

                echo "1";
                return 0;

            }

        }else{
            echo "2";
            return 0;

        }

    }
    // edit form - admin side
    public function edit_online_tool_controller($data){

        if(isset($data['header_content']) && isset($data['footer_content'])){

                $edit_data = array(
                    "header_content" => htmlentities($data['header_content'], ENT_QUOTES),
                    "footer_content" => htmlentities($data['footer_content'], ENT_QUOTES)
                );
                $update_id = $data['id'];       
                $edit_response = $this->model->edit($edit_data, $update_id,  'header_footer_section');
                return $edit_response;

        }

    }
    // contact list - admin side
    public function contact_list_controller(){

        $list = $this->model->list('guest_contact');
        return $list;
    }
     // contact list - admin side
     public function online_tool_list_controller(){

        $list = $this->model->list('header_footer_section');
        return $list;
    }
    // delete record - admin side
    public function delete_controller($data){

        if(isset($data['id'])){

            $id = (int)$data['id'];

            if(!empty($id) && is_int($id)){

                $where_array = array(
                    "id" => $id,
                );     
            $delete_record = $this->model->delete($where_array, 'guest_contact');
            return $delete_record;

            }

        }

    }
   
}

?>