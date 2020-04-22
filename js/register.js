$('document').ready(function()
{
    
    // validation */
    $("#myregister-form").submit(function()
    {
        var data = $("#myregister-form").serialize();

        $.ajax({

            type : 'POST',
            url  : './php/register.php',
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
