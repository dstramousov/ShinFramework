<?php /* Smarty version 2.6.26, created on 2011-04-04 09:00:49
         compiled from managment/tree/tree_management.tpl */ ?>
<table width="100%" border="1" cellpadding="3" cellspacing="3">
    <tr>
        <td colspan="2" id="menulist">
            <input type="button" name="button" value="<?php echo $this->_tpl_vars['lng_label_create_node']; ?>
" id="create" />
            <input type="button" name="button" value="<?php echo $this->_tpl_vars['lng_label_delete_node']; ?>
" id="remove" />
            <input type="button" name="button" value="<?php echo $this->_tpl_vars['lng_label_copy_node']; ?>
" id="copy" disabled="disabled" />
            <input type="button" name="button" value="<?php echo $this->_tpl_vars['lng_label_past_node']; ?>
" id="paste" disabled="disabled" />
            <!--<input type="button" name="button" value="<?php echo $this->_tpl_vars['lng_label_create_node']; ?>
" id="" />-->
        </td>
    </tr>
    <tr>
        <!-- left section -->
        <td width="70%" valign="top">
            <div id="gtrwebsite_tree_dom_structure" class="demo source"></div>
        </td>
        <!-- left section -->
        
        <!-- right section -->
        <td width="30%">
            <!-- question section -->
            <table border="1">
                <tr>
                    <th><?php echo $this->_tpl_vars['lng_label_question_panel_name']; ?>
</th>
                </tr>
                <tr>
                    <td>
                        <table id="question_info">
                            <tr>
                                <th><?php echo $this->_tpl_vars['lng_label_question_description']; ?>
</th>
                                <td>
                                    <input type="hidden" value="" name="gtrwebsite_question_idQuestion" id="gtrwebsite_question_idQuestion" />
                                    <input type="text" value="" name="gtrwebsite_question_description" id="gtrwebsite_question_description" /><br />
                                    <span class="validatetion-error" id="gtrwebsite_question_description_error"></span>
                                </td>
                            </tr>
                            <tr>
                                <th><?php echo $this->_tpl_vars['lng_label_question_img_old']; ?>
</th>
                                <td id="question_img"></td>
                            </tr>
                            <tr>
                                <th><?php echo $this->_tpl_vars['lng_label_question_img_new']; ?>
</th>
                                <td>
                                    <div id="questionImg"></div><br />
                                    <span class="validatetion-error" id="gtrwebsite_question_img_error"></span>
                                </td>
                            </tr>
                            <tr>
                                <th><?php echo $this->_tpl_vars['lng_label_solution_posx']; ?>
</th>
                                <td>
                                    <table width="100%">
                                        <tr>
                                            <td>
                                                 <input type="text" value="" name="question_posx" id="question_posx" style="width: 30px;" /><br />
                                                 <span class="validatetion-error" id="gtrwebsite_question_posX_error"></span> 
                                            </td>
                                            <th><?php echo $this->_tpl_vars['lng_label_solution_posy']; ?>
</th>
                                            <td>
                                                 <input type="text" value="" name="question_posy" id="question_posy" style="width: 30px;" /><br />
                                                 <span class="validatetion-error" id="gtrwebsite_question_posY_error"></span>
                                            </td>
                                            <th><?php echo $this->_tpl_vars['lng_label_solution_level']; ?>
</th>
                                            <td>
                                                <input type="text" value="" name="question_level" id="question_level" style="width: 30px;" /><br />
                                                <span class="validatetion-error" id="gtrwebsite_question_level_error"></span>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <th><?php echo $this->_tpl_vars['lng_label_question_userinsert']; ?>
</th>
                                <td><input type="text" value="" name="question_userinsert" id="question_userinsert" disabled="disabled" /></td>
                            </tr>
                            <tr>
                                <th><?php echo $this->_tpl_vars['lng_label_question_datainsert']; ?>
</th>
                                <td><input type="text" value="" name="question_datainsert" id="question_datainsert" disabled="disabled" /></td>
                            </tr>
                            <tr>
                                <td align="right" colspan="2"><input type="button" value="<?php echo $this->_tpl_vars['lng_label_save_question_submit']; ?>
" name="" id="save_question" /></td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
            <!-- question section -->
            
            <!-- answer section -->
            <table border="1">
                <tr>
                    <th><?php echo $this->_tpl_vars['lng_label_answer_panel_name']; ?>
</th>
                </tr>
                <tr>
                    <td>
                        <table id="answer_info">
                            <tr>
                                <th><?php echo $this->_tpl_vars['lng_label_answer_description']; ?>
