<?php

        $num = 1;
        echo $num;

    echo '<input type="button"
           name="lol" 
           value="Click to increment"
           onclick="Inc()" />
    <br>
    <script>
        function Inc()
        {
            $num =$num+2;
            echo $num;

        }
    </script>';
?>
