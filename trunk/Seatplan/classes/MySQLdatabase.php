<?php

class MySQLdatabase{
     
    public function connectDatabase(){
        $link = mysql_connect('localhost', 'root', ''); //CONNECT TO DATABASE
        $db_selected = mysql_select_db('seatplan', $link); //SELECT DATABASE   
    }
}

?>