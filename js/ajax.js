$(document).ready(function () {

    //Get Data
    function loadData(page_id) {
        $.ajax({
            type: "POST",
            url: "pagination.php",
            data: {page_id: page_id},
            success: function (data) {
                $('#table-data').html(data);
            }
        });
    }
    loadData();

    //pagination Code
    $(document).on('click', '.pagination a', function(e){
        e.preventDefault();

        var page_id = $(this).attr('id');

        loadData(page_id);
    });

    //Save Data

    $('#btn-save').click(function () {
        var fname = $('#fname').val();
        var city = $('#city').val();
        var age = $('#age').val();

        //Check Is Value null 
        if (fname == "" || city == "" || age == "") {
            $('.error-msg').slideDown().html("All field are required");
            $('.success-msg').slideUp();
        } else {
            $.ajax({
                url: "ajax-insert.php",
                type: "POST",
                data: {
                    name: fname,
                    city: city,
                    age: age
                },
                success: function (response) {
                    if (response == 1) {
                        loadData();
                        $('#fname').val("");
                        $('#city').val("");
                        $('#age').val("");

                        $('.error-msg').slideUp("slow");
                        $('.success-msg').html("Recored Save sucessfuly").slideDown('slow');
                    } else {
                        $('.error-msg').slideDown().html("Can't insert Data");
                        $('.success-msg').slideUp();
                    }
                }
            });
        }
    });

    //Edit data
    $(document).on('click', '#btn-edit', function () {

        $('#modal').show();
        var std_id = $(this).val();

        $.ajax({
            type: "POST",
            url: "ajax-edit.php",
            data: { id: std_id },
            success: function (data) {
                $('.modal-form table').html(data);
            }
        });
    });

    //Close edit modal 
    $('.close-btn').click(function () {
        $('#modal').hide();
    });

    //Save edit form

    $(document).on('click', '#edit-submit', function () {
        var id = $('#edit-id').val();
        var fname = $('#edit-fname').val();
        var city = $('#edit-city').val();
        var age = $('#edit-age').val();

        $.ajax({
            type: "POST",
            url: "ajax-update.php",
            data: { id: id, name: fname, city: city, age: age },
            success: function (response) {
                if (response == 1) {
                    $('#modal').hide()
                    loadData();
                }
            }
        });
    });

    //Delete data

    $(document).on('click', '#btn-delete', function () {

        var std_id = $(this).val();
        var element = this;

        $.ajax({
            type: "POST",
            url: "ajax-delete.php",
            data: { id: std_id },
            success: function (response) {
                if (response == 1) {
                    $(element).closest('tr').fadeOut();
                    console.log(data);
                }
            }
        });
    });

    //live search 
    $('#search').on('keyup', function () {
        var search_term = $(this).val();

        $.ajax({
            type: "POST",
            url: "ajax-live-search.php",
            data: { search: search_term },
            success: function (data) {
                if (search_term != "") {
                    $('#table-data').html(data);
                }else{
                    loadData();
                }
            }
        });
    });

});