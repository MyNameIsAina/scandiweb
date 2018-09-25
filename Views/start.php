<?php
/* @var Controller $this */
$array=BaseObject::readllAll();




?>
<html>
    <head>
        <meta charset="utf-8">
        <title>Scandi</title>
        <link rel="stylesheet" href="../resources/css/productlist.css">
    </head>
    <body>
        <div >
            <div>
              
              <form action="../del" method="post">
                  <div class="header">
                      <div class="title">
                          <h1 class="">Product List</h1>
                      </div>

                       <div class="functionality">
                           <button type="submit" name="deleteMultiple">Delete Selected</button>
                           <a href="../add" >Add a product</a>
                       </div>
                   </div>
                   <div class="products">
                        <?php foreach ($array as $key=> $value):?>
                              <div class="product">
                                  <p class="checkBox">
                                    <input type="checkbox" name="mycheckbox[]" value="<?php echo $value['id']; ?>">
                                  </p>
                                    <div class="productInfo">
                                        <p><?php echo $value['sku']; ?></p>
                                        <p><?php echo $value['name']; ?></p>
                                        <p><?php echo $value['price'];?></p>
                                        <p><?php echo $value['type'];?></p>
                                        <p><?php if($value['type']=="dvd"){echo 'Size: '.$value['option']. ' Mb';}
                                            elseif($value['type']=="book"){echo 'Weight: '.$value['option']. ' Kg';}
                                            elseif($value['type']=="furniture"){echo 'Dimensions:' .$value['option'];}
                                            ?></p>
                                      
                                        
                                    </div>
                                    <p class="productFunc"><a href="../update/<?php echo $value['id'];?>">Update</a></p>
                                    <p class="productFunc"><a href="../del?id=<?php echo $value['id'];?>" value="<?php echo $value['id']; ?>">Delete</a></p>
                              </div>
                          <?php endforeach; ?>
                    </div>
               </form>
            </div>
        </div>
    </body>
</html>