</th>
                                <td>
                                    <input type="hidden" value="" name="gtrwebsite_answers_idAnswer" id="gtrwebsite_answers_idAnswer" />
                                    <input type="text" value="" name="gtrwebsite_answers_description" id="gtrwebsite_answers_description" /><br />
                                    <span class="validatetion-error" id="gtrwebsite_answers_description_error"></span>
                                </td>
                            </tr>
                            <tr>
                                <th><?php echo $this->_tpl_vars['lng_label_answer_img_old']; ?>
</th>
                                <td id="answer_img"></td>
                            </tr>
                            <tr>
                                <th><?php echo $this->_tpl_vars['lng_label_answer_img_new']; ?>
</th>
                                <td>
                                    <div id="answerImg"></div><br />
                                    <span class="validatetion-error" id="gtrwebsite_answers_img_error"></span>
                                </td>
                            </tr>
                            <tr>
                                <th><?php echo $this->_tpl_vars['lng_label_solution_posx']; ?>
</th>
                                <td>
                                    <table width="100%">
                                        <tr>
                                            <td>
                                                <input type="text" value="" name="answer_posx" id="answer_posx" style="width: 30px;" /><br />
                                                <span class="validatetion-error" id="gtrwebsite_answers_posX_error"></span>
                                            </td>
                                            <th><?php echo $this->_tpl_vars['lng_label_solution_posy']; ?>
</th>
                                            <td>
                                                <input type="text" value="" name="answer_posy" id="answer_posy" style="width: 30px;" /><br />
                                                <span class="validatetion-error" id="gtrwebsite_answers_posY_error"></span>
                                            </td>
                                            <th><?php echo $this->_tpl_vars['lng_label_solution_level']; ?>
</th>
                                            <td>
                                                <input type="text" value="" name="answer_level" id="answer_level" style="width: 30px;" /><br />
                                                <span class="validatetion-error" id="gtrwebsite_answers_level_error"></span>
                                            </td>
                                            <th><?php echo $this->_tpl_vars['lng_label_solution_sort']; ?>
</th>
                                            <td>
                                                <input type="text" value="" name="answer_level" id="answer_sort" style="width: 30px;" /><br />
                                                <span class="validatetion-error" id="gtrwebsite_answers_sort_error"></span>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <th><?php echo $this->_tpl_vars['lng_label_answer_solution']; ?>
</th>
                                <td><?php echo $this->_tpl_vars['answer_solution_custom_input']; ?>
</td>
                            </tr>
                            <tr>
                                <th><?php echo $this->_tpl_vars['lng_label_answer_userinsert']; ?>
</th>
                                <td><input type="text" value="" name="answer_userinsert" id="answer_userinsert" disabled="disabled" /></td>
                            </tr>
                            <tr>
                                <th><?php echo $this->_tpl_vars['lng_label_answer_datainsert']; ?>
</th>
                                <td><input type="text" value="" name="answer_datainsert" id="answer_datainsert" disabled="disabled" /></td>
                            </tr>
                            <tr>
                                <td align="right" colspan="2"><input type="button" value="<?php echo $this->_tpl_vars['lng_label_save_answer_submit']; ?>
" name="" id="save_answer" /></td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
            <!-- answer section -->
        </td>
        <!-- right section -->
    </tr>
</table>

