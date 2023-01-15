<script>
    $(document).ready(function() {
        submit_login_form();
    });

    function submit_login_form() {
        //===========Login form validation===========
        $('#login_form').validate({
            rules: {
                email: {
                    required: true,
                    email: true
                },
                password: {
                    required: true,
                    minlength: 8
                }
            },
            // Specify validation error messages
            messages: {
                password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 8 characters long"
                },
                email: {
                    required: "Please provide a email",
                    email: "Please enter a valid email address"
                }
            },
            submitHandler: function(form) {

                form.submit();
            }
        });

    }


</script>
