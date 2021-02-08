$(document).ready(function () {
    $('#user_hostel_id').on('change', function () {
        let hostel_id = this.value;
        $('#user_room_id').html('');
        $.ajax({
            url: "/get-room-by-hostel",
            type: "POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            data: {
                // "_token": "{{ csrf_token() }}",
                hostel_id: hostel_id,
            },
            dataType: 'json',
            success: function(result) {
                $('#user_room_id').html('<option selected disabled value="">Select Room</option>');
                $('#role').append('<option value="manager">Hostel Manager</option>');
                $.each(result.rooms, function(key, value) {
                    $("#user_room_id").append('<option value="' + value.id + '">' + value.room_number + '</option>');
                });
                // $('#city-dropdown').html('<option value="">Select State First</option>');
            }
        });
    })
});
