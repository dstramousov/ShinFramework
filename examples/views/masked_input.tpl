{include file="header.tpl"}


<body id="page">

	{include file="back_url.tpl"}

    <fieldset>
        <legend style="font-size: 30px; font-weight: bold;">Masked Input example</legend>
        <table border="0">
            <tbody>
                <tr>
                    <td>Date</td>
                    <td><input type="text" tabindex="1" id="date"></td>
                    <td>99/99/9999</td>
                </tr>
                <tr>
                    <td>Phone</td>
                    <td><input type="text" tabindex="3" id="phone"></td>
                    <td>(999) 999-9999</td>
                </tr>
                <tr>
                    <td>Phone + Ext</td>
                    <td><input type="text" tabindex="4" id="phoneext"></td>
                    <td>(999) 999-9999? x99999</td>
                </tr>
                <tr>
                    <td>Tax ID</td>
                    <td><input type="text" tabindex="5" id="tin"></td>
                    <td>99-9999999</td>
                </tr>
                <tr>
                    <td>SSN</td>
                    <td><input type="text" tabindex="6" id="ssn"></td>
                    <td>999-99-9999</td>
                </tr>
                <tr>
                    <td>Product Key</td>
                    <td><input type="text" tabindex="7" id="product"></td>
                    <td>a*-999-a999</td>
                </tr>
                <tr>
                    <td>Eye Script</td>
                    <td><input type="text" tabindex="8" id="eyescript"></td>
                    <td>~9.99 ~9.99 999</td>
                </tr>
                <tr>
                    <td>With complete function</td>
                    <td><input type="text" tabindex="8" id="date2"></td>
                    <td>99/99/9999</td>
                </tr>
            </tbody>
        </table>
    </fieldset>    
    
    
</body>

</html>