document.addEventListener('DOMContentLoaded', () => {
    // Select the button with the ID 'cool-selector'
    const styleButton = document.querySelector('#cool-selector');
    const textArea = document.querySelector('#cool_codemirror_textarea');
    const updateButton = document.querySelector('#cool-preview-changes');
    const exportButton = document.querySelector('#cool-css-export');
    let stylingModeActive = false;

    // Ensure CodeMirror is initialized
    const editor = wp.codeEditor.initialize(textArea, cm_settings.codeEditor).codemirror;

    const toggleStylingMode = () => {
        // Toggle the stylingModeActive variable
        stylingModeActive = !stylingModeActive;
        // Add or remove the class 'cool-styling-active' to the body
        document.querySelector("body").classList.toggle('cool-styling-active');
    }

    // Define the event handler
    const handleElementClick = (e) => {
        if (!stylingModeActive) return;

        // Prevent Default
        e.preventDefault();

        // If the click target is the button, return
        if (e.target === styleButton) return;
        if (e.target === textArea) return;
        if (e.target === updateButton) {
            toggleStylingMode();
            return;
        };

        // If the click target is a child of .CodeMirror, return
        const codeMirrorElement = document.querySelector('.CodeMirror');
        if (codeMirrorElement && codeMirrorElement.contains(e.target)) return;

        // Get the CSS selector of the clicked element
        const cssPath = getCssPath(e.target);

        // Add the CSS selector to the CodeMirror editor with {}
        const currentValue = editor.getValue();
        const newValue = `${currentValue}\n${cssPath} {\n\n}\n\n`;
        editor.setValue(newValue);
    };

    // Function to get CSS path
    const getCssPath = (el) => {
        let path = '';
        while (el.nodeType === Node.ELEMENT_NODE) {
            let selector = el.nodeName.toLowerCase();
            if (el.id) {
                selector += `#${el.id}`;
                path = selector + ' ' + path;
                break;
            } else {
                let sib = el, nth = 1;
                while (sib = sib.previousElementSibling) {
                    if (sib.nodeName.toLowerCase() === selector)
                        nth++;
                }
            }
            path = selector + ' ' + path;
            el = el.parentNode;
        }
        return path.trim();
    };

    // Add Event Listener to the button
    if (!styleButton) return;
    styleButton.addEventListener('click', (e) => {
        // Prevent Default
        e.preventDefault();

        // Toggle the styling mode
        toggleStylingMode();

        // Remove or add the event listener for element clicks
        if (!stylingModeActive) document.removeEventListener('click', handleElementClick);
        else document.addEventListener('click', handleElementClick);
    });

    if (!updateButton) return;
    const updateStyles = () => {
        const oldStyleTag = document.querySelector('#cool-styling-css')
        if (oldStyleTag) oldStyleTag.remove();

        const css = editor.getValue();
        const style = document.createElement('style');
        style.id = "cool-styling-css";
        style.textContent = css;
        document.head.appendChild(style);
    }

    // Update Style on load
    updateStyles();
    // Update on click
    updateButton.addEventListener('click', updateStyles);

    if(!exportButton) return;
    // Export CSS
    exportButton.addEventListener('click', (e) => {
        // Prevent Default
        e.preventDefault();

        // Get values
        const css = editor.getValue();
        const blob = new Blob([css], { type: 'text/css' });
        const url = URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = 'wp-cool-theme.css';
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
        URL.revokeObjectURL(url);
    });
});
