<?php /* Smarty version 2.6.26, created on 2011-03-07 09:37:49
         compiled from solutionfinder/index.tpl */ ?>
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
                <ul>
                    <?php echo $this->_tpl_vars['question']; ?>

                </ul>
            </div>
        </div>
        <?php echo '
            <script type="text/javascript">
                
                var solutionFinderObj = new solutionFinder();
                
                function solutionFinder() {
                    
                    function _makeAjaxRequest(url, data, callback, type){
                        
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
                    
                    /*
                    * get nodes list
                    */
                    this.loadChildrenNodes  =   function(idParent){
                        _makeAjaxRequest(\''; ?>
<?php echo prep_url(base_url() .'/solutionfinder/getc'); ?><?php echo '\', {
                            idParent: idParent 
                        }, function(json){
                        	
                            $(\'.b-solution-data ul\').empty().append(json.html);
                            $(\'.b-navigation span\').empty().append(\'<a href="javascript:solutionFinderObj.loadParentNodes(\' + json.parent + \');">Previous Node</a>\')
                        });            
                    }
                    
                    /*
                    * get nodes for parent navigation
                    */
                    this.loadParentNodes = function(idNode) {
                        _makeAjaxRequest(\''; ?>
<?php echo prep_url(base_url() . '/solutionfinder/getp'); ?><?php echo '\', {
                            idNode: idNode 
                        }, function(json){
                            
                            $(\'.b-solution-data ul\').empty().append(json.html);
                            
                            if(json.parent != null) {
                                $(\'.b-navigation span\').empty().append(\'<a href="javascript:solutionFinderObj.loadParentNodes(\' + json.parent + \');">'; ?>
Previous Node<?php echo '</a>\');
                            } else {
                                $(\'.b-navigation span\').empty().append(\''; ?>
Root node<?php echo '\')
                            }
                            
                        });    
                    }
                    
                    /**
                    * get solution list
                    */
                    this.loadSolutionsNodes = function(idNode, idSolution) {
                         _makeAjaxRequest(\''; ?>
<?php echo prep_url(base_url() . '/solutionfinder/gets'); ?><?php echo '\', {
                            idNode:     idNode,
                            idSolution: idSolution 
                        }, function(json){
                            
                            $(\'.b-solution-data ul\').empty().append(json.html);
                            $(\'.b-navigation span\').empty().append(\'<a href="javascript:solutionFinderObj.loadParentNodes(\' + json.parent + \');">Previous Node</a>\')
                        });    
                    }
                }
                
                function itemClick(type, itemId){
                    $.ajax({
                        url:        \''; ?>
<?php echo prep_url(base_url() . '/solutionfinder/click'); ?><?php echo '\',
                        data:       {type: type, id: itemId},
                        dataType:   \'jsonp\'        
                    })
                } 
            </script>
        '; ?>

        
    </body>
</html>