// función para evanecer elementos entre páginas

document.addEventListener("DOMContentLoaded", function() {
    document.body.classList.add('loaded');
}
);

// función para cambiar el input de datos en el formulario de registro

document.addEventListener("DOMContentLoaded", function() {
    const fechaNacimientoInput = document.getElementById("fecha_nacimiento");
    fechaNacimientoInput.addEventListener("focus", function() {
        this.type = 'date';
    });
    fechaNacimientoInput.addEventListener("blur", function() {
        if (!this.value) this.type = 'text';
    });
});

// función para validar contraseñas y otros campos del formulario de registro

document.addEventListener("DOMContentLoaded", function() {
    document.body.classList.add('loaded');
});

function validateForm() {
    const dni = document.getElementById('dni');
    const password = document.getElementById('password');
    const repeatPassword = document.getElementById('repeat_password');
    const dniPattern = /^\d+$/;
    const passwordPattern = /^(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/;

    if (!dniPattern.test(dni.value)) {
        alert("El DNI debe contener solo números.");
        dni.focus();
        return false;
    }

    if (!passwordPattern.test(password.value)) {
        alert("La contraseña debe tener al menos 8 caracteres, incluyendo una letra mayúscula, un número y un símbolo.");
        password.focus();
        return false;
    }

    if (password.value !== repeatPassword.value) {
        alert("Las contraseñas no coinciden.");
        repeatPassword.focus();
        return false;
    }

    return true;
}
