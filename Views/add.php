<?php
/* @var Controller $this */
?>
<html>
    <head>
        <title>Add Product</title>
        <link rel="stylesheet" href="../resources/css/addproduct.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="../resources/js/forms.js"></script>
    <?php
        if(isset($_POST['type'])){
            echo ' <script>$(function (){$("select#type").change();});</script>';
        }
    ?>
    </head>
    <body>
        <form action="/add" method="post">
            <div class="header">
                <div class="title">
                      <h1 class="">Add Product</h1>
                </div>
                <div class="functionality">
                      <button type="submit" class="btn btn-default" name="addProduct" id="addProduct">Save</button>
                </div>
            </div>
            <div class="form">
                  <table>
                      <tr>
                          <td colspan="2">&nbsp;<?php $this->messages()?></td>
                      </tr>
                      <tr>
                          <td><label for="<?php echo $this->sku?>">Sku </label></td>
                          <td><input type="text" name="<?php echo $this->sku?>" class="form-control" id="<?php echo $this->sku?>" placeholder="Sku" value="<?php echo isset($_POST[$this->sku]) ? $_POST[$this->sku] : ''; ?>" required></td>
                      </tr>
                      <tr>
                          <td colspan="2">&nbsp;<?php //potential call for error messages ?></td>
                      </tr>
                      <tr>
                          <td><label for="<?php echo $this->name?>">Name </label></td>
                          <td><input type="text" name="<?php echo $this->name?>" class="form-control" id="<?php echo $this->name?>" placeholder="Name" value="<?php echo isset($_POST[$this->name]) ? $_POST[$this->name] : ''; ?>" required></td>
                      </tr>
                      <tr>
                          <td colspan="2">&nbsp;<?php //potential call for error messages ?></td>
                      </tr>
                      <tr>
                          <td><label for="<?php echo $this->price?>">Price </label></td>
                          <td><input type="text" name="<?php echo $this->price?>" class="form-control" id="<?php echo $this->price?>" placeholder="Price" value="<?php echo isset($_POST[$this->price]) ? $_POST[$this->price] : ''; ?>"required></td>
                      </tr>
                      <tr>
                          <td colspan="2">&nbsp;<?php //potential call for error messages ?></td>
                      </tr>
                      <tr>
                          <td> <label for="<?php echo $this->type?>">Select type</label></td>
                          <td>
                              <select name="<?php echo $this->type?>" id="<?php echo $this->type?>" required>
                                   <option disabled selected value></option>
                                    <option value="<?php echo $this->types['dvd']?>" <?php  if(isset($_POST[$this->type])){if($_POST[$this->type]==$this->types['dvd']) echo 'selected';} ?>>DVD-disc</option>
                                    <option value="<?php echo $this->types['book']?>" <?php if(isset($_POST[$this->type])){if($_POST[$this->type]==$this->types['book']) echo 'selected';} ?>>Book</option>
                                    <option value="<?php echo $this->types['furniture']?>" <?php if(isset($_POST[$this->type])){if($_POST[$this->type]==$this->types['furniture']) echo 'selected';} ?>>Furniture</option>
                             </select>
                          </td>
                      </tr>
                  </table>
                  <div id="changeForm">
                      <div class="Formdisplay" id="sizefield">
                          <p><?php //potential call for error messages ?></p>
                          <label for="<?php echo $this->types['dvd']?>" >DVD Size </label>
                          <input type="text" name="<?php echo $this->types['dvd']?>" class="form-control" id="size" placeholder="Size " value="<?php echo isset($_POST[$this->type]) ? $_POST[$this->types['dvd']] : ''; ?>" required>
                      </div>
                      
                      <div class="Formdisplay" id="weightfield">
                          <p><?php //potential call for error messages ?></p>
                          <label for="<?php echo $this->types['book']?>" >Book weight </label>
                          <input type="text" name="<?php echo $this->types['book']?>" class="form-control" id="weidght" placeholder="Book weigth " value="<?php echo isset($_POST[$this->type]) ? $_POST[$this->types['book']] : ''; ?>" required> 
                           
                      </div>
<!--                       < ? php $this->furnitureExpand(); ? >-->
                        <div class="Formdisplay" id="furnituretfield">
                           <div>
                               <p><?php //potential call for error messages ?></p>
                               <label for="<?php echo $this->furnitureVal['fheight']?>" >Furniture Height </label>
                               <input type="text" name="<?php echo $this->furnitureVal['fheight']?>" class="form-control" id="height" placeholder="Heigth " value="<?php if(isset($_POST[$this->furnitureVal['fheight']])){echo $_POST[$this->furnitureVal['fheight']]; }?>" required>
                           </div>
                            <div>
                               <p><?php //potential call for error messages ?></p>
                               <label for="<?php echo $this->furnitureVal['fwidth']?>" >Furniture width </label>
                               <input type="text" name="<?php echo $this->furnitureVal['fwidth']?>" class="form-control" id="width" placeholder="Width " value="<?php if(isset($_POST[$this->furnitureVal['fwidth']])){echo $_POST[$this->furnitureVal['fwidth']]; }?>" required>
                             </div>
                             <div>
                               <p><?php //potential call for error messages ?></p>
                               <label for="<?php echo $this->furnitureVal['flength']?>" >Furniture length </label>
                               <input type="text" name="<?php echo $this->furnitureVal['flength']?>" class="form-control" id="length" placeholder="Length " value="<?php if(isset($_POST[$this->furnitureVal['flength']])){echo $_POST[$this->furnitureVal['flength']]; } ?>" required>
                            </div>
                        </div>
                    </div>
            </div>
        </form>
    </body>
</html>


