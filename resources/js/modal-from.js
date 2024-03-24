import axios from './bootstrap.js';

const addNote = document.querySelector('.add__note');
const modalForm = document.querySelector('.modal__form');

const toggleModal = () => {
    modalForm.classList.toggle('modal__form_active');
};

const dataForm = () => {
    const form = modalForm.querySelector('form');
    return new FormData(form);
};

const clearErrorForm = () => {
    const form = modalForm.querySelector('form');
    if (form.querySelector('.view__error')) {
        form.querySelector('.view__error').remove();
    }
};

const clearTableMess = () => {
    if (document.querySelector('.table__message')) {
        document.querySelector('.table__message').remove();
    }
};

const viewErrors = (errors) => {
    clearErrorForm();
    const form = modalForm.querySelector('form');
    const arrErrors = Object.values(errors);
    const div = document.createElement('div');
    div.classList.add('alert', 'alert-danger', 'view__error');

    const ul = document.createElement('ul');

    arrErrors.forEach(error => {
        const li = document.createElement('li');
        li.textContent = error[0];
        ul.append(li);
    });
    div.append(ul);
    form.prepend(div);
};

const addNoteList = (data) => {
    const tbody = document.querySelector('tbody');
    clearTableMess();

    const tr = document.createElement('tr');
    tr.innerHTML = `
     <td>${data.id}</td>
     <td>${data.title}</td>
     <td>${data.updated_at}</td>
     <td>
         <a href="http://127.0.0.1:8000/note/${data.id}/edit" class="btn btn-info btn-sm float-left mr-1">
            <i class="fas fa-pencil-alt"></i>Edit
         </a>

         <form action="http://127.0.0.1:8000/note/${data.id}" method="post" class="float-left">
             <input type="hidden" name="_token" value="Knb9mT7MB933Q7E9DeufsPnnlWvYUKWUkwxqgH6G" autocomplete="off">                            <input type="hidden" name="_method" value="DELETE">                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Подтвердите удаление')">
                 <i class="fas fa-trash-alt"></i>Delete
             </button>
         </form>
     </td>
    `;
    tbody.prepend(tr);
};

const handlerSubmit = () => {
    const data = dataForm();
    axios.post('/note', data )
        .then(response => {
            clearErrorForm();
            modalForm.querySelector('form').reset();
            toggleModal();
            if (response.status === 201) {
                addNoteList(response.data);
            }

        })
        .catch(error => {
            if (error.response.status === 422) {
                viewErrors(error.response.data.errors);
            }
        });
};

if (addNote) {
    addNote.addEventListener('click', (event) => {
        event.preventDefault();
        toggleModal();
    });
}

modalForm.addEventListener('click', (event) => {
   event.preventDefault();
   const target = event.target;
   if (target.closest('.modal__close')) {
       toggleModal();
   }

   if (target.closest('.form__submit')) {
        handlerSubmit();
   }
});

