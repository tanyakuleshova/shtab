<?php
class Join_usController extends Controller
{
    public function __construct($data = array())
    {
        parent::__construct($data);
        $this->model = new Subscribe();
    }

    public function index()
    {
        if((isset($_POST['subscribe_email'])&& $_POST['subscribe_name'] !='') 
            && (isset($_POST['subscribe_email'])&& $_POST['subscribe_email'] !=''))
        { 
            
            if($this->model->get_subscription()){  
                echo "Дані успішно надіслані.";
                exit;
            }
            else
            {
                echo "Помилка. Дані не надіслано.";
                exit;
            }
        }

        if((isset($_POST['joinForm_name'])&& $_POST['joinForm_name'] !='') 
            && (isset($_POST['joinForm_phone'])&& $_POST['joinForm_phone'] !='')
            && (isset($_POST['joinForm_email'])&& $_POST['joinForm_email'] !='')
            && (isset($_POST['joinForm_region'])&& $_POST['joinForm_region'] !=''))
        { 
           
            if($this->model->join_shtab()){  

                if ( 0 < $_FILES['file']['error'] ) {
                    echo 'Error: ' . $_FILES['file']['error'] . '<br>';
                } else {
                    move_uploaded_file($_FILES['file']['tmp_name'], 'img/images' . $_FILES['file']['name']);
                }


                echo "Дані успішно надіслані.";
                exit;
            }
            else
            {
                echo "Помилка. Дані не надіслано.";
                exit;
            }
        }

        if((isset($_POST['corruptionForm_name'])&& $_POST['corruptionForm_name'] !='') 
            && (isset($_POST['corruptionForm_region'])&& $_POST['corruptionForm_region'] !='')
            && (isset($_POST['corruptionForm_phone'])&& $_POST['corruptionForm_phone'] !='')
            && (isset($_POST['corruptionForm_situation'])&& $_POST['corruptionForm_situation'] !='')
            && (isset($_POST['corruptionForm_email'])&& $_POST['corruptionForm_email'] !='')
            && (isset($_POST['corruptionForm_corruptName'])&& $_POST['corruptionForm_corruptName'] !=''))
            
        { 
            if($this->model->disclose_corruption()){  
                echo "Дані успішно надіслані.";
                exit;
            }
            else
            {
                echo "Помилка. Дані не надіслано.";
                exit;
            }
        }
        define('FILE_UPLOADED_PATH', 'img/images/');
        if($_FILES){
        if ( 0 < $_FILES['file']['error'] ) {
            echo 'Error: ' . $_FILES['file']['error'] . '<br>';
        } else {
            move_uploaded_file($_FILES['file']['tmp_name'], FILE_UPLOADED_PATH . $_FILES['file']['name']);
            ?><img src="<?=FILE_UPLOADED_PATH . $_FILES['file']['name']?>"><?php
        }
    }

    }

    function liqpay_form(){
        echo LiqpayForm::getPayForm();
        exit;
    }
}





