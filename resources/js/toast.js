import Editor from '@toast-ui/editor';
import "@toast-ui/editor/dist/toastui-editor.css";
import "@toast-ui/editor/dist/theme/toastui-editor-dark.css";

function generateEditor(html = "", theme = null) {
    window.__toast = new Editor({
        el: document.querySelector("#editor"),
        height: "60vh",
        initialEditType: "wysiwyg",
        theme: theme !== null ? theme : localStorage.getItem('theme') === 'dark' ? 'dark' : 'light',
        initialValue: html !== "" ? html : "Write something great!",
    });
}

document.addEventListener('DOMContentLoaded', function() {
    generateEditor(document.getElementById('content').value);
});

document.getElementsByClassName('theme-manager-btn')[0].addEventListener('click', function(e) {
    generateEditor(
        window.__toast.getMarkdown(), 
        window.__toast.options.theme === 'dark' ? 'light' : 'dark'
    );
});

document.getElementById('clear-editor-btn').addEventListener('click', function(e) {
    generateEditor();
});

/* Inject toast content into hidden html form input */
document.getElementById('postForm').addEventListener('submit', function(e) {
    e.preventDefault();
    document.getElementById('content').value = window.__toast.getMarkdown();
    this.submit();
});