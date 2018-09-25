<?php
/* @var Controller $this */
$page=$_SERVER['REQUEST_URI'];
$uriSegments=explode('/', parse_url($page, PHP_URL_PATH));
if (isset($uriSegments[2])) {
     $id=$uriSegments[2];
     $product =  $this->productRI->selectById($id);
}
?>
<html>
    <head>
        <title>Update Product</title>
        <link rel="stylesheet" href="../resources/css/addproduct.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="../resources/js/forms.js"></script>
    <script>$(function (){$("select#type").change(); });</script>
    </head>
    <body>
        <?php foreach ($product as $value):?>
         <form action="/update/<?php echo $id;?>" method="post">
         <div class="header">
                <div class="title">
                      <h1 class="">Update Product </h1>
                      <h2 ><?php echo $value[$this->sku]; ?>
                      <input type="hidden" name="<?php echo $this->sku; ?>" id="sku" value="<?php echo $value[$this->sku]; ?>">
                      </h2>
                </div>
                <div class="functionality">
                      <button type="submit" class="btn btn-default" name="updateProduct" id="updateProduct">Save</button>
                </div>
            </div>
            <div class="form">
          <table>
             <tr>
                <td colspan="2">&nbsp;<?php $this->messages()?></td>
            </tr>
            <tr>
                <td><label for="<?php echo $this->name; ?>">Name </label></td>
                <td><input type="text" name="<?php echo $this->name; ?>" class="form-control" id="<?php echo $this->name; ?>" value="<?php echo $value[$this->name]; ?>" required></td>
            </tr>
            <tr>
                <td colspan="2">&nbsp;<?php //potential call for error messages ?></td>
            </tr>
            <tr>
                <td><label for="<?php echo $this->price; ?>">Price </label></td>
                <td><input type="text" name="<?php echo $this->price; ?>" class="form-control" id="<?php echo $this->price; ?>" value="<?php echo $value[$this->price];?>" required></td>
            </tr>
            <tr>
                <td colspan="2">&nbsp;<?php //potential call for error messages ?></td>
            </tr>
            <tr>
                <td><label for="<?php echo $this->type; ?>">Select type</label></td>
                <td>
                   <select name="<?php echo $this->type; ?>" id="<?php echo $this->type; ?>">
                        <option value="<?php echo $this->types['dvd']?>" <?php if($value[$this->type]==$this->types['dvd']) echo 'selected'; ?>>DVD-disc</option>
                        <option value="<?php echo $this->types['book']?>" <?php if($value[$this->type]==$this->types['book']) echo 'selected'; ?>>Book</option>
                        <option value="<?php echo $this->types['furniture']?>" <?php if($value[$this->type]==$this->types['furniture']) echo 'selected'; ?>>Furniture</option>
                    </select>
                </td>
            </tr>
          </table>
           <div class="" id="changeForm">
                  <div class="Formdisplay" id="sizefield">
                          <p><?php //potential call for error messages ?></p>
                          <label for="<?php echo $this->types['dvd']?>" >Book weight </label>
                          <input type="text" name="<?php echo $this->types['dvd']?>" class="form-control" id="size" placeholder="Size " value="<?php echo $value['option']; ?>" required>
                      </div>
                      <div class="Formdisplay" id="weightfield">
                          <p><?php //potential call for error messages ?></p>
                          <label for="<?php echo $this->types['book']?>" >DVD Size </label>
                          <input type="text" name="<?php echo $this->types['book']?>" class="form-control" id="weidght" placeholder="Book weigth " value="<?php echo $value['option']; ?>" required> 
                      </div>
                  <?php 
                        $height="";
                        $width="";
                        $length="";
                        if(isset($value[$this->type])){
                               if($value[$this->type]==$this->types['furniture']){
                                     $seperator="x";
                                     $dimensions= explode($seperator, $value['option']);
                                     $this->height=$dimensions[0];
                                     $this->width=$dimensions[1];
                                     $this->length=$dimensions[2];
                                }else{
                                    $this->height="";
                                    $this->width="";
                                    $this->length="";
                                } 
                        }
                   ?>
                   <div class="Formdisplay" id="furnituretfield">
                      <div class="form-group">
                       <p><?php //potential call for error messages ?></p>
                        <label for="<?php echo $this->furnitureVal['fheight']?>" >Furniture Height </label>
                        <input type="text" name="<?php echo $this->furnitureVal['fheight']?>" class="form-control" id="height" placeholder="Heigth " value="<?php echo $this->height ?>" required>
                      </div>
                        <div class="form-group">
                        <p><?php //potential call for error messages ?></p>
                        <label for="<?php echo $this->furnitureVal['fwidth']?>" >Furniture width </label>
                        <input type="text" name="<?php echo $this->furnitureVal['fwidth']?>" class="form-control" id="width" placeholder="Width " value="<?php echo $this->width ?>" required>
                      </div>
                      <div class="form-group">
                       <p><?php //potential call for error messages ?></p>
                        <label for="<?php echo $this->furnitureVal['flength']?>" >Furniture length </label>
                        <input type="text" name="<?php echo $this->furnitureVal['flength']?>" class="form-control" id="length" placeholder="Length " value="<?php echo $this->length ?>" required>
                      </div>
                   </div>
            </div>
             </div>
        </form>
        <?php endforeach; ?>
    </body>
</html>
