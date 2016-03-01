        <?php
        function SearchFunction()                                       
        {
           $db = dbconnect();                                       //connect to database
           $column = filter_input(INPUT_GET, 'category');           //get the Column value
           $searchTerm = filter_input(INPUT_GET, 'searchTerm');     //get the value searched
           $stmt = $db->prepare("SELECT * FROM corps WHERE $column LIKE '%$searchTerm%' ORDER BY $column");     //search the db by finind the search term in the colum selected
                                                                                                                //then order by column
             $results = array();
             if ($stmt->execute() && $stmt->rowCount() > 0) {                                                     // set the results of the search to an array and validate 
                    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);   
                    }
                        return $results;                                                                            //return the results array
             }
         
        