<?php
if(isset($_POST['add'])){
    $target_path = "assets/";  
    $imageName = $_FILES['photo']['name'];
    $target_path = $target_path.basename($imageName);   

    if(move_uploaded_file($_FILES['photo']['tmp_name'], $target_path)) {  
        $xml = new DOMDocument();
        $xml -> load("dogs.xml");

        $newdog = $xml -> createElement("dog");
        $dogname = $xml -> createElement("name", $_POST['dogname']);
        $dogcontactinfo = $xml -> createElement("contact", $_POST['contact']);
        $dogreward = $xml -> createElement("reward", $_POST['reward']);
        $dogphoto = $xml -> createElement("photo", $imageName);
        
        $newdog -> appendChild($dogname);
        $newdog -> appendChild($dogcontactinfo);
        $newdog -> appendChild($dogreward);
        $newdog -> appendChild($dogphoto);

        // Append new user to the root element
        $xml->getElementsByTagName('dogs')->item(0)->appendChild($newdog);
        
        if($xml -> save("dogs.xml")){
            ?>
                <script>
                    alert("<?php echo "New dog list Successfully added!" ?>");
                    window.location.replace('dashboard.php');
                </script>
            <?php
        }else{
            ?>
                <script>
                    alert("<?php echo "New dog list Failed to add!" ?>");
                    window.location.replace('dashboard.php');
                </script>
            <?php
        }
    } else{  
        echo "Sorry, file not uploaded, please try again!";  
    }
}