<?php echo '
    <script type="text/javascript">
        $(document).ready(function(){
            $("#menulist input").click(function () {
                switch(this.id) {
                    case "create":
                        $("#gtrwebsite_tree_dom_structure").jstree("create", null, "last", \''; ?>
<?php echo $this->_tpl_vars['lng_label_new_node']; ?>
<?php echo '\', false, true);
                        break;
                    default:
                        $("#gtrwebsite_tree_dom_structure").jstree(this.id);
                        break;
                }
            });
            
            $(\'#save_question\').bind(\'click\', function(){
                selectedNode = $($.jstree._focused().get_selected()).attr(\'id\').replace(\'elem_\', "");
                
                if(selectedNode == "" || selectedNode == undefined) {
                    alert(\''; ?>
<?php echo $this->_tpl_vars['lng_label_node_not_selected_prompt']; ?>
<?php echo '\');
                    return false;
                }
                
                $.ajax({
                    url:        \''; ?>
<?php echo prep_url(base_url().'/treemanagment/validateq'); ?><?php echo '\',
                    dataType:   \'json\',
                    type:       \'POST\',
                    data:       {
                        gtrwebsite_question_idQuestion:     $(\'#gtrwebsite_question_idQuestion\').val(),
                        gtrwebsite_question_description:    $(\'#gtrwebsite_question_description\').val(),
                        gtrwebsite_question_img:            typeof window.questionimgselected != \'undefined\' ? window.questionimgselected.name : \'\',     
                        gtrwebsite_question_posX:           $(\'#question_posx\').val(),     
                        gtrwebsite_question_posY:           $(\'#question_posy\').val(),     
                        gtrwebsite_question_level:          $(\'#question_level\').val()     
                    },
                    success: function(json) {
                        if(json.result) {
                            // upload img
                            $(\'#questionImg\').uploadifyUpload();
                            // create question
                            $.ajax({
                                url:        \''; ?>
<?php echo prep_url(base_url().'/treemanagment/createq'); ?><?php echo '\',
                                dataType:   \'json\',
                                type:       \'POST\',
                                data:       {
                                    gtrwebsite_question_idQuestion:     $(\'#gtrwebsite_question_idQuestion\').val(),
                                    gtrwebsite_question_description:    $(\'#gtrwebsite_question_description\').val(),
                                    gtrwebsite_question_img:            typeof window.questionimgselected != \'undefined\' ? window.questionimgselected.name : \'\',     
                                    gtrwebsite_question_idNode:         selectedNode ,
                                    gtrwebsite_question_posX:           $(\'#question_posx\').val(),     
                                    gtrwebsite_question_posY:           $(\'#question_posy\').val(),
                                    gtrwebsite_question_level:          $(\'#question_level\').val()
                                },
                                success:    function(json){
                                    if(json.result) {
                                        renameNodeName(selectedNode);
                                        setTimeout(function(){
                                            getQAInfo(selectedNode);
                                        }, 2000);
                                        cancelQuestionImg();
                                    }    
                                }
                            });
                        } else {
                            $(\'#question_info .validatetion-error\').text(\'\');
                            for(index in json.errors) {
                                $(\'#question_info #\' + index + \'_error\').text(json.errors[index]).show();    
                            }
                        }
                    }
                    
                })
            });
            
            $(\'#save_answer\').bind(\'click\', function(){
                
                selectedNode = $($.jstree._focused().get_selected()).attr(\'id\').replace(\'elem_\', "");
                
                if(selectedNode == "" || selectedNode == undefined) {
                    alert(\''; ?>
<?php echo $this->_tpl_vars['lng_label_node_not_selected_prompt']; ?>
<?php echo '\');
                    return false;
                }
                
                $.ajax({
                    url:        \''; ?>
<?php echo prep_url(base_url().'/treemanagment/validatea'); ?><?php echo '\',
                    dataType:   \'json\',
                    type:       \'POST\',
                    data:       {
                        gtrwebsite_answers_idAnswer:       $(\'#gtrwebsite_answers_idAnswer\').val(), 
                        gtrwebsite_answers_description:    $(\'#gtrwebsite_answers_description\').val(),
                        gtrwebsite_answers_img:            typeof window.answerimgselected != \'undefined\' ? window.answerimgselected.name : \'\',
                        gtrwebsite_answers_posX:           $(\'#answer_posx\').val(),     
                        gtrwebsite_answers_posY:           $(\'#answer_posy\').val(),     
                        gtrwebsite_answers_level:          $(\'#answer_level\').val(),     
                        gtrwebsite_answers_sort:           $(\'#answer_sort\').val()     
                    },
                    success: function(json) {
                        if(json.result) {
                            // upload img
                            $(\'#answerImg\').uploadifyUpload();
                            // create answer
                            $.ajax({
                                url:        \''; ?>
<?php echo prep_url(base_url().'/treemanagment/createa'); ?><?php echo '\',
                                dataType:   \'json\',
                                type:       \'POST\',
                                data:       {
                                    gtrwebsite_answers_idSolution:     $(\'#gtrwebsite_answers_idSolution\').val(), 
                                    gtrwebsite_answers_idAnswer:       $(\'#gtrwebsite_answers_idAnswer\').val(), 
                                    gtrwebsite_answers_description:    $(\'#gtrwebsite_answers_description\').val(),
                                    gtrwebsite_answers_img:            typeof window.answerimgselected != \'undefined\' ? window.answerimgselected.name : \'\',     
                                    gtrwebsite_answers_idNode:         selectedNode,
                                    gtrwebsite_answers_posX:           $(\'#answer_posx\').val(),     
                                    gtrwebsite_answers_posY:           $(\'#answer_posy\').val(),
                                    gtrwebsite_answers_level:          $(\'#answer_level\').val(),
                                    gtrwebsite_answers_sort:           $(\'#answer_sort\').val()
                                },
                                success:    function(json){
                                    if(json.result) {
                                        renameNodeName(selectedNode);
                                        setTimeout(function(){
                                            getQAInfo(selectedNode);
                                        }, 2000);
                                        cancelAnswerImg();
                                    }    
                                }
                            });
                        } else {
                            $(\'#answer_info .validatetion-error\').text(\'\');
                            for(index in json.errors) {
                                $(\'#answer_info #\' + index + \'_error\').text(json.errors[index]).show();    
                            }
                        }
                    }
                    
                })
            })
        })
    </script>
'; ?>

