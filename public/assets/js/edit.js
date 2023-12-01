function edit(aprendices) {

    const formulario = `
        <form method="post" id="Updateform">
        <input type="hidden" name="_method" value="PATCH">
        <label for="nombre_apendiz">Nombre Completo</label>
        <input type="text" name="nombre_aprendiz" id="nombre_aprendiz" class="swal2-input" value="${aprendices.nombre_aprendiz}" required>
        <label for="n_documento">N° de documento</label>
        <input type="number" name="n_documento" id="n_documento" class="swal2-input" value="${aprendices.n_documento}" required>
        <label for="n_ficha"> N° de ficha</label>
        <input type="number" name="n_ficha" id="n_ficha" class="swal2-input" value="${aprendices.n_ficha}" required>
        <label for="nombre_ficha">Nombre de ficha</label>
        <input type="text" name="nombre_ficha" id="nombre_ficha" class="swal2-input" value="${aprendices.nombre_ficha}" required>
        <label for="telefono">Telefono</label>
        <input type="text" name="telefono" id="telefono" class="swal2-input" value="${aprendices.telefono}" required>
        <label for="correo">Correo</label>
        <input type="text" name="correo" id="correo" class="swal2-input" value="${aprendices.correo}" required>
        <label for="direccion">Direccion</label>
        <input type="text" name="direccion" id="direcion" class="swal2-input" value="${aprendices.direccion}" required>
        <button type="button" class="btn btn-primary" onclick="actualizarAprendiz(${aprendices.id})"> Actualizar </button>
        </form>
        `;
    Swal.fire({
        title: "<h2>Registro de Aprendiz</h2>",
        html: formulario,
        showConfirmButton: false,
        showCancelButton: true,
      });


};
function actualizarAprendiz(id) {
    const csrfToken = $('meta[name="csrf-token"]').attr('content');
    // let formData = $("Updateform").serializeArray();
    $(document).ready(function() {
        let formData = new FormData(document.getElementById('Updateform'));
    });
    // let formData = $("Updateform").serializeArray().reduce(function(obj, item) {
    //    obj[item.name] = item.value;
    //    return obj;
    // },{});
    console.log(formData);
    $.ajax({
        type: "PATCH",
        url: "/Aprendiz/"+id,
        headers: {
            'X-CSRF-TOKEN': csrfToken
        },
        data: formData,
        dataType: 'json',
        processData: false,
        contentType: false,
        success: function(response){
            console.log(response);
             Swal.close();
        },
        error: function(xhr, status, error){
            console.error(xhr.responseText);
            console.error(error, status);
        },
    });
};
