<form action="" method="post" id="form">
    <?php if (isset($formFields) && count($formFields) > 0) foreach ($formFields as $formField) { ?>
        <div class="form-group <?php echo !$formField['file_read_permission'] ? 'hide' : ''; ?>">
            <label><?php echo $formField['label']; ?></label>
            <?php if (isset($formField['subtype']) && $formField['subtype'] == 'textarea') { ?>
                <textarea name="<?php echo $formField['name']; ?>"
                          class="form-control" <?php echo !$formField['file_write_permission'] ? 'readonly' : ''; ?>
                          ><?php echo $formField['default']; ?></textarea>
            <?php } elseif ($formField['type'] == 'select') { ?>
                <select name="<?php echo $formField['name']; ?>"
                        class="form-control" <?php echo !$formField['file_write_permission'] ? 'disabled' : ''; ?>
                >
                    <option value="">Select option</option>
                    <?php if (isset($formField['values']) && count($formField['values']) > 0) { ?>
                        <?php foreach ($formField['values'] as $item) { ?>
                            <option value="<?php echo $item['value']; ?>"
                                <?php if ($item['selected']) { ?> selected <?php } ?> ><?php echo $item['label']; ?></option>
                        <?php } ?>
                    <?php } ?>
                </select>
            <?php } elseif ($formField['type'] == 'radio-group') { ?>
                <?php if (isset($formField['values']) && count($formField['values']) > 0) { ?>
                    <?php foreach ($formField['values'] as $option) { ?>
                        <div>
                            <input type="radio" name="<?php echo $formField['name']; ?>"
                                   value="<?php echo $option['value']; ?>"
                                <?php if ($option['selected']) { ?> checked <?php } ?> />
                            <?php echo $option['label']; ?>
                        </div>

                    <?php } ?>
                <?php } ?>
            <?php } elseif ($formField['type'] == 'checkbox-group') { ?>
                <?php if (isset($formField['values']) && count($formField['values']) > 0) { ?>
                    <?php foreach ($formField['values'] as $checkbox) { ?>
                        <div>
                            <input type="checkbox" name="<?php echo $formField['name']; ?>"
                                   value="<?php echo $checkbox['value']; ?>"
                                <?php if ($checkbox['selected']) { ?> checked <?php } ?> />
                            <?php echo $checkbox['label']; ?>
                        </div>
                    <?php } ?>
                <?php } ?>
            <?php } else { ?>
                <input type="<?php echo $formField['subtype']; ?>" name="<?php echo $formField['name']; ?>"
                       value="<?php echo $formField['default']; ?>"
                    <?php echo !$formField['file_write_permission'] ? 'readonly' : ''; ?> class="form-control"/>
            <?php } ?>
        </div>
    <?php } ?>
    <input type="submit" value="Submit" class="btn btn-primary"/>
</form>
