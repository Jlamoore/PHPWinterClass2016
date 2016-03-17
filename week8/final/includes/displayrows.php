
<table class="table table-striped">
            <th>Full Name</th>
            <th>delete</th>         <!-- this is an html template to display the sorted or searched results
                                         uses php to pull the required fields . -->
            <th>read</th>
            <th>update</th>
                <?php
                foreach ($sortSearchResults as $row) {
                    ?>
            <tr><td> <?php echo $row['fullname']; ?></td> <td><a href="./includes/delete.php?id=<?php echo $row['address_id'];?>">Delete</a></td>
                <td><a href="./includes/read.php?id=<?php echo $row['address_id'];?>">Read</a></td>
                <td><a href="./includes/update.php?id=<?php echo $row['address_id'];?>">Update</a></td></tr>
                    <?php
                }
                ?>
            </table>