/**
 * Comment management functionality for editing and deleting comments
 * Only logged-in users who authored the comment can access these features
 */
document.addEventListener('DOMContentLoaded', () => {
  // Edit comment functionality
  setupCommentEditing();
  
  // Delete comment functionality
  setupCommentDeletion();
  
  // Comment form animation
  setupCommentFormAnimation();
});

/**
 * Sets up the comment form animation
 */
function setupCommentFormAnimation() {
  // Get the comment form
  const commentForm = document.querySelector('.comment-form');
  
  if (commentForm) {
    // Add animation on submit
    commentForm.addEventListener('submit', function() {
      const submitBtn = this.querySelector('[type="submit"]');
      if (submitBtn) {
        submitBtn.classList.add('submitting');
      }
    });
  }
}

/**
 * Sets up comment editing functionality
 */
function setupCommentEditing() {
  // Find all edit comment buttons
  const editButtons = document.querySelectorAll('.comment-edit-button');
  
  editButtons.forEach(button => {
    button.addEventListener('click', function(e) {
      e.preventDefault();
      
      // Get the comment ID from the button's data attribute
      const commentId = this.dataset.commentId;
      const commentContainer = document.getElementById(`comment-${commentId}`);
      const commentContent = commentContainer.querySelector('.comment-content');
      
      // Get text without HTML formatting
      const tempDiv = document.createElement('div');
      tempDiv.innerHTML = commentContent.innerHTML;
      const commentText = tempDiv.textContent || tempDiv.innerText;
      
      // Create edit form
      const form = document.createElement('div');
      form.className = 'edit-comment-form mt-3';
      form.innerHTML = `
        <textarea class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-[#AB277A] focus:ring focus:ring-[#AB277A] focus:ring-opacity-30 transition-all">${commentText.trim()}</textarea>
        <div class="flex mt-2 space-x-2">
          <button type="button" class="save-edit-button bg-gradient-to-r from-[#D93280] to-[#5A0989] text-white rounded-lg px-4 py-2 text-sm transition hover:opacity-90">Guardar</button>
          <button type="button" class="cancel-edit-button bg-gray-100 text-gray-700 rounded-lg px-4 py-2 text-sm transition hover:bg-gray-200">Cancelar</button>
        </div>
        <div class="edit-message mt-2"></div>
      `;
      
      // Hide original content and show form
      commentContent.style.display = 'none';
      commentContent.after(form);
      
      // Setup cancel button
      form.querySelector('.cancel-edit-button').addEventListener('click', () => {
        commentContent.style.display = '';
        form.remove();
      });
      
      // Setup save button
      form.querySelector('.save-edit-button').addEventListener('click', () => {
        const newContent = form.querySelector('textarea').value.trim();
        const messageContainer = form.querySelector('.edit-message');
        
        if (!newContent) {
          messageContainer.innerHTML = '<div class="p-2 text-red-800 bg-red-50 text-sm rounded-lg">El comentario no puede estar vacío</div>';
          return;
        }
        
        // Show loading state
        const saveButton = form.querySelector('.save-edit-button');
        const originalButtonText = saveButton.textContent;
        saveButton.textContent = 'Guardando...';
        saveButton.disabled = true;
        
        // Prepare the data
        const formData = new FormData();
        formData.append('action', 'ikintsugi_edit_comment');
        formData.append('comment_id', commentId);
        formData.append('comment_content', newContent);
        formData.append('_ajax_nonce', ikintsugi_comments?.edit_nonce || '');
        
        // Send request
        fetch(ikintsugi_comments?.ajax_url || '/wp-admin/admin-ajax.php', {
          method: 'POST',
          body: formData,
          credentials: 'same-origin'
        })
        .then(response => response.json())
        .then(data => {
          if (data.success) {
            // Update comment content
            commentContent.innerHTML = data.data.content;
            
            // Show success message
            messageContainer.innerHTML = '<div class="p-2 text-green-800 bg-green-50 text-sm rounded-lg">Comentario actualizado correctamente</div>';
            
            // Remove form after delay
            setTimeout(() => {
              commentContent.style.display = '';
              form.remove();
            }, 1500);
          } else {
            // Show error
            messageContainer.innerHTML = `<div class="p-2 text-red-800 bg-red-50 text-sm rounded-lg">${data.data?.message || 'Error al actualizar el comentario'}</div>`;
            
            // Reset button
            saveButton.textContent = originalButtonText;
            saveButton.disabled = false;
          }
        })
        .catch(error => {
          console.error('Error:', error);
          
          // Show error message
          messageContainer.innerHTML = '<div class="p-2 text-red-800 bg-red-50 text-sm rounded-lg">Error al procesar la solicitud</div>';
          
          // Reset button
          saveButton.textContent = originalButtonText;
          saveButton.disabled = false;
        });
      });
    });
  });
}

