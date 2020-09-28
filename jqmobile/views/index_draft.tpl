{include file="header.tpl"}

<!-- Start of first page -->
<div data-role="page" id="foo">

    <div data-role="header">
        <h1>Foo</h1>
    </div><!-- /header -->

    <div data-role="content">    
        <p>I'm first in the source order so I'm shown as the page.</p>        
        <p>View internal page called <a href="#bar">bar</a></p>    
        <p>View internal page called with dialog <a href="#moo" data-rel="dialog">bar</a></p>    
    </div><!-- /content -->

    <div data-role="footer">
        <h4>Page Footer</h4>
    </div><!-- /header -->
</div><!-- /page -->


<!-- Start of second page -->
<div data-role="page" id="bar" data-theme="c">

    <div data-role="header">
        <h1>Bar</h1>
    </div><!-- /header -->

    <div data-role="content">    
        <form method="get" action="#">

                <h2>Form elements</h2>

                <p>This page contains various progressive-enhancement driven form controls. Native elements are sometimes hidden from view, but their values are maintained so the form can be submitted normally. </p>

                <p>Browsers that don't support the custom controls will still deliver a usable experience, because all are based on native form elements.</p>

                <div data-role="fieldcontain" class="ui-field-contain ui-body ui-br">
                 <label for="name" class="ui-input-text">Text Input:</label>
                 <input type="text" value="" id="name" name="name" class="ui-input-text ui-body-null ui-corner-all ui-shadow-inset ui-body-c">
                </div>

                <div data-role="fieldcontain" class="ui-field-contain ui-body ui-br">
                <label for="textarea" class="ui-input-text">Textarea:</label>
                <textarea id="textarea" name="textarea" rows="8" cols="40" class="ui-input-text ui-body-null ui-corner-all ui-shadow-inset ui-body-c"></textarea>
                </div>

                <div data-role="fieldcontain" class="ui-field-contain ui-body ui-br">
                 <label for="search" class="ui-input-text">Search Input:</label>
                 <div class="ui-input-search ui-shadow-inset ui-btn-corner-all ui-btn-shadow ui-icon-searchfield ui-body-c"><input type="true" data-type="search" value="" id="search" name="password" class="ui-input-text ui-body-null"><a title="clear text" class="ui-input-clear ui-btn ui-btn-up-c ui-btn-icon-notext ui-btn-corner-all ui-shadow ui-input-clear-hidden" href="#" data-theme="c"><span class="ui-btn-inner ui-btn-corner-all"><span class="ui-btn-text">clear text</span><span class="ui-icon ui-icon-delete ui-icon-shadow"></span></span></a></div>
                </div>

                <div data-role="fieldcontain" class="ui-field-contain ui-body ui-br">
                    <label for="slider2" id="slider2-label" class="ui-slider">Flip switch:</label>
                    <select data-role="slider" id="slider2" name="slider2" class="ui-slider-switch">
                        <option value="off">Off</option>
                        <option value="on">On</option>
                    </select><div role="application" class="ui-slider ui-slider-switch ui-btn-down-c ui-btn-corner-all ui-slider-switch-a"><div class="ui-slider-labelbg ui-slider-labelbg-a ui-btn-active ui-btn-corner-left"></div><div class="ui-slider-labelbg ui-slider-labelbg-b ui-btn-down-c ui-btn-corner-right"></div><div class="ui-slider-inneroffset"><a class="ui-slider-handle ui-btn ui-btn-corner-all ui-shadow ui-btn-up-c" href="#" data-theme="c" role="slider" aria-valuemin="0" aria-valuemax="1" aria-valuenow="off" aria-valuetext="Off" title="0" aria-labelledby="slider2-label" style="left: 0%;"><span role="img" class="ui-slider-label ui-slider-label-a ui-btn-active ui-btn-corner-left">On</span><span role="img" class="ui-slider-label ui-slider-label-b ui-btn-down-c ui-btn-corner-right">Off</span><span class="ui-btn-inner ui-btn-corner-all"><span class="ui-btn-text"></span></span></a></div></div>
                </div>

                <div data-role="fieldcontain" class="ui-field-contain ui-body ui-br">
                    <label for="slider" class="ui-input-text ui-slider" id="slider-label">Slider:</label>
                     <input type="number" data-type="range" max="100" min="0" value="0" id="slider" name="slider" class="ui-input-text ui-body-null ui-corner-all ui-shadow-inset ui-body-c ui-slider-input"><div role="application" class="ui-slider  ui-btn-down-c ui-btn-corner-all"><a class="ui-slider-handle ui-btn ui-btn-corner-all ui-shadow ui-btn-up-c" href="#" data-theme="c" role="slider" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0" aria-valuetext="0" title="0" aria-labelledby="slider-label" style="left: 0%;"><span class="ui-btn-inner ui-btn-corner-all"><span class="ui-btn-text"></span></span></a></div>
                </div>

                <div data-role="fieldcontain" class="ui-field-contain ui-body ui-br">
                <fieldset data-role="controlgroup" class="ui-corner-all ui-controlgroup ui-controlgroup-vertical"><div class="ui-controlgroup-label" role="heading">Choose as many snacks as you'd like:</div><div class="ui-controlgroup-controls">
                    
                    <div class="ui-checkbox"><input type="checkbox" class="custom" id="checkbox-1a" name="checkbox-1a"><label for="checkbox-1a" data-theme="c" class="ui-btn ui-btn-icon-left ui-corner-top ui-btn-up-c"><span class="ui-btn-inner ui-corner-top"><span class="ui-btn-text">Cheetos</span><span class="ui-icon ui-icon-ui-icon-checkbox-off ui-icon-checkbox-off"></span></span></label></div>
                    

                    <div class="ui-checkbox"><input type="checkbox" class="custom" id="checkbox-2a" name="checkbox-2a"><label for="checkbox-2a" data-theme="c" class="ui-btn ui-btn-icon-left ui-btn-up-c"><span class="ui-btn-inner"><span class="ui-btn-text">Doritos</span><span class="ui-icon ui-icon-ui-icon-checkbox-off ui-icon-checkbox-off"></span></span></label></div>
                    

                    <div class="ui-checkbox"><input type="checkbox" class="custom" id="checkbox-3a" name="checkbox-3a"><label for="checkbox-3a" data-theme="c" class="ui-btn ui-btn-icon-left ui-btn-up-c"><span class="ui-btn-inner"><span class="ui-btn-text">Fritos</span><span class="ui-icon ui-icon-ui-icon-checkbox-off ui-icon-checkbox-off"></span></span></label></div>
                    

                    <div class="ui-checkbox"><input type="checkbox" class="custom" id="checkbox-4a" name="checkbox-4a"><label for="checkbox-4a" data-theme="c" class="ui-btn ui-btn-icon-left ui-corner-bottom ui-controlgroup-last ui-btn-up-c"><span class="ui-btn-inner ui-corner-bottom ui-controlgroup-last"><span class="ui-btn-text">Sun Chips</span><span class="ui-icon ui-icon-ui-icon-checkbox-off ui-icon-checkbox-off"></span></span></label></div>
                    
                </div></fieldset>
                </div>

                <div data-role="fieldcontain" class="ui-field-contain ui-body ui-br">
                <fieldset data-type="horizontal" data-role="controlgroup" class="ui-corner-all ui-controlgroup ui-controlgroup-horizontal"><div class="ui-controlgroup-label" role="heading">Font styling:</div><div class="ui-controlgroup-controls">
                    
                    <div class="ui-checkbox"><input type="checkbox" class="custom" id="checkbox-6" name="checkbox-6"><label for="checkbox-6" data-theme="c" class="ui-btn ui-btn-up-c ui-corner-left"><span class="ui-btn-inner ui-corner-left"><span class="ui-btn-text">b</span></span></label></div>
                    

                    <div class="ui-checkbox"><input type="checkbox" class="custom" id="checkbox-7" name="checkbox-7"><label for="checkbox-7" data-theme="c" class="ui-btn ui-btn-up-c"><span class="ui-btn-inner"><span class="ui-btn-text"><em>i</em></span></span></label></div>
                    

                    <div class="ui-checkbox"><input type="checkbox" class="custom" id="checkbox-8" name="checkbox-8"><label for="checkbox-8" data-theme="c" class="ui-btn ui-btn-up-c ui-corner-right ui-controlgroup-last"><span class="ui-btn-inner ui-corner-right ui-controlgroup-last"><span class="ui-btn-text">u</span></span></label></div>
                    
                </div></fieldset>
                </div>

                <div data-role="fieldcontain" class="ui-field-contain ui-body ui-br">
                    <fieldset data-role="controlgroup" class="ui-corner-all ui-controlgroup ui-controlgroup-vertical"><div class="ui-controlgroup-label" role="heading">Choose a pet:</div><div class="ui-controlgroup-controls">
                        
                             <div class="ui-radio"><input type="radio" checked="checked" value="choice-1" id="radio-choice-1" name="radio-choice-1"><label for="radio-choice-1" data-theme="c" class="ui-btn ui-btn-icon-left ui-btn-active ui-corner-top ui-btn-up-c"><span class="ui-btn-inner ui-corner-top"><span class="ui-btn-text">Cat</span><span class="ui-icon ui-icon-ui-icon-radio-off ui-icon-radio-on"></span></span></label></div>
                             

                             <div class="ui-radio"><input type="radio" value="choice-2" id="radio-choice-2" name="radio-choice-1"><label for="radio-choice-2" data-theme="c" class="ui-btn ui-btn-icon-left ui-btn-up-c"><span class="ui-btn-inner"><span class="ui-btn-text">Dog</span><span class="ui-icon ui-icon-ui-icon-radio-off ui-icon-radio-off"></span></span></label></div>
                             

                             <div class="ui-radio"><input type="radio" value="choice-3" id="radio-choice-3" name="radio-choice-1"><label for="radio-choice-3" data-theme="c" class="ui-btn ui-btn-icon-left ui-btn-up-c"><span class="ui-btn-inner"><span class="ui-btn-text">Hampster</span><span class="ui-icon ui-icon-ui-icon-radio-off ui-icon-radio-off"></span></span></label></div>
                             

                             <div class="ui-radio"><input type="radio" value="choice-4" id="radio-choice-4" name="radio-choice-1"><label for="radio-choice-4" data-theme="c" class="ui-btn ui-btn-icon-left ui-corner-bottom ui-controlgroup-last ui-btn-up-c"><span class="ui-btn-inner ui-corner-bottom ui-controlgroup-last"><span class="ui-btn-text">Lizard</span><span class="ui-icon ui-icon-ui-icon-radio-off ui-icon-radio-off"></span></span></label></div>
                             
                    </div></fieldset>
                </div>

                <div data-role="fieldcontain" class="ui-field-contain ui-body ui-br">
                    <fieldset data-type="horizontal" data-role="controlgroup" class="ui-corner-all ui-controlgroup ui-controlgroup-horizontal"><div class="ui-controlgroup-label" role="heading">Layout view:</div><div class="ui-controlgroup-controls">
                         
                             <div class="ui-radio"><input type="radio" checked="checked" value="on" id="radio-choice-c" name="radio-choice-b"><label for="radio-choice-c" data-theme="c" class="ui-btn ui-btn-active ui-corner-left ui-btn-up-c"><span class="ui-btn-inner ui-corner-left"><span class="ui-btn-text">List</span></span></label></div>
                             
                             <div class="ui-radio"><input type="radio" value="off" id="radio-choice-d" name="radio-choice-b"><label for="radio-choice-d" data-theme="c" class="ui-btn ui-btn-up-c"><span class="ui-btn-inner"><span class="ui-btn-text">Grid</span></span></label></div>
                             
                             <div class="ui-radio"><input type="radio" value="other" id="radio-choice-e" name="radio-choice-b"><label for="radio-choice-e" data-theme="c" class="ui-btn ui-btn-up-c ui-corner-right ui-controlgroup-last"><span class="ui-btn-inner ui-corner-right ui-controlgroup-last"><span class="ui-btn-text">Gallery</span></span></label></div>
                             
                    </div></fieldset>
                </div>

                <div data-role="fieldcontain" class="ui-field-contain ui-body ui-br">
                    <label class="select ui-select" for="select-choice-1">Choose shipping method:</label>
                    <div class="ui-select"><a href="#" role="button" aria-haspopup="true" data-theme="c" class="ui-btn ui-btn-icon-right ui-btn-corner-all ui-shadow ui-btn-up-c"><span class="ui-btn-inner ui-btn-corner-all"><span class="ui-btn-text">Standard: 7 day</span><span class="ui-icon ui-icon-arrow-d ui-icon-shadow"></span></span></a><select id="select-choice-1" name="select-choice-1" tabindex="-1">
                        <option value="standard">Standard: 7 day</option>
                        <option value="rush">Rush: 3 days</option>
                        <option value="express">Express: next day</option>
                        <option value="overnight">Overnight</option>
                    </select></div>
                </div>

                <div data-role="fieldcontain" class="ui-field-contain ui-body ui-br">
                    <label class="select ui-select" for="select-choice-3">Your state:</label>
                    <div class="ui-select"><a href="#" role="button" aria-haspopup="true" data-theme="c" class="ui-btn ui-btn-up-c ui-btn-icon-right ui-btn-corner-all ui-shadow"><span class="ui-btn-inner ui-btn-corner-all"><span class="ui-btn-text">Custom menu...</span><span class="ui-icon ui-icon-arrow-d ui-icon-shadow"></span></span></a><select id="select-choice-3" name="select-choice-3" tabindex="-1">
                        <option>Custom menu...</option>
                        <option value="AL">Alabama</option>
                        <option value="AK">Alaska</option>
                        <option value="AZ">Arizona</option>
                        <option value="AR">Arkansas</option>
                        <option value="CA">California</option>
                        <option value="CO">Colorado</option>
                        <option value="CT">Connecticut</option>
                        <option value="DE">Delaware</option>
                        <option value="FL">Florida</option>
                        <option value="GA">Georgia</option>
                        <option value="HI">Hawaii</option>
                        <option value="ID">Idaho</option>
                        <option value="IL">Illinois</option>
                        <option value="IN">Indiana</option>
                        <option value="IA">Iowa</option>
                        <option value="KS">Kansas</option>
                        <option value="KY">Kentucky</option>
                        <option value="LA">Louisiana</option>
                        <option value="ME">Maine</option>
                        <option value="MD">Maryland</option>
                        <option value="MA">Massachusetts</option>
                        <option value="MI">Michigan</option>
                        <option value="MN">Minnesota</option>
                        <option value="MS">Mississippi</option>
                        <option value="MO">Missouri</option>
                        <option value="MT">Montana</option>
                        <option value="NE">Nebraska</option>
                        <option value="NV">Nevada</option>
                        <option value="NH">New Hampshire</option>
                        <option value="NJ">New Jersey</option>
                        <option value="NM">New Mexico</option>
                        <option value="NY">New York</option>
                        <option value="NC">North Carolina</option>
                        <option value="ND">North Dakota</option>
                        <option value="OH">Ohio</option>
                        <option value="OK">Oklahoma</option>
                        <option value="OR">Oregon</option>
                        <option value="PA">Pennsylvania</option>
                        <option value="RI">Rhode Island</option>
                        <option value="SC">South Carolina</option>
                        <option value="SD">South Dakota</option>
                        <option value="TN">Tennessee</option>
                        <option value="TX">Texas</option>
                        <option value="UT">Utah</option>
                        <option value="VT">Vermont</option>
                        <option value="VA">Virginia</option>
                        <option value="WA">Washington</option>
                        <option value="WV">West Virginia</option>
                        <option value="WI">Wisconsin</option>
                        <option value="WY">Wyoming</option>
                    </select></div>
                </div>

                    <div data-role="fieldcontain" class="ui-field-contain ui-body ui-br">
                        <label class="select ui-select" for="select-choice-native">Your state:</label>
                        <div class="ui-select"><div data-theme="c" class="ui-btn ui-btn-up-c ui-btn-icon-right ui-btn-corner-all ui-shadow" tabindex="-1"><span class="ui-btn-inner ui-btn-corner-all"><span class="ui-btn-text">Native menu...</span><span class="ui-icon ui-icon-arrow-d ui-icon-shadow"></span></span><select data-native-menu="true" id="select-choice-native" name="select-choice-native">
                            <option>Native menu...</option>
                            <option value="AL">Alabama</option>
                            <option value="AK">Alaska</option>
                            <option value="AZ">Arizona</option>
                            <option value="AR">Arkansas</option>
                            <option value="CA">California</option>
                            <option value="CO">Colorado</option>
                            <option value="CT">Connecticut</option>
                            <option value="DE">Delaware</option>
                            <option value="FL">Florida</option>
                            <option value="GA">Georgia</option>
                            <option value="HI">Hawaii</option>
                            <option value="ID">Idaho</option>
                            <option value="IL">Illinois</option>
                            <option value="IN">Indiana</option>
                            <option value="IA">Iowa</option>
                            <option value="KS">Kansas</option>
                            <option value="KY">Kentucky</option>
                            <option value="LA">Louisiana</option>
                            <option value="ME">Maine</option>
                            <option value="MD">Maryland</option>
                            <option value="MA">Massachusetts</option>
                            <option value="MI">Michigan</option>
                            <option value="MN">Minnesota</option>
                            <option value="MS">Mississippi</option>
                            <option value="MO">Missouri</option>
                            <option value="MT">Montana</option>
                            <option value="NE">Nebraska</option>
                            <option value="NV">Nevada</option>
                            <option value="NH">New Hampshire</option>
                            <option value="NJ">New Jersey</option>
                            <option value="NM">New Mexico</option>
                            <option value="NY">New York</option>
                            <option value="NC">North Carolina</option>
                            <option value="ND">North Dakota</option>
                            <option value="OH">Ohio</option>
                            <option value="OK">Oklahoma</option>
                            <option value="OR">Oregon</option>
                            <option value="PA">Pennsylvania</option>
                            <option value="RI">Rhode Island</option>
                            <option value="SC">South Carolina</option>
                            <option value="SD">South Dakota</option>
                            <option value="TN">Tennessee</option>
                            <option value="TX">Texas</option>
                            <option value="UT">Utah</option>
                            <option value="VT">Vermont</option>
                            <option value="VA">Virginia</option>
                            <option value="WA">Washington</option>
                            <option value="WV">West Virginia</option>
                            <option value="WI">Wisconsin</option>
                            <option value="WY">Wyoming</option>
                        </select></div></div>
                    </div>

            <div class="ui-body ui-body-b">
            <fieldset class="ui-grid-a">
                    <div class="ui-block-a"><div data-theme="d" class="ui-btn ui-btn-up-d ui-btn-corner-all ui-shadow"><span class="ui-btn-inner ui-btn-corner-all"><span class="ui-btn-text">Cancel</span></span><button data-theme="d" type="submit" class="ui-btn-hidden">Cancel</button></div></div>
                    <div class="ui-block-b"><div data-theme="a" class="ui-btn ui-btn-up-a ui-btn-corner-all ui-shadow"><span class="ui-btn-inner ui-btn-corner-all"><span class="ui-btn-text">Submit</span></span><button data-theme="a" type="submit" class="ui-btn-hidden">Submit</button></div></div>
            </fieldset>
            </div>
        </form>
        
        <p><a href="#foo">Back to foo</a></p>    
    </div><!-- /content -->

    <div data-role="footer">
        <h4>Page Footer</h4>
    </div><!-- /header -->
