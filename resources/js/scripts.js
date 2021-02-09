$(document).ready(function () {
    // User edit Ajax
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
    // End of user edit Ajax

    //Request assign room Form

    $('#requestStatus').on('change', function () {
        let hostel = hostel_id;
        let status = this.value;
        if (status === 'approved') {
            $('#request_room_id').html('');
            $.ajax({
                url: "/get-room-by-request",
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                data: {
                    // "_token": "{{ csrf_token() }}",
                    hostel_id: hostel,
                },
                dataType: 'json',
                success: function(result) {
                    $('#requestRoomId').html('' +
                        '<label for="request_room_id">Assign Room</label>' +
                        '<select name="room_id" id="request_room_id" class="form-control" required></select>');
                    $('#request_room_id').html('<option selected disabled value="">Select Room</option>');
                    $.each(result.rooms, function(key, value) {
                        $("#request_room_id").append('<option value="' + value.id + '">' + value.room_number + '</option>');
                    });
                    // $('#city-dropdown').html('<option value="">Select State First</option>');
                }
            });
        }else {
            $('#requestRoomId').html('');
        }
        // console.log(status);
    });


});