/**
 * Sets up comment deletion functionality
 */
function setupCommentDeletion() {
  // Create and append delete modal to the document once
  const deleteModal = document.createElement('div');
  deleteModal.className = 'fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-50 hidden';
  deleteModal.id = 'delete-comment-modal';
  deleteModal.innerHTML = `
    <div class="bg-white rounded-xl shadow-xl max-w-md w-full mx-4 overflow-hidden">
      <div class="bg-gradient-to-r from-[#D93280] to-[#5A0989] py-4 px-6">
        <h3 class="text-xl font-bold text-white font-paytone">¿Eliminar comentario?</h3>
      </div>
      <div class="p-6">
        <p class="text-gray-700 mb-2">¿Estás seguro de que quieres eliminar este comentario?</p>
        <p class="text-sm text-gray-500 mb-6">Esta acción no se puede deshacer.</p>
        
        <div class="flex justify-end gap-3">
          <button type="button" id="cancel-delete" class="px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg transition-colors">
            Cancelar
          </button>
          <button type="button" id="confirm-delete" class="px-4 py-2 bg-gradient-to-r from-[#D93280] to-[#5A0989] hover:from-[#AB277A] hover:to-[#4A0979] text-white rounded-lg transition-colors flex items-center">
            <span>Eliminar</span>
            <svg class="animate-spin ml-2 h-4 w-4 text-white hidden" id="delete-spinner" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
              <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
              <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
          </button>
        </div>
      </div>
    </div>
  `;
  document.body.appendChild(deleteModal);
  
  // Set up modal functionality
  const cancelButton = document.getElementById('cancel-delete');
  const confirmButton = document.getElementById('confirm-delete');
  const spinner = document.getElementById('delete-spinner');
  
  let currentCommentId = null;
  
  // Close modal
  cancelButton.addEventListener('click', () => {
    deleteModal.classList.add('hidden');
  });
  
  // Find all delete comment buttons
  const deleteButtons = document.querySelectorAll('.comment-delete-button');
  
  deleteButtons.forEach(button => {
    button.addEventListener('click', function(e) {
      e.preventDefault();
      
      // Get the comment ID
      currentCommentId = this.dataset.commentId;
      
      // Show modal
      deleteModal.classList.remove('hidden');
    });
  });
  
  // Handle delete confirmation
  confirmButton.addEventListener('click', function() {
    if (!currentCommentId) return;
    
    // Show loading state
    this.disabled = true;
    spinner.classList.remove('hidden');
    
    // Prepare the data
    const formData = new FormData();
    formData.append('action', 'ikintsugi_delete_comment');
    formData.append('comment_id', currentCommentId);
    formData.append('_ajax_nonce', ikintsugi_comments?.delete_nonce || '');
    
    // Send request
    fetch(ikintsugi_comments?.ajax_url || '/wp-admin/admin-ajax.php', {
      method: 'POST',
      body: formData,
      credentials: 'same-origin'
    })
    .then(response => response.json())
    .then(data => {
      if (data.success) {
        // Hide modal
        deleteModal.classList.add('hidden');
        
        // Find and remove the comment from the DOM
        const commentElement = document.getElementById(`comment-${currentCommentId}`);
        if (commentElement) {
          // Replace with success message
          const successMessage = document.createElement('div');
          successMessage.className = 'p-4 mb-6 bg-green-50 text-green-800 rounded-lg text-sm';
          successMessage.textContent = 'Comentario eliminado correctamente';
          
          commentElement.parentNode.replaceChild(successMessage, commentElement);
          
          // Remove the message after a delay
          setTimeout(() => {
            successMessage.remove();
          }, 3000);
        }
      } else {
        // Show error alert and hide modal
        alert(data.data?.message || 'Error al eliminar el comentario');
        deleteModal.classList.add('hidden');
      }
    })
    .catch(error => {
      console.error('Error:', error);
      alert('Error al procesar la solicitud');
      deleteModal.classList.add('hidden');
    })
    .finally(() => {
      // Reset button
      this.disabled = false;
      spinner.classList.add('hidden');
    });
  });
  
  // No need for background click handler since there's no background overlay
} 