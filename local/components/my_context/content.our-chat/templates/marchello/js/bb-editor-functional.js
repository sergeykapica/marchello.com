(function()
{
	function BBEditor(textarea)
	{
		this.textarea = textarea;
		
		this.pasteHtmlAtCaret = function(html)
        {
            var sel, range;

            if (window.getSelection)
            {
                // IE9 and non-IE
                sel = window.getSelection();

                if (sel.getRangeAt && sel.rangeCount)
                {
                    range = sel.getRangeAt(0);
                    range.deleteContents();

                    // Range.createContextualFragment() would be useful here but is
                    // non-standard and not supported in all browsers (IE9, for one)
                    var el = document.createElement("div");
                    el.innerHTML = html;
                    var frag = document.createDocumentFragment(), node, lastNode;
                    while ( (node = el.firstChild) )
                    {
                        lastNode = frag.appendChild(node);
                    }
                    range.insertNode(frag);

                    // Preserve the selection
                    if (lastNode)
                    {
                        range = range.cloneRange();
                        range.setStartAfter(lastNode);
                        range.collapse(true);
                        sel.removeAllRanges();
                        sel.addRange(range);
                    }
                }
            }
            else if (document.selection && document.selection.type != "Control")
            {
                // IE < 9
                document.selection.createRange().pasteHTML(html);
            }
        };
		
		this.getCurrentPosition = function(elementPosition)
        {
            var allText = this.textarea.innerHTML;
            var position = allText.indexOf(elementPosition.outerHTML);
            
            $(elementPosition).remove();
            
            if(position > 0)
            {
                this.currentPosition = position;
            }
            else
            {
                this.currentPosition = allText.length;
            }
        };
	}
	
	window.BBEditor = BBEditor;
})();