<?php /* Smarty version 2.6.26, created on 2011-05-05 10:31:36
         compiled from web/chisiamo.tpl */ ?>
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
                <div class="chisiamo">
                    <div class="myTitle">CHI SIAMO:</div>
                    <p class="TestoPag">
                    <span class="bold">SnapTrack &egrave; l&#39;unico album di fotografie di trackday e motorsport italiano! <br /> <br /></span>

                    <span class="reddo">Per il privato:</span> Hai girato in pista con la tua auto e cerchi gli scatti della giornata? Cercali su SnapTrack! <br /> 
                    Hai fotografato una giornata in pista e non vuoi limitarti a pubblicare su un forum? Carica le tue foto su SnapTrack!
                    <br /><br /> 

                    <span class="reddo">Per il professionist:</span> Il tuo sito ha poca visibilit&agrave;?
                    Vuoi raggiungere un maggior numero di potenziali acquirenti? Carica le tue foto su SnapTrack!
                    <br /><br />

                    <span class="bold">Iscriviti e approfitta dello spazio e della comodit&agrave; offerti da SnapTrack!</span>
                    <br />
                    Troverai i maggiori circuiti italiani ed esteri comodamente suddivisi per data e orario dell&#39;evento;
                    <br />
                    puoi effettuare una ricerca mirata o selezionare pochi dati per una scelta pi&ugrave; ampia.
                    <br /><br />
                    Stai cercando un modello di auto particolare o addirittura un&#39;auto ben precisa?
                    <br />
                    Inserisci il modello dell&#39;auto o la targa nel motore di ricerca!
					
					
                    <br />
                    <br />
<span class="reddo">Da aggiungere a CHI SIAMO</span>
                    <br />
N.B. - SnapTrack e attualmente in Beta testing e impostato al 100% sull'automobilismo. Siete pregati di NON caricare alcuna immagine di motociclismo. 
                    <br />
Attualmente, SnapTrack e GRATUITO per tutti. Esiste comunque un <u>LIMITE DI 2GB</u> sia per privati che professionisti.
                    <br />
Domande, dubbi, consigli e idee di qualunque genere sono graditissime all'indirizzo <b><a href="mailto:info@snaptrack.it">info@snaptrack.it</a></b>
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