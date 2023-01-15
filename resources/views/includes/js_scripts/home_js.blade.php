<script>
    $(document).ready(function() {

        submit_deposit_form();

        submit_transfer_form();
    });
    var depsoitValidator;
    var transferValidator;

    function submit_deposit_form() {

        //===========Register form validation===========
        depsoitValidator = $('#add_deposit_form').validate({
            rules: {
                amount: {
                    required: true,
                    digits: 255
                },
            },
            // Specify validation error messages
            messages: {
                amount: {
                    required: "Please enter amount which you want to transfer",
                    maxlength: "Your name must be less than 255 characters"
                },

            },
            submitHandler: function(form) {
                swal({
                        title: "Are you sure?",
                        text: "You want to deposit " + $('#amount').val() + " into your account",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Yes, Add it!",
                        cancelButtonText: "Cancel",
                        closeOnConfirm: false,
                        closeOnCancel: false
                    },
                    function(isConfirm) {
                        if (isConfirm) {

                            $('.loading').show();
                            form.submit();
                        } else {
                            swal.close();
                        }
                    });

            }
        });

    }

    function submit_transfer_form() {

        //===========Register form validation===========
        transferValidator = $('#add_transfer_form').validate({
            rules: {
                amount: {
                    required: true,
                    digits: 255
                },
            },
            // Specify validation error messages
            messages: {
                amount: {
                    required: "Please enter amount which you want to transfer"
                },

            },
            submitHandler: function(form) {
                swal({
                        title: "Are you sure?",
                        text: "You want to Transfer " + $('#tamount').val() + " ",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Yes, Transfer it!",
                        cancelButtonText: "Cancel",
                        closeOnConfirm: false,
                        closeOnCancel: false
                    },
                    function(isConfirm) {
                        if (isConfirm) {
                            $('.loading').show();
                            form.submit();
                        } else {
                            swal.close();
                        }
                    });

            }
        });

    }

    function showDepositModal() {
        $('#depositModal').modal('show');
    }

    function closeDepositModal() {
        depsoitValidator.resetForm();
        $('#add_deposit_form').trigger("reset");
        $('#depositModal').modal('hide');
    }

    function showTransferModal() {
        $('#transferModal').modal('show');
    }

    function closeTransferModal() {
        transferValidator.resetForm();
        $('#add_transfer_form').trigger("reset");
        $('.hiddensection').show();
        $('.newsection').remove();
        $('#transferModal').modal('hide');
    }




    function verifyAccount() {

        var bank_id = $('#bank_id').val();
        var account_no = $('#account_number').val();
        if (bank_id != "" && account_no != "") {
            $('.loading').show();
            var url = "{{ route('verify.account') }}";
            $.ajax({
                url: url,
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    bank_id: bank_id,
                    account_no: account_no
                },
                dataType: 'json',
                success: function(response) {
                    if (response.status == 0) {
                        $('.loading').hide();
                        $('.hiddensection').hide();
                        $('#replacement').after(response.data);
                    } else {
                        $('.loading').hide();
                        swal(response.message);
                    }

                },
                error: function(xhr, status, error) {
                    $('.loading').hide();
                    swal("error")
                }
            });
        } else {
            swal("Bank and account number is required");
        }

    }
</script>
