{include file="header.tpl"}
<div data-role="page"> 
    <div data-role="header"></div> 
    <div data-role="content">
        <div data-role="fieldcontain">
            <label for="name">Text Input:</label>
            <input type="text" name="name" id="name" value=""  />
        </div>
        <div data-role="fieldcontain">
            <label for="textarea">Textarea:</label>
            <textarea cols="40" rows="8" name="textarea" id="textarea"></textarea>
        </div>
        <div data-role="fieldcontain">
            <label for="search">Search Input:</label>
            <input type="search" name="password" id="search" value="" />
        </div>
        <div data-role="fieldcontain">
            <label for="slider">Input slider:</label>
             <input type="range" name="slider" id="slider" value="0" min="0" max="100"  />
        </div>
        <div data-role="fieldcontain">
            <label for="slider">Select slider:</label>
            <select name="slider" id="slider" data-role="slider">
                <option value="off">Off</option>
                <option value="on">On</option>
            </select> 
        </div>
        <div data-role="fieldcontain">
            <fieldset data-role="controlgroup">
                <legend>Choose a pet:</legend>
                     <input type="radio" name="radio-choice-1" id="radio-choice-1" value="choice-1" checked="checked" />
                     <label for="radio-choice-1">Cat</label>

                     <input type="radio" name="radio-choice-1" id="radio-choice-2" value="choice-2"  />
                     <label for="radio-choice-2">Dog</label>

                     <input type="radio" name="radio-choice-1" id="radio-choice-3" value="choice-3"  />
                     <label for="radio-choice-3">Hampster</label>

                     <input type="radio" name="radio-choice-1" id="radio-choice-4" value="choice-4"  />
                     <label for="radio-choice-4">Lizard</label>
            </fieldset>
        </div>
        <div data-role="fieldcontain">
            <fieldset data-role="controlgroup" data-type="horizontal" data-role="fieldcontain"> 
                <legend>Choose a pet:</legend>
                     <input type="radio" name="radio-choice-1" id="radio-choice-1" value="choice-1" checked="checked" />
                     <label for="radio-choice-1">Cat</label>

                     <input type="radio" name="radio-choice-1" id="radio-choice-2" value="choice-2"  />
                     <label for="radio-choice-2">Dog</label>

                     <input type="radio" name="radio-choice-1" id="radio-choice-3" value="choice-3"  />
                     <label for="radio-choice-3">Hampster</label>

                     <input type="radio" name="radio-choice-1" id="radio-choice-4" value="choice-4"  />
                     <label for="radio-choice-4">Lizard</label>
            </fieldset>
        </div>
        <div data-role="fieldcontain">
             <fieldset data-role="controlgroup">
                <legend>Agree to the terms:</legend>
                <input type="checkbox" name="checkbox-1" id="checkbox-1" class="custom" />
                <input type="checkbox" name="checkbox-2" id="checkbox-2" class="custom" />
                <input type="checkbox" name="checkbox-3" id="checkbox-3" class="custom" />
                <input type="checkbox" name="checkbox-4" id="checkbox-4" class="custom" />
                <input type="checkbox" name="checkbox-5" id="checkbox-5" class="custom" />
                <label for="checkbox-1">I agree</label>
                <label for="checkbox-2">I agree</label>
                <label for="checkbox-3">I agree</label>
                <label for="checkbox-4">I agree</label>
                <label for="checkbox-5">I agree</label>
            </fieldset>
        </div>
        <div data-role="fieldcontain">
             <fieldset data-role="controlgroup" data-type="horizontal" data-role="fieldcontain">
                <legend>Agree to the terms:</legend>
                <input type="checkbox" name="checkbox-1" id="checkbox-1" class="custom" />
                <input type="checkbox" name="checkbox-2" id="checkbox-2" class="custom" />
                <input type="checkbox" name="checkbox-3" id="checkbox-3" class="custom" />
                <input type="checkbox" name="checkbox-4" id="checkbox-4" class="custom" />
                <input type="checkbox" name="checkbox-5" id="checkbox-5" class="custom" />
                <label for="checkbox-1">I agree</label>
                <label for="checkbox-2">I agree</label>
                <label for="checkbox-3">I agree</label>
                <label for="checkbox-4">I agree</label>
                <label for="checkbox-5">I agree</label>
            </fieldset>
        </div>
        <div data-role="fieldcontain">
            <label for="select-choice-1" class="select">Choose shipping method:</label>
            <select name="select-choice-1" id="select-choice-1">
                <option value="standard">Standard: 7 day</option>
                <option value="rush">Rush: 3 days</option>
                <option value="express">Express: next day</option>
                <option value="overnight">Overnight</option>
            </select>
        </div>





    </div> 
    <div data-role="footer"></div> 
</div> 
{include file="footer.tpl"}