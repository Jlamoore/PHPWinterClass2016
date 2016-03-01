<?php if(isset($_GET['category'])) { include'../functions/dropdownSearch.php';                      //tests if $_GET has a value for category
$selected = dropdownSearch();}?>                                                                   <!-- //sets selected = to the results of the dropdown function which -->
<form action="#" method="get" >                                                                    <!-- // sets the selected option to selected in the html form-->
    <fieldset>
        <legend>Search</legend>
        <label>Category</label>  
        <select name="category">
            <option value="corp" <?php      if(isset($selected)) {echo $selected[0];} ?>>Corporation Name</option>
            <option value="incorp_dt" <?php if(isset($selected)) {echo $selected[1];} ?>>Incorporation Date</option> <!-- The php here sets the selected value to the previously -->
            <option value="email"<?php      if(isset($selected)) {echo $selected[2];}?> >Email</option>                 <!-- selected value -->
            <option value="zipcode"<?php    if(isset($selected)) {echo $selected[3];}?>>Zipcode</option>
            <option value="owner"<?php      if(isset($selected)) {echo $selected[4];}?>>Owner(s)</option>
            <option value="phone"<?php      if(isset($selected)) {echo $selected[5];}?>>Phone Number</option>
        <input name="searchTerm" type="search" value="<?php if( isset($_GET['searchTerm'])) { echo $_GET['searchTerm'];} ?>"/>
        <!-- Sets the default value of the search bar = to the previously entered term if a term was entered-->
    
         <input type="hidden" name="action" value="Submit2" />
        <input type="submit" value="Submit" />
        
    </fieldset>
</form>

