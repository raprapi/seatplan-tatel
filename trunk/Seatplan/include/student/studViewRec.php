<div class="content_column margin_right_20">
<div class="header_01">View Seatplan</div>

<table border=1>
<?php
include_once('../../classes/Student.php');
$student = new Student;
    $stud = $student->getSeatList();
    $size = $student->getSize();
    for($x=0;$x<$size;$x++){
    
        if($x == 0 || $x == 40){
        echo'<tr>';
        echo '<td><center>'.($x + 1).'<br/>'; if($stud[$x]['seat'] != '0') echo '<a href="../../classes/Student.php?request='.$x.'">'.$stud[$x]['fname'].' '.$stud[$x]['lname'].'</a>';
            else echo '<a href="../../classes/Student.php?seatEx='.$x.'">Add Student</a>'; echo '</center></td>'; $x++;
        echo '<td><center>'.($x + 1).'<br/>'; if($stud[$x]['seat'] != '0') echo '<a href="../../classes/Student.php?request='.$x.'">'.$stud[$x]['fname'].' '.$stud[$x]['lname'].'</a>';
            else echo '<a href="../../classes/Student.php?seatEx='.$x.'">Add Student</a>'; echo '</center></td>'; $x++;
        echo '<td style="border-color: transparent;"></td>';
        echo '<td><center>'.($x + 1).'<br/>'; if($stud[$x]['seat'] != '0') echo '<a href="../../classes/Student.php?request='.$x.'">'.$stud[$x]['fname'].' '.$stud[$x]['lname'].'</a>';
            else echo '<a href="../../classes/Student.php?seatEx='.$x.'">Add Student</a>'; echo '</center></td>'; $x++;
        echo '<td><center>'.($x + 1).'<br/>'; if($stud[$x]['seat'] != '0') echo '<a href="../../classes/Student.php?request='.$x.'">'.$stud[$x]['fname'].' '.$stud[$x]['lname'].'</a>';
            else echo '<a href="../../classes/Student.php?seatEx='.$x.'">Add Student</a>'; echo '</center></td>'; $x++;
        echo '<td><center>'.($x + 1).'<br/>'; if($stud[$x]['seat'] != '0') echo '<a href="../../classes/Student.php?request='.$x.'">'.$stud[$x]['fname'].' '.$stud[$x]['lname'].'</a>';
            else echo '<a href="../../classes/Student.php?seatEx='.$x.'">Add Student</a>'; echo '</center></td>';
        echo '</tr>';
        }
        
        else{
        echo'<tr>';
        echo '<td><center>'.($x + 1).'<br/>'; if($stud[$x]['seat'] != '0') echo '<a href="../../classes/Student.php?request='.$x.'">'.$stud[$x]['fname'].' '.$stud[$x]['lname'].'</a>';
            else echo '<a href="../../classes/Student.php?seatEx='.$x.'">Add Student</a>'; echo '</center></td>'; $x++;
        echo '<td><center>'.($x + 1).'<br/>'; if($stud[$x]['seat'] != '0') echo '<a href="../../classes/Student.php?request='.$x.'">'.$stud[$x]['fname'].' '.$stud[$x]['lname'].'</a>';
            else echo '<a href="../../classes/Student.php?seatEx='.$x.'">Add Student</a>'; echo '</center></td>'; $x++;
        echo '<td style="border-color: transparent;"></td>';
        echo '<td><center>'.($x + 1).'<br/>'; if($stud[$x]['seat'] != '0') echo '<a href="../../classes/Student.php?request='.$x.'">'.$stud[$x]['fname'].' '.$stud[$x]['lname'].'</a>';
            else echo '<a href="../../classes/Student.php?seatEx='.$x.'">Add Student</a>'; echo '</center></td>'; $x++;
        echo '<td><center>'.($x + 1).'<br/>'; if($stud[$x]['seat'] != '0') echo '<a href="../../classes/Student.php?request='.$x.'">'.$stud[$x]['fname'].' '.$stud[$x]['lname'].'</a>';
            else echo '<a href="../../classes/Student.php?seatEx='.$x.'">Add Student</a>'; echo '</center></td>'; $x++;
        echo '<td><center>'.($x + 1).'<br/>'; if($stud[$x]['seat'] != '0') echo '<a href="../../classes/Student.php?request='.$x.'">'.$stud[$x]['fname'].' '.$stud[$x]['lname'].'</a>';
            else echo '<a href="../../classes/Student.php?seatEx='.$x.'">Add Student</a>'; echo '</center></td>'; $x++;
        echo '<td style="border-color: transparent;"></td>';
        echo '<td><center>'.($x + 1).'<br/>'; if($stud[$x]['seat'] != '0') echo '<a href="../../classes/Student.php?request='.$x.'">'.$stud[$x]['fname'].' '.$stud[$x]['lname'].'</a>';
            else echo '<a href="../../classes/Student.php?seatEx='.$x.'">Add Student</a>'; echo '</center></td>'; $x++;
        echo '<td><center>'.($x + 1).'<br/>'; if($stud[$x]['seat'] != '0') echo '<a href="../../classes/Student.php?request='.$x.'">'.$stud[$x]['fname'].' '.$stud[$x]['lname'].'</a>';
            else echo '<a href="../../classes/Student.php?seatEx='.$x.'">Add Student</a>'; echo '</center></td>';
        echo '</tr>';
        }
        
        if($x != 44)echo '<tr><td style="border-color: transparent;"></td></tr>
            <tr><td style="border-color: transparent;"></td></tr>';
    }
?>
    </table>
    <?php if($_SESSION['notif'] != 0){
    $idEx = $_SESSION['notif'];
    $name = $student->getName($_SESSION['notif']);    
    ?>
    <h4 style="color: red;">Notification: </h4>
    <form action="../../classes/Student.php?notif=<?php echo $idEx;?>" method="post">
        <p>Student <?php echo $name;?> wants to exchange seat with you. Do you want to exchange seat?</p>
        <input type="submit" value="accept" name="accept"/>
        <input type="submit" value="decline" name="decline"/>
    </form>
    <?php }?>
</div>