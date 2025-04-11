<!-- Header Patient Info -->
<?php include 'header.php'; ?>

<!-- Ingredients Block Section -->
<div class="rounded-lg border border-dark">
    <div class="rounded-md border border-dark m-2">
        <div class="height d-flex overflow-auto">
            <div class="py-2 text-center border-right border-light">
                <label for="">NDC</label>
                <input class="input-field" type="text" value="123456789">
            </div>
            <div class="py-2 text-center border-right border-light">
                <label for="">Description</label>
                <input class="input-field" type="text" value="123456789">
            </div>
            <div class="py-2 text-center border-right border-light">
                <label for="">TEE</label>
                <input class="input-field" type="text" value="123456789">
            </div>
            <div class="py-2 text-center border-right border-light">
                <label for="">QTY</label>
                <input class="input-field" type="text" value="123456789">
            </div>
            <div class="py-2 text-center border-right border-light">
                <label for="">Units</label>
                <input class="input-field" type="text" value="123456789">
            </div>
            <div class="py-2 text-center border-right border-light">
                <label for="">mEq/Bag</label>
                <input class="input-field" type="text" value="123456789">
            </div>
            <div class="py-2 text-center border-right border-light">
                <label for="">mEq/mL</label>
                <input class="input-field" type="text" value="123456789">
            </div>
            <div class="py-2 text-center border-right border-light">
                <label for="">Zone/Bin Location</label>
                <div class="d-flex">
                    <select class="form-select" name="suffixname" aria-label="Name Extension">
                        <option selected></option>
                        <option>EKIT | DEFAULT</option>
                        <option>REPACK | DEFAULT</option>
                        <option>DEFAULT | DEFAULT</option>
                    </select>
                </div>
                <!-- <div class="btn-group">
                    <input type="text" value="DEFAULT / DEFAULT">
                    <button type="button" class="btn btn-sm btn-secondary dropdown-toggle dropdown-toggle-split"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu">
                        <div class="relative"><input type="button" value="EKIT"><label for="">DEFAULT</label></div>
                        <div><input type="button" value="REPACK"><label for="">DEFAULT</label></div>
                        <div><input type="button" value="DEFAULT"><label for="">DEFAULT</label></div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</div>

<!-- Tab -->
<?php include 'footer-tab.php'; ?>