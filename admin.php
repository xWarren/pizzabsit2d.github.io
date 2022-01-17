<?php
      $msg = "";
      if(isset($_POST['upload'])) {
        $target = "pizza/".basename($_FILES['image']['name']);

        $db = mysqli_connect("localhost","root", "", "mydb");

        $image = $_FILES['image']['name'];
        $name = $_POST['name'];
        $price  = $_POST['price'];

        $sql = "INSERT INTO pizzamenu (image,name,price) VALUES ('$image','$name','$price')";
        mysqli_query($db,$sql);
        
        if (move_uploaded_file($_FILES['image']['tmp_name'],$target)) {
           $msg = "Image uploaded successfully";
        }else{
           $msg = "There was a problem uploading image";
      }
    }
      ?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <div id="content">
    <?php
        $db = mysqli_connect("localhost","root", "", "mydb");
        $sql = "SELECT * FROM pizzamenu";
        $result = mysqli_query($db,$sql);
          while($row = mysqli_fetch_array($result)){
               echo "<div id='img_div'>";
                  echo "<img src='pizza/".$row['image']."'>";
                  echo "<p>".$row['name']."</p>";
                  echo "<p>".$row['price']."</p>";
              echo "</div>";
     
          }
    
    ?>
     <form method="post" action="admin.php" enctype="multipart/form-data">
        <input type="hidden" name="size" value="1000000">
       <div>
        <input type="file" name="image">
      </div>
      <div>
          <input type="text" name="name" placeholder="Food Name">  
     </div>
       <div>
            <textarea name="price" cols="20" row="4" placeholder="Price"></textarea>
       </div>
      <div>
        <input type="submit" name="upload" value="Upload Image">
    </div>
</form>
</body>
</html>
