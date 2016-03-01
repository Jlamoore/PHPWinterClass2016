<?php if(isset($_GET['category'])) { include'../functions/dropdownSort.php';            //tests if $_GET has a value for category
$selected = dropdownSort();}?>                                                          <!-- //sets selected = to the results of the dropdown function which -->
<form action="#" method="get">                                                           <!-- // sets the selected option to selected in the html form-->
    <fieldset>
        <legend>Sort</legend>
        <label>Order by:</label>  
        <input type="radio" name="order" value="ASC" checked /> Ascending
        <input type="radio" name="order" value="DESC" /> Descending
        <div></div>
        <label>Category</label>  
        <select name="category">
            <option value="corp" <?php      if(isset($selected)) {echo $selected[0];} ?>>Corporation Name</option>
            <option value="incorp_dt" <?php if(isset($selected)) {echo $selected[1];} ?>>Incorporation Date</option> <!-- The php here sets the selected value to the previously -->
            <option value="email"<?php      if(isset($selected)) {echo $selected[2];}?> >Email</option>     <!-- selected value -->
            <option value="zipcode"<?php    if(isset($selected)) {echo $selected[3];}?>>Zipcode</option>
            <option value="owner"<?php      if(isset($selected)) {echo $selected[4];}?>>Owner(s)</option>
            <option value="phone"<?php      if(isset($selected)) {echo $selected[5];}?>>Phone Number</option>
        </select>  
        <input type="hidden" name="action" value="Submit1" />
        <input type="submit" value="Submit" />
    </fieldset>    
</form> 

