INSERT INTO `shinticket_ticketdetails` (`idTicketDetail`, `userId`, `idTicket`, `body`,  `created`, `attachPath`) VALUES 
(1, 2, 1, 'It is useless to list all the functions provided by FAR and its  plugins, because this list is constantly growing. As an information source, which can be used to search for specific plugins, one can recommend?', '2010-09-22 14:35:13', NULL),
(2, 1, 1, 'Without going into details, some of the capabilities can be noted?', '2010-09-22 14:38:26', NULL),
(3, 2, 1, 'FAR Manager is so tightly integrated with its plugins that it is  simply meaningless to talk about FAR and  not  to  mention  the  plugins.  Plugins present an almost limitless expansion of the features of FAR.', '2010-09-22 14:45:12', NULL),
(4, 1, 1, 'Thanks!', '2010-09-22 14:45:12', NULL),
(5, 1, 8, 'For example, there are two non-empty lines - N and N+1. The cursor is positioned in the middle of the N+1 line. No selection. Press Shift-Left until the cursor is positioned in the middle of the N line. At this moment ditorInfo.BlockStartLine equals N+1 and not N as was expected.', '2010-08-02 11:56:13', NULL),
(6, 2, 8, 'If a dialog contains no borders (DI_SINGLEBOX, DI_DOUBLEBOX) and the DI_LISTBOX element is the first element, then the console title is set to the title of the list (DI_LISTBOX).', '2010-08-12 09:11:34', NULL),
(7, 1, 8, 'The message DM_LISTSETMOUSEREACTION now allows for more flexible behavior of the list in response to mouse movements. You can set three states!', '2010-09-01 16:42:32', NULL),
(8, 2, 8, 'Identification mechanism of ZIP, LHA and RAR archives was toughened. Some files (e.g. KasperskyLab modules - minizip.ppl, rar.ppl, zip.ppl) contain signatures for archive identification, those signatures were causing those files to be wrongly identified as archives.', '2010-09-04 19:11:23', NULL),
(9, 1, 8, 'RAR archive ending was not detected correctly. Some archives were considered erroneous by RAR.FMT and the "Unexpected end of archive" message was displayed.', '2010-09-08 11:15:26', NULL),
(10, 2, 8, 'The algorithm for connecting to remote resources with explicitly specified credentials was changed. Now, if the error "Wrong username or password" is returned by the system the plugin.', '2010-09-12 16:52:54', NULL);