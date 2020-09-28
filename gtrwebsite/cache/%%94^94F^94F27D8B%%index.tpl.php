<?php /* Smarty version 2.6.26, created on 2011-03-07 12:46:43
         compiled from solutionfinder2/index.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "solutionfinder/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
        <h1>Solution Finder main page.</h1>

	    <a href="<?php  echo prep_url(shinfw_base_url().'/main');  ?>">Back to Main page</a>
	    <br><br>

        <div class="b-solution">
            <div class="b-navigation">
                Navigation:<span>Root node</span>
            </div>
            <div class="b-solution-data">
                <div id="question-list"></div>
            </div>
        </div>
        <?php echo '
            <script type="text/javascript">
            
                var solutionFinderObj = new solutionFinder();
                
                function solutionFinder() {
                    
                    solutionFinder.prototype._makeAjaxRequest = function _makeAjaxRequest(url, data, callback, type){
                        
                        if(type == undefined) {
                            type = \'jsonp\';
                        }
                        $.ajax({
                                url:        url,
                                dataType:   type,
                                data:       data,
                                success:    callback
                        })
                    }
                    
                    /**
                    * draw one answer block
                    *
                    * @param data - answer data
                    * @return generated HTML
                    */
                    solutionFinder.prototype.drawAnswer =   function(data){
                        var answersHtml = null;
                        
                        with(data) {
                                            
                            if(idSolution == null || idSolution == 0) {
                                eventHtml = \'onclick="itemClick(\\\'answer\\\', \' + idAnswer + \'); solutionFinderObj.loadChildrenNodes(\' + idNode + \')"\';
                            } else {
                                eventHtml = \'onclick="itemClick(\\\'answer\\\', \' + idAnswer + \'); solutionFinderObj.loadSolutionsNodes(\' + idNode + \', \' + idSolution + \')"\';
                            }
                            
                            answersHtml  = \'<table class="b-answer-block" \' + eventHtml + \'>\' +
                                                \'<tr>\' +
                                                    \'<td class="solution-img"><img src="\' + thumb + \'" alt="" title="" id="answer-img" /></td>\' +
                                                    \'<td class="solution-desc" id="answer-description">\' + description + \'</td>\' +
                                                \'</tr>\' +
                                           \'</table>\';
                            return answersHtml;   
                        }
                    }
                    
                    /**
                    * draw one question block
                    *
                    * @param data - question data
                    * @return generated HTML
                    */
                    solutionFinder.prototype.drawQuestion   =   function(data, answersHtml){
                        
                        with(data) {
                            var questionBlock   =   \'<table>\' +
                                                        \'<tr>\' +
                                                            \'<td>\' +
                                                                \'<table class="b-solution-block">\' +
                                                                    \'<tr>\' +
                                                                        \'<td class="solution-img"><img src="\' + thumb + \'" alt="" title="" id="question-img" /></td>\' +
                                                                        \'<td class="solution-desc" id="question-description">\' + description + \'</td>\' +
                                                                    \'</tr>\' +
                                                                \'</table>\'  +
                                                            \'</td>\';
                            if(answersHtml != \'\') {
                                questionBlock = questionBlock + \'<td>\' +
                                                                    \'<fieldset>\' +
                                                                        \'<legend>'; ?>
All answers</legend><?php echo '\' +
                                                                        \'<div id="answer-list">\' + answersHtml + \'</div>\' +
                                                                    \'</fieldset>\' +
                                                                \'</td>\';
                            }
                            
                            questionBlock = questionBlock + \'</tr>\' +
                                                           \'</table>\';
                            
                            return questionBlock;  
                        }
                    }
                    
                    /**
                    * draw one solution item block
                    *
                    * @param data - solution item data
                    * @return generated HTML
                    */
                    solutionFinder.prototype.drawSolutionItem   =   function(data){
                        
                        with(data) {
                            var solutionItemBlock   =   \'<table class="b-items-block" onclick="itemClick(\\\'items\\\', \' + idItem + \')">\' +
                                                            \'<tr>\' +
                                                                \'<td class="solution-img"><img src="\' + thumb + \'" alt="" title="" id="solution-item-img" /></td>\' +
                                                                \'<td class="solution-desc" id="solution-item-description">\' + description + \'</td>\' +
                                                            \'</tr>\' +
                                                            \'<tr>\' +
                                                                \'<td></td><td></td><td class="solution-desc" id="solution-item-description">\' + link + \'</td>\' +
                                                            \'</tr>\' +
                                                        \'</table>\' +
                                                        \'<hr />\';
                            
                            return solutionItemBlock;  
                        }
                    }
                    
                    /**
                    * draw one solution block
                    *
                    * @param data - solution data
                    * @return generated HTML
                    */
                    solutionFinder.prototype.drawSolution   =   function(data, itemsHtml){
                        
                        with(data) {
                            var solutionBlock   =   \'<table class="b-solution-block">\' +
                                                        \'<tr>\' +
                                                            \'<td class="solution-img"><img src="\' + thumb + \'" alt="" title="" id="solution-img" /></td>\' +
                                                            \'<td class="solution-desc" id="solution-description">\' + description + \'</td>\' +
                                                            \'<td class="solution-desc">PosX: \' + posX + \'</td>\' +
                                                            \'<td class="solution-desc">PosY: \' + posY + \'</td>\' +
                                                        \'</tr>\';
                                                        
                            if(itemsHtml !=\'\') {
                                solutionBlock   =   solutionBlock + \'<tr>\' +
                                                                        \'<td colspan="4" id="solution-item-list">\' +
                                                                            \'<fieldset>\' + 
                                                                                \'<legend>'; ?>
<?php echo $this->_tpl_vars['lang_label_gtrwebsite_items']; ?>
<?php echo '</legend>\' + itemsHtml + 
                                                                            \'</fieldset>\' +
                                                                        \'</td>\' +
                                                                    \'</tr>\';
                            }
                            
                            solutionBlock   =   solutionBlock + \'</table>\';
                            
                            return solutionBlock;  
                        }
                    }
                    
                    
                    
                    this.drawTree   =   function drawTree(json){
                        if(json.question != undefined) {
                            // fetch all questions
                            var question = null;
                            for(question in json.question) {
                                with(json.question[question]) {
                                
                                    var answerHtml  = \'\';
                                    var answer      = null;
                                    
                                    for(answer in json.question[question].answers) {
                                        answerHtml = answerHtml + this.drawAnswer(json.question[question].answers[answer]);
                                    }
                                    
                                    $(\'#question-list\').empty().append(this.drawQuestion(json.question[question], answerHtml));
                                }
                            }
                        }
                    }
                    
                    /*
                    * get nodes list
                    */
                    this.loadChildrenNodes  =   function(idParent){
                        this._makeAjaxRequest(\''; ?>
<?php echo prep_url(base_url() . '/solutionfinder2/getc'); ?><?php echo '\', {
                            idParent: idParent 
                        }, function(json){
                            
                            $(\'.b-navigation span\').empty().append(\'<a href="javascript:solutionFinderObj.loadParentNodes(\' + json.parent + \');">Previous Node</a>\')
                        
                            solutionFinderObj.drawTree(json.data);
                        });            
                    }
                    
                    /*
                    * get nodes for parent navigation
                    */
                    this.loadParentNodes = function(idNode) {
                        this._makeAjaxRequest(\''; ?>
<?php echo prep_url(base_url() . '/solutionfinder2/getp'); ?><?php echo '\', {
                            idNode: idNode 
                        }, function(json){
                            
                            if(json.parent != null) {
                                $(\'.b-navigation span\').empty().append(\'<a href="javascript:solutionFinderObj.loadParentNodes(\' + json.parent + \');">'; ?>
Previous Node<?php echo '</a>\');
                            } else {
                                $(\'.b-navigation span\').empty().append(\''; ?>
Root node<?php echo '\')
                            }
                            
                            solutionFinderObj.drawTree(json.data);
                            
                        });    
                    }
                    
                    /**
                    * get solution list
                    */
                    this.loadSolutionsNodes = function(idNode, idSolution) {
                         
                         var target = this;
                            
                         this._makeAjaxRequest(\''; ?>
<?php echo prep_url(base_url() . '/solutionfinder2/gets'); ?><?php echo '\', {
                            idNode:     idNode,
                            idSolution: idSolution 
                        }, function(json){
                            
                            $(\'.b-navigation span\').empty().append(\'<a href="javascript:solutionFinderObj.loadParentNodes(\' + json.parent + \');">Previous Node</a>\')
                        
                            var itemHtml = \'\';
                            if(typeof json.data.items != \'undefined\') {
                                var item = null;    
                                for(item in json.data.items) {
                                    itemHtml = itemHtml + target.drawSolutionItem(json.data.items[item]);    
                                }
                            }
                        
                            if(typeof json.data.solution != \'undefined\') {
                                $(\'#question-list\').empty().append(target.drawSolution(json.data.solution, itemHtml));
                            }
                        
                        });    
                    }
                }
                
                solutionFinderObj._makeAjaxRequest(\''; ?>
<?php echo prep_url(base_url() . '/solutionfinder2/getr'); ?><?php echo '\', null, function(json){
                    solutionFinderObj.drawTree(json);    
                });
                
                function itemClick(type, itemId){
                    $.ajax({
                        url:        \''; ?>
<?php echo prep_url(base_url() . '/solutionfinder2/click'); ?><?php echo '\',
                        data:       {type: type, id: itemId},
                        dataType:   \'jsonp\'        
                    })
                }
                    
            </script>
        '; ?>

        
    </body>
</html>