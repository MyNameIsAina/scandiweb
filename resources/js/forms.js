
      
                jQuery(document).ready(function(){
                    $('select#type').change(function(){
                        var selOption= $('option:selected').val();
                        if(selOption==""){
                            $('#changeForm').empty();//reseting the form
                        }else if(selOption=="dvd"){
                            $('#furnituretfield').css("display", "none");
                            $('#weightfield').css("display", "none");
                            
                             $('#weidght').prop('required', false);
                             $('#height').prop('required', false);
                             $('#width').prop('required', false);
                             $('#length').prop('required', false);
                            
                             $('#size').prop('required', true);
                            $('#sizefield').css("display", "block");
                        }else if(selOption=="book"){
                            $('#sizefield').css("display", "none");
                             $('#furnituretfield').css("display", "none");
                            
                             $('#height').prop('required', false);
                             $('#width').prop('required', false);
                             $('#length').prop('required', false);
                             $('#size').prop('required', false);
                            
                            $('#weidght').prop('required', true);
                            $('#weightfield').css("display", "block");
                        }else if(selOption=="furniture"){
                            $('#sizefield').css("display", "none");
                            $('#weightfield').css("display", "none");
                            $('#weidght').prop('required', false);
                            $('#size').prop('required', false);
                            
                            $('#height').prop('required', true);
                            $('#width').prop('required', true);
                            $('#length').prop('required', true);
                            $('#furnituretfield').css("display", "block");
                        }
                    });
                });
           
