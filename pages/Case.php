<?php
$input_class = '';

echo '<form>';
echo '<table>';

        echo '<tr>';
            echo '<td>Tittel :</td>';
            echo '<td>';
                echo '<input class="" type="text" name="Title" />';

            echo '</td>';
        echo '</tr>';
        echo '<tr>';
            echo '<td>Prioritet: </td>';
            echo '<td>';
                echo '<select name="Priority">';
                    echo '<option value="lav">Lav</option>';
                    echo '<option value="normal">Normal</option>';
                    echo '<option value="høy">Høy</option>';
                    echo '<option value="haster">Haster</option>';
                echo '</select>';
            echo '</td>';
        echo '</tr>';

        echo '<tr>';
            echo '<td>Beskrivelse: </td>';
            echo '<td>';
                echo '<textarea rows="10" cols="50" class="" name="Content">';

                echo '</textarea>';

                  echo '</td>';
        echo '</tr>';

        echo '<tr>';
            echo '<td></td>';
            echo '<td>';
                echo '<input name="submit" type="button" Value="Send" />'; 
                echo '</td>';
        echo '</tr>';
    echo '</table>';

echo '</form>';
?>

