<?php function Reset(){                                         //this function tests if the $_GET array has a value for category, if so it sets the $selected array
         if(isset($_GET['category']))                           //to null values except for the first value. This is to set the selection of my html forms to the first option.
{
             $selected[0] = "selected";
             $selected[1] = "";
             $selected[2] = "";
             $selected[3] = "";      
             $selected[4] = "";       
             $selected[5] = "";  
           return $selected;
}
}

