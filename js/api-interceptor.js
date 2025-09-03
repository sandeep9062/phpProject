/**
 * API Interceptor Script
 * This script intercepts API calls to jhargames.com and redirects them to our local server
 */

(function() {
    // Store the original fetch function
    const originalFetch = window.fetch;
    
    // Override the fetch function
    window.fetch = function(url, options) {
        // Check if the URL is for jhargames.com
        if (typeof url === 'string' && url.includes('jhargames.com')) {
            // Convert external URL to local URL
            const newUrl = url.replace('https://jhargames.com', '');
            console.log('Intercepted API call:', url, 'redirecting to:', newUrl);
            return originalFetch(newUrl, options);
        }
        
        // Otherwise, use the original fetch
        return originalFetch(url, options);
    };
    
    // Override XMLHttpRequest
    const originalXHROpen = XMLHttpRequest.prototype.open;
    XMLHttpRequest.prototype.open = function(method, url, async, user, password) {
        // Check if the URL is for jhargames.com
        if (typeof url === 'string' && url.includes('jhargames.com')) {
            // Convert external URL to local URL
            const newUrl = url.replace('https://jhargames.com', '');
            console.log('Intercepted XHR call:', url, 'redirecting to:', newUrl);
            return originalXHROpen.call(this, method, newUrl, async, user, password);
        }
        
        // Otherwise, use the original open
        return originalXHROpen.call(this, method, url, async, user, password);
    };
    
    // Create mock images for missing resources
    function createMockImage(src) {
        // Extract the filename from the path
        const filename = src.split('/').pop();
        const canvas = document.createElement('canvas');
        canvas.width = 50;
        canvas.height = 50;
        const ctx = canvas.getContext('2d');
        
        // Fill with a light color
        ctx.fillStyle = '#f0f0f0';
        ctx.fillRect(0, 0, canvas.width, canvas.height);
        
        // Add text with the filename
        ctx.fillStyle = '#333';
        ctx.font = '10px Arial';
        ctx.textAlign = 'center';
        ctx.fillText(filename, 25, 30);
        
        return canvas.toDataURL();
    }
    
    // Fix image URLs
    function fixImageUrls() {
        // Select all images with jhargames.com in the src
        const images = document.querySelectorAll('img[src*="jhargames.com"]');
        images.forEach(img => {
            const originalSrc = img.src;
            const newSrc = originalSrc.replace('https://jhargames.com', '');
            console.log('Fixing image URL:', originalSrc, 'to:', newSrc);
            
            // Set a fallback for the image
            img.onerror = function() {
                console.log('Image failed to load, using mock:', originalSrc);
                img.src = createMockImage(originalSrc);
                // Remove the error handler to prevent loops
                img.onerror = null;
            };
            
            // Set the new source
            if (img.src !== newSrc) {
                img.src = newSrc;
            }
        });
        
        // Also fix background images in style attributes
        const elementsWithBgImage = document.querySelectorAll('[style*="jhargames.com"]');
        elementsWithBgImage.forEach(el => {
            const style = el.getAttribute('style');
            if (style && style.includes('jhargames.com')) {
                const newStyle = style.replace(/https:\/\/jhargames\.com/g, '');
                el.setAttribute('style', newStyle);
            }
        });
    }
    
    // Run when DOM is loaded
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', fixImageUrls);
    } else {
        fixImageUrls();
    }
    
    // Also run periodically to catch dynamically added images
    setInterval(fixImageUrls, 500);
    
    console.log('API Interceptor initialized');
})();