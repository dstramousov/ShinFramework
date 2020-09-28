<?php /* Smarty version 2.6.26, created on 2011-05-05 10:25:41
         compiled from web/istrusioni.tpl */ ?>
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "web/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <div class="b-content">
            <!-- header block -->
            <div class="b-header-bar">
                <?php echo $this->_tpl_vars['proomblock']; ?>
<?php echo $this->_tpl_vars['toprightblock']; ?>

                <div class="clear"></div>
            </div>
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "web/header_rand_photo.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
            <!-- .header block -->
	        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "web/common/ganalyt.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
            <!-- content block -->
            <div class="b-content-inner">
                <!-- search form-->
                <div class="search-form with-header-photo">
                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "web/common/search-form.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                </div>
                <!-- .search form -->
                <div class="istrusioni">
                    <div class="myTitle">ISTRUZIONI:</div>
                    <p class="TestoPag">


                    <span class="reddo">Per utilizzare tutte le funzioni di SnapTrack e richiesta la registrazione.</span>
                    <br />
					Scegli la tua tipologia di utente fra "visitatore" e "fotografo" (leggi le F.A.Q. Per maggiori info). Come visitatore puoi unicamente visualizzare e ordinare le fotografie, mentre come fotografo avrai accesso alla tua area personale, dove potrai creare gli album degli eventi che hai fotografato, gestire le tue foto e i tuoi dati personali. Carica le foto che desideri e inserisci quanti piu dati possibile, saranno molto utili a chi sta effettuando la ricerca!
                    <br />
					Durante la ricerca, clicca sul thumbnail della foto che ti interessa ed otterrai una anteprima, dalla quale puoi scaricare direttamente il file in alta risoluzione o, in caso di foto da acquistare, effettuare l'ordine al professionista. Un comodo carrello ti permette di salvare tutte le foto desiderate e inviera automaticamente la richiesta ai professionisti che le hanno scattate. Le fotografie vengono di volta in volta valutate dagli utenti, con un voto da una a cinque stelle; i migliori fotografi avranno la precedenza nella visualizzazione dei risultati!
					<br /><br />
                    <span class="reddo">Per il privato:</span>                    <br />
perche SnapTrack sia utile a tutti, carica le tue foto solo dopo averle controllate e valutate con un certo criterio: fotografie sfocate, mosse, sovra o sottoesposte, soggetti lontani o poco chiari non sono utili a nessuno e, aumentando inutilmente il volume di dati, renderanno difficoltosa la ricerca e rallenteranno l'upload. SnapTrack effettua comunque un regolare controllo delle fotografie presenti, riservandosi il diritto di cancellare gli scatti che non rispondono a questi requisiti. 
                    <br />
                    <br />
					
Scaricare o ordinare le foto: sotto ad ogni anteprima, troverai un pulsante "scarica hi-res" o "ordina", rispettivamente per scaricare il file in alta risoluzione dello scatto o per ordinarlo al fotografo che ne ha pubblicato l'assaggio. Salva il file hi-res direttamente sul tuo PC con tasto dx/salva con nome, oppure ordina la foto salvandola nel carrello e successivamente cliccando sul pulsante di invio ordine, il fotografo provvedera poi a contattarti per comunicarti il metodo di pagamento e di consegna delle immagini.
                    <br />
                    <br />
I prezzi delle foto: il costo delle foto e a totale discrezione del fotografo che le ha caricate. Solitamente, nel caso di fotografi professionisti in occasione di giornate di trackday, il costo e di 10 euro a scatto per un file in alta risoluzione. Quasi tutti offrono la possibilita di ricevere un file compresso o un CD contenente tutti gli scatti della giornata a 30 euro, oppure stampe di vario formato. SnapTrack non addebita al singolo utente alcun costo e non gestisce i pagamenti. L'invio dell'ordine parte da noi e viene ricevuto dal fotografo (o da piu fotografi se le foto nel carrello sono state scattate da piu di un professionista), che si occupa in prima persona dell'invio del preventivo.
					
                    <br />
                    <br />
                    <span class="reddo">Per il professionista:</span>  <br/>
					innanzitutto, <u>iscriviti come "fotografo"</u>. Sotto ad ogni anteprima, il cliente trovera un pulsante per la richiesta di uno o piu scatti, che verra recapitata direttamente all'indirizzo e-mail inserito all'atto della registrazione. L'ordine ti arrivera con i relativi dati di nome file e data/orario dello scatto per aiutarti nella ricerca in archivio. <u>SnapTrack non effettua alcun tipo di servizio per quanto riguarda la ricezione e l'evasione degli ordini, che sono totale responsabilita dell'utente.</u>


                    </p>
                </div>
                <div class="clear"></div>
            </div>
            <!-- .content block -->
            <div class="white-delimiter"></div>
            <!-- footer block -->
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "web/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
            <!-- .footer block -->
        </div>
    </body>
</html>