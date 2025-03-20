<style>
    .nav-tabs .nav-link {
        color: black;
        font-weight: 600;
        font-size: 12px;
        letter-spacing: 0px;
        transition: all 0.3s ease-in-out;
        padding: 8px 16px;
        border: none;
        text-align: center;
        background: linear-gradient(145deg, rgba(255, 255, 255, 0.2), rgba(255, 255, 255, 0.1));

        /* tabs is overflowing - hiding this css to shrink some tabs */
        /* margin-right: 6px; */
        /* border-radius: 5px; */
        /* box-shadow: 3px 3px 8px rgba(0, 0, 0, 0.4), -3px -3px 8px rgba(255, 255, 255, 0.3); */
        /* text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.6); */
    }

    .nav-tabs .nav-link.active {
        background: linear-gradient(145deg, rgba(255, 255, 255, 0.5), rgba(255, 255, 255, 0.3));
        color: #002244;
        font-weight: bold;
        padding: 8px 16px;
        box-shadow: inset 3px 3px 10px rgba(0, 0, 0, 0.4), inset -3px -3px 10px rgba(255, 255, 255, 0.4);
        border: 1px solid rgba(255, 255, 255, 0.6);
        transform: translateY(-5px);
        /* Moves the active tab 5px higher */
        transition: transform 0.2s ease-in-out;
    }


    .nav-tabs .nav-link:hover {
        background: linear-gradient(145deg, rgba(255, 255, 255, 0.3), rgba(255, 255, 255, 0.2));
        /* transform: translateY(-10px); */
        /* box-shadow: 4px 4px 10px rgba(0, 0, 0, 0.5), -4px -4px 10px rgba(255, 255, 255, 0.4); */
    }

    @media (max-width: 768px) {
        .nav-tabs {
            flex-direction: column;
            align-items: flex-start;
        }

        .nav-tabs .nav-item {
            width: 100%;
            text-align: left;
        }
    }

    .nav-tabs {
        margin-bottom: -19px !important;
        padding-bottom: 0 !important;
        border-bottom: none !important;
    }

    .nav-container {
        margin-bottom: 0 !important;
        padding-bottom: 0 !important;
    }
</style>
<?php

/* try position-absolute */
echo '<div class="list-group">
    <ul class="nav nav-tabs d-flex justify-content-between" id="myTab" role="tablist" style="color:black; padding-top: 10px">
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

        <li class="nav-item">
            <a class="nav-link" ' . ($page == '#' ? 'active' : '') . '" href="#" accesskey="6">6. Documents</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" ' . ($page == '#' ? 'active' : '') . '" href="#" accesskey="7">7. Workflow</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" ' . ($page == '#' ? 'active' : '') . '" href="#" accesskey="8">8. Request(s)</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" ' . ($page == '#' ? 'active' : '') . '" href="#" accesskey="9">9. Custom</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" ' . ($page == '#' ? 'active' : '') . '" href="#" accesskey="10">10. Quality Event</a>
        </li>
    </ul>
</div>'

    ?>