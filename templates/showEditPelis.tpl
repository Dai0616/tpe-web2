{include file="header.tpl"}
<table class="table-group-divider">
    <thead>
        <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Estreno</th>
            <th scope="col">Puntuación</th>
            <th scope="col">Director</th>
            {* <th scope="col">fk_estudio</th> *}
        </tr>
    </thead>
    <tbody class="table-group-divider">
        {foreach from=$pelis item=$peli}
            <tr>
                <td>{$peli->nombre}</td>
                <td>{$peli->estreno}</td>
                <td>{$peli->puntuacion}</td>
                <td>{$peli->director}</td>
                {* <td>{$peli->fk_estudio}</td> *}
            </tr>
        {/foreach}
    </tbody>
</table>
<h1>Editar formulario</h1>
<form action="editPeli/{$peli->id}" method="POST" class="my-4">
<div class="mb-3">
<label class="form-label">Seleccione una opcion:</label>
<select name="categoria" class="form-control">
{foreach from=$estudios item=$item}
    <option value="{$item->id_nombre_fk}">{$item->nombre_estudio}</option>
{/foreach}
</select> 
</div>
{foreach from=$pelis item=$peli }
<div class="mb-3">
  <label for="type" class="form-label">Nombre</label>
  <input type="text" class="form-control"  name="pelicula" value="{$peli->nombre}">
</div>
<div class="mb-3">
  <label for="container" class="form-label">Estreno</label>
  <input type="text" class="form-control"  name="estreno" value="{$peli->estreno}">
</div>
<div class="mb-3">
  <label for="stock" class="form-label">Puntuacion</label>
  <input type="text" class="form-control"  name="puntuacion" value="{$peli->puntuacion}">
</div>
<div class="mb-3">
  <label for="price" class="form-label">Director</label>
  <input type="text" class="form-control"  name="director" value="{$peli->director}">  
{/foreach}
  <button type="submit" class="btn btn-primary mt-2">Editar</button> 
</form>
{include file="footer.tpl"}