<style>
    .btn-custom {
        background: linear-gradient(to bottom, #b0c4de, #88a3d1);
        border: 1px solid #1d3c6a;
        color: #000;
        font-family: Arial, sans-serif;

        /* padding: 5px 10px; */
        border-radius: 5px;
        text-align: center;
        cursor: pointer;
        box-shadow: inset 0 1px 2px rgba(255, 255, 255, 0.7);
    }

    .btn-custom:hover {
        background: linear-gradient(to bottom, #88a3d1, #b0c4de);
    }

    .height_image_buttons {
        height: 16px;
    }
</style>
<div class="pb-2">
    <div class="d-flex mx-auto">
        <div class="px-1">
            <button type="button" class="btn btn-custom" id="editButton">
                <img src="../assets/images/edit.png" class="height_image_buttons" alt="header button">
            </button>
        </div>
        <div class="px-1">
            <button type="submit" class="btn btn-custom" id="saveButton">
                <img src="../assets/images/save.png" class="height_image_buttons" alt="header button">
            </button>
        </div>
        <div class="px-1">
            <button type="button" class="btn btn-custom" id="">
                <img src="../assets/images/undo.png" class="height_image_buttons" alt="header button">
            </button>
        </div>
        <div class="px-1">
            <button type="button" class="btn btn-custom" id="">
                <img src="../assets/images/show.png" class="height_image_buttons" alt="header button">
            </button>
        </div>
    </div>
</div>