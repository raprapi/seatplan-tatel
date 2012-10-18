<div class="content_column margin_right_20">
<div class="header_01">View Seatplan</div>

<table border=1>
    <tr>
        <th>Seat #</th>
        <th>Seat Status</th>
        <th>Occupant</th>
    </tr>
<?php
include_once('../../classes/Student.php');
$student = new Student;
    $student_rec = $student->getSeatList();
    
    for($x=0, $y=0;$x<$student->getSize();$x++){
        $z = $x + 1;
        echo "<tr>";
        if($student_rec[$y]['seat'] != $z){
        echo "<td>".$z."</td>";
        echo "<td>Unavailable</td>";
        echo '<td>None</td>';   

        }
        else{
        echo "<td>".$student_rec[$y]['seat']."</td>";
        echo "<td>Seat Taken</td>";
        echo "<td>".$student_rec[$y]['fname'].' '.$student_rec[$y]['lname']."</td>";  
        if($y < count($student_rec) - 1) $y++;
        }
        echo "</tr>";
    }
?>     
    </table>

</div>