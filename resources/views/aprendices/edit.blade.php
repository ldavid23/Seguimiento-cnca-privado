
<div class="modal fade" id="UpdateForm{{$aprendiz->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="post" action="{{route("Aprendiz.update",["Aprendiz"=>$aprendiz->id])}}">
        <div class="modal-body">
               @csrf
               @method('PATCH')
               <label for="nombre_apendiz" class="form-label">Nombre Completo</label>
               <input type="text" name="nombre_aprendiz" id="nombre_aprendiz" class="form-control" value="{{$aprendiz->nombre_aprendiz}}" required>
               <label for="n_documento" class="form-label">N° de documento</label>
               <input type="number" name="n_documento" id="n_documento" class="form-control" value="{{$aprendiz->n_documento}}" required>
               <label for="n_ficha" class="form-label"> N° de ficha</label>
               <input type="number" name="n_ficha" id="n_ficha" class="form-control" value="{{$aprendiz->n_ficha}}" required>
               <label for="nombre_ficha" class="form-label">Nombre de ficha</label>
               <input type="text" name="nombre_ficha" id="nombre_ficha" class="form-control" value="{{$aprendiz->nombre_ficha}}" required>
               <label for="telefono" class="form-label">Telefono</label>
               <input type="text" name="telefono" id="telefono" class="form-control" value="{{$aprendiz->telefono}}" required>
               <label for="correo" class="form-label">Correo</label>
               <input type="text" name="correo" id="correo" class="form-control" value="{{$aprendiz->correo}}"required>
               <label for="direccion" class="form-label">Direccion</label>
               <input type="text" name="direccion" id="direcion" class="form-control" value="{{$aprendiz->direccion}}" required>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-success">Actualizar</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
        </form>
      </div>
    </div>
  </div>
