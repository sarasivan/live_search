<!DOCTYPE html>
<html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<head>

</head>

<body>
    <input type="text" name="search" id="search" placeholder="Searching Words..">
    <div id="result"> </div>
</body>
<script>
$(document).ready(function() {
    $("#search").on('keyup', function() {
        var searchdata = $("#search").val();
        $('#result').empty();

        $.ajax({
            url: 'db.php',
            method: 'post',
            data: {
                searchdata: searchdata
            },
            success: function(data) {
                console.log(data);
               
                try {
                
                    if (data.length >0) {
                        $.each(data, function(index, result) {
                            $('#result').append('<p>' + result.softwares + '</p>');
                        });
                    } else {
                        $('#result').append('<p>No results found.</p>');
                    }
                } catch (e) {
                    console.error('Error parsing JSON:', e);
                    $('#result').append('<p>Error retrieving data. Please try again.</p>');
                }
            }
        });
    });
});
</script>

</html>