menuvert = function() {
        if (document && document.getElementById)
{
        lemenu = document.getElementById("menubar");
        for (i=0; i<lemenu.childNodes.length; i++)
        {
                node = lemenu.childNodes[i];
                if (node.nodeName=="LI")
                        {
                                node.onmouseover=function()
                                {
                                        this.className+=" over";
                                }
                                node.onmouseout=function()
                                {
                                this.className=this.className.replace(" over", "");
                                }
                        }
                }
        }
}
window.onload=menuvert;