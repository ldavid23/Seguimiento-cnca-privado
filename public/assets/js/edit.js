
function actualizarAprendiz(id) {
    const formulario = document.getElementById(`UpdateForm${id}`);
    if (!formulario.checkValidity()) {
        let elements = formulario.elements;
        let arr = [].slice.call(elements);
        arr.forEach(element => {
          let mensaje = document.getElementsByClassName(element.id)
          if(!element.checkValidity()){
            mensaje[0].classList.remove('d-none');
            element.classList.add('border-danger');
          }else{
            if(mensaje[0] && !mensaje[0].classList.contains('d-none')){
              mensaje[0].classList.add('d-none');
              element.classList.remove('border-danger');
            }
          }
        });
      }else{
        Swal.fire({
          icon: 'warning',
          title: '¿Seguro que deseas realizar esta acción?',
          showCancelButton: true,
          confirmButtonText: 'OK',
        }).then((result) => {
          if (result.isConfirmed) {
            formulario.submit();
          }
        })
      }
    console.log(formulario);
};
