{include file="header.tpl"}


<table class="table-group-divider">
    <thead>
        <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Estreno</th>
            <th scope="col">Puntuación</th>
            <th scope="col">Director</th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody class="table-group-divider">
        {foreach from=$pelis item=$peli}
            <tr>
                <td>{$peli->nombre}</td>
                <td>{$peli->estreno}</td>
                <td>{$peli->puntuacion}</td>
                <td>{$peli->director}</td>
                <td>
                    <img src="{$peli->imagen}" style="width:2rem;"/>
                </td>
                <td><a href='showEditPeli/{$peli->id}' type='button' class='btn btn-danger ml-auto'>Editar</a></td>
                <td><a href='deletePeli/{$peli->id}' type='button' class='btn btn-danger ml-auto'>Borrar</a></td>
            </tr>
        {/foreach}
    </tbody>
</table>
<form action="addPeli" method="POST" class="my-4" enctype="multipart/form-data">
<div class="mb-3">
  <label class="form-label">Seleccione una opción</label>
  <select name="id_nombre_fk" class="form-control">
  {foreach from=$estudios item=$item}
    <option value="{$item->id_nombre_fk}">{$item->nombre_estudio}</option>
  {/foreach}
  </select>
</div>
{include file="formpeli.tpl"}
{include file="footer.tpl"}