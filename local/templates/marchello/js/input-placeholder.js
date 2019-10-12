(function()
{
    function setPlaceholder(inputField, text, color)
    {
        inputField.css('color', color);
        
        if(inputField[0].value !== undefined)
        {
            inputField.val(text);
        }
        else
        {
            inputField.html(text);
        }
    }
    
    function unsetPlaceholder(inputField)
    {
        inputField.css('color', '');
        
        if(inputField[0].value !== undefined)
        {
            inputField.val('');
        }
        else
        {
            inputField.html('');
        }
    }
    
    window.setPlaceholderToInput = function(inputField, text, color)
    {
        if(inputField[0].value !== undefined)
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
        }
        else
        {
            if(inputField.html() == '')
            {
                setPlaceholder(inputField, text, color);
            }

            inputField.on('focus', function()
            {
                if($(this).html() == '' || $(this).html() == text)
                {
                    unsetPlaceholder($(this));
                }
            });

            inputField.on('blur', function()
            {
                if($(this).html() == '')
                {
                    setPlaceholder($(this), text, color);
                }
            });
        }
    };
})();