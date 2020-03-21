<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <style type="text/css">
    .a{
      height: 100px;
      background-color:lavender;
      background-image:url("gaming.gif");
    }
    .a1{
     height: 100px; 
    }
    .b{
      padding-top: 50px;
    }
    .d1{
      width: 150px;
      height:700px;
      background-color: #efefef;
    }
    .d{
      padding: 20px;


    }
    .melieu{
      background-image: url("1.jpg");
    }
    
    h2{
        text-align: center;
        color: #66afe9;
        background-color: #efefef;
        padding: 2%;

       }
    

  </style>
</head>
<body>

<div class="container_build">
  
  <div class="row a" >
        <div class="col spinner-border text-warning"></div>
       <div class="col spinner-border text-primary"></div>
       <div class="col spinner-border text-success"></div>
        <div class="col b" >
                            <a href="./index.php"><button type="button" class="btn btn-primary">Homme</button></a>
                            <a href="#"><button type="button" class="btn btn-secondary">About</button></a>
                            <a href="./produits/registre.php"><button type="button" class="btn btn-success">Regestre</button></a>
                           <a href="./produits/login.php"> <button type="button" class="btn btn-info">Login</button></a>
                          
        </div>
  </div>

  <div class="row">
    <div class="d1 d col-" style="background-color:lavender;"> <br><br><button type="button" class="d btn btn-primary">Panier</button><br><br><a href="./cart/index.php"><button type="button" class="d btn btn-success">Produits</button></a></div>
    <div class="melieu col-xl" style="background-color:orange;">
         <h2>Bienveue dans notre site web e-commerce </h2>
         <!-- <div class="d2"></div>
         <div class="d3"></div>
         <div class="d4"></div> -->

    </div>
    <!-- <div class="d1 col-" style="background-color:lavender;"></div> -->
  </div>   
</div>

</body>
</html>