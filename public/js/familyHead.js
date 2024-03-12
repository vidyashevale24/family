$(document).ready(function() {
    $('#createFamilyHeadForm').validate({
        rules: {
            name: 'required',
            surname: 'required',
            birthdate: {
                required: true,
                date: true,
                max: moment().subtract(21, 'years').format('YYYY-MM-DD') 
            },
            mobile_no: 'required',
            address: 'required',
            state: 'required',
            city: 'required',
            pincode: 'required',
            marital_status: 'required',
            wedding_date: {
                required: function(element) {
                    return $('#marital_status').val() === 'Married';
                },
                date: true
            },
            hobbies: 'required',
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

    $('#marital_status').on('change', function() {
        if ($(this).val() === 'Married') {
            $('#wedding_date_container').show();
            $('#wedding_date').attr('required', true);
        } else {
            $('#wedding_date_container').hide();
            $('#wedding_date').removeAttr('required');
        }
    });
   
    $('.family-head').click(function() {
        var familyHeadId = $(this).data('family-head-id');
        
        $.ajax({
            url: '/family-head/' + familyHeadId,
            method: 'GET',
            success: function(response) {
                $('#family-head-details').html(response);
            }
        });
    });
});