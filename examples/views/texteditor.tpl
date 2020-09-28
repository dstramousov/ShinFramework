{include file="header.tpl"}

<body id="page">

	{include file="back_url.tpl"}

    <table>
        <tr>
            <td valign="top">
                <fieldset>
                    <legend style="font-size: 30px; font-weight: bold;">Simple editor example</legend>

                    <textarea cols="50" rows="15" id="simple-text-editor"></textarea>
                </fieldset>
            </td>
            <td valign="top">
                <fieldset>
                    <legend style="font-size: 30px; font-weight: bold;">Advanced editor example</legend>

                    <textarea cols="80" rows="15" id="advanced-text-editor">readonly text</textarea>
                </fieldset>
            </td>
        </tr>
        <tr>
            <td valign="top">
                <fieldset>
                    <legend style="font-size: 30px; font-weight: bold;">Simple readonly editor example</legend>

                    <textarea cols="80" rows="15" id="simple-text-editor-readonly">readonly text</textarea>
                </fieldset>
            </td>
            <td valign="top">
                <fieldset>
                    <legend style="font-size: 30px; font-weight: bold;">Image and File manager</legend>

                    <textarea cols="80" rows="15" id="file-image-managers">some text</textarea>
                </fieldset>    
            </td>
        </tr>
    </table>
    
</body>

</html>