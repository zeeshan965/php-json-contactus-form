<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    let rules = {};
    <?php if (isset($formFields) && count($formFields) > 0) { ?>
    rules = {<?php foreach ($formFields as $rule) echo "'" . $rule['name'] . "'" . ': {required: true},'; ?> };
    <?php } ?>

    <?php if (isset($formFields) && count($formFields) > 0) { foreach ($formFields as $rule) { ?>
    $('#<?php echo $rule['name'];?>').text($("[name='<?php echo $rule['name'];?>']").val());
    <?php } } ?>


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
                showLoader();
                $.ajax({
                    url: form.action,
                    type: form.method,
                    data: $(form).serialize(),
                    success: function (response) {
                        $(form).find('.text-danger').text('');
                        const data = JSON.parse(response);
                        console.log(data)
                        if (data.status === 'error') {
                            showErrorAlert();
                            Object.keys(data.errors).forEach(k => {
                                const elem = $('[name="' + k + '"]').parent();
                                if (elem.find('.text-danger').length === 1) {
                                    elem.find('.text-danger').text(data.errors[k])
                                } else {
                                    elem.append('<span class="text-danger">' + data.errors[k] + '</span>');
                                }

                            });
                        } else {
                            showSuccessAlert();
                        }
                        hideLoader();
                    }
                });
            }
        });
    });

    (function () {
        $(document).on("keyup keypress blur change", "input, textarea", (e) => {
            const id = $(e.target).attr('name');
            $('#' + id).text($(e.target).val());
        });
    })();

    function showLoader() {
        $('.loader-wrapper').show();
    }

    function hideLoader() {
        $('.loader-wrapper').hide();
    }

    function showSuccessAlert() {
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: 'Data has been updated successfully!'
        }).then((res) => {
            location.reload();
        })
    }

    function showErrorAlert() {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Something went wrong!'
        })
    }
</script>