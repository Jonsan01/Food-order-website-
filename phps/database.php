    <?php
    function connectdb()
    {
        // Change The Following Details
        return new mysqli("localhost", "USER NAME", "ENTER DB PASSWORD", "DB NAME");
    }
    ?>