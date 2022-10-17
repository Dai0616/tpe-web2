{include file="header.tpl"}
{foreach from=$detalle item=$item}
  <div class="card">
    <div class="card-header">
      <img src="{$item->imagen}" alt="{$item->nombre_estudio}" class="imgdetalle">
      {$item->nombre_estudio}
      </div>
      <div class="card-body">
      <h5 class="card-title"></h5>
      <p class="card-text">Creación: {$item->creacion}. {$item->historia}</p>
      <a href="listaPelis" class="btn btn-primary">Volver</a>
      </div>
      </div>
  {/foreach}
{include file="footer.tpl"}
