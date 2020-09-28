{include file="solutionfinder/header.tpl"}
    <body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
        <h1>Solution Finder main page.</h1>

	    <a href="{php} echo prep_url(shinfw_base_url().'/main'); {/php}">Back to Main page</a>
	    <br><br>
        
        <div class="b-solution">
            <div class="b-navigation">
                Navigation:<span>Root node</span>
            </div>
            <div class="b-solution-data">
                <ul>
                    {$question}
                </ul>
            </div>
        </div>
        {literal}
            <script type="text/javascript">
                
                var solutionFinderObj = new solutionFinder();
                
                function solutionFinder() {
                    
                    function _makeAjaxRequest(url, data, callback, type){
                        
                        if(type == undefined) {
                            type = 'jsonp';
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
                        _makeAjaxRequest('{/literal}{php}echo prep_url(base_url() .'/solutionfinder/getc');{/php}{literal}', {
                            idParent: idParent 
                        }, function(json){
                        	
                            $('.b-solution-data ul').empty().append(json.html);
                            $('.b-navigation span').empty().append('<a href="javascript:solutionFinderObj.loadParentNodes(' + json.parent + ');">Previous Node</a>')
                        });            
                    }
                    
                    /*
                    * get nodes for parent navigation
                    */
                    this.loadParentNodes = function(idNode) {
                        _makeAjaxRequest('{/literal}{php}echo prep_url(base_url() . '/solutionfinder/getp');{/php}{literal}', {
                            idNode: idNode 
                        }, function(json){
                            
                            $('.b-solution-data ul').empty().append(json.html);
                            
                            if(json.parent != null) {
                                $('.b-navigation span').empty().append('<a href="javascript:solutionFinderObj.loadParentNodes(' + json.parent + ');">{/literal}Previous Node{literal}</a>');
                            } else {
                                $('.b-navigation span').empty().append('{/literal}Root node{literal}')
                            }
                            
                        });    
                    }
                    
                    /**
                    * get solution list
                    */
                    this.loadSolutionsNodes = function(idNode, idSolution) {
                         _makeAjaxRequest('{/literal}{php}echo prep_url(base_url() . '/solutionfinder/gets');{/php}{literal}', {
                            idNode:     idNode,
                            idSolution: idSolution 
                        }, function(json){
                            
                            $('.b-solution-data ul').empty().append(json.html);
                            $('.b-navigation span').empty().append('<a href="javascript:solutionFinderObj.loadParentNodes(' + json.parent + ');">Previous Node</a>')
                        });    
                    }
                }
                
                function itemClick(type, itemId){
                    $.ajax({
                        url:        '{/literal}{php}echo prep_url(base_url() . '/solutionfinder/click');{/php}{literal}',
                        data:       {type: type, id: itemId},
                        dataType:   'jsonp'        
                    })
                } 
            </script>
        {/literal}
        
    </body>
</html>
