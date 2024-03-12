$(document).ready(function() {
    $('#marital_status').on('change', function() {
        if ($(this).val() === 'Married') {
            $('#wedding_date_container').show();
            $('#wedding_date').attr('required', true);
        } else {
            $('#wedding_date_container').hide();
            $('#wedding_date').removeAttr('required');
        }
    });
    //Create Family Member
    $('#addFamilyMemberForm').validate({
        rules: {
            head_id: 'required',
            name: 'required',
            birthdate: {
                required: true,
                date: true
            },
            marital_status: 'required',
            wedding_date: {
                required: function(element) {
                    return $('#marital_status').val() === 'Married';
                },
                date: true
            },
            education: 'required',
            photo: {
                required: true,
                accept: 'image/jpeg,image/png,image/jpg,image/gif',
                filesize: 2048 // file size of 2MB
            }
        },
        messages: {
            // Add appropriate messages for each field
        },
        errorElement: 'span',
        errorPlacement: function(error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        highlight: function(element, errorClass, validClass) {
            $(element).addClass('is-invalid').removeClass('is-valid');
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).removeClass('is-invalid').addClass('is-valid');
        }
    });    
});