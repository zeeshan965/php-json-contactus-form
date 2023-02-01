<script>
    let rules = {};
    <?php if (isset($formFields) && count($formFields) > 0) { ?>
    rules = {<?php foreach ($formFields as $rule) echo "'" . $rule['name'] . "'" . ': {required: true},'; ?> };
    <?php } ?>

    $(document).ready(function () {
        $('#form').validate({
            rules: rules,
            errorPlacement: function (error, element) {
                if (element.is(":radio") || element.is(":checkbox")) {
                    element.parent().append(error);
                } else {
                    error.insertAfter(element);
                }
            },
            submitHandler: function (form) {
                console.log($(form))
                console.log($(form).serializeToString())
                console.log($(form).serialize())
                $.ajax({
                    url: form.action,
                    type: form.method,
                    data: $(form).serialize(),
                    success: function (response) {
                        const data = JSON.parse(response);
                        console.log(data)
                        if (data.text) {
                            $('#form').find('.text-danger').text(data.text);
                        } else {
                            $('#form').find('.text-danger').text('');
                        }
                        if (data.textarea) {
                            $('#form').find('.text-danger').text(data.textarea);
                        } else {
                            $('#form').find('.text-danger').text('');
                        }
                        if (data.password) {
                            $('#form').find('.text-danger').text(data.password);
                        } else {
                            $('#form').find('.text-danger').text('');
                        }
                        if (data.select) {
                            $('#form').find('.text-danger').text(data.select);
                        } else {
                            $('#form').find('.text-danger').text('');
                        }
                        if (data.radio) {
                            $('#form').find('.text-danger').text(data.radio);
                        } else {
                            $('#form').find('.text-danger').text('');
                        }
                        if (data.checkbox) {
                            $('#form').find('.text-danger').text(data.checkbox);
                        } else {
                            $('#form').find('.text-danger').text('');
                        }
                    }
                });
            }
        });
    });

</script>