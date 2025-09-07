function refreshPreview() {
    const iframe = document.getElementById('preview-iframe');
    if (iframe) {
        iframe.src = iframe.src;
    }
}

function addSkill() {
    const container = document.getElementById('skills-container');
    const skillInput = document.createElement('div');
    skillInput.className = 'input-group mb-2 skill-input';
    skillInput.innerHTML = `
        <input type="text" class="form-control" name="profile_skills[]" placeholder="Enter skill" required>
        <button type="button" class="btn btn-outline-danger" onclick="removeSkill(this)">
            <i class="fas fa-times"></i>
        </button>
    `;
    container.appendChild(skillInput);
}

function removeSkill(button) {
    const skillInputs = document.querySelectorAll('.skill-input');
    if (skillInputs.length > 1) {
        button.closest('.skill-input').remove();
    } else {
        alert('At least one skill is required.');
    }
}

function editCard(cardId) {
    const editForm = document.getElementById(`edit-form-${cardId}`);
    if (editForm) {
        editForm.style.display = editForm.style.display === 'none' ? 'block' : 'none';
    }
}

function cancelEdit(cardId) {
    const editForm = document.getElementById(`edit-form-${cardId}`);
    if (editForm) {
        editForm.style.display = 'none';
    }
}

function toggleCardStatus(cardId, newStatus) {
    if (confirm('Are you sure you want to change the status of this card?')) {
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = `/admin/portfolio-cards/${cardId}`;
        form.style.display = 'none';

        const csrfToken = document.createElement('input');
        csrfToken.type = 'hidden';
        csrfToken.name = '_token';
        csrfToken.value = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        form.appendChild(csrfToken);

        const methodField = document.createElement('input');
        methodField.type = 'hidden';
        methodField.name = '_method';
        methodField.value = 'PUT';
        form.appendChild(methodField);

        const isActiveField = document.createElement('input');
        isActiveField.type = 'hidden';
        isActiveField.name = 'is_active';
        isActiveField.value = newStatus === 'true' ? '1' : '0';
        form.appendChild(isActiveField);

        const cardElement = document.querySelector(`[data-card-id="${cardId}"]`);
        if (cardElement) {
            const title = cardElement.querySelector('h6').textContent.trim();
            const description = cardElement.querySelector('p.text-muted').textContent.trim();
            const backgroundClass = cardElement.querySelector('.badge').textContent.trim();

            const titleField = document.createElement('input');
            titleField.type = 'hidden';
            titleField.name = 'title';
            titleField.value = title;
            form.appendChild(titleField);

            const descField = document.createElement('input');
            descField.type = 'hidden';
            descField.name = 'description';
            descField.value = description;
            form.appendChild(descField);

            const bgField = document.createElement('input');
            bgField.type = 'hidden';
            bgField.name = 'background_class';
            bgField.value = backgroundClass;
            form.appendChild(bgField);
        }

        document.body.appendChild(form);
        form.submit();
    }
}

function deleteCard(cardId) {
    if (confirm('Are you sure you want to delete this portfolio card? This action cannot be undone.')) {
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = `/admin/portfolio-cards/${cardId}`;
        form.style.display = 'none';

        const csrfToken = document.createElement('input');
        csrfToken.type = 'hidden';
        csrfToken.name = '_token';
        csrfToken.value = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        form.appendChild(csrfToken);

        const methodField = document.createElement('input');
        methodField.type = 'hidden';
        methodField.name = '_method';
        methodField.value = 'DELETE';
        form.appendChild(methodField);

        document.body.appendChild(form);
        form.submit();
    }
}

document.addEventListener('DOMContentLoaded', function() {
    const forms = document.querySelectorAll('form');
    forms.forEach(form => {
        form.addEventListener('submit', function() {
            setTimeout(() => {
                const iframe = document.querySelector('iframe');
                if (iframe) {
                    iframe.src = iframe.src;
                }
            }, 1000);
        });
    });
});
