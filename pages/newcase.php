<?php
echo '<table>';
	echo '<form action="scripts/process_case.php?action=1&returnPage=mycases" method="post">';
        echo '<tr>';
            echo '<td>Tittel :</td>';
            echo '<td>';
                echo '<input class="" type="text" name="title" />';
            echo '</td>';
        echo '</tr>';
        echo '<tr>';
            echo '<td>Prioritet: </td>';
            echo '<td>';
                echo '<select name="priority">';
                    echo '<option value="1">Lav</option>';
                    echo '<option value="2">Normal</option>';
                    echo '<option value="3">Høy</option>';
                    echo '<option value="4">Haster</option>';
                echo '</select>';
            echo '</td>';
        echo '</tr>';
        echo '<tr>';
            echo '<td>Beskrivelse: </td>';
            echo '<td>';
                echo '<textarea rows="10" cols="50" class="" name="content">';
                echo '</textarea>';
            echo '</td>';
        echo '</tr>';
        echo '<tr>';
            echo '<td></td>';
            echo '<td>';
                echo '<input type="submit" value="Send inn">';
            echo '</td>';
        echo '</tr>';
	echo '</form>';
echo '</table>';
?>

