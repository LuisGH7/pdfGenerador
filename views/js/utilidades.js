function mostrarAlerta(texto){
    Swal.fire({
        icon: 'warning',
        title: texto,
        position: 'bottom-end',
        background: '#FF8E8E',
        //text: 'Proceso finalizado',
        //footer: '<a class="btn btn-danger" href="https://www.youtube.com">A donde desea ir? YT</a>',
        timer: 1100,
        toast:true,
        showConfirmButton:false
    });
}

//Mas utilidades