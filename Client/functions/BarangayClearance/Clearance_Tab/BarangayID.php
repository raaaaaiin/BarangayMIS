
<div class="frmbld-form-step-1 active">
<div class="frgp">
        <label class="ctrl-label cls-2" for="Grantedto">Name</label>
        <div class="cls-10">
            <input type="text" id="Grantedto" name="Grantedto" hidden="" value="<?php echo $_SESSION['user_info']['lastname'] . " " . $_SESSION['user_info']['firstname'] . " " . $_SESSION['user_info']['middlename'] ?>">
            <textarea id="GrantedtoTA" name="Grantedto" required="" class="form-ctrl" rows="1" readonly><?php echo $_SESSION['user_info']['lastname'] . " " . $_SESSION['user_info']['firstname'] . " " . $_SESSION['user_info']['middlename'] ?></textarea>
        </div>
    </div>
    <div class="frgp">
        <label class="ctrl-label cls-2" for="Purpose">Address</label>
        <div class="cls-10">
            <textarea id="Purpose" name="Purpose" required="" class="form-ctrl" rows="1"></textarea>
        </div>
    </div>
    <div class="frmbld-input-flex">
    <div class="frgp">
        <label class="ctrl-label cls-2" for="Addresss">Birth Date</label>
        <div class="cls-10">
            <input type="text" id="Addresss" name="Addresss" hidden="">
            <textarea id="Addresss" name="Addresss" required="" class="form-ctrl" rows="1"></textarea>
        </div>
    </div>
    <div class="frgp">
        <label class="ctrl-label cls-2" for="Purpose">Voters Pricint #</label>
        <div class="cls-10">
            <textarea id="Purpose" name="Purpose" required="" class="form-ctrl" rows="1"></textarea>
        </div>
    </div>
</div>
<div class="frgp">
        <label class="ctrl-label cls-2" for="Purpose">Philhealth / SSS Number</label>
        <div class="cls-10">
            <textarea id="Purpose" name="Purpose" required="" class="form-ctrl" rows="1"></textarea>
        </div>
    </div>
    <div class="frgp">
        <label class="ctrl-label cls-2" for="Purpose">Contact Person</label>
        <div class="cls-10">
            <textarea id="Purpose" name="Purpose" required="" class="form-ctrl" rows="1"></textarea>
        </div>
    </div>
    <div class="frgp">
        <label class="ctrl-label cls-2" for="Purpose">Contact Number</label>
        <div class="cls-10">
            <textarea id="Purpose" name="Purpose" required="" class="form-ctrl" rows="1"></textarea>
        </div>
    </div>
    
</div>