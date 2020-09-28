{$cssincludes}
{$jsnondocready}
{$jsdocready}
{$treestructure}
{literal}
	<script type="text/javascript">
    
        var copyNode    =   null;
    
        // fetch information about Answer and Question and put on the page
        function getQAInfo(id){
        
            if(typeof id != 'undefined') {
                $('#copy').removeAttr('disabled');
                $('#paste').removeAttr('disabled');
            } else {
                $('#copy').attr('disabled', 'disabled');
                $('#paste').attr('disabled', 'disabled');    
            }
        
            $('#question_info .validatetion-error').text('');
            $('#answer_info .validatetion-error').text('');
            
            $.getJSON('{/literal}{php}echo prep_url(base_url().'/treemanagment/getqa');{/php}{literal}', {
                idNode: id
            }, function(json) {
				
                if(json.answer.count > 0) {
                    with(json.answer.data) {
                    	
                    	// may be i`m not right !!!!!!
                        if(idSolution == null) {
                            $("#gtrwebsite_answers_idSolution option:first").attr("selected", "selected");
                        } else {
                            $("#gtrwebsite_answers_idSolution [value='" + idSolution + "']").attr("selected", "selected");
                        }
                        
                        $('#answer_posx').val(posX);
                        $('#answer_posy').val(posY);
                        $('#answer_level').val(level);
                        $('#answer_sort').val(sort);
                        $('#gtrwebsite_answers_idAnswer').val(idAnswer);
                        $('#gtrwebsite_answers_idAnswer').val(idAnswer);
                        $('#gtrwebsite_answers_description').val(description);
                        $('#answer_img').empty().append('<img src="' + img + '" alt="" title="" />');
                        $('#answer_userinsert').val(name);
                        $('#answer_datainsert').val(dataIns);
                    }
                } else {
                    $("#gtrwebsite_answers_idSolution :first").attr("selected", "selected");
                    $('#gtrwebsite_answers_idAnswer').val('');
                    $('#gtrwebsite_answers_description').val('');
                    $('#answer_img').empty();
                    $('#answer_userinsert').val('');
                    $('#answer_datainsert').val('');
                    $('#answer_posx').val('');
                    $('#answer_posy').val('');    
                    $('#answer_level').val('');    
                    $('#answer_sort').val('');    
                }
                
                if(json.question.count > 0){
                    with(json.question.data) {
                        $('#question_posx').val(posX);
                        $('#question_posy').val(posY);
                        $('#question_level').val(level);
                        $('#gtrwebsite_question_idQuestion').val(idQuestion);
                        $('#gtrwebsite_question_description').val(description);
                        $('#question_img').empty().append('<img src="' + img + '" alt="" title="" />');
                        $('#question_userinsert').val(name);
                        $('#question_datainsert').val(dataIns);
                    }
                } else {
                    $('#gtrwebsite_question_idQuestion').val('');
                    $('#gtrwebsite_question_description').val('');
                    $('#question_img').empty();
                    $('#question_userinsert').val('');
                    $('#question_datainsert').val('');
                    $('#question_posx').val('');
                    $('#question_posy').val('');    
                    $('#question_level').val('');    
                } 
            })            
		}                               
        
        function resetQAInfo(){
            $('#question_info :input[type=text]').val('');
            $('#question_img').empty();    
            $('#answer_info :input[type=text]').val('');
            $('#answer_info select').val('');
            $('#answer_img').empty();    
        }
        
        function selectAnswerImg(){
            window.answerimgselected  = {
                selected:  true,
                name:      fileObj.name 
            };
        }
        
        function cancelAnswerImg(){
            if(typeof window.answerimgselected != 'undefined') {
                window.answerimgselected.selected = false;    
                window.answerimgselected.name     = '';
            }    
        }
        
        function selectQuestionImg(){
            window.questionimgselected  = {
                selected:  true,
                name:      fileObj.name 
            };
        }
        
        function cancelQuestionImg(){
            if(typeof window.questionimgselected != 'undefined') {
                window.questionimgselected.selected = false;
                window.questionimgselected.name     = '';
            }
        }
        
        function renameNodeName(nodeId){
            $.getJSON('{/literal}{php}echo prep_url(base_url().'/treemanagment/getqa');{/php}{literal}', {
                idNode: nodeId
            }, function(json) {
                $('#' + nodeId).html('<ins class="jstree-icon">&nbsp;</ins>' + nodeId + ' | ' + json.answer.data.description + ' | ' + json.question.data.description);    
            })
        }
        
        $(function () {
            
            // if tree is empty, disable all buttons
            if($('#gtrwebsite_tree_dom_structure ul li').length == 0) {
                $('#menulist input').attr('disabled', 'disabled');    
            }
        });
    </script>
{/literal}
