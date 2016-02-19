<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
          <table>
        <?php for($tr = 1; $tr <= 3; $tr++):?>
            <tr> 
            <?php for($td = 1; $td <= 3; $td++):?>
                <?php $randColor = '#'.strtoupper(dechex(rand(0x000000, 0xFFFFFF))); ?>
                <td style="background-color:<?php echo $randColor; ?>"><?php echo $randColor; ?><br /><span style="color:#ffffff"><?php echo $randColor; ?></span></td>
            <?php endfor; ?>                
            </tr>
        <?php endfor; ?>
        </table>
    </body>
</html>
