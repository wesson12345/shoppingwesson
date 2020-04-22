$('document').ready(function()
{
    
    // validation */
    $("#login-form").submit(function()
    {
        var data = $("#login-form").serialize();

        $.ajax({

            type : 'POST',
            url  : 'php/login.php',
            data : data,
            success :  function(data)
            {
                alert(data);
            }
        });
        return false;
        
    });
    /* form submit */
    
});