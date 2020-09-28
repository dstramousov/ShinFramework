<?php /* Smarty version 2.6.26, created on 2011-05-05 10:43:46
         compiled from web/faq.tpl */ ?>
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
                    <p class="anchmenu">
                        <a href="javascript:void(0);" onclick="showTopic('a');">
                        Che cos&#39;&egrave; SnapTrack?
                        </a>
                        </p>
                        <p class="anchmenu">
                        <a href="javascript:void(0);" onclick="showTopic('b');">
                        Chi pu&ograve; caricare le foto?
                        </a>
                        </p>
                        <p class="anchmenu">
                        <a href="javascript:void(0);" onclick="showTopic('c');">
                        Quanto costa?
                        </a>
                        </p>
                        <p class="anchmenu">
                        <a href="javascript:void(0);" onclick="showTopic('d');">
                        Come capisco quali siano<br />le foto pi&ugrave; adatte da caricare?
                        </a>
                        </p>
                        <p class="anchmenu">
                        <a href="javascript:void(0);" onclick="showTopic('e');">
                        E con le targhe...? Come si fa?
                        </a>
                        <p class="anchmenu">
                        <a href="javascript:void(0);" onclick="showTopic('f');">
						Perche non vedo foto di moto?
                        </a>
                        </p>
                        <p class="anchmenu">
                        <a href="javascript:void(0);" onclick="showTopic('g');">
						Non trovo un circuito/un evento.. Come lo aggiungo?
                        </a>
                        </p>
                        <p class="anchmenu">
                        <a href="javascript:void(0);" onclick="showTopic('h');">
						Vorrei ridimensionare le mie foto prima di fare l'upload. Come faccio? 
                        </a>
                        </p>
                        <p class="anchmenu">
                        <a href="javascript:void(0);" onclick="showTopic('j');">
						Quanto spazio ho a disposizione?
                        </a>
                        </p>
                        <p class="anchmenu">
                        <a href="javascript:void(0);" onclick="showTopic('k');">
						Che differenza c'e tra "visitatore" e "fotografo"? 
                        </a>
                        </p>
                    </p>
                </div>
                <!-- .search form -->
                <div class="faq">
                     <div class="myTitle">F.A.Q:</div>
                     <p class="TestoPag">
                        <span id="a" class="topic">
                            <span class="reddo">Che cos&#39;&egrave; SnapTrack?</span>
                            <br /><br />
                            SnapTrack &egrave; un album virtuale che raccoglie le foto di amatori e professionisti scattate durante trackdays e manifestazioni automobilistiche in genere. Puoi scaricare le foto della tua giornata in pista, o caricare a tua volta le immagini che hai scattato.
                        </span>
                        <span id="b" class="hidden topic">
                            <span class="reddo">Chi pu&ograve; caricare le foto?</span>
                            <br /><br />
                            Tutti! Scegli le tue foto pi&ugrave; belle e caricale, sar&agrave; il sistema a ridimensionarle e organizzarle secondo i dati inseriti.
                        </span>
                        <span id="c" class="hidden topic">
                            <span class="reddo">Quanto costa?</span>
                            <br /><br />
                            Per ora nulla. SnapTrack &egrave; totalmente gratuito fino al termine del beta testing. Quando avremo prova della stabilit&agrave; del sistema, gli utenti potranno decidere se continuare ad utilizzare il servizio a pagamento, con offerte dedicate al privato e al professionista.
                        </span>
                        <span id="d" class="hidden topic">
                            <span class="reddo">Come capisco quali siano le foto pi&ugrave; adatte da caricare?</span>
                            <br /><br />
                            Immagina di essere alla ricerca di fotografie che ti ritraggono: vuoi che siano sfocate, mosse, sotto o sovraesposte? Sicuramente no. Sii preciso e non caricare inutilmente tutto ci&ograve; che hai, sii il critico di te stesso! Carica ci&ograve; che vorresti scaricare, non puoi sbagliare.
                            Carica foto di trackdays e manifestazioni automobilistiche in genere, dalla Millemiglia alla gimkana del tuo paese, ma sempre rispettando il regolamento e selezionando le immagini migliori.
                        </span>
                        <span id="e" class="hidden topic">
                            <span class="reddo">E con le targhe...? Come si fa?</span>
                            <br /><br />
                            Partecipando ad eventi pubblici come trackdays e manifestazioni sportive in genere, acconsenti implicitamente alla diffusione di immagini che possono ritrarre il viso o la targa di un&#39;automobile. 
                            Se vuoi essere certo che la targa della tua auto non venga fotografata, l&#39;unica soluzione &egrave; coprirla con un pannello provvisorio o smontarla del tutto prima dell&#39;accesso in pista. 
                            E&#39; comunque vietato caricare fotografie che ritraggano palesemente la sola targa di un&#39;auto o il viso di una persona; fotografie di questo tipo verranno rimosse senza alcun avviso.
                        </span>
                        <span id="f" class="hidden topic">
                            <span class="reddo">Perche non vedo foto di moto?</span>
                            <br /><br />
							Per rendere il tutto piu semplice, abbiamo rinunciato a malincuore a proporre SnapTrack anche ai motociclisti. PER ORA! Quando ci saremo organizzati, il sito sara disponibile in una veste totalmente motociclistica.
                        </span>
                        <span id="g" class="hidden topic">
                            <span class="reddo">Non trovo un circuito/un evento.. Come lo aggiungo?</span>
                            <br /><br />
							Mandaci una e-mail! Se lo riterremo interessante e utile, provvederemo al piu presto ad aggiungerlo.
                        </span>
                        <span id="h" class="hidden topic">
                            <span class="reddo">Vorrei ridimensionare le mie foto prima di fare l'upload. Come faccio?</span>
                            <br /><br />
							Il metodo piu semplice e veloce e scaricare un tool di Windows, Image Resizer. Lo trovi a questo indirizzo: 
							<a target="blank" href="http://download.microsoft.com/download/whistler/Install/2/WXP/EN-US/ImageResizerPowertoySetup.exe">http://download.microsoft.com/download/whistler/Install/2/WXP/EN-US/ImageResizerPowertoySetup.exe</a>
                        </span>
                        <span id="j" class="hidden topic">
                            <span class="reddo">Quanto spazio ho a disposizione?</span>
                            <br /><br />
							Durante la fase di Beta testing, SnapTrack offre agli utenti un limite massimo di 2GB.
                        </span>
                        <span id="k" class="hidden topic">
                            <span class="reddo">Che differenza c'e tra "visitatore" e "fotografo"?</span>
                            <br /><br />
							Dato che SnapTrack e utilizzabile unicamente da utenti registrati, abbiamo creato due tipologie di utenti: il visitatore ha la possibilita di scaricare e ordinare le fotografie, ma NON puo caricarle a sua volta. Il fotografo ha questa possibilita e puo scegliere se permettere agli altri utenti di scaricarle direttamente o di ricevere via mail gli ordini. IMPORTANTE: se sei un fotografo professionista e le tue foto sono in vendita, assicurati di aver impostato la voce corretta nella tua area privata!
                        </span>
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
        <?php echo '
            <script type="text/javascript">
                function showTopic(topicId) {
                    $(\'.TestoPag span.topic\').hide();
                    $(\'#\' + topicId).show();    
                }
            </script>
        '; ?>

    </body>
</html>