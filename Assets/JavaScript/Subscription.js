document.addEventListener('DOMContentLoaded', function() {
    const detailsToggle = document.querySelector('.details-toggle');
    const detailsContent = document.querySelector('.details-content');

    detailsToggle.addEventListener('click', function() {
        if (detailsContent.style.display === 'none' || detailsContent.style.display === '') {
            detailsContent.style.display = 'block';
        } else {
            detailsContent.style.display = 'none';
        }
    });
});
