document.addEventListener('DOMContentLoaded', () => {
    const headerContainer = document.getElementById('header-container');
    const footerContainer = document.getElementById('footer-container');

    const currentPath = window.location.pathname;
    const isInSubfolder = currentPath.includes('/paginas/');
    const headerPath = isInSubfolder ? '../header.html' : 'header.html';
    const footerPath = isInSubfolder ? '../footer.html' : 'footer.html';

    const loadHTML = (path, container) => {
        fetch(path)
            .then(response => {
                if (!response.ok) {
                    throw new Error(`No se pudo cargar el archivo desde ${path}`);
                }
                return response.text();
            })
            .then(data => {
                container.innerHTML = data;

                // Ajustar rutas relativas después de cargar el contenido
                if (isInSubfolder) {
                    const images = container.querySelectorAll('img');
                    const links = container.querySelectorAll('a');
                    
                    images.forEach(img => {
                        const src = img.getAttribute('src');
                        if (src && !src.startsWith('http') && !src.startsWith('/')) {
                            img.setAttribute('src', '../' + src);
                        }
                    });

                    links.forEach(link => {
                        const href = link.getAttribute('href');
                        if (href && !href.startsWith('http') && !href.startsWith('/')) {
                            link.setAttribute('href', '../' + href);
                        }
                    });
                }
            })
            .catch(error => console.error('Error al cargar el contenido:', error));
    };

    if (headerContainer) loadHTML(headerPath, headerContainer);
    if (footerContainer) loadHTML(footerPath, footerContainer);
});
