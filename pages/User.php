<?php
$input_class = '';

echo '<form>';

    echo '<table>';
        echo '<tr>';
            echo '<td>';
                echo '<input class="'.$input_class.'" type="text" name="username" placeholder="Username" />';
            echo '</td>';
        echo '</tr>';
        echo '<tr>';
            echo '<td>';
                echo '<input class="'.$input_class.'" type="password" name="password" placeholder="Password" />';
            echo '</td>';
        echo '</tr>';
        echo '<tr>';
            echo '<td>';
                echo '<input class="'.$input_class.'" name="submit" type="button" Value="Send" />';
            echo '</td>';
        echo '</tr>';
    echo '</table>';
echo '</form>';

?>

