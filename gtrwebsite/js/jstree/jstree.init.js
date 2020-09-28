var json_data =  {
    // I chose an ajax enabled tree - again - as this is most common, and maybe a bit more complex
    // All the options are the same as jQuery's except for `data` which CAN (not should) be a function
    "ajax" : {
        // the URL to fetch the data
        "url" : "./server.php",
        // this function is executed in the instance's scope (this refers to the tree instance)
        // the parameter is the node being loaded (may be -1, 0, or undefined when loading the root nodes)
        "data" : function (n) { 
            // the result is fed to the AJAX request `data` option
            return { 
                "operation" : "get_children", 
                "id" : n.attr ? n.attr("id").replace("node_","") : 1 
            }; 
        }
    }
}

var core    =   {
    "initially_open"  : ["elem_1"]
}

var plugins = ["themes", "html_data", "dnd", "ui", 'crrm'];

var ui      = {initially_select: 'elem_1'}