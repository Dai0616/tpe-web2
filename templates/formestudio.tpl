<form action="addListaEstudio" method="POST" class="my-4" enctype="multipart/form-data">
    <div class="row">
        <div class="col-9">
            <div class="form-group">
                <label>Nombre del estudio cinematográfico</label>
                <input name="nombre_estudio" type="text" class="form-control">
            </div>
        </div>
        <div class="col-9">
            <div class="form-group">
                <label>Fecha de creación</label>
                <input name="creacion" type="text" class="form-control">
            </div>
        </div>
        <div class="col-9">
            <div class="form-group">
                <label>Historia</label>
                <textarea name="historia" id="" cols="30" rows="10" class="form-control"></textarea>
            </div>
        </div>
    </div>
    <div class="col-9">
        <input type="file" class="form-control" name="input_name" id="imageToUpload">
    </div>
    <button type="submit" class="btn btn-primary mt-2">Guardar</button>
</form>