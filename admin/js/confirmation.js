//*****************************
// Delete confirmation dialog
//*****************************


const confirmationModal = document.querySelector('.modal');
const confirmationMsg = document.querySelector('.msg');
const deleteLink = document.querySelector('.modal-confirm');
const cancel = document.querySelector('.modal-cancel');


function showModal(question, link) {
  confirmationModal.showModal();
  deleteLink.href = link;
  confirmationMsg.innerText = question;
}

// if (document.querySelector('.cancel')) {
  cancel.addEventListener('click', function (event){
    confirmationModal.close()
    event.preventDefault();
  })
// }




//**********************
// Close confirmations
//**********************

if (document.querySelector('button.close-confirmation')) {
  document.querySelector('button.close-confirmation').addEventListener('click', function () {
    this.parent = document.querySelector('button.close-confirmation').parentNode;
    this.parent.style.display = 'none';
  })
}