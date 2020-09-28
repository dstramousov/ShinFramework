var contextmenu = {
    "rename" : {
        // The item label
        "label"                : "Rename",
        // The function to execute upon a click
        "action"            : function (obj) { alert('rename'); this.rename(obj); },
        // All below are optional 
        "separator_before"    : false,    // Insert a separator before the item
        "separator_after"    : true,        // Insert a separator after the item
        // false or string - if does not contain `/` - used as classname
        "icon"                : false,
        "submenu"            : { 
            /* Collection of objects (the same structure) */
        }
    }
}