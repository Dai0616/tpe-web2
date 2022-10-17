<form action="addPeli" method="POST" class="my-4" enctype="multipart/form-data">
<div class="mb-3">
  <label class="form-label">Seleccione una opción</label>
  <select name="id_nombre_fk" class="form-control">
  {foreach from=$estudios item=$item}
    <option value="{$item->id_nombre_fk}">{$item->nombre_estudio}</option>
  {/foreach}
  </select>
</div>
<div class="mb-3">
  <label for="pelicula" class="form-label">Nombre de pelicula</label>
  <input type="text" class="form-control" name="pelicula">
</div>
<div class="mb-3">
  <label for="estreno" class="form-label">Fecha de Estreno</label>
  <input type="text" class="form-control" name="estreno">
</div>
<div class="mb-3">
  <label for="puntuacion" class="form-label">Puntuación</label>
  <input type="number" step="0.01" class="form-control" name="puntuacion">
</div>
<div class="mb-3">
  <label for="director" class="form-label">Director</label>
  <input type="text" class="form-control" name="director">
</div>
<div class="mb-3">
<input type="file" class="form-control" name="input_name" id="imageToUpload">
</div>
<button type="submit" class="btn btn-primary mt-2">Guardar</button>
</form>