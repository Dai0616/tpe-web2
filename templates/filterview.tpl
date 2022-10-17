{include file="header.tpl"}
<table class="table">
<thead class="table-dark">
  <h1 class="font-monospace fw-bold display-2 text-center" style="margin: 3rem; text-shadow: 1px 1px 2px rgb(59, 59, 59), 0 0 1em rgb(95, 95, 95), 0 0 0.2em rgb(125, 125, 125);">{$name->nombre_estudio}</h1>
  <tr>
  <th></th>
   <th>Nombre</th>
   <th>Estreno</th>
   <th>Puntuación</th>
   <th>Director</th>
 </tr>
</thead>
<tbody>
{foreach from=$filters item=$filter}
   <tr>
   <td>
   {* {if isset($filter->img)} *}
    <img src="{$filter->imagen}" alt="{$filter->nombre}" style="width:3rem;"/>
   {* {/if} *}
   </td>
   <td>{$filter->nombre}</td>
   <td>{$filter->estreno}</td>
   <td>{$filter->puntuacion}</td>
   <td>{$filter->director}</td>
   </tr>
{/foreach}
</tbody>
</table>
{include file="footer.tpl"}