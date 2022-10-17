{include file="header.tpl"}

    <table class="table text-center">
         <thead class="table-dark text-center">
          <tr>
          <th></th>
            <th>Nombre del Estudio</th>
            <th>Creación</th>
            <th>Historia</th>
            <th></th>
            <th></th>
          </tr>
         </thead>
         <tbody>
         {foreach from=$estudios item=$est}
            <tr>
            <td><img src="{$est->imagen}" alt="{$est->nombre_estudio}" class="imgestudio"></td>
            <td>{$est->nombre_estudio}</td>
            <td>{$est->creacion}</td>
            <td>{$est->historia}</td>
            {if isset($smarty.session.USER_ID)}
            <td><a href='showEditEstudio/{$est->id_nombre_fk}' type='button' class='btn btn-outline-primary'>Editar</a></td>
            <td><a href='deleteEstudio/{$est->id_nombre_fk}' type='button' class='btn btn-outline-danger'>Borrar</a></td>
            {/if}
            </tr>
        {/foreach}
         </tbody>
    </table>
{if isset($smarty.session.USER_ID)}
{include file="formEstudio.tpl"}
{/if}
{include file="footer.tpl"}

