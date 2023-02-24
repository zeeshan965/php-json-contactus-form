<?php if (isset($formFields) && count($formFields) > 0) foreach ($formFields as $formField) { ?>
    <div class="dbox w-100 d-flex align-items-start">
        <div class="icon d-flex align-items-center justify-content-center">
            <span class="<?php echo $formField['fa_class']; ?>"></span>
        </div>
        <div class="text pl-4">
            <p>
                <span><?php echo $formField['label']; ?> Field:</span>
                <span id="<?php echo $formField['name']; ?>"></span>
            </p>
        </div>
    </div>
<?php } ?>


