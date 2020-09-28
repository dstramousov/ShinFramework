<?php /* Smarty version 2.6.26, created on 2011-05-18 10:18:39
         compiled from jstree.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<body id="page">

	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "back_url.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
     
    <fieldset>
        <legend style="font-size: 30px; font-weight: bold;">Js Tree example</legend>
        
        <table width="100%">
            <tr>
                <td width="33%">
                    <fieldset style="float: left;">
                        <legend>Basic html example</legend>

                        <div class="demo source" id="basic_html">

							<ul>
								<li id="phtml_1" class="open"><a href="#"><ins> </ins>Root node 1</a>
									<ul>
										<li id="phtml_2"><a href="#"><ins> </ins>Child node 1</a>
										</li>
										<li id="phtml_2"><a href="#"><ins> </ins>Child node 1</a></li>
										<li id="phtml_2"><a href="#"><ins> </ins>Child node 1</a></li>
									</ul>
								</li>
							</ul>

                        </div>

                    </fieldset>
                </td>
                <td width="33%">
                    <fieldset style="float: left;">
                        <legend>Async HTML example</legend>
                        <div class="demo" id="basic_html2"></div>
                    </fieldset>
                </td>
                <td width="33%">
                    <fieldset style="float: left;">
                        <legend>Checkbox plugin example</legend>
                        <div class="demo" id="basic_html3"></div>
                    </fieldset>
                </td>
            </tr>
            <tr>
                <td>
                    <fieldset style="float: left;">
                        <legend>Contextmenu example</legend>
                        <div class="demo" id="basic_html4"></div>
                    </fieldset>
                </td>
                <td>
                    <fieldset style="float: left;">
                        <legend>Save menu state in cookie</legend>
                        <div class="demo source" id="basic_html5">
                            <ul>
                                <li id="phtml_10" class="open"><a href="#"><ins> </ins>Root node 1</a>
                                    <ul>
                                        <li id="phtml_11"><a href="#"><ins> </ins>Child node 1</a></li>
                                        <li id="phtml_12"><a href="#"><ins> </ins>Child node 2</a></li>
                                        <li id="phtml_13"><a href="#"><ins> </ins>Some other child node with longer text</a></li>
                                    </ul>
                                </li>
                                <li id="phtml_14"><a href="#"><ins> </ins>Root node 2</a></li>
                            </ul>
                        </div>
                    </fieldset>
                </td>
                <td>
                    <fieldset style="width: 200px; float: left;">
                        <legend>Using the ajax config option (nested)</legend>
                        <div class="demo source" id="basic_html6"></div>
                    </fieldset>
                </td>
            </tr>
            <tr>
                <td>
                    <fieldset style="width: 200px; float: left;">
                        <legend>Using both the data & ajax config options (flat)</legend>
                        <div class="demo source" id="basic_html7"></div>
                    </fieldset>
                </td>
                <td>
                    <fieldset style="width: 200px; float: left;">
                        <legend>Using the UI plugin</legend>
                        <div class="demo source" id="basic_html8">
                            <ul>
                                <li id="phtml_99"><a href="#"><ins> </ins>Root node 1</a>
                                    <ul>
                                        <li id="phtml_11"><a href="#"><ins> </ins>Child node 1</a></li>
                                        <li id="phtml_12"><a href="#"><ins> </ins>Child node 2</a></li>
                                        <li id="phtml_13"><a href="#"><ins> </ins>Some other child node with longer text</a></li>
                                    </ul>
                                </li>
                                <li id="phtml_14"><a href="#"><ins> </ins>Root node 2</a></li>
                            </ul>
                        </div>
                    </fieldset>
                </td>
                <td>
                    <fieldset style="width: 200px; float: left;">
                        <legend>Using the dnd plugin</legend>
                        <div class="demo source" id="basic_html9">
                            <ul>
                                <li id="phtml_99"><a href="#"><ins> </ins>Root node 1</a>
                                    <ul>
                                        <li id="phtml_11"><a href="#"><ins> </ins>Child node 1</a></li>
                                        <li id="phtml_12"><a href="#"><ins> </ins>Child node 2</a></li>
                                        <li id="phtml_13"><a href="#"><ins> </ins>Some other child node with longer text</a></li>
                                    </ul>
                                </li>
                                <li id="phtml_14"><a href="#"><ins> </ins>Root node 2</a></li>
                            </ul>
                        </div>
                    </fieldset>
                </td>
            </tr>
            <tr>
                <td>
                    <fieldset style="width: 200px; float: left;">
                        <legend>Using the hotkeys plugin</legend>
                        <div class="demo source" id="basic_html10">
                            <ul>
                                <li id="phtml_200"><a href="#"><ins> </ins>Root node 1</a>
                                    <ul>
                                        <li id="phtml_11"><a href="#"><ins> </ins>Child node 1</a></li>
                                        <li id="phtml_12"><a href="#"><ins> </ins>Child node 2</a></li>
                                        <li id="phtml_13"><a href="#"><ins> </ins>Some other child node with longer text</a></li>
                                    </ul>
                                </li>
                                <li id="phtml_14"><a href="#"><ins> </ins>Root node 2</a></li>
                            </ul>
                        </div>
                    </fieldset>
                </td>
                <td>
                    <fieldset style="width: 200px; float: left;">
                        <input type="text" id="search" /><input type="button" value="Seach" id="search_btn" />
                        <legend>Searching nodes</legend>
                        <div class="demo source" id="basic_html11">
                            <ul>
                                <li id="phtml_200"><a href="#"><ins> </ins>Root node 1</a>
                                    <ul>
                                        <li id="phtml_11"><a href="#"><ins> </ins>Child node 1</a></li>
                                        <li id="phtml_12"><a href="#"><ins> </ins>Child node 2</a></li>
                                        <li id="phtml_13"><a href="#"><ins> </ins>Some other child node with longer text</a></li>
                                    </ul>
                                </li>
                                <li id="phtml_14"><a href="#"><ins> </ins>Root node 2</a></li>
                            </ul>
                        </div>
                    </fieldset>
                </td>
            </tr>
        </table>
    </fieldset>                                                               
    
</body>

</html>