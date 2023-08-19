<script>
document.addEventListener('DOMContentLoaded', async function() {
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-right',
        iconColor: 'gold',
        customClass: {
            popup: 'colored-toast'
        },
        showConfirmButton: false,
        timer: 1500,
        timerProgressBar: true
    });

    await Toast.fire({
        icon: 'success',
        title: '¡Los datos se han guardado correctamente!'
    });
});
</script>