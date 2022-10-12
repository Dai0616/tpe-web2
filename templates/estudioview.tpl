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
            <td><a href='showEditEstudio/{$est->id_nombre_fk}' type='button' class='btn btn-danger ml-auto'>Editar</a></td>
            <td><a href='deleteEstudio/{$est->id_nombre_fk}' type='button' class='btn btn-danger ml-auto'>Borrar</a></td>
            </tr>
        {/foreach}
         </tbody>
    </table>
{include file="formEstudio.tpl"}
{include file="footer.tpl"}

