<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
          <table>   <!--create table;-->
        <?php for($tr = 1; $tr <= 3; $tr++):?>  <!--set for loop to create 3 table rows;-->
            <tr> 
            <?php for($td = 1; $td <= 3; $td++):?>      <!--set for loop to create 3 cells;-->
                <?php $randColor = '#'.strtoupper(dechex(rand(0x000000, 0xFFFFFF))); ?>     <!-- //sets variable to a random hexidecimal color;-->
                <td style="background-color:<?php echo $randColor; ?>"><?php echo $randColor; ?><br /><span style="color:#ffffff"><?php echo $randColor; ?></span></td> 
                <!--sets background to the random color, then displays the text of said color in both black and white;-->
            <?php endfor; ?>                
            </tr>
        <?php endfor; ?>   <!--end both for loops; -->
        </table>   <!--end table;-->
    </body>
</html>
