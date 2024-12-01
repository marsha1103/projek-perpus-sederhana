document.querySelectorAll('.tab').forEach(tab => {
    tab.addEventListener('click', () => {
        document.querySelectorAll('.tab').forEach(t => t.classList.remove('active'));
        document.querySelectorAll('[data-tab-content]').forEach(content => content.classList.remove('active'));

        tab.classList.add('active');
        document.querySelector(tab.dataset.tabTarget).classList.add('active');
    });
});
