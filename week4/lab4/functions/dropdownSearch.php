         <?php function dropdownSearch(){               //this function tests if $_GET has a value for category, and if so enters a switch case
         if(isset($_GET['category']))
{                                                           //the entire switch case checks the value of $ category and selects that position in the 
    $category = $_GET['category'];                          //$selected array. This is to keep the user selected category selected after submission of the form
     switch ($category){                                    //it then returns the array $selected to the html form
         case "incorp_dt":
             
             $selected[1] = "selected";
             $selected[0] = "";
             $selected[2] = "";
             $selected[3] = "";      
             $selected[4] = "";       
             $selected[5] = "";       
             break;
         case "email":
            
             $selected[2] = "selected";
             $selected[0] = "";
             $selected[1] = "";
             $selected[3] = "";      
             $selected[4] = "";       
             $selected[5] = ""; 
             break;
         case "zipcode":
           
             $selected[3] = "selected";
             $selected[0] = "";
             $selected[2] = "";
             $selected[1] = "";      
             $selected[4] = "";       
             $selected[5] = ""; 
             break;
         case "owner":
          
             $selected[4] = "selected";
             $selected[0] = "";
             $selected[2] = "";
             $selected[3] = "";      
             $selected[1] = "";       
             $selected[5] = ""; 
             break;
         case "phone":
          
             $selected[5] = "selected";
             $selected[0] = "";
             $selected[2] = "";
             $selected[3] = "";      
             $selected[4] = "";       
             $selected[1] = ""; 
             break;
         default:
           
             $selected[0] = "selected";
             $selected[1] = "";
             $selected[2] = "";
             $selected[3] = "";      
             $selected[4] = "";       
             $selected[5] = ""; 
             break;
     }
     return $selected;
            
}

         }