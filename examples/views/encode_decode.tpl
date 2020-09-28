{include file="header.tpl"}

<body id="page">

	{include file="back_url.tpl"}
    
    <fieldset>
        <legend style="font-size: 30px; font-weight: bold;">Encode Decode example</legend>
        <form action="" method="post" name="data">
            <table>
                <tr>
                    <td>Data to encode:</td>
                    <td><input type="text" name="data_to_encode" id="data_to_encode" value="{$data_to_encode}"></td>
                </tr>
                <tr align="center">
                    <td colspan="2"><input type="submit" name="action" value="Encode" /></td>
                </tr>
                <tr>
                    <td>Encoded data:</td>
                    <td><input type="text" name="encoded_data" id="encoded_data" value="{$encoded_data}"></td>
                </tr>
                <tr>
                    <td>Decoded data:</td>
                    <td><input type="text" name="decoded_data" id="decoded_data" value="{$decoded_data}"></td>
                </tr>
                <tr align="center">
                    <td colspan="2"><input type="submit" name="action" value="Decode" /></td>
                </tr>
            </table>
        </form>
        
        
    </fieldset>
    
</body>

</html>