<?php 
session_start();
$db=new PDO('mysql:host=localhost;dbname=php','root','');
$reponse=$db->query('select * from Produits');
if(isset($_POST["add"]))
{
    if(isset($_SESSION["cart"]))
    {
        $count=count($_SESSION["cart"]);
        $etim_id=array_column($_SESSION["cart"],product_id);
        if(!in_array($_Get['id'], $etim_id))
        {
            $etim_array = array( 'product_id'=>$_GET['id'] ,
                                'item_name' =>$_POST['hidden-name'],
                                'product_price'=>$_POST['hidden-price'],
                                'item_quantity'=>$_POST['quantity'],

                                );
            $_SESSION["cart"][$count]=$etim_array;
            echo '<script>window.location="index.php"</script>';

        }
        else
           {
            echo '<script> alert("produis is already exist")</script>';
            echo '<script>window.location="index.php"</script>';
          }


    }else
        {
            $etim_array = array( 'product_id'=>$_GET['id'] ,
                                'item_name' =>$_POST['hidden-name'],
                                'product_price'=>$_POST['hidden-price'],
                                'item_quantity'=>$_POST['quantity'],

                                );
            $_SESSION["cart"][0]=$etim_array;
            
        }
}
if(isset($_GET["action"])){
    if($_GET["action"]=="delete"){
        foreach ($_SESSION["cart"] as $key => $value) {

            if($value['product_id']==$_GET['id']){
                unset($_SESSION["car"][$key]);
                echo '<scandir>alert("product has been remove")</script>';
                echo '<script>window.location="index.php"</script>';
            }
        }
    }
}



 ?>
 <!DOCTYPE html>
 <html>
 <head>
    <title>shoping start</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <style type="text/css">
        @import url('https://fonts.googleapis.com/css?family=Titillium+Web');
        *{
            font-family: 'Titillium Web', sans-serif;
        }
        .product{
            border: 1px solid #eaeaec ;
            margin:-1px 19px 3px -1px;
            padding: 10px;
            text-align: center;
            background-color: #efefef; 
              
        

                    }
             .img{
                height: 30%;
                width: 70%;
             }
             table,th,tr{
                text-align: center;
             }
             .title2{
                text-align: center;
                color: #66afe9;
                background-color: #efefef;
                padding: 2%;
             }
             h2{
                text-align: center;
                color: #66afe9;
                background-color: #efefef;
                padding: 2%;

             }
             table th{
                background-color: #efefef;
             }
             .a{
                
                display: flex;
               
             }
             

    </style>
 </head>
 <body>
 <div class="container" style="width:70% ;">
    <h2>shopping cart</h2>
    <div class="a">
     
        <?php 
         
          while($done=$reponse->fetch()){
         ?>
         
         <div class="col-md-3">
            <form   method="post" action="./index.php?action=add&id=<?php echo $done['id'] ?>">
                <div class="product">
                   
                   
                    <img  src="<?php echo($done['image']) ?>" class="img img-responsive"  >
                    <h5 class="text-info"> <?php  echo $done['name'];  ?> </h5>
                    <h5 class="text-danger"><?php echo $done['prix']." \$"; ?> </h5>
                    <input type="text" name="quantity" value="1" class="form-control">
                    <input type="hidden" name="hidden-name" value="<?php echo($done['name']); ?>">
                    <input type="hidden" name="hidden-price" value="<?php echo($done['prix']); ?>">
                    <input type="submit" name="add" value="add to cart" style="margin-top: 5px;" class="btn btn-success" >

                </div>
            </form>
         </div>

        <?php } ?>
    </div>
      
     
     <div style="clear:both;"></div>
     
     <h3 class="title2">shopping cart details</h3>
     <div class="table-responsive">
        <table class="table table-bordered">
        <tr>
            <th width="30%">nom Produit</th>
            <th width="10%">quantité</th>
            <th width="13%">Prix detail</th>
            <th width="10%">Prix total</th>
            <th width="17%">Remove</th>

        </tr>

        <?php 
        if(!empty($_SESSION["cart"])){
            $total=0;
            foreach ($_SESSION["cart"] as $key => $value) {

         ?> 
          
        <tr>
            <td> <?php echo $value['item_name'] ?></td>
            <td> <?php echo  $value['item_quantity'] ?></td>
            <td><?php echo $value['product_price']; ?> $</td>
            <td><?php echo number_format($value['item_quantity']*$value['product_price'],2); ?> $</td>
            <td><a href="./index.php?action=delete&id=<?php echo $value['product_id'] ; ?> " class="text-danger" >remove etim</a></td>
        </tr>
        <?php 
        $total+= $value['item_quantity']*$value['product_price']; 
    }?>
         <tr>
            <td colspan="3" align="center">Total</td>
            <th align="center"><?php echo number_format($total,2); ?> $</th>
            <td></td>
         </tr>
     <?php }
      ?>

     </table>
     </div>
  </div>
  
 </body>
 </html>