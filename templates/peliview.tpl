{include file="header.tpl"}


<table class="table-group-divider">
    <thead>
        <tr>
            <th></th>
            <th scope="col">Nombre</th>
            <th scope="col">Estreno</th>
            <th scope="col">Puntuación</th>
            <th scope="col">Director</th>
            <th scope="col">Estudio de Cine</th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody class="table-group-divider">
        {foreach from=$pelis item=$peli}
            <tr>
                <td><img src="{$peli->imagen}" alt="{$peli->nombre}" class="imgpeli"></td>
                <td>{$peli->nombre}</td>
                <td>{$peli->estreno}</td>
                <td>{$peli->puntuacion}</td>
                <td>{$peli->director}</td>
               <td><a href="detalle/{$peli->id_nombre_fk}" class='detalle'>{$peli->nombre_estudio} </a></td>
               {if isset($smarty.session.USER_ID)}
               <td><a href='showEditPeli/{$peli->id}' type='button' class='btn btn-outline-primary'>Editar</a></td>
                <td><a href='deletePeli/{$peli->id}' type='button' class='btn btn-outline-danger'>Borrar</a></td>
               {/if}
                </tr>
        {/foreach}
    </tbody>
</table>
{if isset($smarty.session.USER_ID)}
{include file="formpeli.tpl"}
{/if}
{include file="footer.tpl"}