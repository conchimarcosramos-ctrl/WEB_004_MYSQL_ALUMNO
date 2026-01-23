//js/validacion.js
// Clase para manejar la validación del formulario
// Define la clase FormValidator
// Constructor que recibe el ID del formulario
// y configura los eventos necesarios
class FormValidator {
    constructor(formId) {
        this.form = document.getElementById(formId);
        if (!this.form) return;
// Agrega el evento de envío del formulario
        this.form.addEventListener('submit', 
            (e) => this.validateForm(e));
// Agrega eventos de validación en tiempo real       
        this.form.querySelectorAll('input, textarea').forEach(field => {
            field.addEventListener('blur', 
                () => this.ValidateField(field));
            field.addEventListener('input', 
                () => this.ClearError(field));
        });
    }
// Método para validar el formulario completo
    validateForm(event) {
        event.preventDefault();
        let inValid = true;
// Recorre todos los campos requeridos y los valida
// Método para validar un campo individual
        this.form.querySelectorAll('input[required], textarea[required]').forEach(field => {
            if (!this.ValidateField(field)) {
                inValid = false;
            }
        });
        if (inValid) {
            this.form.submit();
        }
    }
// Método para validar un campo individual
// Retorna true si es válido, false si no lo es
// Valida el campo según sus atributos
    validateField(field) {
        const value = field.value.trim();
        const errorEelement = document.getElementById(`${field.id}-error`);
// Verifica si el campo es requerido y está vacío
        if (field.hasAttribute('required') && !value === '') {
            this.showError(field, errorEelement, 'Mínimo 3 caracteres requeridos');
            return false;
        }
        if (field.type === 'number' && value !== ''){
            const num = parseFloat(value);
            if (field.hasAttribute('min') && num < parseFloat(field.getAttribute('min'))) {
                this.showError(field, errorEelement, 'Mínimo 0.01');
                return false;
            }  
        }
// Si pasa todas las validaciones, limpia cualquier error previo        
        this.ClearError(field);
        return true;
    }
// Muestra el mensaje de error junto al campo   
    showError(field, errorEelement, message) {
        field.classList.add('input-error');
        if (errorEelement) {
            errorEelement.textContent = message;
            errorEelement.style.display = 'block';
        }
    }
// Limpia el mensaje de error del campo
    ClearError(field) {
        field.classList.remove('input-error');
        const errorEelement = document.getElementById(`${field.id}-error`);
        if (errorEelement) {
            errorEelement.textContent = '';
            errorEelement.style.display = 'none';
        }
    }
}
// Inicializa la validación del formulario cuando el DOM esté cargado
document.addEventListener('DOMContentLoaded', () => {
    new FormValidator('productForm');
});
// Fin de js/validacion.js
