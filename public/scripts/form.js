document.getElementById('contactForm').addEventListener('submit', function(event) {
document.getElementById('successMessage').style.display = 'block';
    event.preventDefault();

    var nombre = document.getElementById('nombre').value;
    var email = document.getElementById('email').value;
    var mensaje = document.getElementById('mensaje').value;

    var data = {
        nombre: nombre,
        email: email,
        mensaje: mensaje
    };

    fetch('http://localhost/test/index.php?action=add', {
        method: 'POST',
        body: JSON.stringify(data)
    })
    .then(function(response) {
        if (response.ok) {
           resetForm()
        } else {
            throw new Error('Error al guardar el contacto.');
        }
    })
    .catch(function(error) {
        console.error(error);
    });
});

function resetForm() {
    document.getElementById('contactForm').reset();
    document.getElementById('successMessage').style.display = 'block';
    setTimeout(function() {
        document.getElementById('successMessage').style.display = 'none';
      }, 2000);
}