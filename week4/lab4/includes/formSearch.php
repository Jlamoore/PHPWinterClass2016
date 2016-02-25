<form action="#" method="post">
    <fieldset>
        <legend>Search</legend>
        <label>Category</label>  
        <select name="category">
            <option value="corp">Corporation Name</option>
            <option value="incorp_dt">Incorporation Date</option>
            <option value="email">Email</option>
            <option value="zipcode">Zipcode</option>
            <option value="owner">Owner(s)</option>
            <option value="phone">Phone Number</option>
        </select>
        <input name="category" type="search" placeholder="Search...." />
        <input name="datatwo" value="data2" type="hidden" />
    
         <input type="hidden" name="action" value="Submit2" />
        <input type="submit" value="Submit" />
    </fieldset>            
</form>
