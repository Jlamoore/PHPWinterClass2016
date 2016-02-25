<form action="#" method="post">
    <fieldset>
        <legend>Sort</legend>
        
        <label>Order by:</label>  
        <input type="radio" name="order" value="ASC" /> Ascending
        <input type="radio" name="order" value="DESC" /> Descending
        <div></div>
        <label>Category</label>  
        <select name="category">
            <option value="corp">Corporation Name</option>
            <option value="incorp_dt">Incorporation Date</option>
            <option value="email">Email</option>
            <option value="zipcode">Zipcode</option>
            <option value="owner">Owner(s)</option>
            <option value="phone">Phone Number</option>
        </select>
        <input type="hidden" name="action" value="Submit1" />
        <input type="submit" value="Submit" />
    </fieldset>    
</form>