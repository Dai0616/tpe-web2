{include file="header.tpl"}


<table class="table-group-divider">
    <thead>
        <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Estreno</th>
            <th scope="col">Puntuación</th>
            <th scope="col">Director</th>
            <th scope="col">Estudio Cinematográfico</th>
        </tr>
    </thead>
    <tbody class="table-group-divider">
        {foreach from=$pelis item=$peli}
            <tr>
                <td>{$peli->nombre}</td>
                <td>{$peli->estreno}</td>
                <td>{$peli->puntuacion}</td>
                <td>{$peli->director}</td>
                <td>{$peli->nombre_estudio}</td>
            </tr>
        {/foreach}
    </tbody>
</table>

{include file="footer.tpl"}