<?php


echo '<div>
    <ul class="nav nav-tabs" id="myTab" role="tablist" style="color:black; padding-top: 10px">
        <li class="nav-item">
            <a class="nav-link" ' . ($page == 'prescription.php' ? 'active' : '') . '" href="prescription.php" accesskey="1">1. Prescription</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" ' . ($page == 'ingredients.php' ? 'active' : '') . '" href="ingredients.php" accesskey="2">2. Ingredients</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" ' . ($page == 'misc.php' ? 'active' : '') . '" href="misc.php" accesskey="3">3. Misc</a>
        </li>
        
        <li class="nav-item">
            <a class="nav-link" ' . ($page == 'primary.php' ? 'active' : '') . '" href="primary.php" accesskey="4">4. Primary Claim</a>
        </li>
        
        <li class="nav-item">
            <a class="nav-link" ' . ($page == 'secondary.php' ? 'active' : '') . '" href="secondary.php" accesskey="5">5. Secondary Claim</a>
        </li>
    </ul>
</div>'

    ?>