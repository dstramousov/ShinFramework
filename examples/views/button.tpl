{include file="header.tpl"}

<body id="page">

	{include file="back_url.tpl"}
    
    <fieldset>
        <legend style="font-size: 30px; font-weight: bold;">jQuery Button example</legend>
        <table>
            <tr>
                <td>
                    <fieldset>
                        <legend>Default Button example</legend>
                        <a href="" id="default_button"></a>
                    </fieldset>
                </td>
                <td>
                    <fieldset>
                        <legend>Radios example</legend>
                        <div id="radio">
                            <input type="radio" id="radio1" name="radio" /><label for="radio1">Choice 1</label>
                            <input type="radio" id="radio2" name="radio" checked="checked" /><label for="radio2">Choice 2</label>
                            <input type="radio" id="radio3" name="radio" /><label for="radio3">Choice 3</label>
                        </div>
                    </fieldset>
                </td>
                <td>
                    <fieldset>
                        <legend>Checkboxes example</legend>
                        
                        <input type="checkbox" id="check" / style="float: left;"><label for="check">Toggle</label>
                        
                        <div id="format" style="float: left;">
                            <input type="checkbox" id="check1" /><label for="check1">B</label>
                            <input type="checkbox" id="check2" /><label for="check2">I</label>
                            <input type="checkbox" id="check3" /><label for="check3">U</label>
                        </div>

                    </fieldset>
                </td>
            </tr>
            <tr>
                <td>
                    <fieldset>
                        <legend>Icons example</legend>
                        <div class="demo">
                            <button id="first_btn">Button with icon only</button>
                            <button id="therd_btn">Button with two icons</button>
                            <button id="foth_btn">Button with two icons and no text</button>
                        </div>
                    </fieldset>
                </td>
                <td>
                    <fieldset>
                        <legend>Split button example</legend>
                        <div id="split_button">
                            <button id="rerun">Run last action</button>
                            <button id="select">Select an action</button>
                        </div>

                    </fieldset>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <fieldset>
                        <legend>Toolbar example</legend>
                        <span id="toolbar">
                            <button id="beginning">go to beginning</button>
                            <button id="rewind">rewind</button>
                            <button id="play">play</button>
                            <button id="stop">stop</button>
                            <button id="forward">fast forward</button>
                            <button id="end">go to end</button>
                            
                            <input type="checkbox" id="shuffle" /><label for="shuffle">Shuffle</label>
                            
                            <span id="repeat">
                                <input type="radio" id="repeat0" name="repeat" checked="checked" /><label for="repeat0">No Repeat</label>
                                <input type="radio" id="repeat1" name="repeat" /><label for="repeat1">Once</label>
                                <input type="radio" id="repeatall" name="repeat" /><label for="repeatall">All</label>
                            </span>
                        </span>
                    </fieldset>
                </td>
            </tr>
        </table>
    </fieldset>
    
    
    
    {literal}
    <script type="text/javascript">
        function showAlert(){
            alert('Click');
        }
        
        function firstButtonClick(){
            alert("Running the last action");
        }
        
        function secondButtonClick(){
            alert("Could display a menu to select an action");
        }
        
        function playClicked(target){
            var options;
            if ($(target).text() == 'play') {
                options = {
                    label: 'pause',
                    icons: {
                        primary: 'ui-icon-pause'
                    }
                };
            } else {
                options = {
                    label: 'play',
                    icons: {
                        primary: 'ui-icon-play'
                    }
                };
            }
            $(target).button('option', options);
        }
        
        function stopClicked(){
            $('#play').button('option', {
                label: 'play',
                icons: {
                    primary: 'ui-icon-play'
                }
            });
        }
    </script>
    {/literal}
    
    
</body>

</html>