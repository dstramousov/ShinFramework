{include file="header.tpl"}

<body id="page">

<fieldset>
	<legend>&nbsp;&nbsp;<b>{$lng_label_tools_fw_menu}</b>&nbsp;&nbsp;</legend>
	{include file="main_menu.tpl"}

</fieldset>

<br/>

<fieldset>
	<legend>&nbsp;&nbsp;<b>{$lng_label_tools_ppfm_menu}</b>&nbsp;&nbsp;</legend>
	{include file="ppfm_menu.tpl"}

</fieldset>

<br/>
    
    
    {literal}
    <script type="text/javascript">
        var options  = {
            mode:       '{/literal}{$mode}{literal}',
            url:        '{/literal}{php} echo base_url().'/index.php/todo/ajaxEvents'; {/php}'{literal}
        };
        
        var todoList    = new todoListClass(options);
        var isDebug     = false;
        var mode        = '{/literal}{$mode}{literal}';
        var activeTodo  = null; 
        
    </script>
    {/literal}
    
    {if $mode == 'tree'}
        <div class="b-main-wrapper">
            <div class="b-inner">
                <fieldset>
                <legend>{$lng_label_todo_list}</legend>
                    <div class="b-single-add-todo">
                        <input type="button" value="{$lng_label_add_todo}" name="" id="add-todo" onclick="openAddDialog();">
                    </div>
                    <ul class="b-todo-list">
                         {include file="todo/tree-todolist.tpl"}
                    </ul>
                </fieldset>
            </div>
        </div>
    {else}
        <div class="b-main-wrapper-single" id="b-main-wrapper-single">
            <div class="b-inner">
                <fieldset style="width: 47%;">
                    <legend>{$lng_label_todo_list}</legend>
                    <div class="b-single-add-todo">
                        <input type="button" value="{$lng_label_add_todo}" name="" id="add-todo" onclick="openAddDialog();">
                    </div>
                    <ul class="b-single-todo-list">
                        {include file="todo/single-todolist.tpl"}    
                    </ul>
                </fieldset>
                
                <fieldset  style="width: 50%;">
                    <legend>{$lng_label_general_information}</legend>
                    
                    <fieldset style="float: none" class="b-todo-information">
                    <legend>{$lng_label_todo_information}</legend>
                        <table>
                            <tr>
                                <td>{$lng_label_title}</td>
                                <td id="title_edit"></td>
                            </tr>
                            <tr>
                                <td>{$lng_label_percentage}</td>
                                <td id="percantage_edit"></td>
                            </tr>
                        </table>
                        <input type="hidden" name="todo_item_type_edit" id="todo_item_type_edit" value="" />
                        <input type="hidden" name="todo_item_id_edit" id="todo_item_id_edit" value="" />
                        
                        <p>
                            <div class="show-btn">
                                <input type="button" name="chnage-todo-btn" id="chnage-todo-btn" value="{$lng_label_edit_todo}" onclick="enableEditing();" />
                            </div>
                        </p>    
                    </fieldset>
                     
                    <fieldset style="float: none">
                    <legend>{$lng_label_todo_item_list}</legend>
                        <div class="b-single-add-todo-item">
                            <input type="button" value="{$lng_label_add_todo_item}" name="" id="add-todo-item" onclick="openAddItemDialog();">
                        </div>
                        <ul class="b-single-todo-list-items">
                            
                        </ul>
                    </fieldset>
                </fieldset>
            </div>
            <div class="clear"></div>
        </div>
    {/if}


    <div id="dialog-add">
        <table>
            <tr>
                <td><label for="name">{$lng_label_title}</label></td>
                <td>
                    <input type="text" name="title_add" id="title_add" class="text ui-widget-content ui-corner-all" style="width: 300px;" />
                    <div style="color: red; font-size: 12px; display: none;"></div>
                </td>
            </tr>
        </table>
    </div>
    
    <div id="dialog-add-item">
    <table>
        <tr>
            <td><label for="name">{$lng_label_title}</label></td>
            <td>
                <input type="text" name="item_title_add" id="item_title_add" class="text ui-widget-content ui-corner-all" style="width: 250px;" />
                <div style="color: red; font-size: 12px; display: none;"></div>
            </td>
        </tr>
        <tr>
            <td><label for="name">{$lng_label_percentage}</label></td>
            <td>
                <input type="text" name="item_percantage_add" id="item_percantage_add" class="text ui-widget-content ui-corner-all" />
                <div style="color: red; font-size: 12px; display: none;"></div>
            </td>
        </tr>
        <tr>
            <td><label for="name">{$lng_label_completition_date}</label></td>
            <td>
                <input type="text" name="item_completition_date_add" id="item_completition_date_add" class="text ui-widget-content ui-corner-all" />
                <div style="color: red; font-size: 12px; display: none;"></div>
            </td>
        </tr>
        <tr>
            <td><label for="name">{$lng_label_real_completition_date}</label></td>
            <td>
                <input type="text" name="item_real_completition_date_add" id="item_real_completition_date_add" class="text ui-widget-content ui-corner-all" />
                <div style="color: red; font-size: 12px; display: none;"></div>
            </td>
        </tr>
        <tr>
            <td><label for="name">{$lng_label_priority}</label></td>
            <td>
                <select name="item_priority_item_add" id="item_priority_item_add" class="text ui-widget-content ui-corner-all">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                </select>
            </td>
        </tr>
        <tr>
            <td><label for="name">{$lng_label_note}</label></td>
            <td><textarea rows="10" id="item_note_item_add"  class="text ui-widget-content ui-corner-all" style="width: 250px;"></textarea></td>
        </tr>
    </table>
    </div>
    
    <div id="dialog-edit">
    <table>
        <tr>
            <td><label for="name">{$lng_label_title}</label></td>
            <td>
                <input type="text" name="dialog_title_edit" id="dialog_title_edit" class="text ui-widget-content ui-corner-all" style="width: 300px;" />
                <div style="color: red; font-size: 12px; display: none;"></div>
            </td>
        </tr>
    </table>
    <input type="hidden" name="dialog_todo_item_type_edit" id="dialog_todo_item_type_edit" value="" />
    <input type="hidden" name="dialog_todo_item_id_edit" id="dialog_todo_item_id_edit" value="" />
   </div>
    
    <div id="dialog-item-edit">
    <table>
        <tr>
            <td><label for="name">{$lng_label_title}</label></td>
            <td>
                <input type="text" name="title_item_edit" id="title_item_edit" class="text ui-widget-content ui-corner-all" style="width: 250px;" />
                <div style="color: red; font-size: 12px; display: none;"></div>
            </td>
        </tr>
        <tr>
            <td><label for="name">{$lng_label_percentage}</label></td>
            <td>
                <input type="text" name="percantage_item_edit" id="percantage_item_edit" class="text ui-widget-content ui-corner-all" />
                <div style="color: red; font-size: 12px; display: none;"></div>
            </td>
        </tr>
        <tr>
            <td><label for="name">{$lng_label_completition_date}</label></td>
            <td>
                <input type="text" name="completition_date_item_edit" id="completition_date_item_edit" class="text ui-widget-content ui-corner-all" />
                <div style="color: red; font-size: 12px; display: none;"></div>
            </td>
        </tr>
        <tr>
            <td><label for="name">{$lng_label_real_completition_date}</label></td>
            <td>
                <input type="text" name="real_completition_date_item_edit" id="real_completition_date_item_edit" class="text ui-widget-content ui-corner-all" />
                <div style="color: red; font-size: 12px; display: none;"></div>
            </td>
        </tr>
        <tr>
            <td><label for="name">{$lng_label_priority}</label></td>
            <td>
                <select name="priority_item_edit" id="priority_item_edit" class="text ui-widget-content ui-corner-all">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                </select>
            </td>
        </tr>
        <tr>
            <td><label for="name">{$lng_label_note}</label></td>
            <td><textarea rows="10" id="note_item_edit"  class="text ui-widget-content ui-corner-all" style="width: 250px;"></textarea></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
    </table>
    <input type="hidden" name="todo_sub_item_type_edit" id="todo_sub_item_type_edit" value="" />
    <input type="hidden" name="todo_sub_item_id_edit" id="todo_sub_item_id_edit" value="" />
    </div>
    
    {$dialog_delete}
 
	{include file='tech_info.tpl'}

    </body>

</html>
