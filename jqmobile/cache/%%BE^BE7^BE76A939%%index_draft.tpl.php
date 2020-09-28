<?php /* Smarty version 2.6.26, created on 2011-03-21 10:37:18
         compiled from index_draft.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

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
<div data-role="page" id="bar">

    <div data-role="header">
        <h1>Bar</h1>
    </div><!-- /header -->

    <div data-role="content">    
        <p>I'm first in the source order so I'm shown as the page.</p>        
        <p><a href="#foo">Back to foo</a></p>    
    </div><!-- /content -->

    <div data-role="footer">
        <h4>Page Footer</h4>
    </div><!-- /header -->
</div><!-- /page -->

<!-- Start of second page -->
<div data-role="page" id="moo">

    <div data-role="header">
        <h1>Bar</h1>
    </div><!-- /header -->

    <div data-role="content">    
        <p>I'm first in the source order so I'm shown as the page.</p>        
        <p><a href="#foo">Back to foo</a></p>    
    </div><!-- /content -->

    <div data-role="footer">
        <h4>Page Footer</h4>
    </div><!-- /header -->
</div><!-- /page -->

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>