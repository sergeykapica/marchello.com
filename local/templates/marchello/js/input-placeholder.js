(function()
{
    function setPlaceholder(inputField, text, color)
    {
        inputField.css('color', color);
        inputField.val(text);
    }
    
    function unsetPlaceholder(inputField)
    {
        inputField.css('color', '');
        inputField.val('');
    }
    
    window.setPlaceholderToInput = function(inputField, text, color)
    {
        if(inputField.val() == '')
        {
            setPlaceholder(inputField, text, color);
        }
       
        inputField.on('focus', function()
        {
            if($(this).val() == '' || $(this).val() == text)
            {
                unsetPlaceholder($(this));
            }
        });
        
        inputField.on('blur', function()
        {
            if($(this).val() == '')
            {
                setPlaceholder($(this), text, color);
            }
        });
    };
})();