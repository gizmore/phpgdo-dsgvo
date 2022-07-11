<div id="gdo_dsgvo_panel">
  <div class="gdo_dsgvo_overlay"></div>
  <div class="gdo_dsgvo_info">
    <p><?=html(t('dsgvo_info'))?></p>
    <a id="gdo-dsgvo-accept-button" href="<?=href('DSGVO', 'Accept', '&ref='.(@$_SERVER['REQUEST_URI']))?>"><?=t('btn_accept')?></a>
  </div>
</div>
