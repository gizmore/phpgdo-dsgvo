<?php
namespace GDO\DSGVO\tpl;
?>
<div id="gdo_dsgvo_panel">
<div class="gdo_dsgvo_overlay"></div>
<div class="gdo_dsgvo_info">
<p><?=t('dsgvo_info')?></p>
<div><a id="gdo-dsgvo-accept-button" href="<?=href('DSGVO', 'Accept', '&_ref='.(@$_SERVER['REQUEST_URI']))?>"><?=t('btn_accept')?></a></div>
</div>
</div>
