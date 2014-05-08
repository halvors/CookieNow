<?php
$input_class = '';


?>

echo '<form>';
echo '<table>';

        echo '<tr>';
            echo '<td>Tittel :</td>';
            echo '<td>';
                echo '<input class="" type="text" name="Title" />';

            echo '</td>';
        echo '</tr>';
        <tr>
            <td>Prioritet: </td>
            <td>
                <select name="Priority">
                    <option value="lav">Lav</option>
                    <option value="normal">Normal</option>
                    <option value="høy">Høy</option>
                    <option value="haster">Haster</option>
                </select>
            </td>
        </tr>

        <tr>
            <td>Beskrivelse: </td>
            <td><textarea rows="10" cols="50" class="" name="Content">

                </textarea></td>
        </tr>

        <!--Button-->
        <tr>
            <td></td>
            <td><input name="submit" type="button" Value="Send" /></td>
        </tr>
    </table>

</form>