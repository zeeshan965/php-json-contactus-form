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
                $.ajax({
                    url: form.action,
                    type: form.method,
                    data: $(form).serialize(),
                    success: function (response) {
                        $(form).find('.text-danger').text('');
                        const data = JSON.parse(response);
                        console.log(data)
                        if (data.status === 'error') {
                            Object.keys(data.errors).forEach(k => {
                                $('[name="' + k + '"]').parent().find('.text-danger').text(data.errors[k]);
                            });
                        } else {
                            alert(data.status);
                        }
                    }
                });
            }
        });
    });

</script>