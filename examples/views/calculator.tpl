{include file="header.tpl"}
    <body id="page">

	{include file="back_url.tpl"}

        <fieldset>
            <legend>Calculator example</legend>
            <fieldset>
                <legend>Invocation example</legend>
                <table>
                    <tr>
                        <td>
                            <fieldset>
                                <legend>Button only trigger</legend>
                                <input type="text" value="" name="" id="invocation" />
                            </fieldset>
                        </td>
                        <td>
                            <fieldset>
                                <legend>Image only trigger</legend>
                                <input type="text" value="" name="" id="invocation2" />
                            </fieldset>
                        </td>
                        <td>
                            <fieldset>
                                <legend>Focus and button trigger</legend>
                                <input type="text" value="" name="" id="invocation3" />
                            </fieldset>
                        </td>
                        <td>
                            <fieldset>
                                <legend>Operator entry only (any non-numeric)</legend>
                                <input type="text" value="" name="" id="invocation4" />
                            </fieldset>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <fieldset>
                                <legend>Operator entry customised</legend>
                                <input type="text" value="" name="" id="invocation5" />
                            </fieldset>
                        </td>
                        <td>
                            <fieldset>
                                <legend>Operator entry or button</legend>
                                <input type="text" value="" name="" id="invocation6" />
                            </fieldset>
                        </td>
                    </tr>
                </table>
            </fieldset>
            
            <fieldset>
                <legend>Layouts example</legend>
                <table>
                    <tr>
                        <td>
                            <fieldset>
                                <legend>Custom layout</legend>
                                <input type="text" value="" name="" id="layout" />
                            </fieldset>
                        </td>
                        <td>
                            <fieldset>
                                <legend>Scientific Layout</legend>
                                <input type="text" value="" name="" id="layout2" />
                            </fieldset>
                        </td>
                    </tr>
                </table>
            </fieldset>
            
            <fieldset>
                <legend>Styling example</legend>
                <table>
                    <tr>
                        <td>
                            <input type="text" value="" name="" id="styling" />    
                        </td>
                    </tr>
                </table>
            </fieldset>
            
            <fieldset>
                <legend>Collback example</legend>
                <table>
                    <tr>
                        <td>
                            <fieldset>
                                <legend>On open</legend>
                                <input type="text" value="" name="" id="callback" />
                            </fieldset>    
                        </td>
                        <td>
                            <fieldset>
                                <legend>On button</legend>
                                <input type="text" value="" name="" id="callback2" />
                                After
                                <button id="keyLabel" type="button"></button>
                                the current value is
                                <span id="current"></span>
                            </fieldset>    
                        </td>
                        <td>
                            <fieldset>
                                <legend>On close</legend>
                                <input type="text" value="" name="" id="callback3" />
                            </fieldset>    
                        </td>
                    </tr>
                </table>
            </fieldset>
            
            <fieldset>
                <legend>Regional example</legend>
                <table>
                    <tr>
                        <td>
                            <input type="text" value="" name="" id="regional" />    
                        </td>
                    </tr>
                </table>
            </fieldset>
            
            <fieldset>
                <legend>Animation example</legend>
                <table>
                    <tr>
                        <td>
                            <fieldset>
                                <legend>Slow example</legend>
                                <input type="text" value="" name="" id="animation" />
                            </fieldset>    
                        </td>
                        <td>
                            <fieldset>
                                <legend>Fast example</legend>
                                <input type="text" value="" name="" id="animation2" />
                            </fieldset>    
                        </td>
                    </tr>
                </table>
            </fieldset>
            
            <fieldset>
                <legend>Custom keys example</legend>
                <table>
                    <tr>
                        <td>
                            <input type="text" value="" name="" id="keys" />    
                        </td>
                    </tr>
                </table>
            </fieldset>
        </fieldset>
        
        {literal}
            <style type="text/css">
                .withBG .calculator-result { opacity: 0.8; } 
                .withBG .calculator-row button { background: transparent; color: #AA0000; font-weight: bold; } 
                .withBG .calculator-keystroke { color: #fff; background-color: #727375;
                .calculator-row button.calculator-mykey { background-color: lightblue; } 
            </style>
        {/literal}
        
        {literal}
            <script type="text/javascript">
                function mathsOnly(ch, event, value, base, decimalChar) { 
                    return '+-*/'.indexOf(ch) > -1 && !(ch == '-' && value == ''); 
                }
                
                function showOpen(){
                    alert('Open event');
                }
                
                function showButton(label, value, inst){
                    $('#keyLabel').text(label); 
                    $('#current').text(value);
                }
                
                function showClose(){
                    alert('Close event');
                }
                
                function increment(inst) { 
                    inst.curValue++; 
                } 
                 
                function decrement(inst) { 
                    inst.curValue--; 
                }
            </script>
        {/literal}
    </body>
</html>