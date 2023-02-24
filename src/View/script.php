<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>

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
                    element.parent().parent().append(error);
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
                                if ($('[name="' + k + '"]').parent().find('.text-danger').length === 1) {
                                    $('[name="' + k + '"]').parent().find('.text-danger').text(data.errors[k])
                                } else {
                                    $('[name="' + k + '"]').parent().append('<span class="text-danger">' + data.errors[k] + '</span>');
                                }

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