</div><!-- /page -->

<!-- Start of second page -->
<div data-role="page" id="moo" data-theme="b">

    <div data-role="header">
        <h1>Bar</h1>
    </div><!-- /header -->

    <div data-role="content">    
        <form method="get" action="#">

            <h2>Form elements</h2>

            <p>This page contains various progressive-enhancement driven form controls. Native elements are sometimes hidden from view, but their values are maintained so the form can be submitted normally. </p>

            <p>Browsers that don't support the custom controls will still deliver a usable experience, because all are based on native form elements.</p>

            <div data-role="fieldcontain" class="ui-field-contain ui-body ui-br">
             <label for="name" class="ui-input-text">Text Input:</label>
             <input type="text" value="" id="name" name="name" class="ui-input-text ui-body-null ui-corner-all ui-shadow-inset ui-body-c">
            </div>

            <div data-role="fieldcontain" class="ui-field-contain ui-body ui-br">
            <label for="textarea" class="ui-input-text">Textarea:</label>
            <textarea id="textarea" name="textarea" rows="8" cols="40" class="ui-input-text ui-body-null ui-corner-all ui-shadow-inset ui-body-c"></textarea>
            </div>

            <div data-role="fieldcontain" class="ui-field-contain ui-body ui-br">
             <label for="search" class="ui-input-text">Search Input:</label>
             <div class="ui-input-search ui-shadow-inset ui-btn-corner-all ui-btn-shadow ui-icon-searchfield ui-body-c"><input type="true" data-type="search" value="" id="search" name="password" class="ui-input-text ui-body-null"><a title="clear text" class="ui-input-clear ui-btn ui-btn-up-c ui-btn-icon-notext ui-btn-corner-all ui-shadow ui-input-clear-hidden" href="#" data-theme="c"><span class="ui-btn-inner ui-btn-corner-all"><span class="ui-btn-text">clear text</span><span class="ui-icon ui-icon-delete ui-icon-shadow"></span></span></a></div>
            </div>

            <div data-role="fieldcontain" class="ui-field-contain ui-body ui-br">
                <label for="slider2" id="slider2-label" class="ui-slider">Flip switch:</label>
                <select data-role="slider" id="slider2" name="slider2" class="ui-slider-switch">
                    <option value="off">Off</option>
                    <option value="on">On</option>
                </select><div role="application" class="ui-slider ui-slider-switch ui-btn-down-c ui-btn-corner-all ui-slider-switch-a"><div class="ui-slider-labelbg ui-slider-labelbg-a ui-btn-active ui-btn-corner-left"></div><div class="ui-slider-labelbg ui-slider-labelbg-b ui-btn-down-c ui-btn-corner-right"></div><div class="ui-slider-inneroffset"><a class="ui-slider-handle ui-btn ui-btn-corner-all ui-shadow ui-btn-up-c" href="#" data-theme="c" role="slider" aria-valuemin="0" aria-valuemax="1" aria-valuenow="off" aria-valuetext="Off" title="0" aria-labelledby="slider2-label" style="left: 0%;"><span role="img" class="ui-slider-label ui-slider-label-a ui-btn-active ui-btn-corner-left">On</span><span role="img" class="ui-slider-label ui-slider-label-b ui-btn-down-c ui-btn-corner-right">Off</span><span class="ui-btn-inner ui-btn-corner-all"><span class="ui-btn-text"></span></span></a></div></div>
            </div>

            <div data-role="fieldcontain" class="ui-field-contain ui-body ui-br">
                <label for="slider" class="ui-input-text ui-slider" id="slider-label">Slider:</label>
                 <input type="number" data-type="range" max="100" min="0" value="0" id="slider" name="slider" class="ui-input-text ui-body-null ui-corner-all ui-shadow-inset ui-body-c ui-slider-input"><div role="application" class="ui-slider  ui-btn-down-c ui-btn-corner-all"><a class="ui-slider-handle ui-btn ui-btn-corner-all ui-shadow ui-btn-up-c" href="#" data-theme="c" role="slider" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0" aria-valuetext="0" title="0" aria-labelledby="slider-label" style="left: 0%;"><span class="ui-btn-inner ui-btn-corner-all"><span class="ui-btn-text"></span></span></a></div>
            </div>

            <div data-role="fieldcontain" class="ui-field-contain ui-body ui-br">
            <fieldset data-role="controlgroup" class="ui-corner-all ui-controlgroup ui-controlgroup-vertical"><div class="ui-controlgroup-label" role="heading">Choose as many snacks as you'd like:</div><div class="ui-controlgroup-controls">
                
                <div class="ui-checkbox"><input type="checkbox" class="custom" id="checkbox-1a" name="checkbox-1a"><label for="checkbox-1a" data-theme="c" class="ui-btn ui-btn-icon-left ui-corner-top ui-btn-up-c"><span class="ui-btn-inner ui-corner-top"><span class="ui-btn-text">Cheetos</span><span class="ui-icon ui-icon-ui-icon-checkbox-off ui-icon-checkbox-off"></span></span></label></div>
                

                <div class="ui-checkbox"><input type="checkbox" class="custom" id="checkbox-2a" name="checkbox-2a"><label for="checkbox-2a" data-theme="c" class="ui-btn ui-btn-icon-left ui-btn-up-c"><span class="ui-btn-inner"><span class="ui-btn-text">Doritos</span><span class="ui-icon ui-icon-ui-icon-checkbox-off ui-icon-checkbox-off"></span></span></label></div>
                

                <div class="ui-checkbox"><input type="checkbox" class="custom" id="checkbox-3a" name="checkbox-3a"><label for="checkbox-3a" data-theme="c" class="ui-btn ui-btn-icon-left ui-btn-up-c"><span class="ui-btn-inner"><span class="ui-btn-text">Fritos</span><span class="ui-icon ui-icon-ui-icon-checkbox-off ui-icon-checkbox-off"></span></span></label></div>
                

                <div class="ui-checkbox"><input type="checkbox" class="custom" id="checkbox-4a" name="checkbox-4a"><label for="checkbox-4a" data-theme="c" class="ui-btn ui-btn-icon-left ui-corner-bottom ui-controlgroup-last ui-btn-up-c"><span class="ui-btn-inner ui-corner-bottom ui-controlgroup-last"><span class="ui-btn-text">Sun Chips</span><span class="ui-icon ui-icon-ui-icon-checkbox-off ui-icon-checkbox-off"></span></span></label></div>
                
            </div></fieldset>
            </div>

            <div data-role="fieldcontain" class="ui-field-contain ui-body ui-br">
            <fieldset data-type="horizontal" data-role="controlgroup" class="ui-corner-all ui-controlgroup ui-controlgroup-horizontal"><div class="ui-controlgroup-label" role="heading">Font styling:</div><div class="ui-controlgroup-controls">
                
                <div class="ui-checkbox"><input type="checkbox" class="custom" id="checkbox-6" name="checkbox-6"><label for="checkbox-6" data-theme="c" class="ui-btn ui-btn-up-c ui-corner-left"><span class="ui-btn-inner ui-corner-left"><span class="ui-btn-text">b</span></span></label></div>
                

                <div class="ui-checkbox"><input type="checkbox" class="custom" id="checkbox-7" name="checkbox-7"><label for="checkbox-7" data-theme="c" class="ui-btn ui-btn-up-c"><span class="ui-btn-inner"><span class="ui-btn-text"><em>i</em></span></span></label></div>
                

                <div class="ui-checkbox"><input type="checkbox" class="custom" id="checkbox-8" name="checkbox-8"><label for="checkbox-8" data-theme="c" class="ui-btn ui-btn-up-c ui-corner-right ui-controlgroup-last"><span class="ui-btn-inner ui-corner-right ui-controlgroup-last"><span class="ui-btn-text">u</span></span></label></div>
                
            </div></fieldset>
            </div>

            <div data-role="fieldcontain" class="ui-field-contain ui-body ui-br">
                <fieldset data-role="controlgroup" class="ui-corner-all ui-controlgroup ui-controlgroup-vertical"><div class="ui-controlgroup-label" role="heading">Choose a pet:</div><div class="ui-controlgroup-controls">
                    
                         <div class="ui-radio"><input type="radio" checked="checked" value="choice-1" id="radio-choice-1" name="radio-choice-1"><label for="radio-choice-1" data-theme="c" class="ui-btn ui-btn-icon-left ui-btn-active ui-corner-top ui-btn-up-c"><span class="ui-btn-inner ui-corner-top"><span class="ui-btn-text">Cat</span><span class="ui-icon ui-icon-ui-icon-radio-off ui-icon-radio-on"></span></span></label></div>
                         

                         <div class="ui-radio"><input type="radio" value="choice-2" id="radio-choice-2" name="radio-choice-1"><label for="radio-choice-2" data-theme="c" class="ui-btn ui-btn-icon-left ui-btn-up-c"><span class="ui-btn-inner"><span class="ui-btn-text">Dog</span><span class="ui-icon ui-icon-ui-icon-radio-off ui-icon-radio-off"></span></span></label></div>
                         

                         <div class="ui-radio"><input type="radio" value="choice-3" id="radio-choice-3" name="radio-choice-1"><label for="radio-choice-3" data-theme="c" class="ui-btn ui-btn-icon-left ui-btn-up-c"><span class="ui-btn-inner"><span class="ui-btn-text">Hampster</span><span class="ui-icon ui-icon-ui-icon-radio-off ui-icon-radio-off"></span></span></label></div>
                         

                         <div class="ui-radio"><input type="radio" value="choice-4" id="radio-choice-4" name="radio-choice-1"><label for="radio-choice-4" data-theme="c" class="ui-btn ui-btn-icon-left ui-corner-bottom ui-controlgroup-last ui-btn-up-c"><span class="ui-btn-inner ui-corner-bottom ui-controlgroup-last"><span class="ui-btn-text">Lizard</span><span class="ui-icon ui-icon-ui-icon-radio-off ui-icon-radio-off"></span></span></label></div>
                         
                </div></fieldset>
            </div>

            <div data-role="fieldcontain" class="ui-field-contain ui-body ui-br">
                <fieldset data-type="horizontal" data-role="controlgroup" class="ui-corner-all ui-controlgroup ui-controlgroup-horizontal"><div class="ui-controlgroup-label" role="heading">Layout view:</div><div class="ui-controlgroup-controls">
                     
                         <div class="ui-radio"><input type="radio" checked="checked" value="on" id="radio-choice-c" name="radio-choice-b"><label for="radio-choice-c" data-theme="c" class="ui-btn ui-btn-active ui-corner-left ui-btn-up-c"><span class="ui-btn-inner ui-corner-left"><span class="ui-btn-text">List</span></span></label></div>
                         
                         <div class="ui-radio"><input type="radio" value="off" id="radio-choice-d" name="radio-choice-b"><label for="radio-choice-d" data-theme="c" class="ui-btn ui-btn-up-c"><span class="ui-btn-inner"><span class="ui-btn-text">Grid</span></span></label></div>
                         
                         <div class="ui-radio"><input type="radio" value="other" id="radio-choice-e" name="radio-choice-b"><label for="radio-choice-e" data-theme="c" class="ui-btn ui-btn-up-c ui-corner-right ui-controlgroup-last"><span class="ui-btn-inner ui-corner-right ui-controlgroup-last"><span class="ui-btn-text">Gallery</span></span></label></div>
                         
                </div></fieldset>
            </div>

            <div data-role="fieldcontain" class="ui-field-contain ui-body ui-br">
                <label class="select ui-select" for="select-choice-1">Choose shipping method:</label>
                <div class="ui-select"><a href="#" role="button" aria-haspopup="true" data-theme="c" class="ui-btn ui-btn-icon-right ui-btn-corner-all ui-shadow ui-btn-up-c"><span class="ui-btn-inner ui-btn-corner-all"><span class="ui-btn-text">Standard: 7 day</span><span class="ui-icon ui-icon-arrow-d ui-icon-shadow"></span></span></a><select id="select-choice-1" name="select-choice-1" tabindex="-1">
                    <option value="standard">Standard: 7 day</option>
                    <option value="rush">Rush: 3 days</option>
                    <option value="express">Express: next day</option>
                    <option value="overnight">Overnight</option>
                </select></div>
            </div>

            <div data-role="fieldcontain" class="ui-field-contain ui-body ui-br">
                <label class="select ui-select" for="select-choice-3">Your state:</label>
                <div class="ui-select"><a href="#" role="button" aria-haspopup="true" data-theme="c" class="ui-btn ui-btn-up-c ui-btn-icon-right ui-btn-corner-all ui-shadow"><span class="ui-btn-inner ui-btn-corner-all"><span class="ui-btn-text">Custom menu...</span><span class="ui-icon ui-icon-arrow-d ui-icon-shadow"></span></span></a><select id="select-choice-3" name="select-choice-3" tabindex="-1">
                    <option>Custom menu...</option>
                    <option value="AL">Alabama</option>
                    <option value="AK">Alaska</option>
                    <option value="AZ">Arizona</option>
                    <option value="AR">Arkansas</option>
                    <option value="CA">California</option>
                    <option value="CO">Colorado</option>
                    <option value="CT">Connecticut</option>
                    <option value="DE">Delaware</option>
                    <option value="FL">Florida</option>
                    <option value="GA">Georgia</option>
                    <option value="HI">Hawaii</option>
                    <option value="ID">Idaho</option>
                    <option value="IL">Illinois</option>
                    <option value="IN">Indiana</option>
                    <option value="IA">Iowa</option>
                    <option value="KS">Kansas</option>
                    <option value="KY">Kentucky</option>
                    <option value="LA">Louisiana</option>
                    <option value="ME">Maine</option>
                    <option value="MD">Maryland</option>
                    <option value="MA">Massachusetts</option>
                    <option value="MI">Michigan</option>
                    <option value="MN">Minnesota</option>
                    <option value="MS">Mississippi</option>
                    <option value="MO">Missouri</option>
                    <option value="MT">Montana</option>
                    <option value="NE">Nebraska</option>
                    <option value="NV">Nevada</option>
                    <option value="NH">New Hampshire</option>
                    <option value="NJ">New Jersey</option>
                    <option value="NM">New Mexico</option>
                    <option value="NY">New York</option>
                    <option value="NC">North Carolina</option>
                    <option value="ND">North Dakota</option>
                    <option value="OH">Ohio</option>
                    <option value="OK">Oklahoma</option>
                    <option value="OR">Oregon</option>
                    <option value="PA">Pennsylvania</option>
                    <option value="RI">Rhode Island</option>
                    <option value="SC">South Carolina</option>
                    <option value="SD">South Dakota</option>
                    <option value="TN">Tennessee</option>
                    <option value="TX">Texas</option>
                    <option value="UT">Utah</option>
                    <option value="VT">Vermont</option>
                    <option value="VA">Virginia</option>
                    <option value="WA">Washington</option>
                    <option value="WV">West Virginia</option>
                    <option value="WI">Wisconsin</option>
                    <option value="WY">Wyoming</option>
                </select></div>
            </div>

                <div data-role="fieldcontain" class="ui-field-contain ui-body ui-br">
                    <label class="select ui-select" for="select-choice-native">Your state:</label>
                    <div class="ui-select"><div data-theme="c" class="ui-btn ui-btn-up-c ui-btn-icon-right ui-btn-corner-all ui-shadow" tabindex="-1"><span class="ui-btn-inner ui-btn-corner-all"><span class="ui-btn-text">Native menu...</span><span class="ui-icon ui-icon-arrow-d ui-icon-shadow"></span></span><select data-native-menu="true" id="select-choice-native" name="select-choice-native">
                        <option>Native menu...</option>
                        <option value="AL">Alabama</option>
                        <option value="AK">Alaska</option>
                        <option value="AZ">Arizona</option>
                        <option value="AR">Arkansas</option>
                        <option value="CA">California</option>
                        <option value="CO">Colorado</option>
                        <option value="CT">Connecticut</option>
                        <option value="DE">Delaware</option>
                        <option value="FL">Florida</option>
                        <option value="GA">Georgia</option>
                        <option value="HI">Hawaii</option>
                        <option value="ID">Idaho</option>
                        <option value="IL">Illinois</option>
                        <option value="IN">Indiana</option>
                        <option value="IA">Iowa</option>
                        <option value="KS">Kansas</option>
                        <option value="KY">Kentucky</option>
                        <option value="LA">Louisiana</option>
                        <option value="ME">Maine</option>
                        <option value="MD">Maryland</option>
                        <option value="MA">Massachusetts</option>
                        <option value="MI">Michigan</option>
                        <option value="MN">Minnesota</option>
                        <option value="MS">Mississippi</option>
                        <option value="MO">Missouri</option>
                        <option value="MT">Montana</option>
                        <option value="NE">Nebraska</option>
                        <option value="NV">Nevada</option>
                        <option value="NH">New Hampshire</option>
                        <option value="NJ">New Jersey</option>
                        <option value="NM">New Mexico</option>
                        <option value="NY">New York</option>
                        <option value="NC">North Carolina</option>
                        <option value="ND">North Dakota</option>
                        <option value="OH">Ohio</option>
                        <option value="OK">Oklahoma</option>
                        <option value="OR">Oregon</option>
                        <option value="PA">Pennsylvania</option>
                        <option value="RI">Rhode Island</option>
                        <option value="SC">South Carolina</option>
                        <option value="SD">South Dakota</option>
                        <option value="TN">Tennessee</option>
                        <option value="TX">Texas</option>
                        <option value="UT">Utah</option>
                        <option value="VT">Vermont</option>
                        <option value="VA">Virginia</option>
                        <option value="WA">Washington</option>
                        <option value="WV">West Virginia</option>
                        <option value="WI">Wisconsin</option>
                        <option value="WY">Wyoming</option>
                    </select></div></div>
                </div>

        <div class="ui-body ui-body-b">
        <fieldset class="ui-grid-a">
                <div class="ui-block-a"><div data-theme="d" class="ui-btn ui-btn-up-d ui-btn-corner-all ui-shadow"><span class="ui-btn-inner ui-btn-corner-all"><span class="ui-btn-text">Cancel</span></span><button data-theme="d" type="submit" class="ui-btn-hidden">Cancel</button></div></div>
                <div class="ui-block-b"><div data-theme="a" class="ui-btn ui-btn-up-a ui-btn-corner-all ui-shadow"><span class="ui-btn-inner ui-btn-corner-all"><span class="ui-btn-text">Submit</span></span><button data-theme="a" type="submit" class="ui-btn-hidden">Submit</button></div></div>
        </fieldset>
        </div>
    </form>
        
        <p><a href="#foo">Back to foo</a></p>    
    </div><!-- /content -->

    <div data-role="footer">
        <h4>Page Footer</h4>
    </div><!-- /header -->
</div><!-- /page -->

{include file="footer.tpl"}