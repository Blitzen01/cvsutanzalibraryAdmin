// admin sidebar
const sidebar = document.getElementById('sidebar');
const toggle = document.getElementById('toggle');
const pageAccess = document.getElementById('pageAccess');
document.onclick = function(e) {
    if(e.target.id !== 'pageAccess' && e.target.id !== 'sidebar' && e.target.id !== 'toggle') {
        sidebar.classList.remove('active');
        toggle.classList.remove('active');
    }
}

toggle.onclick = function() {
    sidebar.classList.toggle('active');
    toggle.classList.toggle('active');
}
// admin sidebar
