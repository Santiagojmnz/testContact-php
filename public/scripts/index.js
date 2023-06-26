// Obtener todos los contactos
function getContactos() {
    fetch('http://localhost/test/index.php?action=getAll')
        .then(function (response) {
            if (response.ok) {
                return response.json();
            } else {
                throw new Error('Error al obtener los contactos.');
            }
        })
        .then(function (contactos) {
            renderContactos(contactos);
        })
        .catch(function (error) {
            alert(error.message);
        });
}

// Renderizar los contactos en la tabla
function renderContactos(contactos) {
    var tbody = document.querySelector('#contactTable tbody');
    tbody.innerHTML = '';

    contactos.forEach(function (contacto) {
        var row = document.createElement('tr');
        row.innerHTML = `
            <td>${contacto.id}</td>
            <td>${contacto.nombre}</td>
            <td>${contacto.email}</td>
            <td>${contacto.mensaje}</td>
            <td>${contacto.fecha}</td>
        `;

        tbody.appendChild(row);
    });

    // Inicializar el DataTable
    $(document).ready(function () {
        $('#contactTable').DataTable();
    });
}

// Obtener los contactos al cargar la página
getContactos();
