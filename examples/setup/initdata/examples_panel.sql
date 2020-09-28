INSERT INTO `examples_panel` (`id`, `idPanel`, `panel_header`, `collapsed`, `maximized`, `style`, `order_menu`, `column_menu`, `color_class`, `color_border_class`, `color_bg_class`, `show_close`, `show_maximize`, `show_turn`, `show_info`, `ajax_data_url`) VALUES
(1, 'feeds', 'header1', 0, 0, '', 0, 1, 'color-blue', 'border-color-yellow', 'bg-color-green', 0, 1, 1, 1, ''),
(2, 'news', 'header2', 0, 0, '', 1, 1, 'color-red', 'border-color-red', 'bg-color-red', 1, 1, 1, 1, ''),
(3, 'shopping', 'header3', 0, 0, '', 0, 2, 'color-blue', 'border-color-blue', 'bg-color-blue', 0, 1, 1, 1, ''),
(4, 'links', 'header4', 0, 0, '', 1, 2, 'color-orange', 'border-color-orange', 'bg-color-orange', 1, 1, 1, 1, '/panel/ajax_charts.php'),
(5, 'images', 'header5', 0, 0, '', 2, 2, 'color-yellow', 'border-color-yellow', 'bg-color-yellow', 1, 1, 1, 1, '/panel/ajax_charts.php');
