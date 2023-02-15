<?php 
    include("config.php");

    if (isset($_POST['submit'])) 
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $country_name = $_POST['country_name'];
        $state_name = $_POST['state_name'];
        $city_name = $_POST['city_name'];
        $contact = $_POST['contact'];
        
        if($_FILES['image']['size'] == 0)
        {
            $image = '';
        }
        else{
            if(is_uploaded_file($_FILES['image']['tmp_name']))
            {
                $allowed = array('png','jpg','jpeg','pdf');
                $filename = $_FILES['image']['name'];
                $ext = pathinfo($filename,PATHINFO_EXTENSION);
                if(in_array($ext,$allowed))
                {
                    $tmp_name = $_FILES['image']['tmp_name'];
                    if($ext == 'pdf')
                    {
                        $image_url = chunk_split(base64_encode(file_get_contents($tmp_name)));
                        $image_url = 'data:application/' . $ext . ';base64,' . ($image_url);
                    }else{
                        $image_url=(file_get_contents($tmp_name));
                        $image_url = 'data:image/' . $ext . ';base64,' . base64_encode($image_url);
                    }
                    $image = $image_url;
                }
                else{
                    $return['status'] = '0';
                    $return['message'] = 'File upload failed';
                }
            }
        }
        
        date_default_timezone_set("Asia/Calcutta");
        $created_at = date("Y-m-d H:i:s");
        $insertquery =" INSERT INTO details(name,email,country_name,state_name,city_name,contact,image,created_at)value('$name','$email','$country_name','$state_name','$city_name','$contact','$image','$created_at')";
        $query = mysqli_query($conn,$insertquery);
        mysqli_close($conn);
        header('location:create_add_details_view.php');
        exit();
    }
    
?>
