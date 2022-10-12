{include file="header.tpl"}
<table class="table text-center">
<thead class="table-dark text-center">
 <tr>
   <th>Nombre del Estudio</th>
   <th>Creación</th>
   <th>Historia</th>
 </tr>
</thead>
<tbody>
{foreach from=$estudios item=$est}
   <tr>
   <td>{$est->nombre_estudio}</td>
   <td>{$est->creacion}</td>
   <td>{$est->historia}</td>
   </tr>
   </tbody>
   </table>
   <h1>Edit Form</h1>
   <form action="editEstudio/{$est->id_nombre_fk}" method="POST" class="my-4">
  {/foreach}
{foreach from=$estudios item=$est }
<div class="mb-3">
  <label class="form-label">Estudio</label>
  <input type="text" class="form-control"  name="nombre_estudio" value="{$est->nombre_estudio}">
</div>
<div class="mb-3">
  <label class="form-label">Creación</label>
  <input type="text" class="form-control"  name="creacion" value="{$est->creacion}">
</div>
<div class="mb-3">
  <textarea name="historia" type="text" id="" cols="30" rows="10" >{$est->historia}</textarea>
</div>
{/foreach}
  <button type="submit" class="btn btn-primary mt-2">Editar</button> 
</form>
{include file="footer.tpl"}